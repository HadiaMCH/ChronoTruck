<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class annonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->realText($maxNbChars = 191, $indexSize = 2),
            'img' => $this->faker->imageUrl($width = 640, $height = 480),
            'depart'=> $this->faker->words($nb = 1, $asText = false)  ,
            'arriver'=> $this->faker->words($nb = 1, $asText = false)  , 
            'texte'=> $this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'date'=> $this->faker->dateTimeThisMonth($max = 'now', $timezone = null),
        ];
    }
}
