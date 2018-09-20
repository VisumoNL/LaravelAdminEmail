<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    @yield('head')
</head>
<body>

    <div class="nav">
        <p class="welcome">Welcome back, {{Auth::user()->name}}</p>
    </div>

    <div class="side_nav">
        <div class="side_nav_top">
            <img src="{{asset("img/visumo_white.svg")}}" class="side_nav_top_img">
        </div>
        <ul>
            <a href="#"><li class="nav_item"><i class="material-icons nav_icon purple">bar_chart</i>Dashboard</li></a>
            <a href="#"><li class="nav_item"><i class="material-icons nav_icon turquoise">calendar_today</i>Calendar</li></a>
            <a href="#"><li class="nav_item"><i class="material-icons nav_icon blue">email</i>Email</li></a>
            <a href="#"><li class="nav_item"><i class="material-icons nav_icon green">widgets</i>Widgets</li></a>
        </ul>
        <div class="bottom">
            <div class="left">
                <a href="{{asset("admin/settings")}}"><i class="material-icons">settings</i></a>
            </div>
            <div class="right">
                <a href="{{asset("admin/logout")}}"><i class="material-icons">power_settings_new</i></a>
            </div>
        </div>
    </div>

    <div class="inner_body">
        @yield('body')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script src="{{asset("js/admin.js")}}"></script>
</body>
</html>
