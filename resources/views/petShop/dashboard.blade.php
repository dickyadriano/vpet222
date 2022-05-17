@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Pet Shop</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-petShop') }}">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
          $product = DB::table('products')
               ->join('users', 'products.userID', '=', 'users.id')
               ->count();
          $orderPending = DB::table('orders')
               ->join('products', 'orders.productID', '=', 'products.id')
               ->join('users', 'products.userID', '=', 'users.id')
               ->where('users.id', '=', Auth::user()->id)
               ->where('orders.orderStatus', '=', 'Pending')
               ->count();
          $orderInProgress = DB::table('orders')
               ->join('products', 'orders.productID', '=', 'products.id')
               ->join('users', 'products.userID', '=', 'users.id')
               ->where('users.id', '=', Auth::user()->id)
               ->where('orders.orderStatus', '=', 'Accepted')
               ->count();
          $orderCompleted = DB::table('orders')
               ->join('products', 'orders.productID', '=', 'products.id')
               ->join('users', 'products.userID', '=', 'users.id')
               ->where('users.id', '=', Auth::user()->id)
               ->where('orders.orderStatus', '=', 'Completed')
               ->count();
          $orderReviewed = DB::table('orders')
               ->join('products', 'orders.productID', '=', 'products.id')
               ->join('users', 'products.userID', '=', 'users.id')
               ->where('users.id', '=', Auth::user()->id)
               ->where('orders.orderStatus', '=', 'Reviewed')
               ->count();
    @endphp
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card card-stats bg-gradient-default mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-white mb-0">Products</h5>
                                <span class="h2 font-weight-bold text-white mb-0">{{ $product }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                                    <i class="fas fa-box"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card card-stats bg-gradient-default mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-white mb-0">Pending Orders</h5>
                                <span class="h2 font-weight-bold text-white mb-0">{{ $orderPending }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card card-stats bg-gradient-default mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-white mb-0">In Progress Orders</h5>
                                <span class="h2 font-weight-bold text-white mb-0">{{ $orderInProgress }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-truck"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card card-stats bg-gradient-default mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-white mb-0">Completed Orders</h5>
                                <span class="h2 font-weight-bold text-white mb-0">{{ $orderCompleted }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card card-stats bg-gradient-default mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-white mb-0">Reviewed Orders</h5>
                                <span class="h2 font-weight-bold text-white mb-0">{{ $orderReviewed }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-comment"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
