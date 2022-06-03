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
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.js')}}"></script>
    <!-- Jquery 3.6.0 -->
    <script src="{{asset('assets/jquery/jquery-3.6.0.min.js')}}"></script>


    <script src="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.min.css')}}">

    <link rel="icon" href="https://tuinui.xyz/uploads/logoweb/logotitlenew.png" type="image/x-icon">





    {{-- notification --}}
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

    </script>
</head>
<style>
    .navbar-expand-lg {
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
        border-radius: 0%;
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
        background-color: #006185 !important;


    }

    .alertborder {
        border: red 1px solid;
    }

    .ip {
        border-radius: 0px !important;
    }

    .centered {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }




    input:focus {
        outline: none !important;
        box-shadow: none !important;
        outline-width: 0 !important;

    }

    ::-webkit-scrollbar {
        display: none;
    }
</style>

<body class="" style="background:#F5F5F5">

    <div id="app" class="" style="">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm"
            style="background-image: linear-gradient(rgba(18, 197, 146, 0.7) 0%, rgba(33, 87, 194, 0.7) 100%  ); padding:0px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links --> --}}
                    @guest
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
                    <ul class="navbar-nav ms-auto me-auto nav mt-2" style="margin-top:0px !important;">
                        <div class="col-lg-auto" style="padding:0px;">
                            <div class="d-flex justify-content-center">
                                <a class="btn btnmenu navmenu" href="{{route('home')}}"
                                    style="width:100%;height:100%;">ข้อมูลสินค้า</a>
                            </div>
                        </div>
                        <div class="col-lg-auto"  style="padding:0px;">
                            <div class="d-flex justify-content-center">
                                <a class="btn btnmenu navmenu" href="{{route('addfood')}}"
                                    style="width:100%;height:100%;">เพิ่มเมนูอาหาร/สินค้า</a>
                            </div>
                        </div>
                        <div class="col-lg-auto"  style="padding:0px;">
                            <div class="d-flex justify-content-center">
                                <a class="btn btnmenu navmenu" href="{{route('historyorder')}}"
                                    style="width:100%;height:100%;">ดูสถิติยอดขาย</a>
                            </div>
                        </div>
                        <div class="col-lg-auto"  style="padding:0px;">
                            <div class="d-flex justify-content-center">
                                <a class="btn btnmenu navmenu" href="{{route('detailstore')}}"
                                    style="width:100%;height:100%;">ข้อมูลร้าน</a>
                            </div>
                        </div>
                        <div class="col-lg-auto"  style="padding:0px;">
                            <div class="d-flex justify-content-center">
                                <a class="btn btnmenu navmenu" href="{{route('storeorder')}}"
                                    style="width:100%;height:100%;">ออเดอร์ (<label class="ms-0 mt-0 mb-0 me-0" for=""
                                        style="color:red;">0</label>)</a>
                            </div>

                        </div>
                    </ul>
                    <ul class="navbar-nav ml-auto navfooter">
                        <p class="mt-auto mb-auto ms-auto me-auto" style="">{{ Auth::user()->storename }}</p>
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class=" " href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre style="color:black">

                                <div class="fs-4">
                                    <i class="bi bi-list"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                aria-expanded="false">
                                <div class="logout text-center">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endguest
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
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var idstore = '<?=auth()->user()->id?>';
        // Pusher.logToConsole = true;
        function alertborder() {
            $.ajax({ //create an ajax request to display.php
                type: "POST",
                url: "datastoreorder",
                datatype: 'json',
                data: {
                    storeid: idstore
                },
                success: function (response) {
                    var dataorder = Object.values(response)
                    var alertorder = 0;

                    if (dataorder[0].length == 0) {
                        $('label').eq(0).empty().append(0)
                    } else {
                        for (var i = 0; i < dataorder[0].length; i++) {

                            if (dataorder[0][i]['status'] != "success" && dataorder[0][i]['status'] != "cancelled") {
                                alertorder++
                            }
                        }
                        $('label').eq(0).empty().append(alertorder)
                    }
                }
            });
        }
        alertborder()
        var pusher = new Pusher('beb29d7a1bf5bfe57fe3', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('store' + idstore);
        channel.bind('orderproduct', function (data) {
            // alert(JSON.stringify(data));
            alertborder()
            Swal.fire('คุณมีคำสั่งซื้อใหม่ กรุณาตรวจสอบ')
        });
        $(document).ready(function () {
            const timeout = 1800000;
            var idleTimer = null;
            $('*').bind(
                'mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick',
                function () {
                    clearTimeout(idleTimer);

                    idleTimer = setTimeout(function () {
                        $('#logout-form').submit();
                    }, timeout);
                });
            $("body").trigger("mousemove");
        });
        // Optimalisation: Store the references outside the event handler:
        var $window = $(window);
        var $pane = $('#pane1');

        function checkWidth() {
            var windowsize = $window.width();
            if (windowsize < 1000) {
                $('.logout').insertAfter('.navfooter');
                $('.dropdown').hide();
            } else {
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