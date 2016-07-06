<?php

namespace App\Http\Controllers\Shop\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Order;

class OrderController extends Controller
{
    public function showListPage()
    {
        return view('shop.admin.orders.list')
            ->with('orders', Order::where('status', 'review')->paginate(15));
    }

    public function status(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|string',
        ]);

        ($order = Order::find($id)) or abort(404, 'Order not found!');

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('shop.admin.orders.list');
    }
}
