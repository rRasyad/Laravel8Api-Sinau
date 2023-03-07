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
        $unit1 = $dictionary->arti['1'];
        //? Unit 1 Part 2
        for ($i=0; $i < count($unit1); $i++) {
            SoalArti::factory()->create([
                'soal_id' => $unit1[$i][0],
                'index_soal' => $unit1[$i][1],
                'arti' => $unit1[$i][2],
            ]);
        }

        $unit2 = $dictionary->arti['2'];
        //? Unit 2 Part 2
        for ($i=0; $i < count($unit2); $i++) {
            SoalArti::factory()->create([
                'soal_id' => $unit2[$i][0],
                'index_soal' => $unit2[$i][1],
                'arti' => $unit2[$i][2],
            ]);
        }
    }
}
