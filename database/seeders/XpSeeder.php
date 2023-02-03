<?php

namespace Database\Seeders;

use App\Models\Xp;
use Illuminate\Database\Seeder;

class XpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 28; $i++) {
            Xp::factory()->create([
                'user_id' => $i
            ]);
        }
    }
}
