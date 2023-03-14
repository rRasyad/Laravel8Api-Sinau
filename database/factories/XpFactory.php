<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class XpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber(2, true),
            'xpHarian' => $this->faker->numberBetween(0, 500),
            'xpMingguan' => $this->faker->numberBetween(500, 1000),
            'totalXp' => $this->faker->numberBetween(1000, 4000),
        ];
    }
}
