<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('product_category')->insert([
            ['product_id' => 1, 'category_id' => 1],
            ['product_id' => 2, 'category_id' => 1],
            ['product_id' => 3, 'category_id' => 1],
            ['product_id' => 4, 'category_id' => 1],
            ['product_id' => 5, 'category_id' => 1],
        ]);
    }
}
