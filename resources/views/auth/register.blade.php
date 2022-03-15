<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="dONcnX6bpvbrxOQuAO1f9A5t6fi9qzH09QqX7MzU">

    <title>VPet</title>
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
</head>
<body class="bg-default">

<div class="main-content">
    <nav class="bg-gradient-primary navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
            <a class="navbar-brand" href="http://127.0.0.1:8000/">
                <img src="{{asset('argon/argon/img/brand/white.png')}}" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <!-- Navbar items -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="http://127.0.0.1:8000/">
                            <i class="ni ni-atom"></i>
                            <span class="nav-link-inner--text">Home</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="http://127.0.0.1:8000/login">
                            <i class="ni ni-key-25"></i>
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-3">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-15">
                        <img src="{{asset('argon/assets/img/brand/VpetLogo.svg')}}" alt="VPet Logo" height="200" width="200" >
                        <h1 class="text-white">Register and Create VPet Account here</h1>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <b>Fill in the Form Below to Register</b>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-app"></i></span>
                                    </div>
                                    <input class="form-control @error('username') is-invalid @enderror" placeholder="Username" type="text" name="username" value="{{ old('username') }}" required autofocus>

                                    @error('username')
                                    <span class="invalid-feedback text-md-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required>

                                    @error('email')
                                    <span class="invalid-feedback text-md-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-building"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Address" type="text" name="address" value="{{ old('address') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                    </div>
                                    <input class="form-control @error('phoneNo') is-invalid @enderror" placeholder="Phone Number" type="text" name="phoneNo" value="{{ old('phoneNo') }}" required autofocus>

                                    @error('phoneNo')
                                    <span class="invalid-feedback text-md-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" type="password" name="password" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password" type="password" name="password_confirmation" required>

                                    @error('password')
                                    <span class="invalid-feedback text-md-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <select name='type' id='' class="form-control @error('type') is-invalid @enderror">
                                        <option value="" hidden selected>Register As</option>
                                        <option value="customer">Customer</option>
                                        <option value="vetClinic">Vet Clinic</option>
                                        <option value="petShop">Pet Shop</option>
                                        <option value="veterinary">Veterinarian</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback text-md-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <form method="post">
                                <div class="row my-4">
                                    <div class="col-12">
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" id="customCheckRegister" type="checkbox" name="check" onclick="terms_changed(this)" value="1">
                                            <label class="custom-control-label" for="customCheckRegister">
                                                <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4" id="submit_button" disabled>Create account</button>
                                    <script>
                                        function terms_changed(termsCheckBox){
                                            //If the checkbox has been checked
                                            if(termsCheckBox.checked){
                                                //Set the disabled property to FALSE and enable the button.
                                                document.getElementById("submit_button").disabled = false;
                                            } else{
                                                //Otherwise, disable the submit button.
                                                document.getElementById("submit_button").disabled = true;
                                            }
                                        }
                                    </script>
                                </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
        </div>
    </div>
</footer>
<script src="{{asset('argon/argon/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>


<!-- Argon JS -->
<script src="{{asset('argon/argon/js/argon.js?v=1.0.0')}}"></script>
</body>
</html>
