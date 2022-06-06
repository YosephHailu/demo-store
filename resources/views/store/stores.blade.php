@extends('layouts.app')

@push('top-scripts')
@endpush

@section('content')
<div class="fixed-action-btn" id="fixed1" style="height: 80px;">
    <a href="{{ route('store.create') }}" title="Register store" class="btn btn-floating btn-primary btn-lg"
        style="background-color: rgb(244, 67, 54);">
        <i class="fas fa-plus"></i>
    </a>
</div>
<div class="card">
    <div class="card-header d-flex pb-0">
        <h3 class="card-title font-bold">MY STORES</h3>

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
    @foreach ($stores as $store)
    <div class="col-4">
        <div class="card shadow-lg p-0">
            <img src="https://previews.agefotostock.com/previewimage/medibigoff/83666c370e684f7cd6f1c3e21bf570a2/yb3-2361510.jpg"
                class="card-img-top" alt="Chicago Skyscrapers" />

            <div class="card-body" style="position: relative">
                <a href="{{ route('store.create') }}" title="Register store" class="btn btn-floating btn-primary btn-lg"
                    style="background-color: rgb(244, 67, 54); right: 10px; top: -20px; position: absolute;">
                    <i class="fas fa-trash"></i>
                </a>

                <a href="{{ route('store.edit', $store->id) }}" title="Register store" class="btn btn-floating btn-primary btn-lg"
                    style="right: 70px; top: -20px; position: absolute;">
                    <i class="fas fa-pen"></i>
                </a>

                <h5 class="card-title">{{ $store->name }}</h5>
                <p class="card-text text-muted">{{ $store->description }}</p>
            </div>
            <ul class="list-group list-group-light list-group-small">
                <li class="list-group-item px-4">Cras justo odio</li>
                <li class="list-group-item px-4">Dapibus ac facilisis in</li>
                <li class="list-group-item px-4">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection