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
    <link rel="stylesheet" href="{{asset('argon/assets/css/argon.css?v=1.2.0')}}" type="text/css">
</head>

<body>
@include('layouts.navbars.sidebar')
<!-- Main content -->
<div class="main-content" id="panel">
    @yield('main-content')

</div>
<div class="action {{ ($title === 'Customer Dashboard') || ($title === 'Veterinary Service') ? '' : 'hidden' }}" data-toggle="modal" data-target="#cart">
    <span>
        <i class="fas fa-cart-plus"></i>
    </span>
{{--    <ul>--}}
{{--        <li>a</li>--}}
{{--        <li>a</li>--}}
{{--        <li>a</li>--}}
{{--    </ul>--}}
</div>

<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Your's Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Argon Scripts -->
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
</body>

</html>
