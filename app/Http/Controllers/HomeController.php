<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landing');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!auth()->user()->store) {
            return redirect()->route('store.mystore');
        }
        $store = auth()->user()->store;
        return view('home')->with(['store' => $store]);
    }

    public function landing() {
        $categories = ProductCategory::where('is_active', true)->paginate(12);
        $stores = Store::paginate(12);
        $products = Product::query();

        return view('landing')->with(['categories' => $categories, 'stores' => $stores, 'products' => $products]);
    }

    public function comingSoon()
    {
        return view('coming-soon');
    }

}
