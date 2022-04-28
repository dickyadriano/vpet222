<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="4Ry8UsRfdGyTSXBseYIY396VPGjZKMGg1wF5IbR1">

    <title>Profile</title>
    <!-- Favicon -->
    <link href="{{asset('argon/argon/img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{asset('argon/argon/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('argon/argon/css/argon.css?v=1.0.0')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/argonv2.css?v=1.2.1')}}" type="text/css">
</head>
<body class="">
@include('layouts.navbars.sidebar')

<div class="main-content">
    @include('layouts.navbars.profilenavbar')
    @yield('main-content')
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

<!-- Argon JS -->
<script src="{{asset('argon/assets/js/argon.js?v=1.2.0')}}"></script>
<script src="/js/app.js"></script>
</body>
</html>
