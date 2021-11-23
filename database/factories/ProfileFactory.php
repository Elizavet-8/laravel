<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'ProfileResource '.$this->faker->name(),
            'user_id' => $this->faker->unique()->numberBetween(1,5)
        ];
    }
}
