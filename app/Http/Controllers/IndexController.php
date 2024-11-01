<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $allProducts = $this->getAllProduct();
        $newProducts = $this->getNewProduct();
        $bestSellProducts = $this->getBestSellProducts();

        $tools = \App\Models\Tool::where('published', '=', 1)->get();

        return view('index', [
            'allProducts' => $allProducts,
            'newProducts' => $newProducts,
            'bestSellProducts' => $bestSellProducts,
            'tools' => $tools,
            'categories' => Category::getAll(),
        ]);
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

    public function view(Product $product)
    {
        return view('product.view', ['product' => $product]);
    }

    //all
    public function getAllProduct()
    {
        return Product::where('published', '=', 1)
            ->paginate(8);
    }

    //new
    public function getNewProduct()
    {
        return Product::where('created_at', '>=', Carbon::now()->subDays(3))
            ->where('published', '=', 1)
            ->paginate(8);
    }

    //bestSeller
    public function getBestSellProducts()
    {
        return Product::select('products.id', 'products.slug', 'products.title', 'products.description', 'products.price')
            ->join('order_items AS oi', 'oi.product_id', 'products.id')
            ->join('orders AS o', 'o.id', 'oi.order_id')
            ->where('o.status', '=', 'Paid')
            ->where('published', '=', 1)
            ->groupBy('products.id', 'products.title', 'products.slug', 'products.description', 'products.price', 'products.seller_id', 'products.is_promotion', 'products.quantity', 'products.published', 'products.created_by', 'products.updated_by')
            ->orderByRaw('COUNT(oi.product_id) DESC')
            ->paginate(8);
    }
}
