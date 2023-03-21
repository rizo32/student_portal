<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'body' => $this->faker->paragraph($nbSentences = $this->faker->numberBetween($min = 5, $max = 10), $variableNbSentences = true),
            'user_id' => $this->faker->unique()->numberBetween($min = 1, $max = 100),
            'language' => $this->faker->randomElement(['FR', 'EN'])
        ];
    }
}
