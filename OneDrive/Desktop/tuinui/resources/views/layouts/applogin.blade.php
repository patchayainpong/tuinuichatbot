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
    <!-- Bootstrap 5.0.1 CSS -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-icons.css')}}">
    <script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.js')}}"></script>
    <!-- Jquery 3.6.0 -->
    <script src="{{asset('assets/jquery/jquery-3.6.0.min.js')}}"></script>
    <link rel = "icon" href = 
    "https://tuinui.xyz/uploads/logoweb/logotitlenew.png" 
            type = "image/x-icon">


    <script src="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.min.css')}}">
    {{-- notification --}}
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<style>
.navbar-expand-lg
{
  -webkit-backface-visibility: hidden;
}
    .swal2-confirm {
        width: 100%;
        height: 100%;
        margin: 0px;
        border-radius: 0px !important;
    }

    .swal2-popup {
        padding: 0px;
    }

    .navmenu {
        border-radius: 26px;
        color: white;

    }

    .navmenu:hover {
        text-decoration: none;
        color: white;

    }

    .navmenu:focus {
        outline: none;
        box-shadow: none;
    }

    .navactive {
        background-color: #006185 !important
    }
    .alertborder{
        border: red 1px solid;
    }
    .ip{
        border-radius:0px !important ; 
    }
    input:focus{
    outline: none !important;
    box-shadow: none !important;
    outline-width: 0 !important;

}
::-webkit-scrollbar {
                display: none;
            }

            .centered {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>

<body style="background: #e5e5e7">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" style="background-image: linear-gradient(rgba(18, 197, 146, 0.7) 0%, rgba(33, 87, 194, 0.7) 100%  );">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/sellstore') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('selltotal') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg> </a>
                        </li>
                    </ul>
                    <!-- Left Side Of Navbar -->


                    {{-- <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links --> --}}
                    {{-- @guest
                    <ul class="navbar-nav ml-auto">
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
                    </ul>
                    @else
                @endguest --}}
            </div>
    </div>
    </nav>
    <main>
        @yield('content')
    </main>
    </div>
</body>

</html>
<script>
$(document).ready(function() {

    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);
    var $pane = $('#pane1');

    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize < 1000) {
            $('.logout').insertAfter('.navfooter');
           $('.dropdown').hide();
        }else{
            $('.logout').appendTo('.dropdown-menu');
           $('.dropdown').show();
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
});
</script>