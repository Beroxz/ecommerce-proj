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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
            'role' => 1,
        ]);

        // Seed Seller 1
        User::create([
            'name' => 'Flower Paradise',
            'email' => 'seller1@gmail.com',
            'password' => bcrypt('seller123'),
            'email_verified_at' => now(),
            'role' => 2,
        ]);

        // Seed Seller 2
        User::create([
            'name' => 'Tropical Garden',
            'email' => 'seller2@gmail.com',
            'password' => bcrypt('seller123'),
            'email_verified_at' => now(),
            'role' => 2,
        ]);

    }
}
