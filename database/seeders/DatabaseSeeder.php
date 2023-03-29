<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call([
      CityTableSeeder::class,
      UserTableSeeder::class,
      StudentTableSeeder::class,
      LanguageTableSeeder::class,
      FormatTableSeeder::class,
    ]);
  }
}