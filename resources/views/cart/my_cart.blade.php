@extends('layouts.app_public')

@push('top-scripts')
@endpush

@section('content')

<section class="col-10 mx-auto p-4">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body p-4">

                    <div class="row">

                        <div class="col-lg-7">
                            <h5 class="mb-3"><a href="{{ url()->previous() }}" class="text-body"><i
                                        class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                            <hr>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <p class="mb-1">Shopping cart</p>
                                    <p class="mb-0">You have 4 items in your cart</p>
                                </div>
                                <div>
                                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                            class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                </div>
                            </div>

                            @foreach ($carts as $cart)
                            <div class="card mb-3" id="Item{{$cart->id}}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div>
                                                <img src="{{ $cart->product->first_photo_url }}" alt="..."
                                                    class="img-fluid rounded-3" alt="Shopping item"
                                                    style="width: 65px;">
                                            </div>
                                            <div class="ms-3">
                                                <h5>{{ $cart->product->name }}</h5>
                                                <p class="small mb-0">256GB, Navy Blue</p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div style="width: 50px;">
                                                <h5 class="fw-normal mb-0">{{ $cart->quantity }}</h5>
                                            </div>
                                            <div style="width: 80px;">
                                                <h5 class="mb-0">${{ $cart->product->price }}</h5>
                                            </div>
                                            <button onclick="removeFromChart({{ $cart->id }})" style="color: #cecece;"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="col-lg-5">

                            <div class="card bg-primary text-white rounded-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0">Transaction details</h5>
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                            class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                    </div>

                                    <p class="small mb-2">Payment method</p>
                                    <a href="#!" type="submit" class="text-white"><i
                                            class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                    <a href="#!" type="submit" class="text-white"><i
                                            class="fab fa-cc-visa fa-2x me-2"></i></a>
                                    <a href="#!" type="submit" class="text-white"><i
                                            class="fab fa-cc-amex fa-2x me-2"></i></a>
                                    <a href="#!" type="submit" class="text-white"><i
                                            class="fab fa-cc-paypal fa-2x"></i></a>

                                    <form class="mt-4" action="{{ route('order.store') }}" method="POST">
                                        @csrf
                                        <div class="form-outline form-white mb-4">
                                            <input type="text" id="name" required class="form-control form-control-lg"
                                                siez="17" placeholder="Cardholder's Name" name="name">
                                            <label class="form-label" for="name"
                                                style="margin-left: 0px;">Cardholder's Name</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="email" id="email" name="email" required class="form-control form-control-lg"
                                                siez="17" placeholder="1234 5678 9012 3457" minlength="19"
                                                maxlength="19">
                                            <label class="form-label" for="email" style="margin-left: 0px;">Email</label>
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="text" id="card_number" name="card_number" required class="form-control form-control-lg"
                                                siez="17" placeholder="1234 5678 9012 3457" minlength="19"
                                                maxlength="19">
                                            <label class="form-label" for="card_number" style="margin-left: 0px;">Card
                                                Number</label>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="form-outline form-white">
                                                    <input type="text" id="card_expiry" name="card_expiry" required class="form-control form-control-lg"
                                                        placeholder="MM/YYYY" size="7" minlength="7" maxlength="7">
                                                    <label class="form-label" for="card_expiry"
                                                        style="margin-left: 0px;">Expiration</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline form-white">
                                                    <input type="password" id="card_cvv" name="card_cvv"
                                                        required class="form-control form-control-lg" placeholder="●●●" size="1"
                                                        minlength="3" maxlength="3">
                                                    <label class="form-label" for="card_cvv"
                                                        style="margin-left: 0px;">Cvv</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2">${{ number_format($carts->sum('product.price'), 2) }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total(Incl. taxes)</p>
                                            <p class="mb-2">${{ number_format($carts->sum('product.price') + (
                                                $carts->sum('product.price') * 0.15 ), 2) }}</p>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span>${{ number_format($carts->sum('product.price') + (
                                                    $carts->sum('product.price') * 0.15 ), 2) }}</span>
                                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@push('bottom-scripts')
<script>
    function removeFromChart(cart) {
        console.log(cart);
        document.getElementById(`Item${cart}`).remove()

        $.post(rootApiUrl + `/cart/${cart}/remove`, function(response) {
            console.log(response)
                let cartCounter = $('.cart-counter');
                cartCounter.text(response.cart_count);
            })
        .fail(function(error) {
            console.log(error)
        })

    }

</script>
@endpush