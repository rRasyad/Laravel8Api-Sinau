<?php

namespace Database\Seeders;

use App\Models\Jawaban;
use App\Helpers\Dictionary;
use Illuminate\Database\Seeder;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // TODO Finish Jawaban

        $d = new Dictionary();
        $U1 = $d->jawaban['U1'];
        for ($i = 0; $i < count($U1); $i++) {
            Jawaban::factory()->create([
                'id_unit' => 1,
                'word'      => $U1[$i][0],
                'keyword' => $U1[$i][1],
            ]);
        }
        $U2 = $d->jawaban['U2'];
        for ($i = 0; $i < count($U2); $i++) {
            Jawaban::factory()->create([
                'id_unit' => 2,
                'word'      => $U2[$i][0],
                'keyword' => $U2[$i][1],
            ]);
        }

        //? 3
        // $d = new Dictionary();
        // $bab1 = $d->vocab['1'];
        // for ($i = 0; $i < count($bab1); $i++) {
        //     Jawaban::factory()->create([
        //         'id_soal' => array_keys($d->vocab)[0],
        //         'word'      => $bab1[$i][0],
        //         'keyword' => $bab1[$i][2],
        //     ]);
        // }
        // $bab2 = $d->vocab['2'];
        // for ($i = 0; $i < count($bab2); $i++) {
        //     Jawaban::factory()->create([
        //         'id_soal' => array_keys($d->vocab)[1],
        //         'word'      => $bab2[$i][0],
        //         'keyword' => $bab2[$i][2],
        //     ]);
        // }

        //? 2
        // $bab1_kromo = Dictionary::vocab['kromo']['1'];
        // for ($i = 0; $i < count($bab1_kromo); $i++) {
        //     Jawaban::factory()->create([
        //         'id_soal'    => array_keys(Dictionary::vocab['kromo'])[0],
        //         'word'      => $bab1_kromo[$i][0],
        //         'keyword' => $bab1_kromo[$i][2],
        //     ]);
        // }
        // $bab1_ngoko = Dictionary::vocab['ngoko']['1'];
        // for ($i = 0; $i < count($bab1_ngoko); $i++) {
        //     Jawaban::factory()->create([
        //         'id_soal' => array_keys(Dictionary::vocab['ngoko'])[0],
        //         'word'      => $bab1_ngoko[$i][0],
        //         'keyword' => $bab1_ngoko[$i][2],
        //     ]);
        // }

        //? 1
        // Jawaban::factory()->create([
        //     'id_bab' => 1,
        //     'jawa' => 'Sugeng',
        //     'indo' => 'Selamat',
        //     'keyword' => 'A',
        // ]);
        // Jawaban::factory()->create([
        //     'id_bab' => 1,
        //     'jawa' => 'Enjing',
        //     'indo' => 'Pagi',
        //     'keyword' => 'B',
        // ]);
        // Jawaban::factory()->create([
        //     'id_bab' => 1,
        //     'jawa' => 'Siang',
        //     'indo' => 'Siang',
        //     'keyword' => 'C',
        // ]);
        // Jawaban::factory()->create([
        //     'id_bab' => 1,
        //     'jawa' => 'Sonten',
        //     'indo' => 'Sore',
        //     'keyword' => 'D',
        // ]);
        // Jawaban::factory()->create([
        //     'id_bab' => 1,
        //     'jawa' => 'Ndalu',
        //     'indo' => 'Malam',
        //     'keyword' => 'E',
        // ]);
        // Jawaban::factory()->create([
        //     'id_bab' => 1,
        //     'jawa' => 'Rawuh',
        //     'indo' => 'Datang',
        //     'keyword' => 'F',
        // ]);
    }
}
