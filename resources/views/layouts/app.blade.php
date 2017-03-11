<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">

    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBYk-wmK8-C1e-hDgsUg3ZLn05aQLeIhg0&libraries=drawing'></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


    <script src="{{ asset('locationpicker/dist/locationpicker.jquery.min.js') }}"></script>
    <script src="{{asset('select2/dist/js/select2.js')}}"></script>
    <script src="{{asset('bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('datetimepicker/js/locales/bootstrap-datetimepicker.fr.js')}}"></script>



    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crime Map</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('font-awesome/4.7.0/css/font-awesome.min.css')}}" >
    <link rel="stylesheet" href="{{asset('select2/dist/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-select/dist/css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('MyStyle/Mystyle.css')}}">




    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('twitter-bootstrap/3.3.7/css/bootstrap.min.css')}}" >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato', sans-serif;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Crime Map
                </a>


        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li><a href="{{ url('/maps') }}">Maps</a></li>
            </ul>
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    <li><a href="{{ url('/get_report') }}">System Reports</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav">
                @if(Auth::check() &&Auth::user()->is_normalUser())
                    <li><a href="{{ url('/patrol') }}">Patrol Assignment</a></li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}


                @else
                    @if(Auth::user()->is_admin())
                        <li><a href="{{ url('/register') }}">Add user</a></li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@if (session('flash_message'))
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    </div>
@endif
@if(Session::has('success'))
    <div class="container">
        <div class="alert alert-success col-md-10 col-md-offset-2" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
            <strong>Success!</strong> {{Session::get('success')}}
        </div>
    </div>
@endif
@yield('content')
{{--@include ('footer')--}}
<!-- JavaScripts -->
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>
