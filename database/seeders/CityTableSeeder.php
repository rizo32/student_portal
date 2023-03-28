<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
  public function run()
  {
    \App\Models\City::factory(15)->create();
  }
}