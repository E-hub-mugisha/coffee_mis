<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@coffeefarm.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Farmer
        User::create([
            'name' => 'Farmer Joe',
            'email' => 'farmer@coffeefarm.com',
            'password' => Hash::make('password'),
            'role' => 'farmer',
        ]);

        // Cooperative
        User::create([
            'name' => 'Cooperative Manager',
            'email' => 'cooperative@coffeefarm.com',
            'password' => Hash::make('password'),
            'role' => 'cooperative',
        ]);

        // Buyer
        User::create([
            'name' => 'Coffee Buyer',
            'email' => 'buyer@coffeefarm.com',
            'password' => Hash::make('password'),
            'role' => 'buyer',
        ]);
    }
}
