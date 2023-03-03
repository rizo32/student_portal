<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ville::factory(15)->create();
        \App\Models\Etudiant::factory(100)->create();
        // \App\Models\User::factory(10)->create();
    }
}
