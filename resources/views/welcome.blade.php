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
            <a class="navbar-brand" href="http://127.0.0.1:8000/home">
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
                        @if(auth()->user()->type == 'admin')
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('dashboard-admin') }}">
                                    <i class="ni ni-planet"></i>
                                    <span class="nav-link-inner--text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('admin-profile', Auth::user()->id) }}">
                                    <i class="ni ni-single-02"></i>
                                    <span class="nav-link-inner--text">Profile</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'customer')
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('dashboard-customer') }}">
                                    <i class="ni ni-planet"></i>
                                    <span class="nav-link-inner--text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('customer-profile', Auth::user()->id) }}">
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

                        @elseif(auth()->user()->type == 'vetClinic')
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('dashboard-vetClinic') }}">
                                    <i class="ni ni-planet"></i>
                                    <span class="nav-link-inner--text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('vetClinic-profile', Auth::user()->id) }}">
                                    <i class="ni ni-single-02"></i>
                                    <span class="nav-link-inner--text">Profile</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'petShop')
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('dashboard-petShop') }}">
                                    <i class="ni ni-planet"></i>
                                    <span class="nav-link-inner--text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('petShop-profile', Auth::user()->id) }}">
                                    <i class="ni ni-single-02"></i>
                                    <span class="nav-link-inner--text">Profile</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'veterinary')
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('dashboard-veterinary') }}">
                                    <i class="ni ni-planet"></i>
                                    <span class="nav-link-inner--text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ route('veterinary-profile', Auth::user()->id) }}">
                                    <i class="ni ni-single-02"></i>
                                    <span class="nav-link-inner--text">Profile</span>
                                </a>
                            </li>
                        @endif
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
</div>

