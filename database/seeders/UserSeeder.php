<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'full_name' => 'Zakaria Az',
                'picture' => 'Zakaria.jpg',
                'phone_number' => '123456789',
                'email' => 'Zakaria@gmail.com',
                'password' => Hash::make('ZakariaAz'),
            ],
        ]);
    }
}
