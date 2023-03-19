<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            VilleTableSeeder::class,
            EtudiantTableSeeder::class,
        ]);
    }
}

class VilleTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Ville::factory(15)->create();
    }
}

class EtudiantTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Etudiant::factory(100)->create();
    }
}
