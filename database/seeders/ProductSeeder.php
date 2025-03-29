<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Laptop HP',
                'desc' => 'Powerful laptop for developers.',
                'price' => 1200,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'title' => 'Smartphone Samsung',
                'desc' => 'Latest model with AI features.',
                'price' => 800,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'title' => 'Product A',
                'desc' => 'Description for Product A.',
                'price' => 900,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'title' => 'Product B',
                'desc' => 'Description for Product B.',
                'price' => 8000,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'title' => ' Product C',
                'desc' => 'Description for Product C.',
                'price' => 8800,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
