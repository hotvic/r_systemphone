<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Product;
use App\User;

class CartController extends Controller
{
    public function get(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->input('user_id'));
        $cart = $user->carts()->where('status', 'open')->first();

        return response()->json($cart ? $cart->items : []);
    }

    public function append(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $user = User::find($request->input('user_id'));
        $cart = $user->carts()->where('status', 'open')->first();

        if (!$cart)
            $cart = $user->carts()->create(['status' => 'open', 'items' => []]);

        $items = $cart->items;

        $product = null;
        if (array_key_exists($request->input('product_id'), $items))
        {
            $product = $items[$request->input('product_id')];
            $product['amount'] += 1;

            $items[$request->input('product_id')] = $product;
        }
        else
        {
            $real_product = Product::find($request->input('product_id'));

            $product = [
                'id' => $real_product->id,
                'slug' => $real_product->slug,
                'name' => $real_product->name,
                'price' => $real_product->price,
                'amount' => 1,
            ];

            $items[$request->input('product_id')] = $product;
        }

        $cart->items = $items;
        $cart->save();

        return response()->json(['success' => true]);
    }

    public function set(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'amount' => 'required|integer',
        ]);

        $user = User::find($request->input('user_id'));
        $cart = $user->carts()->where('status', 'open')->first();

        if (!$cart)
            $cart = $user->carts()->create(['status' => 'open', 'items' => []]);

        $items = $cart->items;

        $real_product = Product::find($request->input('product_id'));

        $product = [
            'id' => $real_product->id,
            'slug' => $real_product->slug,
            'name' => $real_product->name,
            'price' => $real_product->price,
            'amount' => $request->input('amount'),
        ];

        $items[$request->input('product_id')] = $product;

        $cart->items = $items;
        $cart->save();

        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $user = User::find($request->input('user_id'));
        $cart = $user->carts()->where('status', 'open')->first();

        if ($cart)
        {
            $items = $cart->items;

            if (array_key_exists($request->input('product_id'), $items))
            {
                $items[$request->input('product_id')]['amount'] -= 1;

                $cart->items = $items;
                $cart->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function removeItem(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $user = User::find($request->input('user_id'));
        $cart = $user->carts()->where('status', 'open')->first();

        if ($cart)
        {
            $items = $cart->items;

            if (array_key_exists($request->input('product_id'), $items))
            {
                unset($items[$request->input('product_id')]);

                $cart->items = $items;
                $cart->save();
            }
        }

        return response()->json(['success' => true]);
    }
}
