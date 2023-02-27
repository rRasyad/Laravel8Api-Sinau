<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::factory()->create([
            'mapel' => 'jawa',
            'unit' =>  1,
            'description' => "Salam, Sapaan & Menanyakan Kabar pada sesama"
        ]);
        Unit::factory()->create([
            'mapel' => 'jawa',
            'unit' => 2,
            'description' => "Perkenalan diri: Menanyakan Nama, Asal, Tempat Tinggal"
        ]);
        for ($i = 3; $i <= 10; $i++) {
            Unit::factory()->create([
                'mapel' => 'jawa',
                'unit' => $i,
                'description' => "Materi bahasa jawa"
            ]);
        }
    }
}
