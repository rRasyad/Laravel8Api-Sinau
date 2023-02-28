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
        // $soal = Dictionary::soal;
        // $bab1 = Dictionary::soal['1']['1'];
        // for ($i=0; $i <= count($bab1); $i++) {
        //     Soal::factory()->create([
        //         // 'jenis' => array_keys($soal)[0],
        //         // 'unit' => (int)array_keys($ngoko)[0],
        //         'bab_id' => (int)array_keys(Dictionary::soal['1'])[0],
        //         'isi_soal' => $bab1[$i][0],
        //         'keyword_pattern' => $bab1[$i][2],
        //     ]);
        // }

        $dictionary = new Dictionary();
        // $bab4 = Dictionary::soal['4'];
        $part1 = $dictionary->vocab['1'];
        //? [Ngoko] Unit 1 Bab 2 : Susunan 2 Kata
        for ($i=0; $i < count($part1); $i++) {
            Soal::factory()->create([
                // 'jenis' => array_keys($soal)[0],
                // 'unit' => (int)array_keys($ngoko)[0],
                // 'bab_id' => (int)array_keys(Dictionary::soal['1'])[3],
                'bab_id' => 1,
                'part' => 2,
                'isi_soal' => $part1[$i][0],
                'keyword_pattern' => $part1[$i][2],
            ]);
        }

        $part2 = $dictionary->soal['1'];
        //? [Ngoko] Unit 1 Bab 2 : Susunan 2 Kata
        for ($i=0; $i < count($part2); $i++) {
            Soal::factory()->create([
                // 'jenis' => array_keys($soal)[0],
                // 'unit' => (int)array_keys($ngoko)[0],
                // 'bab_id' => (int)array_keys(Dictionary::soal['1'])[3],
                'bab_id' => 1,
                'part' => 2,
                'isi_soal' => $part2[$i][0],
                'keyword_pattern' => $part2[$i][1],
            ]);
        }

        // $nbab3 = $nunit1['3'];
        // //? [Ngoko] Unit 1 Bab 3 : Susunan 3 Kata
        // for ($i=0; $i < count($nbab3); $i++) {
        //     Soal::factory()->create([
        //         'jenis' => array_keys($soal)[0],
        //         // 'unit' => (int)array_keys($ngoko)[0],
        //         'bab_id' => (int)array_keys($nunit1)[2],
        //         'isi_soal' => $nbab3[$i][0],
        //         'keyword_pattern' => $nbab3[$i][1],
        //     ]);
        // }

        // $bab1 = Dictionary::soal['2']['1'];
        // //? [Kromo] Unit 1 Bab 1 : Susunan 1 kata
        // for ($i=0; $i < count($bab1); $i++) {
        //     Soal::factory()->create([
        //         // 'jenis' => array_keys($soal)[1],
        //         // 'unit' => (int)array_keys($kromo)[0],
        //         'bab_id' => (int)array_keys(Dictionary::soal['2'])[0],
        //         'isi_soal' => $bab1[$i][0],
        //         'keyword_pattern' => $bab1[$i][2],
        //     ]);
        // }

        // $bab4 = Dictionary::soal['9'];
        $part1 = $dictionary->vocab['2'];
        //? [Kromo] Unit 1 Bab 2 : Susunan 2 Kata
        for ($i=0; $i < count($part1); $i++) {
            Soal::factory()->create([
                // 'jenis' => array_keys($soal)[1],
                // 'unit' => (int)array_keys($kromo)[0],
                // 'bab_id' => (int)array_keys(Dictionary::soal['2'])[3],
                'bab_id' => 2,
                'part' => 2,
                'isi_soal' => $part1[$i][0],
                'keyword_pattern' => $part1[$i][2],
            ]);
        }

        $part2 = $dictionary->soal['2'];
        //? [Kromo] Unit 1 Bab 2 : Susunan 2 Kata
        for ($i=0; $i < count($part2); $i++) {
            Soal::factory()->create([
                // 'jenis' => array_keys($soal)[1],
                // 'unit' => (int)array_keys($kromo)[0],
                // 'bab_id' => (int)array_keys(Dictionary::soal['2'])[3],
                'bab_id' => 2,
                'part' => 2,
                'isi_soal' => $part2[$i][0],
                'keyword_pattern' => $part2[$i][1],
            ]);
        }

        //? 2
        // $kromo = $soal['kromo'];
        // $kunit1 = $kromo['1'];
        // $kbab1 = $kunit1['1'];
        // //? [Kromo] Unit 1 Bab 1 : Susunan 1 kata
        // for ($i=0; $i < count($kbab1); $i++) {
        //     Soal::factory()->create([
        //         'jenis' => array_keys($soal)[1],
        //         // 'unit' => (int)array_keys($kromo)[0],
        //         'bab_id' => (int)array_keys($kunit1)[0],
        //         'isi_soal' => $kbab1[$i][0],
        //         'keyword_pattern' => $kbab1[$i][2],
        //     ]);
        // }

        // $kbab2 = $kunit1['2'];
        // //? [Kromo] Unit 1 Bab 2 : Susunan 2 Kata
        // for ($i=0; $i < count($kbab2); $i++) {
        //     Soal::factory()->create([
        //         'jenis' => array_keys($soal)[1],
        //         // 'unit' => (int)array_keys($kromo)[0],
        //         'bab_id' => (int)array_keys($kunit1)[1],
        //         'isi_soal' => $kbab2[$i][0],
        //         'keyword_pattern' => $kbab2[$i][1],
        //     ]);
        // }

        //?1
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
