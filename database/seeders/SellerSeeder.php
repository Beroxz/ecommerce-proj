<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create([
            'hostSeller_name' => 'John',
            'hostSeller_last_name' => 'Doe',
            'store_name' => 'Green Plants Store',
            'store_phone' => '012-345-6789',
            'store_description' => 'Your one-stop shop for beautiful green plants.',
            'store_address' => '123 Green St, Nature City',
            'store_rating' => 4.5,
            'status' => 'active',
            'store_image' => 'green_plants_store.jpg',
            'store_image_mime' => 'image/jpeg',
            'store_image_size' => 204800,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Seller::create([
            'hostSeller_name' => 'Alice',
            'hostSeller_last_name' => 'Smith',
            'store_name' => 'Flower Paradise',
            'store_phone' => '098-765-4321',
            'store_description' => 'Find the most stunning flowers here!',
            'store_address' => '456 Flower Rd, Bloom Town',
            'store_rating' => 5.0,
            'status' => 'active',
            'store_image' => 'flower_paradise.jpg',
            'store_image_mime' => 'image/jpeg',
            'store_image_size' => 102400,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Seller::create([
            'hostSeller_name' => 'Bob',
            'hostSeller_last_name' => 'Johnson',
            'store_name' => 'Tropical Garden',
            'store_phone' => '045-678-9012',
            'store_description' => 'Tropical plants for every garden!',
            'store_address' => '789 Tropical Ave, Sunnyvale',
            'store_rating' => 4.8,
            'status' => 'active',
            'store_image' => 'tropical_garden.jpg',
            'store_image_mime' => 'image/jpeg',
            'store_image_size' => 307200,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
