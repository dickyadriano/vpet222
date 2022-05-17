@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-vetClinic') }}">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $medicine = DB::table('medicines')
             ->join('users', 'medicines.userID', '=', 'users.id')
             ->count();
        $vaccine = DB::table('vaccines')
             ->join('users', 'vaccines.userID', '=', 'users.id')
             ->count();
        $orderPendingM = DB::table('orders')
             ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
             ->join('users', 'medicines.userID', '=', 'users.id')
             ->where('users.id', '=', Auth::user()->id)
             ->where('orders.orderStatus', '=', 'Pending')
             ->count();
        $orderInProgressM = DB::table('orders')
             ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
             ->join('users', 'medicines.userID', '=', 'users.id')
             ->where('users.id', '=', Auth::user()->id)
             ->where('orders.orderStatus', '=', 'Accepted')
             ->count();
        $orderCompletedM = DB::table('orders')
             ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
             ->join('users', 'medicines.userID', '=', 'users.id')
             ->where('users.id', '=', Auth::user()->id)
             ->where('orders.orderStatus', '=', 'Completed')
             ->count();
        $orderReviewedM = DB::table('orders')
             ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
             ->join('users', 'medicines.userID', '=', 'users.id')
             ->where('users.id', '=', Auth::user()->id)
             ->where('orders.orderStatus', '=', 'Reviewed')
             ->count();
        $orderPendingV = DB::table('orders')
             ->join('vaccines', 'orders.vaccineID', '=', 'vaccines.id')
             ->join('users', 'vaccines.userID', '=', 'users.id')
             ->where('users.id', '=', Auth::user()->id)
             ->where('orders.orderStatus', '=', 'Pending')
             ->count();
        $orderInProgressV = DB::table('orders')
             ->join('vaccines', 'orders.vaccineID', '=', 'vaccines.id')
             ->join('users', 'vaccines.userID', '=', 'users.id')
             ->where('users.id', '=', Auth::user()->id)
             ->where('orders.orderStatus', '=', 'Accepted')
             ->count();
        $orderCompletedV = DB::table('orders')
             ->join('vaccines', 'orders.vaccineID', '=', 'vaccines.id')
             ->join('users', 'vaccines.userID', '=', 'users.id')
             ->where('users.id', '=', Auth::user()->id)
             ->where('orders.orderStatus', '=', 'Completed')
             ->count();
        $orderReviewedV = DB::table('orders')
             ->join('vaccines', 'orders.vaccineID', '=', 'vaccines.id')
             ->join('users', 'vaccines.userID', '=', 'users.id')
             ->where('users.id', '=', Auth::user()->id)
             ->where('orders.orderStatus', '=', 'Reviewed')
             ->count();

        $orderPending = $orderPendingM + $orderPendingV;
        $orderInProgress = $orderInProgressM + $orderInProgressV;
        $orderCompleted = $orderCompletedM + $orderCompletedV;
        $orderReviewed = $orderReviewedM + $orderReviewedV;
    @endphp
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-xl-3 col-lg-6 mb-4">
                <div class="card card-stats bg-gradient-default mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-white mb-0">Medicines</h5>
                                <span class="h2 font-weight-bold text-white mb-0">{{ $medicine }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fas fa-capsules"></i>
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
                                <h5 class="card-title text-uppercase text-white mb-0">Vaccines</h5>
                                <span class="h2 font-weight-bold text-white mb-0">{{ $vaccine }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="fas fa-syringe"></i>
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
