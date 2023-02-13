<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Streak;
use Illuminate\Database\Seeder;

class StreakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $streakBesok = $i * 2;

            Streak::factory()->create([
                'tanggalStreak' => Carbon::yesterday()->subDay()->toDateString(),
                'user_id' => $i,
                'streakBesok' => $streakBesok
            ]);

            Streak::factory()->create([
                'tanggalStreak' => Carbon::yesterday()->toDateString(),
                'user_id' => $i
            ]);
        }

        // Streak::create([
        //     'tanggalStreak' => Carbon::yesterday()->subDay(1)->toDateString(),
        //     'user_id' => 1,
        //     'coldStreak' => rand(0, 1)
        // ]);

        // Streak::create([
        //     'tanggalStreak' => Carbon::yesterday()->toDateString(),
        //     'user_id' => 1,
        //     'coldStreak' => rand(0, 1),
        //     'streakBesok' => 1
        // ]);
    }
}
