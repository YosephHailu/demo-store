@extends('layouts.app_public')

@push('top-scripts')
<style>
    .hover-bg:hover {
        background: #d4d4d4;
    }

    .hover-bg.active {
        background: #d4d4d4;
    }
</style>
@endpush

@section('content')
<div class="col-9 mx-auto bg-light row py-3">
    <div class="col-3">
        @include('components.category_list')
    </div>

    <div class="col-8">
        <div class="card mb-3">
            <div class="col-12 row">
                <a href="{{ route('store.detail', $store) }}" class="col-4 text-center hover-bg">
                    <i class="fa fa-shopping-cart text-danger pe-1 p-4"></i> <b>HOME</b>
                </a>
                <a href="{{ route('store.products', $store->id) }}" class="col-4 text-center hover-bg active">
                    <i class="fa fa-shopping-cart text-danger pe-1 p-4"></i> <b>PRODUCTS</b>
                </a>
                <a href="" class="col-4 text-center hover-bg">
                    <i class="fa fa-shopping-cart text-danger pe-1 p-4"></i> <b>Easy payment</b>
                </a>
            </div>

            <div class="card-header d-flex pb-0">
                <h3 class="card-title font-bold"><b>Products</b></h3>
        
                <div class="right" style="margin-left: auto !important">
                    <form class=" input-group w-auto my-auto d-none d-sm-flex">
                        {{-- <select name="product_category_id" class="form-control">
                            <option value="" selected>Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                        </select> --}}

                        <input autocomplete="off" type="search" name="q" class="form-control rounded" placeholder="Search"
                            style="min-width: 125px;" />
                        <span class="input-group-text border-0 d-none d-lg-flex position-absolute text-lighter"
                            style="right: 0"><i class="fas fa-search"></i></span>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($products->take(6) as $product)
            <div class="col-3 py-2" x-data>
                <a href="{{ route('store.product.listing', [$store->id, $product->id]) }}">
                    <div class="card">
                        <img src="{{ $product->first_photo_url }}" style="width: 100%; max-height: 150px; object-fit:cover"
                            alt="" srcset="">
                        <span><b>{{ $product->name }}</b></span>
                        <span class="text-black"> {{ $product->price }} Birr <span class="text-danger">{{ $product->qty }} items
                                left</span></span>
                    </div>
                </a>
                <button class="btn" style="float: right" @click="addToChart({{$product}})">Add to cart</button>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>

@endsection