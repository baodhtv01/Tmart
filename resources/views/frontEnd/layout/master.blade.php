<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Font awesome -->
    <link href="{{asset('frontEnd/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('frontEnd/css/bootstrap.css')}}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{asset('frontEnd/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/jquery.simpleLens.css')}}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('frontEnd/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="{{asset('frontEnd/css/theme-color/bridge-theme.css')}}" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{asset('frontEnd/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->


</head>
@stack('css')

<body>
<!-- wpf loader Two -->
{{--<div id="wpf-loader-two">--}}
{{--    <div class="wpf-loader-two-inner">--}}
{{--        <span>Loading</span>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- / wpf loader Two -->
<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->


<!-- Start header section -->
@include('frontEnd.layout.partial.header')
<!-- / header section -->
<!-- menu -->
@include('frontEnd.layout.partial.menu')
<!-- / menu -->
@yield('content')

<!-- footer -->
@include('frontEnd.layout.partial.footer')
<!-- / footer -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('frontEnd/js/bootstrap.js')}}"></script>
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="{{asset('frontEnd/js/jquery.smartmenus.js')}}"></script>
<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="{{asset('frontEnd/js/jquery.smartmenus.bootstrap.js')}}"></script>
<!-- To Slider JS -->
<script src="{{asset('frontEnd/js/sequence.js')}}"></script>
<script src="{{asset('frontEnd/js/sequence-theme.modern-slide-in.js')}}"></script>
<!-- Product view slider -->
<script type="text/javascript" src="{{asset('frontEnd/js/jquery.simpleGallery.js')}}"></script>
<script type="text/javascript" src="{{asset('frontEnd/js/jquery.simpleLens.js')}}"></script>
<!-- slick slider -->
<script type="text/javascript" src="{{asset('frontEnd/js/slick.js')}}"></script>
<!-- Price picker slider -->
<script type="text/javascript" src="{{asset('frontEnd/js/nouislider.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('frontEnd/js/custom.js')}}"></script>
@stack('js')
</body>
</html>
