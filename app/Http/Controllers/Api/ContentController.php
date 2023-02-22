<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Res;
use App\Models\Soal;
use App\Models\Unit;
use App\Models\Jawaban;
use App\Models\UnitBab;
use App\Models\UnitUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use App\Http\Resources\ContentResource;

class ContentController extends Controller
{
    public function babExist()
    {
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
