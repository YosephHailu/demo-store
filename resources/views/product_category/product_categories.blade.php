@extends('layouts.app')

@push('top-scripts')
<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #b9999a, #776c70, #e0a8d0);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #c9ae9b, #b47e7f, #9b5e75, #836b7c);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
</style>
@endpush

@section('content')
<div class="row d-flex justify-content-center align-items-center">
    <div class="row g-0">
        <div class="col-lg-4">
            <div class="card card-body p-md-5 mx-md-4">

                <div class="text-center">
                    <h4 class="mt-1 mb-5 pb-1">Add Category Information</h4>
                </div>

                @isset($product_category)
                <form method="POST" action="{{ route('product_category.update', $product_category->id) }}">
                    @method('put')
                    @else
                    <form method="POST" action="{{ route('product_category.store') }}">
                        @endisset
                        @csrf

                        <p>Please fill your product category information</p>

                        <div class="form-outline mb-4">

                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $product_category->name ?? old('name') }}" required autocomplete="name"
                                autofocus placeholder="Enter category name">
                            <label class="form-label" for="name">Name</label>

                            @error('name')
                            <span class="invalid-feedback pb-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-2">

                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                name="description" value="" required autocomplete="description"
                                autofocus>{{ $product_category->description ??  old('description') }}</textarea>
                            <label class="form-label" for="description">Description</label>

                            @error('description')
                            <span class="invalid-feedback pb-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 p-3" type="submit">
                                @isset($product_category)
                                Update
                                @else
                                Save
                                @endisset()
                            </button>
                        </div>
                    </form>
            </div>
        </div>

        <div class="col-lg-8 ">
            <div class="card">
                <div class="card-header d-flex pb-0">
                    <h3 class="card-title font-bold">MY PRODUCT CATEGORIES</h3>

                    <div class="right" style="margin-left: auto !important">
                        <form class=" input-group w-auto my-auto d-none d-sm-flex">
                            <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search"
                                style="min-width: 125px;" />
                            <span class="input-group-text border-0 d-none d-lg-flex position-absolute text-lighter"
                                style="right: 0"><i class="fas fa-search"></i></span>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <th><b>Name</b></th>
                                <th><b>Store</b></th>
                                <th style="max-width: 65px;"></th>
                            </thead>
                            <tbody>
                                @foreach ($product_categories as $product_category)
                                <tr>
                                    <td>{{ $product_category->name }} <br>
                                        <small class="text-muted">{{ $product_category->description }}</small>    
                                    </td>
                                    <td>{{ $product_category->store->name }}</td>
                                    <td class="d-flex pb-4" >
                                        <a href="{{ route('product_category.edit', $product_category->id) }}"
                                            class="btn btn-indigo btn-floating mx-2" style="">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <button type="button" class="btn btn-danger btn-floating mx-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection