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
                    'price' => '$10.00',
                    'image' => 'https://images.squarespace-cdn.com/content/v1/56923fa6a976af0bfc533475/4487beac-be01-4ad5-8133-3276fb81972b/IMG_7938.jpg',
                ],
                [
                    'id' => 2,
                    'name' => 'Fiddle Leaf Fig',
                    'price' => '$20.00',
                    'image' => 'path/to/fig.jpg',
                ],
                [
                    'id' => 3,
                    'name' => 'Monstera',
                    'price' => '$15.00',
                    'image' => 'path/to/monstera.jpg',
                ],
            ],
            status: 200
        );
    }
}