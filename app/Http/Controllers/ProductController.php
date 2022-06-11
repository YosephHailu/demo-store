<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->q) {
            $products = Product::where('name', 'like', '%'.$request->q.'%');
        } else {
            $products = Product::query();
        }

        return view('product.products')->with([
            'products' => $products->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productCategories = ProductCategory::all();
        return view('product.create')->with([
            'productCategories' => $productCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'description' => $request->description,
            'product_category_id' => ProductCategory::first()->id,
            'store_id' => auth()->user()->store->id,
        ]);

        if($request->file_upload)
            $product->addMediaFromRequest('file_upload')->toMediaCollection('store');

        if(auth()->user()->isAdmin())
            return redirect()->route('product.index')->with('success', 'Product created successfully');
        else
            return redirect()->route('store.mystore')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('product.create')->with([
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'description' => $request->description,
            'product_category_id' => ProductCategory::first()->id,
            ]);

        if($request->file_upload)
            $product->addMediaFromRequest('file_upload')->toMediaCollection('store');

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
