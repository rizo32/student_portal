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
            UserTableSeeder::class,
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
class UserTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(100)->create();
    }
}

class EtudiantTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Etudiant::factory(100)->create();
    }
}
