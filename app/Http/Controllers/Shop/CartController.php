<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Address;
use App\Shop\Order;
use App\Shop\Product;
use App\User;

class CartController extends Controller
{
    public function showCartPage()
    {
        return view('shop.cart.cart');
    }

    public function showCheckoutForm()
    {
        return view('shop.checkout.checkout');
    }

    public function checkout(Request $request)
    {
        $this->validate($request, [
            'address1' => 'required|string',
            'address2' => 'required|string',
            'address3' => 'present|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);

        $user = \Auth::user();

        $cart = $user->carts()->where('status', 'open')->first();

        if (!$cart) abort(400, 'User has no cart!');
        if (empty($cart->items)) abort(400, 'User cart has no item!');

        $address = $user->addresses()->create([
            'address1'    => $request->input('address1'),
            'address2'    => $request->input('address2'),
            'address3'    => $request->input('address3'),
            'postal_code' => $request->input('postal_code'),
            'city'        => $request->input('city'),
            'state'       => $request->input('state'),
        ]);

        $amount = 0.0;
        foreach ($cart->items as $pid => $product)
        {
            $amount += $product['price'] * $product['amount'];
        }

        $order = new Order;
        $order->user()->associate($user);
        $order->cart()->associate($cart);
        $order->address()->associate($address);
        $order->status = 'review';
        $order->amount = $amount;
        $order->save();

        $cart->status = 'closed';
        $cart->save();

        return response()->json(['success' => true]);
    }

    /* API Methods */
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
                'photo_url' => $real_product->photo ? $real_product->photo->url : '',
                'url' => route('shop.product', ['slug' => $real_product->slug]),
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
            'photo_url' => $real_product->photo ? $real_product->photo->url : '',
            'url' => route('shop.product', ['slug' => $real_product->slug]),
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

        $user    = User::find($request->input('user_id'));
        $cart    = $user->carts()->where('status', 'open')->first();
        $product = Product::find($request->input('product_id'));

        $cart->removeItem($product);
        $cart->save();

        return response()->json(['success' => true]);
    }

    public function removeProduct(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $user    = User::find($request->input('user_id'));
        $cart    = $user->carts()->where('status', 'open')->first();
        $product = Product::find($request->input('product_id'));

        $cart->removeProduct($product);
        $cart->save();

        return response()->json(['success' => true]);
    }
}
