<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Res;
use App\Models\Soal;
use App\Models\Unit;
use App\Models\Jawaban;
use App\Models\UnitBab;
use App\Models\UnitUser;
use App\Models\SoalSession;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SoalSelectedSession;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use App\Http\Resources\ContentResource;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function inisiasi(Request $request, $id)
    {
        $find = SoalSession::where('user_id', $request->user()->id)->get();
        foreach ($find as $item) {
            SoalSelectedSession::where('session_id', $item->id)->delete();
            $item->delete();
        }

        SoalSession::create([
            'user_id' => $request->user()->id,
            'bab_id' => $id,
            'session_max' => 10,
            'session_current' => 0,
            'session_expire' => now()->addHour(1)
        ]);

        return response()->json(['message' => 'ok'], 200);
    }

    public function nextSession(Request $request)
    {
        $currentSession = SoalSession::where("user_id", $request->user()->id)->first();

        if (!$currentSession) {
            return response()->json(['message' => 'session not found'], 404);
        }

        if ($currentSession["session_expire"] <= now()) {
            return response()->json(['message' => 'your session has expired'], 400);
        }

        if ($currentSession["session_current"] >= $currentSession["session_max"]) {
            return response()->json(['message' => 'session ends'], 200);
        }

        $currentSession["session_current"] = $currentSession["session_current"] + 1;
        $currentSession->save();

        // $soals = Soal::where('bab_id', $currentSession["bab_id"])->join('soal_selected_sessions', 'soal_selected_sessions.soal_id', '!=', 'soals.id')->get();
        $soals = Soal::where('bab_id', $currentSession["bab_id"])->leftJoin('soal_selected_sessions', 'soal_selected_sessions.soal_id', '=', 'soals.id')->whereNull('soal_selected_sessions.session_id')->get();

        if (!$soals) {
            // error_log($soals);
            return response()->json(['message' => 'content not found'], 500);
        }

        // error_log($soals);
        // return response()->json($soals);

        SoalSelectedSession::create([
            'session_id' => $currentSession["id"],
            'soal_id' => $soals->random()['id'],
        ]);
        return response()->json(['message' => 'next session'], 200);
    }

    public function mapel(Request $request)
    {
        $mapel = Str::lower($request->query("mapel"));
        if (!$mapel) return response()->json('you must fill mapel!');
        // return response(Unit::where('mapel',$mapel)->get());
        // $data = Unit::where('mapel', $mapel)->with('unitBab')->get();

        // $data = $data->map(function ($mapelItem) use($request) {
        //     return $mapelItem->unit_bab;
        //     // $mapelItem["unit_bab"]->map(function ($unit) use($request) {
        //     //     // $unit["isUnlocked"] = (UnitUser::where('unit_id', $unit["id"])::where('user_id', $request->user()->id)::first() != null);
        //     //     // $unit["isUnlocked"] = "hai";
        //     //     return $unit;
        //     // });
        //     // return $mapelItem;
        // });

        $units = Unit::where('mapel', $mapel)->get();

        $index = 0;
        foreach ($units as $unit) {
            $data[$index]['id'] = $unit->id;
            $data[$index]['mapel'] = $unit->mapel;
            $data[$index]['unit'] = $unit->unit;
            $data[$index]['description'] = $unit->description;
            $unitBabs = UnitBab::where('unit_id', $unit->unit)->get();
            $indexBab = 0;
            foreach ($unitBabs as $unitBab) {
                $data[$index]['unit_bab'][$indexBab]['id'] = $unitBab->id;
                $data[$index]['unit_bab'][$indexBab]['url'] = $unitBab->url;
                $data[$index]['unit_bab'][$indexBab]['icon'] = $unitBab->icon;
                $userReached = UnitUser::where('bab_id', $unitBab->id)->where('user_id', $request->user()->id)->first();
                if ($userReached) $isUnlocked = true;
                else $isUnlocked = false;
                $data[$index]['unit_bab'][$indexBab]['isUnlocked'] = $isUnlocked;
                $indexBab++;
            }

            $index++;
        }

        return response()->json($data);
    }

    public function content(Request $request)
    {
        $jenis = $request->jenis;
        if (!$jenis) return response()->json('you must fill jenis content!');
        $unit = $request->unit;
        if (!$unit) return response()->json('you must fill id unit content!');
        $bab = $request->bab;
        if (!$bab) return response()->json('you must fill id bab content!');

        $soals = Soal::where('jenis', $jenis)
            ->where('unit', $unit)
            ->where('bab', $bab)
            ->inRandomOrder()->limit(10)->get();
        if ($soals->isEmpty()) return Res::autoResponse($soals, 'E');

        $index = 0;
        foreach ($soals as $soal) {
            // $data[$index]['jenis'] = $soal->jenis;
            // $data[$index]['unit'] = $soal->unit;
            // $data[$index]['bab'] = $soal->bab;
            $data[$index]['soal'] = $soal->soal;
            $data[$index]['keyword_pattern'] = $soal->keyword_pattern;

            $keyword = explode(" ", $soal->keyword_pattern);
            $jawabans = Jawaban::whereIn('keyword', $keyword)
                ->union(Jawaban::inRandomOrder()->take(5))
                ->get();
            // $data[$index]['jawaban'] = $jawabans->shuffle();
            $jawabans = $jawabans->shuffle();
            $subindex = 0;
            foreach ($jawabans as $jawaban) {
                $data[$index]['jawaban'][$subindex]['jawa'] = $jawaban->jawa;
                $data[$index]['jawaban'][$subindex]['indo'] = $jawaban->indo;
                $data[$index]['jawaban'][$subindex]['keyword'] = $jawaban->keyword;
                $subindex++;
            }
            $index++;
        }
        return response()->json([
            "status" => Res::MSGA_FETCHED_SUCCESS[1],
            "message" => Res::MSGA_FETCHED_SUCCESS[0],
            "meta" => [
                "jenis" => $soal->jenis,
                "unit" => $soal->unit,
                "bab" => $soal->bab,
            ],
            "data" => $data,
        ]);
    }
    public function calculation(Request $request)
    {
        // $request->only(['keyword']);
        // $compare = Jawaban::;
    }
}
