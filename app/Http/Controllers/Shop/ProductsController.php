<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function list($category=null)
    {
        $products = null;

        if ($category)
        {
            $category = \App\Shop\Category::where('slug', $category)->first();

            if ($category)
                $products = $category->products;
            else
                abort(404);
        }
        else
            $products = \App\Shop\Product::all();

        return view('shop.catalog.list')
            ->with('categories', \App\Shop\Category::all())
            ->with('products', $products);
    }

    public function show($slug)
    {
        $product = \App\Shop\Product::where('slug', $slug)->first();

        if (!$product) abort(404);

        return view('shop.product.detail')
            ->with('product', $product);
    }
}
