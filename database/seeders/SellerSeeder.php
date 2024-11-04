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
