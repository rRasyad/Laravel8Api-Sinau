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
            'name' => 'Xp 100',
            'description' => 'Raih 100 xp untuk pertama kali',
        ]);
        Achievement::factory()->create([
            'name' => 'Xp 200',
            'description' => 'Raih 200 xp untuk pertama kali',
        ]);
        Achievement::factory()->create([
            'name' => 'Xp 300',
            'description' => 'Raih 300 xp untuk pertama kali',
        ]);
        Achievement::factory()->create([
            'name' => 'Xp 400',
            'description' => 'Raih 400 xp untuk pertama kali',
        ]);
        Achievement::factory()->create([
            'name' => 'Xp 500',
            'description' => 'Raih 500 xp untuk pertama kali',
        ]);
        // Achievement::factory()->create([
        //     'name' => 'Gayang',
        //     'description' => 'Gayang Malaysia',
        // ]);
        // Achievement::factory()->create([
        //     'name' => 'Kunci',
        //     'description' => 'Jawa adalah Koentji',
        // ]);
        // Achievement::factory()->create([
        //     'name' => 'Party',
        //     'description' => 'Party tanggal 30',
        // ]);
        // Achievement::factory()->create([
        //     'name' => 'Battle Royale',
        //     'description' => 'tanggal 1',
        // ]);
        // Achievement::factory()->create([
        //     'name' => 'Mainnya Hebat',
        //     'description' => 'Kill Count 100',
        // ]);
    }
}
