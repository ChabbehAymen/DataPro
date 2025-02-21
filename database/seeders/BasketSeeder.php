<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasketSeeder extends Seeder
{
    public function run()
    {
        DB::table('basket')->insert([
            [
                'user_id' => 1,
                'produit_id' => 1,
                'quantity' => 2,
                'date' => now(),
                'confirmer' => false,
                'terminer' => false,
            ],
            [
                'user_id' => 2,
                'produit_id' => 2,
                'quantity' => 1,
                'date' => now(),
                'confirmer' => true,
                'terminer' => false,
            ],
        ]);
    }
}
