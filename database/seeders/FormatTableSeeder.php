<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('formats')->insert([
            ['name' => 'zip'],
            ['name' => 'pdf'],
            ['name' => 'doc'],
        ]);
    }
}