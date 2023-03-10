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
        // FIXED Finish Unit and Matter
        Unit::factory()->create([
            'mapel' => 'jawa',
            'unit' => 3,
            'description' => "Barang-barang, Angka, Membeli Sesuatu"
        ]);
        Unit::factory()->create([
            'mapel' => 'jawa',
            'unit' => 4,
            'description' => "Berbicara tentang Cuaca, Menanyakan Waktu & Hari "
        ]);
        Unit::factory()->create([
            'mapel' => 'jawa',
            'unit' => 5,
            'description' => "Menanyakan Arah & Tempat, Meminta Bantuan"
        ]);
    }
}
