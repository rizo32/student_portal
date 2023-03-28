<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call([
      CityTableSeeder::class,
      UserTableSeeder::class,
      StudentTableSeeder::class,
      LanguageTableSeeder::class,
      // ArticleTableSeeder::class,
      // ArticleLanguageTableSeeder::class
    ]);
  }
}