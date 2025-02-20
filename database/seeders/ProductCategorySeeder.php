<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('product_cat')->insert([
            ['product_id' => 1, 'cat_id' => 1],
            ['product_id' => 2, 'cat_id' => 1],
        ]);
    }
}
