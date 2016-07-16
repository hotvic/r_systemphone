<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function showIndexPage()
    {
        return view('shop.account.index');
    }

    public function showOrdersPage()
    {
        return view('shop.account.orders')
            ->with('orders', \Auth::user()->orders);
    }
}
