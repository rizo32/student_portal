<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
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
          'user_id' => $this->faker->unique()->numberBetween($min = 1, $max = 100),
          'path' => 'public/uploads/',
          'extension' => $this->faker->randomElement(['zip', 'jpg', 'webp', 'doc']),
          'language' => $this->faker->randomElement(['FR', 'EN'])
        ];
    }
}
