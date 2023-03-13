<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();
        // $name = $this->faker->firstName() . ' ' . $this->faker->lastName();
        // $username = str_replace("_"," ", $name);
        $oneName = explode(" ", $name);
        // $username = $oneName[0] . $this->faker->randomNumber(2);
        return [
            'nama' => $name,
            'namaUser' => $oneName[0] . $this->faker->randomNumber(2),
            'email' => Str::lower($oneName[0]) . '@hotmail.com',
            'password' => Hash::make('user'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            // return [
            //     'email_verified_at' => null,
            // ];
        });
    }
}
