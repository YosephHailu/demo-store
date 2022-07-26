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

    <!--Main layout-->
    <main class="mt-5 pt-4">
        <div class="container dark-grey-text mt-5">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4">
                    <img src="{{ $product->first_photo_url }}" class="img-fluid" alt="">
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Content-->
                    <div class="p-4">

                        <div class="mb-3">
                            <span class="p-0 badge red mr-1 text-dark text-uppercase">{{ $product->store->name }}</span>
                            <span class="badge purple mr-1 text-dark"><b>CATEGORY </b> <span class="text-muted">{{
                                    $product->productCategory->name }}</span> </span>

                        </div>

                        <p class="lead">
                            <span>${{ $product->price }}</span>
                        </p>

                        <p class="lead font-weight-bold">Description</p>

                        <p>{{ $product->description }}</p>

                        <form class="d-flex justify-content-left" x-data>
                            <!-- Default input -->
                            <input type="number" value="1" id="ProductQuantity" aria-label="Search" class="form-control"
                                style="width: 100px">
                            <button class="btn btn-primary btn-md my-0 p mr-2" type="button"
                                @click="initAddToCart({{$product}})">Add to cart
                                <i class="fas fa-shopping-cart ml-1"></i>
                            </button>

                        </form>
                    </div>
                    <!--Content-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr>

            <!--Grid row-->
            <div class="row d-flex justify-content-center wow fadeIn">

                <!--Grid column-->
                <div class=" text-center">

                    <h4 class="my-4 h4">Additional information</h4>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta
                        odit
                        voluptates,
                        quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row wow fadeIn  mx-auto">

                @foreach ($store->products()->where('id', '!=', $product->id)->limit(3)->get() as $product)
                <!--Grid column-->
                <div class="col-md-3 col-4 py-2" x-data>
                    <a href="{{ route('store.product.listing', [$store->id, $product->id]) }}">
                        <img src="{{ $product->first_photo_url }}" class="img-fluid" alt="">
                    </a>
                </div>
                <!--Grid column-->
                @endforeach

            </div>
            <!--Grid row-->

        </div>
    </main>
    <!--Main layout-->

</div>


<script>
    function initAddToCart(product) {
        this.addToCart(product, $("#ProductQuantity").val());
        window.location = "{{url()->current()}}"
    }
</script>
@endsection