@extends('layouts.app_public')

@push('top-scripts')
<style>
    .hover-bg:hover {
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
        <div class="card">
            <div class="col-12 row">
                <a href="" class="col-4 text-center hover-bg">
                    <i class="fa fa-shopping-cart text-danger pe-1 p-4"></i> <b>Easy payment</b>
                </a>
                <a href="" class="col-4 text-center hover-bg">
                    <i class="fa fa-shopping-cart text-danger pe-1 p-4"></i> <b>Multiple vendors</b>
                </a>
                <a href="" class="col-4 text-center hover-bg">
                    <i class="fa fa-shopping-cart text-danger pe-1 p-4"></i> <b>Easy payment</b>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-5">
                <div class="card card-body shadow-lg mb-3">
                    <div class="row">
                        <a href="{{ route('register') }}" class="mt-3 btn btn-danger py-3 col-5 mx-auto">Join us
                            <i class="fa fa-arrow-right mt-1" style="float:right"></i>
                        </a>
                        <a href="{{ route('login') }}"
                            class="mt-3 btn btn-light bg-warning py-3 bg-light col-5 mx-auto">Login
                            <i class="fa fa-arrow-right mt-1" style="float:right"></i>
                        </a>
                    </div>
                </div>

                <div class="card bg-danger">
                    <div class="card-body text-white">
                        <h5>Welcome to <b>gebeya</b>'s shop</h5>
                        <p>Get 50% off or get a coupon</p>
                        <a href="" class="btn btn-light btn-block bg-warning py-3 bg-light">Get coupon
                            <i class="fa fa-arrow-right mt-1" style="float:right"></i>
                        </a>
                        <div class="card px-3 mt-4">
                            <div class="row">
                                @foreach ($products->limit(4)->get() as $product)
                                <div class="col-6 py-1">
                                    <a href="{{ route('store.product.listing', [$product->store_id, $product->id]) }}">
                                        <img src="{{ $product->first_photo_url }}"
                                            style="width: 100%; max-height: 150px; object-fit:cover" class="pb-0" alt=""
                                            srcset="">
                                        <span class="text-black"> {{ $product->price }} Birr <span
                                                class="text-danger">10% off</span></span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-7">
                <div class="card card-body">
                    <img src="https://ae01.alicdn.com/kf/Sbacfd60eeaef4df188f81d3e054bb6d5U.jpg_Q90.jpg_.webp" alt=""
                        srcset="">
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title uppercase"><b>Featured products</b></h5>
                        <div class="row">
                            @foreach ($products->limit(6)->get() as $product)
                            <div class="col-4">
                                <a href="{{ route('store.product.listing', [$product->store_id, $product->id]) }}">
                                    <img src="{{ $product->first_photo_url }}"
                                        style="width: 100%; max-height: 150px; object-fit:cover" alt="" srcset="">
                                    <span class="text-black"> {{ $product->price }} Birr <span class="text-danger">10%
                                            off</span></span>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container bg-light p-5 mt-4">
    <div>
        <h3 class="text-center text-uppercase"><b>Top selling shops</b></h3>
    </div>
    <div class="row">
        @foreach ($stores as $store)
        <div class="col-xl-4 col-lg-6 mb-4">
            <a href="{{ route('store.detail', $store->id) }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="{{ $store->first_photo_url }}" alt=""
                                style="width: 45px; height: 45px; object-fit: cover" class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $store->name }}</p>
                                <p class="text-muted mb-0">{{ Str::limit($store->description, 60) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection