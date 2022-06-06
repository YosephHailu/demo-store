@extends('layouts.app')

@push('top-scripts')
@endpush

@section('content')
<div class="fixed-action-btn" id="fixed1" style="height: 80px;">
    <a href="{{ route('product.create') }}" title="Register product" class="btn btn-floating btn-primary btn-lg"
        style="background-color: rgb(244, 67, 54);">
        <i class="fas fa-plus"></i>
    </a>
</div>
<div class="card">
    <div class="card-header d-flex pb-0">
        <h3 class="card-title font-bold"><b>MY PRODUCTS</b></h3>

        <div class="right" style="margin-left: auto !important">
            <form class=" input-group w-auto my-auto d-none d-sm-flex">
                <input autocomplete="off" type="search" name="q" class="form-control rounded" placeholder="Search"
                    style="min-width: 125px;" />
                <span class="input-group-text border-0 d-none d-lg-flex position-absolute text-lighter"
                    style="right: 0"><i class="fas fa-search"></i></span>
            </form>
        </div>
    </div>
</div>
<div class="mt-3 row">
    @foreach ($products as $product)
    <div class="col-2">
        <div class="card shadow-lg p-0">
            <img src="https://previews.agefotostock.com/previewimage/medibigoff/83666c370e684f7cd6f1c3e21bf570a2/yb3-2361510.jpg"
                class="card-img-top" alt="Chicago Skyscrapers" />

            <div class="card-body pb-0" style="position: relative; padding-left: 14px">
                <a href="{{ route('product.create') }}" title="Register product" class="btn btn-floating btn-primary btn-lg"
                    style="background-color: rgb(244, 67, 54); right: 10px; top: -20px; position: absolute;">
                    <i class="fas fa-trash"></i>
                </a>

                <a href="{{ route('product.edit', $product->id) }}" title="Register product" class="btn btn-floating btn-primary btn-lg"
                    style="right: 70px; top: -20px; position: absolute;">
                    <i class="fas fa-pen"></i>
                </a>

                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text text-muted">{{ $product->description }}</p>
            </div>
            <hr class="my-1">
            <ul class="list-group list-group-light list-group-small">
                <li class="list-group-item px-3 text-muted">
                    <span class="pe-2"><b>Price:</b> {{ number_format($product->price, 2) }}</span>    
                    <span class="pa-3"><b>Qty:</b> {{ $product->qty }}</span>    
                </li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection