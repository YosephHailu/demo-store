<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
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
        $productCategories = ProductCategory::where('store_id', auth()->user()->store->id);
        return view('product.create')->with([
            'productCategories' => $productCategories->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'description' => $request->description,
            'product_category_id' => $request->product_category_id,
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
        return view('product.show')->with(['product' => $product]);
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
        $productCategories = ProductCategory::where('store_id', auth()->user()->store->id);
        return view('product.create')->with([
            'product' => $product,
            'productCategories' => $productCategories->get()
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
            'product_category_id' => $request->product_category_id,
            ]);

        if($request->file_upload)
            $product->addMediaFromRequest('file_upload')->toMediaCollection('store');


        if(auth()->user()->isAdmin())
            return redirect()->route('product.index')->with('success', 'Product created successfully');
        else
            return redirect()->route('store.mystore')->with('success', 'Product created successfully');
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
        $product->carts()->delete();
        $product->delete();

        if(auth()->user()->isAdmin())
            return redirect()->route('product.index')->with('success', 'Product created successfully');
        else
            return redirect()->route('store.mystore')->with('success', 'Product created successfully');
    }

    public function detail(Store $store, Product $product)
    {
        //
        return view('product.detail')->with(['product' => $product, 'store' => $store]);
    }

}
