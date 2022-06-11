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
        <div class="list-group bg-white shadow list-group-light">
            <a href="#"
                class="list-group-item text-center list-group-item-action px-3 border-0 rounded-3 mb-2 text-uppercase bg-light">
                <b>Product Categories</b>
            </a>

            @foreach ($categories as $category)
            <a href="#" class="list-group-item list-group-item-action px-3 border-b rounded-3 ">
                {{-- <i class="fa fa-chevron-right mt-0" style="font-size: 10px;"></i> --}} <span class="">{{ $category->name }}</span></a>
            @endforeach
        </div>
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
                        <h5>Welcome to my shop</h5>
                        <p>Get 50% off or get a coupon</p>
                        <a href="" class="btn btn-light btn-block bg-warning py-3 bg-light">Get coupon
                            <i class="fa fa-arrow-right mt-1" style="float:right"></i>
                        </a>
                        <div class="card px-3 mt-4">
                            <div class="row">
                              @foreach ($products->take(4) as $product)
                                <div class="col-6 py-1">
                                    <img src="{{ $product->first_photo_url }}"
                                        style="width: 100%; max-height: 150px; object-fit:cover" class="pb-0" alt=""
                                        srcset="">
                                    <span class="text-black"> {{ $product->price }} Birr <span class="text-danger text-underlined">10% off</span></span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-7">
                <div class="card card-body">
                    <img src="{{ $store->first_photo_url }}" alt=""
                        srcset="">
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title uppercase"><b>Featured products</b></h5>
                        <div class="row">
                          @foreach ($products->take(6) as $product)
                            <div class="col-4">
                                <img src="{{ $product->first_photo_url }}"
                                    style="width: 100%; max-height: 150px; object-fit:cover" alt="" srcset="">
                                <span class="text-black"> {{ $product->price }} Birr <span class="text-danger">10% off</span></span>
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
        <h3 class="text-center text-uppercase"><b>Top selling products</b></h3>
    </div>
    <div class="row">
      @foreach ($products->take(6) as $product)
      <div class="col-3" x-data>
          <img src="{{ $product->first_photo_url }}"
              style="width: 100%; max-height: 150px; object-fit:cover" alt="" srcset="">
          <span class="text-black"> {{ $product->price }} Birr <span class="text-danger">{{ $product->qty }} items left</span></span>
          <button @click="addToChart({{$product}})">Add to cart</button>
      </div>
    @endforeach
    </div>
</div>
@endsection