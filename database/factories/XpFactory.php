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
            'xpHarian' => $this->faker->randomNumber(4, true),
            'xpMingguan' => $this->faker->randomNumber(4, true),
            'totalXp' => $this->faker->randomNumber(4, true),
        ];
    }
}
