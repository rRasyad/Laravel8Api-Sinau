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
        $xp = 200;
        for ($i = 0; $i < 10; $i++) {
            Achievement::factory()->create([
                'name' => 'Xp ' . $xp,
                'description' => 'Raih ' . $xp . ' xp untuk pertama kali',
                'image' => 'https://img.sinau-bahasa.my.id/achievement/' . ($i + 1) . '.png',
                'required' => $xp,
            ]);
            $xp += 200;
        }
        for ($i = 0; $i < 10; $i++) {
            Achievement::factory()->create([
                'name' => 'Xp ' . $xp,
                'description' => 'Raih ' . $xp . ' xp untuk pertama kali',
                'image' => 'https://img.sinau-bahasa.my.id/achievement/' . ($i + 1) . '.png',
                'required' => $xp,
            ]);
            $xp += 200;
        }
        for ($i = 0; $i < 10; $i++) {
            Achievement::factory()->create([
                'name' => 'Xp ' . $xp,
                'description' => 'Raih ' . $xp . ' xp untuk pertama kali',
                'image' => 'https://img.sinau-bahasa.my.id/achievement/' . ($i + 1) . '.png',
                'required' => $xp,
            ]);
            $xp += 200;
        }
        for ($i = 0; $i < 10; $i++) {
            Achievement::factory()->create([
                'name' => 'Xp ' . $xp,
                'description' => 'Raih ' . $xp . ' xp untuk pertama kali',
                'image' => 'https://img.sinau-bahasa.my.id/achievement/' . ($i + 1) . '.png',
                'required' => $xp,
            ]);
            $xp += 200;
        }

        //? 2
        // Achievement::factory()->create([
        //     'name' => 'Xp 100',
        //     'description' => 'Raih 100 xp untuk pertama kali',
        // ]);
        // Achievement::factory()->create([
        //     'name' => 'Xp 200',
        //     'description' => 'Raih 200 xp untuk pertama kali',
        // ]);
        // Achievement::factory()->create([
        //     'name' => 'Xp 300',
        //     'description' => 'Raih 300 xp untuk pertama kali',
        // ]);
        // Achievement::factory()->create([
        //     'name' => 'Xp 400',
        //     'description' => 'Raih 400 xp untuk pertama kali',
        // ]);
        // Achievement::factory()->create([
        //     'name' => 'Xp 500',
        //     'description' => 'Raih 500 xp untuk pertama kali',
        // ]);

        //? 1
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
