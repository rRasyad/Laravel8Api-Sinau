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
        for ($i = 1; $i <= 27; $i++) {
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
        $date = 30;
        for ($a=1; $a <= 30; $a++) {
            $besok = $a + 55;
            Streak::factory()->create([
                'tanggalStreak' => Carbon::Today()->subDays($date)->toDateString(),
                'user_id' => 28,
                'streakBesok' => $besok
            ]);
            $date--;
        }
        Streak::factory()->create([
            'tanggalStreak' => Carbon::Today()->toDateString(),
            'user_id' => 28
        ]);

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
