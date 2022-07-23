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
<div class=" h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
                <div class="row g-0">
                    <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                            <h4 class="mb-4">We are more than just a company</h4>
                            <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center">
                                <img src="https://gebeya.com/wp-content/uploads/2022/01/Submit-your-application-%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F-2assets.png"
                                    style="width: 185px;" alt="logo" class="mb-2">
                                <h4 class="mt-1 mb-5 pb-1 uppercase"><b>REGISTER PRODUCT</b></h4>
                            </div>

                            @isset($product)
                            <form method="POST" action="{{ route('product.update', $product->id) }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @else
                                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                    @endisset
                                    @csrf

                                    <p>Please fill your product information</p>

                                    <div class="mb-4">
                                        <label class="form-label">Product category</label>
                                        <select name="product_category_id" class="form-control">
                                            <option value="">Select category</option>
                                            @foreach ($productCategories as $category)
                                            <option value="{{ $category->id }}" 
                                            @if(($product->product_category_id ?? old('product_category_id')) == $category->id)
                                                selected
                                                @endif>
                                                {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_category_id')
                                        <span class="invalid-feedback pb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input id="name" type="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $product->name ?? old('name') }}" required autocomplete="name"
                                            autofocus>
                                        <label class="form-label" for="form2Example11">Product Name</label>

                                        @error('name')
                                        <span class="invalid-feedback pb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex">

                                        <div class="form-outline mb-4">
                                            <input id="price" type="price"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                value="{{ $product->price ?? old('price') }}" required
                                                autocomplete="price" autofocus>
                                            <label class="form-label" for="price">Price</label>

                                            @error('price')
                                            <span class="invalid-feedback pb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input id="qty" type="qty"
                                                class="form-control @error('qty') is-invalid @enderror" name="qty"
                                                value="{{ $product->qty ?? old('qty') }}" required autocomplete="qty"
                                                autofocus>
                                            <label class="form-label" for="qty">Quantity</label>

                                            @error('qty')
                                            <span class="invalid-feedback pb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-outline mb-2">

                                        <textarea id="description"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="" required autocomplete="description"
                                            autofocus>{{ $product->description ??  old('description') }}</textarea>
                                        <label class="form-label" for="description">Description</label>

                                        @error('description')
                                        <span class="invalid-feedback pb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <label class="form-label" for="form2Example22">Image</label>
                                    <div class="form-outline mb-4">
                                        <input id="file" type="file"
                                            class="form-control @error('file') is-invalid @enderror" name="file_upload">

                                        @error('file_upload')
                                        <span class="invalid-feedback pb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 p-3"
                                            type="submit">
                                            @isset($product)
                                            Update
                                            @else
                                            Save
                                            @endisset()
                                        </button>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Changed your mind?</p>
                                        <a href="{{ url()->previous() }}" class="btn btn-outline-danger">
                                            <i class="fa fa-arrow-left"></i> Go back</a>
                                    </div>

                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection