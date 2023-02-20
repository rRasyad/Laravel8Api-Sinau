<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Res;
use App\Models\Soal;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContentResource;

class ContentController extends Controller
{
    public function content(Request $request)
    {
        $jenis = $request->jenis;
        if (!$jenis) return response()->json('you must fill jenis content!');
        $unit = $request->unit;
        if (!$unit) return response()->json('you must fill the id unit content!');
        $bab = $request->bab;
        if (!$bab) return response()->json('you must fill the id bab content!');

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
