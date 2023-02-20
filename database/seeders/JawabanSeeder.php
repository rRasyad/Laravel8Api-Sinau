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
        $bab1_kromo = Dictionary::vocab['kromo']['1'];
        for ($i = 0; $i < count($bab1_kromo); $i++) {
            Jawaban::factory()->create([
                'id_unit'    => array_keys(Dictionary::vocab['kromo'])[0],
                'jawa'      => $bab1_kromo[$i][0],
                'indo'      => $bab1_kromo[$i][1],
                'keyword' => $bab1_kromo[$i][2],
            ]);
        }
        $bab1_ngoko = Dictionary::vocab['ngoko']['1'];
        for ($i = 0; $i < count($bab1_ngoko); $i++) {
            Jawaban::factory()->create([
                'id_unit' => array_keys(Dictionary::vocab['ngoko'])[0],
                'jawa' => $bab1_ngoko[$i][0],
                'indo' => $bab1_ngoko[$i][1],
                'keyword' => $bab1_ngoko[$i][2],
            ]);
        }
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
