<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run()
    {
        DB::table('tags')->insert([
            ['title' => 'New Arrival'],
            ['title' => 'Discount'],
        ]);
    }
}
