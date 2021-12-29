<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class newsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->name(),
            'description' => $this->faker->name(),
            'paragraph' => $this->faker->unique(),
        ];
    }
}
