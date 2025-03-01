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
                'full_name' => 'John Doe',
                'picture' => 'john.jpg',
                'phone_number' => '123456789',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
