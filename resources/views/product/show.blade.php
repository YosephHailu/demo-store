@extends('layouts.app')

@push('top-scripts')
<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
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
                                    style="width: 185px;" alt="logo" class="mb-3">
                                <h4 class="mt-1 mb-5 pb-1"><b>DELETE PRODUCT</b></h4>
                            </div>

                            <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <div>
                                    <p>Enter your email <b>{{ auth()->user()->email }}</b> to continue:</p>

                                    <div class="form-outline mb-4">

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                             required autocomplete="email"  required>
                                        <label class="form-label" for="form2Example11">Enter email</label>

                                        @error('email')
                                        <span class="invalid-feedback pb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <p>Enter product name <b>{{ $product->name }}</b> to continue:</p>

                                    <div class="form-outline mb-4">

                                        <input id="name" type="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            required autocomplete="name" required>
                                        <label class="form-label" for="form2Example11">Enter name</label>

                                        @error('name')
                                        <span class="invalid-feedback pb-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center pt-1 mb-5 pb-1">
                                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 p-3"
                                        type="submit"> Delete
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