<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->q) {
            $stores = Store::where('name', 'like', '%'.$request->q.'%');
        } else {
            $stores = Store::query();
        }
        return view('store.stores')->with([
            'stores' => $stores->get()
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
        return view('store.create');
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
        $store = Store::create([
            'name' => $request->name,
            'description' => $request->description,
            'phone' => $request->phone,
            'user_id' => auth()->user()->id
            // 'photo' => $request->photo
        ]);

        $store->addMediaFromRequest('file_upload')->toMediaCollection('store');

        return redirect(route('store.index'))->with([
            'success' => 'Store created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('store.show')->with(['store' => $store]);
    }

    public function detail(Store $store)
    {
        //
        $products = $store->products();
        $categories = $store->productCategories;
        return view('store.detail')->with(['store' => $store, 'products' => $products->paginate(25), 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
        return view('store.create')->with([
            'store' => $store
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
        $store->update([
            'name' => $request->name,
            'description' => $request->description,
            'phone' => $request->phone,
        ]);

        if($request->file_upload)
            $store->addMediaFromRequest('file_upload')->toMediaCollection('store');

        return redirect(route('store.index'))->with([
            'success' => 'Store updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
        $store->products()->delete();
        $store->productCategories()->delete();
        $store->delete();

        return redirect(route('store.index'))->with([
            'success' => 'Store deleted successfully'
        ]);
    }

    public function myStore()
    {
        //
        $store = auth()->user()->store;
        if(!$store) {
            return redirect(route('store.create'));
        }
        $products = $store->products;

        return view('store.mystore')->with([
            'store' => $store,
            'products' => $products
        ]);
    }

    public function login(Store $store)
    {
        Session::put('user', auth()->user());
        Auth::login(User::find($store->user->id));

        return redirect(route('store.mystore'));
    }

    public function logout(Store $store)
    {
        $user = Session::get('user');
        Session::remove('user');
        Auth::login($user);

        return redirect(route('store.index'));
    }
}
