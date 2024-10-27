<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
            'role' => 1,
        ]);

        // Seed Seller
        User::create([
            'name' => 'Seller',
            'email' => 'seller@example.com',
            'password' => bcrypt('seller123'),
            'email_verified_at' => now(),
            'role' => 2,
        ]);

        // Seed User
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
            'role' => 3,
        ]);
    }
}
