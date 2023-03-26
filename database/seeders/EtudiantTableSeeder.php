<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EtudiantTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Etudiant::factory(100)->create();
    }
}