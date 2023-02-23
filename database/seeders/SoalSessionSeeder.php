<?php

namespace Database\Seeders;

use App\Models\SoalSession;
use Illuminate\Database\Seeder;

class SoalSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SoalSession::factory()->create([
            'user_id' => 1,
            'bab_id' => 1,
            'session_max' => 10,
            'session_current' => 0,
            'session_expire' => now()->addHour(1)
        ]);
    }
}
