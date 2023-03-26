<?php

namespace Database\Seeders;


use App\Models\ArticleLanguage;
use Illuminate\Database\Seeder;
use Database\Factories\ArticleLanguageFactory;



class ArticleLanguageTableSeeder extends Seeder
{
    public function run()
    {
        ArticleLanguage::factory()->count(200)->create();
        // ArticleLanguage::factory()->count(200)->uniqueCombination()->create();
    }
}


