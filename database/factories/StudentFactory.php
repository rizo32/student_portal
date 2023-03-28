<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\User;

class StudentFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $city = City::inRandomOrder()->first(); // get a random City record from the database
    return [
      // I wish I could find a way to use the table user to generate unique id's... oh well
      'user_id' => $this->faker->unique()->numberBetween($min = 1, $max = 100),
      'name' => $this->faker->name(),
      'address' => $this->faker->address(),
      'phone' => $this->faker->phoneNumber(),
      // 'email' => $this->faker->unique()->safeEmail(),
      'birthday' => $this->faker->date($format = 'Y-m-d', $max = '2005-12-31'),
      'city_id' => $city->id
    ];
  }
}