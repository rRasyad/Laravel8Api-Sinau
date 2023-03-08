<?php

namespace Database\Seeders;

use App\Models\UnitBab;
use Illuminate\Database\Seeder;

class UnitBabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bab = 1;
        for ($a = 1; $a <= 5; $a++) {
            for ($i = 1; $i <= 5; $i++) {
                (($bab > 3 && $bab < 6) || ($bab > 8 && $bab < 11) || ($bab > 12 && $bab < 16) || ($bab > 17 && $bab < 21) || ($bab > 22)) ? $part = 2 : $part = 1;

                UnitBab::factory()->create([
                    'unit_id' => $a,
                    // 'url' => '/content?jenis=ngoko&unit=' . $a . '&bab=' . $bab,
                    // 'url' => '/initiation-session?bab=' . $bab,
                    'part' => $part,
                    'url' => 'initial-session?bab=' . $bab,
                    'icon' => $a . '_' . $bab . ".jpg"
                ]);
                $bab++;
            }
        }
    }
}
