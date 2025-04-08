<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasketSeeder extends Seeder
{
    public function run()
    {
        DB::table('baskets')->insert([
            [
                'user_id' => 1,
                'product_id' => 1,
                'date' => now(),
                'confirmed' => false,
                'completed' => false,
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'date' => now(),
                'confirmed' => false,
                'completed' => false,
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'date' => now(),
                'confirmed' => false,
                'completed' => false,
            ],
            [
                'user_id' => 1,
                'product_id' => 4,
                'date' => now(),
                'confirmed' => false,
                'completed' => false,
            ],            
        ]);
    }
}

