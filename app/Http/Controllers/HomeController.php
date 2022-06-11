<?php

namespace App\Http\Controllers;

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
        return view('home');
    }

    public function landing() {
        $categories = ProductCategory::paginate(12);
        $stores = Store::paginate(12);

        return view('landing')->with(['categories' => $categories, 'stores' => $stores]);
    }
}
