<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->insert([
            ['title' => 'Electronics'],
            ['title' => 'Home Appliances'],
        ]);
    }
}
