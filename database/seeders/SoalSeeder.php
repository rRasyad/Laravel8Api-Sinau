<?php

namespace Database\Seeders;

use App\Helpers\Dictionary;
use App\Models\Soal;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //? [Ngoko] Unit 1 Bab 1 : Susunan 1 kata
        $soal = Dictionary::soal;
        $ngoko = $soal['ngoko'];
        $nunit1 = $ngoko['1'];
        $nbab1 = $nunit1['1'];
        for ($i=0; $i < count($nbab1); $i++) {
            Soal::factory()->create([
                'jenis' => array_keys($soal)[0],
                'unit' => (int)array_keys($ngoko)[0],
                'bab' => (int)array_keys($nunit1)[0],
                'soal' => $nbab1[$i][0],
                'keyword_pattern' => $nbab1[$i][2],
            ]);
        }

        $nbab2 = $nunit1['2'];
        //? [Ngoko] Unit 1 Bab 2 : Susunan 2 Kata
        for ($i=0; $i < count($nbab2); $i++) {
            Soal::factory()->create([
                'jenis' => array_keys($soal)[0],
                'unit' => (int)array_keys($ngoko)[0],
                'bab' => (int)array_keys($nunit1)[1],
                'soal' => $nbab2[$i][0],
                'keyword_pattern' => $nbab2[$i][1],
            ]);
        }

        $nbab3 = $nunit1['3'];
        //? [Ngoko] Unit 1 Bab 3 : Susunan 3 Kata
        for ($i=0; $i < count($nbab3); $i++) {
            Soal::factory()->create([
                'jenis' => array_keys($soal)[0],
                'unit' => (int)array_keys($ngoko)[0],
                'bab' => (int)array_keys($nunit1)[2],
                'soal' => $nbab3[$i][0],
                'keyword_pattern' => $nbab3[$i][1],
            ]);
        }

        $kromo = $soal['kromo'];
        $kunit1 = $kromo['1'];
        $kbab1 = $kunit1['1'];
        //? [Kromo] Unit 1 Bab 1 : Susunan 1 kata
        for ($i=0; $i < count($kbab1); $i++) {
            Soal::factory()->create([
                'jenis' => array_keys($soal)[1],
                'unit' => (int)array_keys($kromo)[0],
                'bab' => (int)array_keys($kunit1)[0],
                'soal' => $kbab1[$i][0],
                'keyword_pattern' => $kbab1[$i][2],
            ]);
        }

        $kbab2 = $kunit1['2'];
        //? [Kromo] Unit 1 Bab 2 : Susunan 2 Kata
        for ($i=0; $i < count($kbab2); $i++) {
            Soal::factory()->create([
                'jenis' => array_keys($soal)[1],
                'unit' => (int)array_keys($kromo)[0],
                'bab' => (int)array_keys($kunit1)[1],
                'soal' => $kbab2[$i][0],
                'keyword_pattern' => $kbab2[$i][1],
            ]);
        }
        // Soal::factory()->create([
        //     'soal' => 'Sugeng enjing',
        //     'bab' => 1,
        //     'unit' => 1,
        //     'keyword_pattern' => 'AB',
        // ]);
        // Soal::factory()->create([
        //     'soal' => 'Sugeng siang',
        //     'bab' => 1,
        //     'unit' => 1,
        //     'keyword_pattern' => 'AC',
        // ]);
        // Soal::factory()->create([
        //     'soal' => 'Sugeng sonten',
        //     'bab' => 1,
        //     'unit' => 1,
        //     'keyword_pattern' => 'AD',
        // ]);
        // Soal::factory()->create([
        //     'soal' => 'Sugeng ndalu',
        //     'bab' => 1,
        //     'unit' => 1,
        //     'keyword_pattern' => 'AE',
        // ]);
        // Soal::factory()->create([
        //     'soal' => 'Sugeng rawuh',
        //     'bab' => 1,
        //     'unit' => 1,
        //     'keyword_pattern' => 'AF',
        // ]);
    }
}
