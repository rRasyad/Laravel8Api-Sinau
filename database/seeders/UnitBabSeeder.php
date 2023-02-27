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
        for ($a = 1; $a <= 10; $a++) {
            for ($i = 1; $i <= 10; $i++) {
                UnitBab::factory()->create([
                    'unit_id' => $a,
                    // 'url' => '/content?jenis=ngoko&unit=' . $a . '&bab=' . $bab,
                    'url' => '/initiation-session?bab=' . $bab,
                    'icon' => $a . '_' . $bab . ".jpg"
                ]);
                $bab++;
            }
        }
    }
}
