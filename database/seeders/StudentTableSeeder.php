<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
  public function run()
  {
    \App\Models\Student::factory(100)->create();
  }
}