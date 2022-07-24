<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gebeya store') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/mdb.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('top-scripts')
</head>

<body>
    <div id="app">
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white fixed-top ">
            <div class="container-fluid justify-content-between">
                <!-- Left elements -->
                <div class="d-flex">
                    <!-- Brand -->
                    <a class="ripple d-flex justify-content-center py-1 ripple-surface-primary" href="/">
                        <img src="https://gebeya.com/wp-content/uploads/2022/01/Submit-your-application-%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F-2assets.png"
                            alt="MDB Logo" style="max-height: 50px">
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <ul class="navbar-nav ">
                    <li class="nav-item me-3 me-lg-1">
                        <!-- Search form -->
                        <form  class="input-group my-auto d-none d-sm-flex">
                            <input autocomplete="off" type="search" class="form-control rounded py-4"
                                placeholder="Search..." name="order_number" style="min-width: 325px;" />
                            <span class="input-group-text border-0 d-none d-lg-flex position-absolute text-lighter"
                                style="right: 0; top: 6px"><i class="fas fa-search"></i></span>
                        </form>
                    </li>
                </ul>
                <!-- Center elements -->

                <!-- Right elements -->
                <ul class="navbar-nav flex-row">
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link" href="{{ route('cart.my-cart') }}" title="Logout">
                            <span><i class="fas fa-shopping-cart fa-lg"></i></span>
                            <span
                                class="badge rounded-pill badge-notification bg-danger cart-counter">{{\App\Models\Cart::count()}}</span>

                        </a>
                    </li>
                    <li style="margin-top:2px;min-height:1px;min-width:1px;">
                        @guest
                        <a class="btn btn-primary ms-2 me-1" href="{{ route('login') }}">Login</a>
                        @else
                        <a class="btn btn-default ms-2 me-1" href="{{ route('home') }}">Dashboard</a>
                        @endguest
                    </li>
                </ul>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->

        <main style="flex-grow: 1; margin-top: 80px" class="bg-light">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('assets/js/mdb.min.js')}}"></script>
    <script src="{{asset('assets/js/alpine.js')}}"></script>

    <script>
        const rootApiUrl = "{{ url('/') }}/api";

        function addToChart(product) {
            console.log(product);

            $.post(rootApiUrl + "/store", product, function(response) {
                    let cartCounter = $('.cart-counter');
                    cartCounter.text(response.cart_count);
                })
            .fail(function(error) {
                console.log(error)
            })

        }

    </script>
    @stack("bottom-scripts")
</body>

</html>