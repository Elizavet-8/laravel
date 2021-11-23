<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_id'=> $this->faker->unique()->numberBetween(1, Profile::count()),
            'weight' => $this->faker->numberBetween(1,9),
            'hips' => $this->faker->numberBetween(1,9),
            'waist' => $this->faker->numberBetween(1,9),
            'chest' => $this->faker->numberBetween(1,9),
        ];
    }
}
