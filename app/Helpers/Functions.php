<?php

namespace App\Helpers;

use App\Models\Soal;
use App\Models\SoalSelectedSession;

class Functions
{
    public static function checkJawaban($request, $id)
    {
        $i = 0;
        if ($request['jawaban'] && $request['id_soal']) {

            $answ = Soal::where([['id', $request->id_soal], ['keyword_pattern', $request->jawaban]]);
            ($answ) ? $i += 1 : $i -= 1;
            $selected = SoalSelectedSession::where('soal_id', $request->id_soal)
                ->where('session_id', $id)->first();
            if ($selected) $selected->update(["benar" => $selected['benar'] + $i]);
        }
        return $i;
    }

    public static function getSoal($bab_id, $id)
    {
        // $soals = Soal::where('bab_id', $currentSession["bab_id"])->join('soal_selected_sessions', 'soal_selected_sessions.soal_id', '!=', 'soals.id')->get();
        $soals = Soal::where('bab_id', $bab_id)
            ->leftJoin('soal_selected_sessions', 'soal_selected_sessions.soal_id', '=', 'soals.id')
            ->whereNull('soal_selected_sessions.session_id')->get();

        if (!$soals) {
            // error_log($soals);
            return response()->json(['message' => 'content not found'], 500);
        }

        // error_log($soals);
        // return response()->json($soals);
        $soals = $soals->random()['id'];
        SoalSelectedSession::create([
            'session_id' => $id,
            'soal_id' => $soals,
        ]);
        // $check = SoalSelectedSession::where('session_id', $id);
        // if (count($check->get()) === 1) {
        //     $check->update(["benar" => 2]);
        // }
        return Soal::find($soals);
    }
}
