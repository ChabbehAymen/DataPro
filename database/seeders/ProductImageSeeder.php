<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_images')->insert([
            ['product_id' => 1, 'img' => '/images/arm-site-img.png'],
            ['product_id' => 2, 'img' => '/images/arm-site-img.png'],
        ]);
    }
}
