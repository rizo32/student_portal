<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use App\Models\User;

class EtudiantFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $ville = Ville::inRandomOrder()->first(); // get a random Ville record from the database
    return [
      // I wish I could find a way to use the table user to generate unique id's... oh well
      'user_id' => $this->faker->unique()->numberBetween($min = 1, $max = 100),
      'nom' => $this->faker->name(),
      'adresse' => $this->faker->address(),
      'phone' => $this->faker->phoneNumber(),
      // 'email' => $this->faker->unique()->safeEmail(),
      'date_naissance' => $this->faker->date($format = 'Y-m-d', $max = '2005-12-31'),
      'ville_id' => $ville->id
    ];
  }
}