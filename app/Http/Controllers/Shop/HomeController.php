<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Category;
use App\Shop\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('shop.home')
            ->with('categories', Category::all());
    }
}
