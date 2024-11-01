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

        // Seed Seller 1
        User::create([
            'name' => 'Seller One',
            'email' => 'seller1@example.com',
            'password' => bcrypt('seller123'),
            'email_verified_at' => now(),
            'role' => 2,
        ]);

        // Seed Seller 2
        User::create([
            'name' => 'Seller Two',
            'email' => 'seller2@example.com',
            'password' => bcrypt('seller123'),
            'email_verified_at' => now(),
            'role' => 2,
        ]);

        // Seed Seller 3
        User::create([
            'name' => 'Seller Three',
            'email' => 'seller3@example.com',
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
