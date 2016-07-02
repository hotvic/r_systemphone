<?php

namespace App\Http\Controllers\Shop\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Product;

class ProductsController extends Controller
{
    public function showListPage()
    {
        return view('shop.admin.products.list')
            ->with('products', Product::all());
    }

    public function showNewForm()
    {
        return view('shop.admin.products.new');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|unique:categories,slug',
            'price' => 'required|digits_between:3,15',
            'in_stock' => 'required|integer',
            'name'  => 'required',
            'description' => 'required'
        ]);

        Product::create([
            'slug' => $request->input('slug'),
            'price' => $request->input('price') / 100,
            'in_stock' => $request->input('in_stock'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $request->session()->flash('success', true);

        return redirect()->route('shop.admin.products.list');
    }

    public function showEditForm($id)
    {
        $product = Product::find($id);

        if (!$product) abort(404);

        return view('shop.admin.products.edit')
            ->with('product', $product);
    }
}
