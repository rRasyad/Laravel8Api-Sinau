<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Achievement::factory()->create([
            'achievement_name' => 'Gayang',
            'reach_at' => 1000,
            'description' => 'Gayang Malaysia',
        ]);
        Achievement::factory()->create([
            'achievement_name' => 'Kunci',
            'reach_at' => 1000,
            'description' => 'Jawa adalah Koentji',
        ]);
        Achievement::factory()->create([
            'achievement_name' => 'Party',
            'reach_at' => 1000,
            'description' => 'Party tanggal 30',
        ]);
        Achievement::factory()->create([
            'achievement_name' => 'Battle Royale',
            'reach_at' => 1000,
            'description' => 'tanggal 1',
        ]);
        Achievement::factory()->create([
            'achievement_name' => 'Mainnya Hebat',
            'reach_at' => 1000,
            'description' => 'Kill Count 100',
        ]);
    }
}
