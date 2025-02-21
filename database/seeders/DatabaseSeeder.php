<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            BasketSeeder::class,
            ProductImageSeeder::class,
            ProductCategorySeeder::class,
            ProductTagSeeder::class,
        ]);
    }
}
