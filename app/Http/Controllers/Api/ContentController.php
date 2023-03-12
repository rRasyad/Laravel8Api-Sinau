<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Dictionary;
use App\Helpers\Res;
use App\Models\Soal;
use App\Models\Unit;
use App\Models\Jawaban;
use App\Models\UnitBab;
use App\Models\UnitUser;
use App\Models\SoalSession;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SoalSelectedSession;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use App\Http\Resources\ContentResource;
use App\Helpers\Functions as Func;

class ContentController extends Controller
{
    public function a()
    {
        $dick = new Dictionary;
        return response()->json($dick->soal["4"]);
    }
    public function initiation(Request $request)
    {
        $bab = $request->bab;
        if (!$bab) return response()->json(['message' => 'you must fill bab!'], 404);
        $unitUser = UnitUser::where([['user_id', $request->user()->id], ['bab_id', $bab]])->first();
        if (!$unitUser) return response()->json(['message' => "you haven't reached here yet"], 404);
        $find = SoalSession::where('user_id', $request->user()->id)->get();
        foreach ($find as $item) {
            SoalSelectedSession::where('session_id', $item->id)->delete();
            $item->delete();
        }

        $unitBab = UnitBab::find($bab);
        SoalSession::create([
            'user_id' => $request->user()->id,
            'unit_id' => $unitBab->unit_id,
            'bab_id' => $bab,
            'part' => $unitBab->part,
            'session_max' => 10,
            'session_current' => 0,
            'session_expire' => now()->addHour(1)
        ]);

        return response()->json(['message' => 'Initiation Created'], 200);
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

        $i = 1;
        if ($request['jawaban'] && $request['id_soal']) {

            // $answ = Soal::where([['id', $request->id_soal], ['keyword_pattern', $request->jawaban]]);
            $answ = Soal::where('id', $request->id_soal)
                ->where('keyword_pattern', $request->jawaban)->first();
            if (!$answ) {
                $i = 0;
            }
            $selected = SoalSelectedSession::where('soal_id', $request->id_soal)
                ->where('session_id', $currentSession["id"]);
            // $selected = SoalSelectedSession::where('session_id', $currentSession["id"])->first();

            if ($selected) {
                $selected->update(["benar" => $i]);
            }

            $selectedExists = SoalSelectedSession::where('session_id', $currentSession["id"])->get()
                ->filter(function ($value, $key) {
                    return ($value->benar == 0);
                })->count();
            if ($selectedExists % 2) {
                $currentSession["session_current"] += 1;
            }
        }

        if ($currentSession["session_current"] >= $currentSession["session_max"]) {
            $get = SoalSelectedSession::where('session_id', $currentSession["id"])->get();
            $salah = $get->filter(function ($value, $key) {
                return ($value->benar == 0);
            })->count();
            $benar = $get->filter(function ($value, $key) {
                return ($value->benar == 1);
            })->count();
            // error_log($benar);
            $score = $salah + ($benar * 5);
            $Xp = XpController::autoUpdate($request->user()->id, $score);
            $putusan = 'Score kurang dari 40, Xp ditambahkan';
            if ($score >= 40) {
                $raw = UnitUser::where([
                    ['user_id', $request->user()->id],
                    ['bab_id', $currentSession['bab_id']]
                ]);
                $reach = $raw->first();
                if ($reach->reach >= 4) {
                    $check = UnitUser::where([
                        ['user_id', $request->user()->id],
                        ['bab_id', $currentSession['bab_id'] + 1]
                    ])->first();
                    $putusan = 'Dianggap Training, Xp ditambahkan';
                    if (!$check) {
                        $unitUser = UnitUser::create([
                            'user_id' => $request->user()->id,
                            'bab_id' => $currentSession['bab_id'] + 1
                        ]);
                        ($unitUser) ? $putusan = 'Bab ini selesai, Bab baru terbuka'
                            : $putusan = 'Bab baru gagal terbuka';
                    }
                } else {
                    $unitUser = $raw->update(['reach' => $reach->reach + 1]);
                    ($unitUser) ? $putusan = 'Stage ditambahkan'
                        : $putusan = 'Stage gagal ditambahkan';
                }
                // error_log($unitUser);
            }
            SoalSession::where('user_id', $request->user()->id)->update(['session_expire' => now()]);
            return response()
                ->json([
                    'message' => 'session ends',
                    'score_akhir' => $score,
                    "Xp" => $Xp,
                    "putusan" => $putusan,
                ], 200);
        }

        $currentSession["session_current"] = $currentSession["session_current"] + $i;
        $currentSession->save();

        // $quest = Func::getSoal($currentSession["bab_id"], $currentSession["id"]);

        // $soals = Soal::where('bab_id', $currentSession["bab_id"])
        $soals = Soal::where([['part', $currentSession["part"]], ['unit_id', $currentSession["unit_id"]]])
            ->leftJoin('soal_selected_sessions', 'soal_selected_sessions.soal_id', '=', 'soals.id')
            ->whereNull('soal_selected_sessions.session_id')->get();

        if (!$soals) {
            return response()->json(['message' => 'content not found'], 500);
        }

        $soals = $soals->random()['id'];
        SoalSelectedSession::create([
            'session_id' => $currentSession["id"],
            'soal_id' => $soals,
        ]);
        // $check = SoalSelectedSession::where('session_id', $id);
        // if (count($check->get()) === 1) {
        //     $check->update(["benar" => 2]);
        // }
        $quest = Soal::find($soals)->load('artiSoal');
        // $quest = Soal::find(39)->load('artiSoal');

        $key = explode(" ", $quest['keyword_pattern']);
        $jawaban = Jawaban::where('id_unit', $currentSession["unit_id"])
            ->whereIn('keyword', $key)
            ->union(Jawaban::where('id_unit', $currentSession["unit_id"])
                ->inRandomOrder()->take(3))->get();
        $response = [
            'message' => 'next session',
            'current_session' => $currentSession['session_current'],
            'score_before' => ($i == 1) ? 'benar' : 'salah',
            'Soal' => $quest,
            'Jawaban' => $jawaban->shuffle(),
        ];
        return response()->json($response, 200);
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
                // $data[$index]['unit_bab'][$indexBab]['url'] = $unitBab->url;
                $data[$index]['unit_bab'][$indexBab]['icon'] = $unitBab->icon;
                $reach = UnitUser::where('bab_id', $unitBab->id)
                    ->where('user_id', $request->user()->id)->first();
                // error_log($reach);
                if ($reach) {
                    // $finishstep = $reach->filter(function ($value, $key) {
                    //     return ($value->reach == 4);
                    // })->reach;
                    // $finishstep === 4 ? $isUnlocked = true : $isUnlocked = false;
                    $reach ? $isUnlocked = true : $isUnlocked = false;
                    $reach = $reach['reach'];
                    // $reach ? $isUnlocked = true : $isUnlocked = false;
                } else {
                    $reach = null;
                    $isUnlocked = false;
                }
                $data[$index]['unit_bab'][$indexBab]['reach'] = $reach;
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
}
