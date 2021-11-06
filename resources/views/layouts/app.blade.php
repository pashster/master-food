<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>

        /*
        Payment Information card
        */
        .details_card {
            width: 700px;
            height: 400px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 10px;
            background-color: #fff;
        }

        /*
        Order Summary Card
        */
        .summary_card {
            background-color: #fff;
            width: 350px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 10px;
        }

        /*
        Order Card Item Card
        */
        .card_item {
            display: flex;
            position: relative;
            margin: 10px 0;
        }
        .close-btn {
            position: absolute;
            right: 10px;
            top: 5px;
        }

        .card_item .product_img img {
            height: 80px;
            margin-right: 20px;
            width: 70px;
            border-radius: 5px;
        }

        .product_info h1 {
            font-size: 20px;
            color: #1e212d;
            margin: 5px 0;
        }

        .product_info p {
            color: #a1a1a1;
            font-size: 14px;
        }
        .product_rate_info {
            display: flex;
            margin: 5px 0;
            align-items: center;
            justify-content: space-between;
        }

        /*
        cart item + & -
        */
        .pqt {
            font-size: 20px;
            line-height: 30px;
            width: 30px;
            text-align: center;
        }

        .pqt-plus,
        .pqt-minus {
            background: #fcfcfc;
            border: none;
            font-size: 20px;
            height: 100%;
            padding: 0 15px;
        }
        .pqt-plus:hover,
        .pqt-minus:hover {
            background: #53b5aa;
            color: #fff;
            cursor: pointer;
        }

        .pqt-plus {
            line-height: 30px;
        }

        .pqt-minus {
            line-height: 30px;
        }
        /*
        Order price & total
        */
        .order_price,
        .order_service,
        .order_total {
            display: flex;

            justify-content: space-between;
            padding: 10px;
        }
        .order_price p,
        .order_service p {
            color: #a1a1a1;
        }

        .order_total p {
            font-weight: 600;
        }

        /*
        Payment Information all input
        */

        input {
            outline: 0;
            background: #f2f2f2;
            border-radius: 4px;
            width: 100%;
            border: 0;
            caret-color: #4f5d7e;
            margin: 10px 15px;
            padding: 15px 20px;
            box-sizing: border-box;
            font-size: 14px;
        }
        /*
        Procced Payment button
        */
        .proced_payment a {
            padding: 10px 20px;
            width: 200px;
            border: 2px solid #f5f5f5;
            background-color: #53b5aa;
            color: #000;
            margin-left: 10px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>

    @yield('componentcss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @yield('cart-section')
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
