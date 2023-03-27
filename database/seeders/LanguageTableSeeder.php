<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->insert([
            ['name' => 'English'],
            ['name' => 'Français'],
        ]);
    }
}