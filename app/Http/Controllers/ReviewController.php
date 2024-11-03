<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $productId = $request->query('product_id');
        $rating = $request->query('rating');

        $product = Product::findOrFail($productId);

        return view('review.review', compact('product', 'rating'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create($request->all());
        $product = Product::findOrFail($request->product_id);

        return redirect()->route('product.view', ['product' => $product->slug])
            ->with('success', 'Thank you for your review!');
    }

}