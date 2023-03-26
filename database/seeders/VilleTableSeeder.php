<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VilleTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Ville::factory(15)->create();
    }
}