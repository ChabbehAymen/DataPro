<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert([
            [
                'title' => 'Laptop HP',
                'desc' => 'Powerful laptop for developers.',
                'date' => now(),
                'price' => 1200,
            ],
            [
                'title' => 'Smartphone Samsung',
                'desc' => 'Latest model with AI features.',
                'date' => now(),
                'price' => 800,
            ],
        ]);
    }
}
