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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-usb" style="color: rgb(0, 0, 0)"></i>

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
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            @if(session()->has('info'))
            <div class="alert alert-info">
                {{ session()->get('info') }}
            </div>
            @endif

            <div class="container">
                <div class="row">
                   @if(Auth::check())
                   <div class="col-md-4">
                    <ul class="list-group"  style="margin-top: 35px">
                        <div class="card card-default">
                        <div class="card-header" style="border-bottom:none; background-color: rgb(233, 233, 233); color:white">Navigate</div>
                        <li class="list-group-item" style="border-left: none; border-right:none; border-bottom: none">
                            <a href="{{ route('home') }}" style="text-decoration: none">
                                <i class="fa fa-home"></i>
                             Home
                         </a>
                        </li>
                        </div>
                        <br>
                        <div class="card card-default">
                            <div class="card-header" style="border-bottom: none; border-left: none; border-right: none; background-color: rgb(218, 218, 218); color:white">View</div>


                                <li class="list-group-item" style="border-right: none; border-left: none; border-right:none; border-bottom: none">
                                    <a href="{{ route('products')}}" style="text-decoration: none">
                                        <i class="fa fa-tag"></i>
                                        Products
                                    </a>
                                    </li>

                            {{-- <li class="list-group-item" style="border-bottom:none; border-right:none; border-left:none">
                                <a href="{{ route('categories')}}" style="text-decoration: none">
                                    <i class="fa fa-tag"></i>
                                    Categories
                                </a>
                                </li> --}}
                            </div>
<br>
                         <div class="card card-default">
                            <div class="card-header" style="border-bottom: none; background-color: rgb(170, 170, 170); color: white">Add</div>
                            <li class="list-group-item" style="border-left: none; border-right:none; border-bottom: none">

                            <a href="{{ route('products.create')}}" style="text-decoration: none">
                               <i class="fa fa-plus"></i>
                                Create new product
                            </a>
                            </li>
                         {{-- <li class="list-group-item" style="border-left: none; border-right:none; border-bottom: none">
                            <a href="{{ route('category.create')}}" style="text-decoration: none">
                                <i class="fa fa-plus"></i>
                                Create new category
                            </a>
                            </li> --}}
                        </div>
<br>



                                        <div class="card card-default">
                                        <div class="card-header" style="border-bottom: none; background-color: rgb(133, 133, 133); color:rgb(255, 255, 255)">Restore</div>
                                    <li class="list-group-item" style="border-left: none; border-right:none; border-bottom: none">
                                        <a href="{{ route('products.trashed')}}" style="text-decoration: none">
                                            <i class="fa fa-trash"></i>
                                            Trashed products
                                        </a>
                                        </li>
                    </ul>
                </div>


                   @endif

                   <div class="col">
                       @yield('content')
                   </div>
               </div>
           </div>
        </main>
    </div>
</body>
</html>
