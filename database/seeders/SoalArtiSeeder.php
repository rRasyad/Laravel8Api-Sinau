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

        // TODO Finish Soal Arti
        $dictionary = new Dictionary();
        $U1P1 = $dictionary->arti['U1P1'];
        //? Unit 1 Part 1
        $soal_id = 1;
        for ($i = 0; $i < count($U1P1); $i++) {
            SoalArti::factory()->create([
                'soal_id' => $soal_id,
                'index_soal' => 0,
                'arti' => $U1P1[$i][0],
            ]);
            $soal_id++;
        }
        $U1P2 = $dictionary->arti['U1P2'];
        //? Unit 1 Part 2
        for ($i = 0; $i < count($U1P2); $i++) {
            SoalArti::factory()->create([
                'soal_id' => $U1P2[$i][0],
                'index_soal' => $U1P2[$i][1],
                'arti' => $U1P2[$i][2],
            ]);
        }

        $U2P1 = $dictionary->arti['U2P1'];
        //? Unit 1 Part 1
        $soal_id = 85;
        for ($i = 0; $i < count($U2P1); $i++) {
            SoalArti::factory()->create([
                'soal_id' => $soal_id,
                'index_soal' => 0,
                'arti' => $U2P1[$i][0],
            ]);
            $soal_id++;
        }
        $U2P2 = $dictionary->arti['U2P2'];
        //? Unit 2 Part 2
        for ($i = 0; $i < count($U2P2); $i++) {
            SoalArti::factory()->create([
                'soal_id' => $U2P2[$i][0],
                'index_soal' => $U2P2[$i][1],
                'arti' => $U2P2[$i][2],
            ]);
        }

        //? 1
        // $dictionary = new Dictionary();
        // $unit1 = $dictionary->arti['1'];
        // //? Unit 1 Part 2
        // for ($i=0; $i < count($unit1); $i++) {
        //     SoalArti::factory()->create([
        //         'soal_id' => $unit1[$i][0],
        //         'index_soal' => $unit1[$i][1],
        //         'arti' => $unit1[$i][2],
        //     ]);
        // }

        // $unit2 = $dictionary->arti['2'];
        // //? Unit 2 Part 2
        // for ($i=0; $i < count($unit2); $i++) {
        //     SoalArti::factory()->create([
        //         'soal_id' => $unit2[$i][0],
        //         'index_soal' => $unit2[$i][1],
        //         'arti' => $unit2[$i][2],
        //     ]);
        // }
    }
}
