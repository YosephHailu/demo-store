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
        <div class="card mb-3">
            <div class="col-12 d-flex">
                <a href="{{ route('store.detail', $store) }}" class="col-4 text-center hover-bg">
                    <i class="fa fa-shopping-cart text-danger pe-1 py-4"></i> <b>HOME</b>
                </a>
                <a href="{{ route('store.products', $store->id) }}" class="col-4 text-center hover-bg active">
                    <i class="fa fa-shopping-cart text-danger pe-1 py-4"></i> <b>PRODUCTS</b>
                </a>
                <a href="" class="col-4 text-center hover-bg">
                    <i class="fa fa-shopping-cart text-danger pe-1 py-4"></i> <b>Easy payment</b>
                </a>
            </div>

            <div class="card-header d-flex pb-0">
                <h3 class="card-title font-bold"><b>Products</b></h3>

                <div class="right" style="margin-left: auto !important">
                    <form class=" input-group w-auto my-auto d-none d-sm-flex">
                        <input autocomplete="off" type="search" name="q" class="form-control rounded"
                            placeholder="Search" style="min-width: 125px;" />
                        <span class="input-group-text border-0 d-none d-lg-flex position-absolute text-lighter"
                            style="right: 0"><i class="fas fa-search"></i></span>
                    </form>
                </div>
            </div>
        </div>

        <div class="row" x-data>
            @foreach ($products->take(6) as $product)
            @include('components.Product')
            @endforeach
        </div>
    </div>
</div>
</div>

@endsection