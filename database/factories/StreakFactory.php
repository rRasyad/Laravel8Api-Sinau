<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class StreakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggalStreak' => Carbon::yesterday()->toDateString(),
            'user_id' => 1,
            'coldStreak' => rand(0, 1)
        ];
    }
}
