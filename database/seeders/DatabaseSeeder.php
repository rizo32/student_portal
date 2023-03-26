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
            LanguageTableSeeder::class,
            ArticleTableSeeder::class,
            ArticleLanguageTableSeeder::class
        ]);
    }
}
