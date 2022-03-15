@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        {{--                        <h6 class="h2 text-white d-inline-block mb-0">Customer</h6>--}}
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('customer-service') }}">Veterinary Service</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-xl-2 col-lg-4 pb-3">
                <div class="card card-stats mb-4 mb-xl-0" style="height: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/1639546957.jpg') }}">
                                <h5 class="card-title text-uppercase text-muted mb-0 mt-1">Drh. Lisa Pink</h5>
                                <span class="h2 font-weight-bold mb-0">------</span>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 99+</span>
                            <span class="text-nowrap">Order</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 pb-3">
                <div class="card card-stats mb-4 mb-xl-0" style="height: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/1639546488.jpg') }}">
                                <h5 class="card-title text-uppercase text-muted mb-0 mt-1">Drh. Jacky Chung</h5>
                                <span class="h2 font-weight-bold mb-0">------</span>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 99+</span>
                            <span class="text-nowrap">Order</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 pb-3">
                <div class="card card-stats mb-4 mb-xl-0" style="height: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/1639551440.jpg') }}">
                                <h5 class="card-title text-uppercase text-muted mb-0 mt-1">Drh. Felix Cley</h5>
                                <span class="h2 font-weight-bold mb-0">------</span>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 99+</span>
                            <span class="text-nowrap">Order</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 pb-3">
                <div class="card card-stats mb-4 mb-xl-0" style="height: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/hae.jpeg') }}">
                                <h5 class="card-title text-uppercase text-muted mb-0 mt-1">Drh. Usman Jaya</h5>
                                <span class="h2 font-weight-bold mb-0">------</span>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 99+</span>
                            <span class="text-nowrap">Order</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 pb-3">
                <div class="card card-stats mb-4 mb-xl-0" style="height: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/1640858248.jpg') }}">
                                <h5 class="card-title text-uppercase text-muted mb-0 mt-1">Drh. Siti Nam</h5>
                                <span class="h2 font-weight-bold mb-0">------</span>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 99+</span>
                            <span class="text-nowrap">Order</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 pb-3">
                <div class="card card-stats mb-4 mb-xl-0" style="height: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/jisoo.jpg') }}">
                                <h5 class="card-title text-uppercase text-muted mb-0 mt-1">Drh. Joy</h5>
                                <span class="h2 font-weight-bold mb-0">------</span>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 99+</span>
                            <span class="text-nowrap">Order</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
