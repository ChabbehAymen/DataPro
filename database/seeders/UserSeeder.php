<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
            [
                'fullName' => 'John Doe',
                'pic' => 'john.jpg',
                'phone' => '123456789',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'fullName' => 'Jane Smith',
                'pic' => 'jane.jpg',
                'phone' => '987654321',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
