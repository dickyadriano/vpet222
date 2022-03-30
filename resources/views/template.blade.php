<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>VPet</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('argon/assets/img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/vpet.css')}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('css/assets/css/argon.css?v=1.2.0')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/argonv2.css?v=1.2.1')}}" type="text/css">
    <!-- MapBox -->
    @livewireStyles
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
</head>

<body>
<style>
    #marker {
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }

    .mapboxgl-popup {
        max-width: 200px;
    }
</style>
<!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
@include('layouts.navbars.sidebar')
<!-- Main content -->
<div class="main-content" id="panel">
    @yield('main-content')
    {{ isset($slot) ? $slot : null }}
</div>
<!-- Core -->
<script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Optional JS -->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc8AhtzX7FckbDu9H9-ot1pBgPR3tq_L0"></script>--}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc8AhtzX7FckbDu9H9-ot1pBgPR3tq_L0&callback=initMap&libraries=&v=weekly" defer></script>
<!-- Argon JS -->
<script src="{{asset('argon/assets/js/argon.js?v=1.2.0')}}"></script>
<!-- MapBox -->
{{--<script src='{{asset('js/vpet.js')}}'></script>--}}

<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
@livewireScripts
@stack('scripts')
</body>

</html>
