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
                    'image' => 'path/to/succulent.jpg',
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