{{--<div class="section section-components pb-0" id="section-components">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-12">--}}
{{--                <!-- Basic elements -->--}}
{{--                <h2 class="mb-5">--}}
{{--                    <span>Basic Elements</span>--}}
{{--                </h2>--}}
{{--                <!-- Buttons -->--}}
{{--                <h3 class="h4 text-success font-weight-bold mb-4">Buttons</h3>--}}
{{--                <!-- Button colors -->--}}
{{--                <div class="mb-3 mt-5">--}}
{{--                    <small class="text-uppercase font-weight-bold">Pick your color</small>--}}
{{--                </div>--}}
{{--                <button type="button" class="btn btn-primary">Primary</button>--}}
{{--                <button type="button" class="btn btn-info">Info</button>--}}
{{--                <button type="button" class="btn btn-success">Success</button>--}}
{{--                <button type="button" class="btn btn-danger">Danger</button>--}}
{{--                <button type="button" class="btn btn-warning">Warning</button>--}}
{{--                <button type="button" class="btn btn-default">Default</button>--}}
{{--                <button type="button" class="btn btn-secondary">Secondary</button>--}}
{{--                <div class="mb-3 mt-5">--}}
{{--                    <small class="text-uppercase font-weight-bold">Rounded</small>--}}
{{--                </div>--}}
{{--                <button type="button" class="btn btn-primary btn-round">Primary</button>--}}
{{--                <button type="button" class="btn btn-info btn-round">Info</button>--}}
{{--                <button type="button" class="btn btn-success btn-round">Success</button>--}}
{{--                <button type="button" class="btn btn-danger btn-round">Danger</button>--}}
{{--                <button type="button" class="btn btn-warning btn-round">Warning</button>--}}
{{--                <button type="button" class="btn btn-default btn-round">Default</button>--}}
{{--                <button type="button" class="btn btn-secondary btn-round">Secondary</button>--}}
{{--                <div class="mb-3 mt-5">--}}
{{--                    <small class="text-uppercase font-weight-bold">Outline</small>--}}
{{--                </div>--}}
{{--                <button type="button" class="btn btn-outline-primary">Primary</button>--}}
{{--                <button type="button" class="btn btn-outline-info">Info</button>--}}
{{--                <button type="button" class="btn btn-outline-success">Success</button>--}}
{{--                <button type="button" class="btn btn-outline-danger">Danger</button>--}}
{{--                <button type="button" class="btn btn-outline-warning">Warning</button>--}}
{{--                <button type="button" class="btn btn-outline-default">Default</button>--}}
{{--                <button type="button" class="btn btn-outline-secondary">Secondary</button>--}}
{{--                <div class="mb-3 mt-5">--}}
{{--                    <small class="text-uppercase font-weight-bold">Outline Rounded</small>--}}
{{--                </div>--}}
{{--                <button type="button" class="btn btn-outline-primary btn-round">Primary</button>--}}
{{--                <button type="button" class="btn btn-outline-info btn-round">Info</button>--}}
{{--                <button type="button" class="btn btn-outline-success btn-round">Success</button>--}}
{{--                <button type="button" class="btn btn-outline-danger btn-round">Danger</button>--}}
{{--                <button type="button" class="btn btn-outline-warning btn-round">Warning</button>--}}
{{--                <button type="button" class="btn btn-outline-default btn-round">Default</button>--}}
{{--                <button type="button" class="btn btn-outline-secondary btn-round">Secondary</button>--}}
{{--                <!-- Button links -->--}}
{{--                <div class="mb-3 mt-5">--}}
{{--                    <small class="text-uppercase font-weight-bold">Links</small>--}}
{{--                </div>--}}
{{--                <button type="button" class="btn btn-link text-primary">Primary</button>--}}
{{--                <button type="button" class="btn btn-link text-info">Info</button>--}}
{{--                <button type="button" class="btn btn-link text-success">Success</button>--}}
{{--                <button type="button" class="btn btn-link text-danger">Danger</button>--}}
{{--                <button type="button" class="btn btn-link text-warning">Warning</button>--}}
{{--                <button type="button" class="btn btn-link text-default">Default</button>--}}
{{--                <button type="button" class="btn btn-link text-secondary">Secondary</button>--}}
{{--                <!-- Button styles -->--}}
{{--                <div>--}}
{{--                    <div class="mb-3 mt-5">--}}
{{--                        <small class="text-uppercase font-weight-bold">Pick your style</small>--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-primary" type="button">Button</button>--}}
{{--                    <button class="btn btn-icon btn-3 btn-primary" type="button">--}}
{{--                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>--}}
{{--                        <span class="btn-inner--text">Left icon</span>--}}
{{--                    </button>--}}
{{--                    <button class="btn btn-icon btn-3 btn-primary" type="button">--}}
{{--                        <span class="btn-inner--text">Right icon</span>--}}
{{--                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>--}}
{{--                    </button>--}}
{{--                    <button class="btn btn-icon btn-primary" type="button">--}}
{{--                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>--}}
{{--                    </button>--}}
{{--                    <!-- Button sizes -->--}}
{{--                    <div class="mb-3 mt-5">--}}
{{--                        <small class="text-uppercase font-weight-bold">Pick your size</small>--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-sm btn-primary" type="button">Small</button>--}}
{{--                    <button class="btn btn-1 btn-primary" type="button">Regular</button>--}}
{{--                    <button class="btn btn-lg btn-primary" type="button">Large Button</button>--}}
{{--                    <div class="mb-3 mt-5">--}}
{{--                        <small class="text-uppercase font-weight-bold">Floating</small>--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-sm btn-primary btn-icon-only rounded-circle" type="button">--}}
{{--                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>--}}
{{--                    </button>--}}
{{--                    <button class="btn btn-primary btn-icon-only rounded-circle" type="button">--}}
{{--                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>--}}
{{--                    </button>--}}
{{--                    <button class="btn btn-lg btn-primary btn-icon-only rounded-circle" type="button">--}}
{{--                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="mb-3 mt-5">--}}
{{--                            <small class="text-uppercase font-weight-bold">Active & Disabled</small>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <button class="btn btn-primary btn-block active" type="button">Active</button>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <button class="btn btn-primary btn-block disabled" type="button">Disabled</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="mb-3 mt-5">--}}
{{--                            <small class="text-uppercase font-weight-bold">Block Level</small>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <button class="btn btn-primary btn-block" type="button">Primary</button>--}}
{{--                            <button class="btn btn-info btn-block" type="button">Info</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Back to top button -->--}}
{{--                <button class="btn btn-primary btn-icon-only back-to-top" type="button" name="button">--}}
{{--                    <i class="ni ni-bold-up"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

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
</body>
</html>
