<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $orders = auth()->user()->store->orders();
        return view('order.myorders')->with('orders', $orders->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
        $orders = collect();
        DB::beginTransaction();
        $stores = Cart::where('ip', $request->ip())->get()->groupBy('product.store_id');

        foreach ($stores as $key => $carts) {
            $store = Store::find($key);
            $order = Order::create([
                'order_number' => "OR-" . Str::upper(Str::limit($store->name, 3, '...')) . "-" . now()->format('is'),
                'store_id' => $store->id,
                'email' => $request->email,
                'name' => $request->name,
                'card_number' => $request->card_number,
                'card_expiry' => $request->card_expiry,
                'card_cvv' => $request->card_cvv,
            ]);
    
            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                ]);
            }
            Cart::whereIn('id', $carts->pluck('id'))->delete();
            $orders->push($order);
            // array_push($orders, $order);
        }
        DB::commit();

        return view('order.success')->with('orders', $orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $order = Order::where('order_number', $request->order_number)->first();
        return view('order.success')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
