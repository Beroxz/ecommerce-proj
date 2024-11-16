<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::query();

        return $this->renderProducts($query);
    }

    public function byCategory(Category $category)
    {
        $categories = Category::getAllChildrenByParent($category);

        $query = Product::query()
            ->select('products.*')
            ->join('product_categories AS pc', 'pc.product_id', 'products.id')
            ->whereIn('pc.category_id', array_map(fn($c) => $c->id, $categories));

        return $this->renderProducts($query);
    }

    public function byAllCategories()
    {
        $query = Product::query()->where('published', 1);
        return $this->renderProducts($query);
    }

    public function view(Product $product)
    {
        $seller = Seller::find($product->seller_id);

        $reviews = Review::where('product_id', $product->id)
            ->orderBy('review_date', 'desc')
            ->get()
            ->map(function ($review) {
                $review->review_date = \Carbon\Carbon::parse($review->review_date)->format('d/m/Y');
                return $review;
            });

        return view('product.view', [
            'product' => $product,
            'seller' => $seller,
            'reviews' => $reviews
        ]);
    }



    private function renderProducts(Builder $query)
    {
        $search = \request()->get('search');
        $sort = \request()->get('sort', '-updated_at');

        if ($sort) {
            $sortDirection = 'asc';
            if ($sort[0] === '-') {
                $sortDirection = 'desc';
            }
            $sortField = preg_replace('/^-?/', '', $sort);

            $query->orderBy($sortField, $sortDirection);
        }
        $products = $query
            ->where('published', '=', 1)
            ->where(function ($query) use ($search) {
                /** @var $query \Illuminate\Database\Eloquent\Builder */
                $query->where('products.title', 'like', "%$search%")
                    ->orWhere('products.description', 'like', "%$search%");
            })

            ->paginate(12);

        return view('product.index', [
            'products' => $products
        ]);
    }
}
