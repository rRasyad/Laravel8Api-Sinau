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
        for ($i = 1; $i <= 10; $i++) {
            Unit::factory()->create([
                'mapel' => 'jawa',
                'unit' => $i,
                'description' => "Jawa Adalah koentji"
            ]);
        }
    }
}
