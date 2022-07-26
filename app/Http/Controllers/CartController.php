<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $store = Cart::firstOrCreate([
            'ip' => $request->ip(),
            'product_id' => $request->id], [
            'quantity' => $request->quantity,
        ]);

        return response()->json(['cart_count' => Cart::where('ip', $request->ip())->count()]);
    }

    public function myCart(Request $request)
    {
        $carts = Cart::where('ip', $request->ip())->get();
        return view('cart.my_cart')->with('carts', $carts);
    }

    public function remove(Request $request, Cart $cart)
    {
        $cart->delete();

        return response()->json(['cart_count' => Cart::where('ip', $request->ip())->count()]);
    }


    public function update(Request $request, Cart $cart)
    {
        $cart->update([
            'quantity' => $request->quantity
        ]);

        return response()->json(['cart_count' => Cart::where('ip', $request->ip())->count()]);
    }
}
