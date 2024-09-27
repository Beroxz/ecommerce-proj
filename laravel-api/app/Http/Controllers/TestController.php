<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function product()
    {
        return response()->json(
            data: [
                [
                    'id' => 1,
                    'name' => 'Succulent',
                    'price' => '10.00',
                    'image' => 'https://images.squarespace-cdn.com/content/v1/56923fa6a976af0bfc533475/4487beac-be01-4ad5-8133-3276fb81972b/IMG_7938.jpg',
                ],
                [
                    'id' => 2,
                    'name' => 'Fiddle Leaf Fig',
                    'price' => '20.00',
                    'image' => 'https://down-th.img.susercontent.com/file/51e81b1bbee8b6d5b4a72ff0da4b029f',
                ],
                [
                    'id' => 3,
                    'name' => 'Monstera',
                    'price' => '15.00',
                    'image' => 'https://www.ugaoo.com/cdn/shop/files/9_dac1c33d-00f2-469a-81f9-287d72f67a38.jpg?v=1710232846&width=1500',
                ],
                [
                    'id' => 4,
                    'name' => 'Sanadu',
                    'price' => '18.00',
                    'image' => 'https://kaset.today/wp-content/uploads/2021/07/ib7qgn.jpg',
                ],
                [
                    'id' => 5,
                    'name' => 'Succulent',
                    'price' => '10.00',
                    'image' => 'https://images.squarespace-cdn.com/content/v1/56923fa6a976af0bfc533475/4487beac-be01-4ad5-8133-3276fb81972b/IMG_7938.jpg',
                ],
                [
                    'id' => 6,
                    'name' => 'Fiddle Leaf Fig',
                    'price' => '20.00',
                    'image' => 'https://down-th.img.susercontent.com/file/51e81b1bbee8b6d5b4a72ff0da4b029f',
                ],
                [
                    'id' => 7,
                    'name' => 'Monstera',
                    'price' => '15.00',
                    'image' => 'https://www.ugaoo.com/cdn/shop/files/9_dac1c33d-00f2-469a-81f9-287d72f67a38.jpg?v=1710232846&width=1500',
                ],
                [
                    'id' => 8,
                    'name' => 'Sanadu',
                    'price' => '18.00',
                    'image' => 'https://kaset.today/wp-content/uploads/2021/07/ib7qgn.jpg',
                ],
            ],
            status: 200
        );
    }
}