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
<div class="col-lg-12 col-xl-10 mx-auto bg-light row py-3">
    <div class="col-lg-3 col-12 mb-2">
        @include('components.category_list')
    </div>

    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="col-12 d-flex">
                <a href="" class="col-4 text-center hover-bg active">
                    <i class="fa fa-shopping-cart text-danger pe-1 p-4"></i> <b>HOME</b>
                </a>
                <a href="{{ route('store.products', $store->id) }}" class="col-4 text-center hover-bg">
                    <i class="fa fa-shopping-cart text-danger pe-1 p-4"></i> <b>PRODUCTS</b>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-5">
                <div class="card bg-danger">
                    <div class="card-body text-white">
                        <h5>Welcome to <b>{{ $store->name }}</b> shop</h5>
                        <p>Get 50% off or get a coupon</p>
                        <a href="" class="btn btn-light btn-block bg-warning py-3 bg-light">Get coupon
                            <i class="fa fa-arrow-right mt-1" style="float:right"></i>
                        </a>
                        <div class="card px-3 mt-4">
                            <div class="row">
                              @foreach ($products->take(4) as $product)
                                <div class="col-6 py-1">
                                    <a href="{{ route('store.product.listing', [$store->id, $product->id]) }}">
                                        <img src="{{ $product->first_photo_url }}"
                                            style="width: 100%; max-height: 150px; object-fit:cover" class="pb-0" alt=""
                                            srcset="">
                                        <span class="text-black"> {{ $product->price }} Birr <span class="text-danger text-underlined">10% off</span></span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
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
                                <a href="{{ route('store.product.listing', [$store->id, $product->id]) }}">
                                    <img src="{{ $product->first_photo_url }}"
                                        style="width: 100%; max-height: 150px; object-fit:cover" alt="" srcset="">
                                    <span class="text-black"> {{ $product->price }} Birr <span class="text-danger">10% off</span></span>
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

<div class="col-lg-12 col-xl-10 mx-auto bg-light row py-3">
    <div>
        <h3 class="text-center text-uppercase"><b>Top selling products</b></h3>
    </div>
    <div class="row">
      @foreach ($products->take(6) as $product)
        <div class="col-md-3 mx-auto col-xl-2 col-4 py-2" x-data>
          <img src="{{ $product->first_photo_url }}"
              style="width: 100%; max-height: 150px; object-fit:cover" alt="" srcset="">
          <span class="text-black"> {{ $product->price }} Birr <span class="text-danger">{{ $product->qty }} items left</span></span>
          <button onClick="addToCart({{$product}}, 1)">Add to cart</button>
      </div>
    @endforeach
    </div>
</div>
@endsection