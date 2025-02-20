<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_imgs')->insert([
            ['product_id' => 1, 'img' => 'laptop.jpg'],
            ['product_id' => 2, 'img' => 'smartphone.jpg'],
        ]);
    }
}
