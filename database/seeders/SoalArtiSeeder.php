<?php

namespace Database\Seeders;

use App\Helpers\Dictionary;
use App\Models\SoalArti;
use Illuminate\Database\Seeder;

class SoalArtiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dictionary = new Dictionary();
        $part1 = $dictionary->arti['1'];
        //? [Kromo] Unit 1 Bab 2 : Susunan 2 Kata
        for ($i=0; $i < count($part1); $i++) {
            SoalArti::factory()->create([
                'soal_id' => $part1[$i][0],
                'index_soal' => $part1[$i][1],
                'arti' => $part1[$i][2],
            ]);
        }
    }
}
