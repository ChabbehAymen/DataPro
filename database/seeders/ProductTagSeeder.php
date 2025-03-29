<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTagSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_tags')->insert([
            ['product_id' => 1, 'tag_id' => 1],
            ['product_id' => 2, 'tag_id' => 2],
            ['product_id' => 3, 'tag_id' => 1],
            ['product_id' => 4, 'tag_id' => 2],
            ['product_id' => 5, 'tag_id' => 1],
        ]);
    }
}
