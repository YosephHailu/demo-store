<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('create', 'edit', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $store = auth()->user()->store;
        if(!$store) {
            return redirect(route('store.create'));
        }
        $product_categories = auth()->user()->store->productCategories();
        if($request->q) {
            $product_categories::where('name', 'like', '%'.$request->q.'%');
        }

        return view('product_category.product_categories')->with([
            'product_categories' => $product_categories->get()
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
        return view('product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        //
        $product_category = ProductCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'store_id' => auth()->user()->store->id
        ]);

        return redirect()->route('product_category.index')->with('success', 'Product Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory, Request $request)
    {
        //
        $product_categories = auth()->user()->store->productCategories();
        if($request->q) {
            $product_categories::where('name', 'like', '%'.$request->q.'%');
        }
        return view('product_category.product_categories')->with([
            'product_category' => $productCategory,
            'product_categories' => $product_categories->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
        $productCategory->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('product_category.index')->with('success', 'Product Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
    
    public function toggle(Request $request, ProductCategory $productCategory)
    {
        $productCategory->is_active = !$productCategory->is_active;
        $productCategory->save();
        return redirect(route('product_category.index'))->with('success', 'Product Category updated successfully.');
    }
}
