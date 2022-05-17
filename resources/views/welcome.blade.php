<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="TpEkQRog2KZusW8Xj6Vcm0tCXtZYUmWtjltCwbWV">

    <title>VPet</title>
    <!-- Favicon -->
    <link href="{{asset('argon/argon/img/brand/VpetLogo.svg')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{asset('argon/argon/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('argon/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('argon/argon/css/argon.css?v=1.0.0')}}" rel="stylesheet">
</head>
<body class="bg-white">

<div class="main-content">
    <nav class="bg-gradient-primary navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
            <a class="navbar-brand" href="http://127.0.0.1:8000">
                <img src="{{asset('argon/argon/img/brand/white.png')}}" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="bg-gradient-primarycollapse navbar-collapse" id="navbar-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="http://127.0.0.1:8000/home">
                                <img src="{{asset('argon/assets/img/brand/blue.png')}}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Navbar items -->
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check() == null)
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="http://127.0.0.1:8000/register">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">Register</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="http://127.0.0.1:8000/login">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                        </li>
                    @elseif (Auth::check() != null)
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('customer.index') }}">
                                <i class="fa fa-store"></i>
                                <span class="nav-link-inner--text">Marketplace</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('customer.index', Auth::user()->id) }}">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-inner--text">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <span>{{ __('Logout') }}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="header bg-gradient-primary py-7 py-lg-8">

        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <img src="{{asset('argon/assets/img/brand/VpetLogo.svg')}}" alt="VPet Logo" height="200" width="200" >
                        <h1 class="text-white">Welcome to VPet - Find the Vet For Your Pets</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
    <div class="section section-components pb-0" id="section-components">
        <h1 class="mx-4 bold text-indigo">Information, Tips and Tricks</h1>

        @php
            $showInfo = DB::table('information')->get();
        @endphp
        @foreach($showInfo as $row)
            <div class="container-fluid pt-3">
                <div class="row border-top border-bottom">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-2" style="margin-left: auto; margin-right: auto;margin-bottom: auto;margin-top: auto">
                                <img src="{{asset('img/informationImages/'.$row->image)}}" class="rounded" style="width: 150px">
                            </div>
                            <div class="card bg-gradient-indigo shadow col-10">
                                <div class="card-body">
                                    <h4 class="text-uppercase text-success mb-3">{{$row->title}}</h4>
                                    <h4 class="text-white">{{$row->information}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<footer class="py-5">
    <div class="container">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; 2021 <a href="https://www.instagram.com/gus.jaka" class="font-weight-bold ml-1" target="_blank">Gus Jaka</a> &amp;
                    <a href="https://www.instagram.com/dickyadriant0" class="font-weight-bold ml-1" target="_blank">Dicky</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="https://www.instagram.com/editorture/" class="nav-link" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">Help Center</a>
                    </li>
                </ul>
            </div>
        </div>    </div>
</footer>
<script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/assets/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('argon/assets/js/argon.js?v=1.0.0')}}"></script>
<script src="/js/app.js"></script>

</body>
</html>
