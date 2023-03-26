<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Article::factory(100)->create();
    }
}