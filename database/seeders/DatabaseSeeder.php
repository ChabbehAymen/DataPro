<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $user = User::create([
                'full_name'=> 'Admin',
                'email' => 'admin@gmail.com', 
                "phone_number"=>"1234567", 
                'password' => "123456789", 
                "created_at" => now(), 
                "updated_at" => now()
            ]);
        $user->assignRole($role);

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
