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
                                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Order</a></li>
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
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                {{-- SERVICES --}}
                @foreach($service_data as $row)
                    @php
                        $tableOrder = DB::table('orders')
                            ->join('services', 'orders.serviceID', '=', 'services.id')
                            ->join('users', 'services.userID', '=', 'users.id')
                            ->where('orders.serviceID', '=', $row->serviceID)->get();

                        $order = new \App\Models\Order();
                        foreach ($tableOrder as $data){
                            $order = $data;
                        }
                    @endphp
                    <div class="col-xl-4 col-lg-4 mb-3">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row text-uppercase mb-2">
                                    <strong>{{ $row->orderType }}</strong>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <img class="img-center userImg150" src="{{ asset('argon/argon/img/theme/'. $row->image) }}">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title h2 mb-0">{{ $order->name }}</h5>
                                        <span class="h2 font-weight-bold mb-0">@currency($row->totalPrice),-</span>
                                    </div>
                                    <div class="col-auto">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Status</h5>
                                        <span class="badge badge-pill {{ ($row->orderStatus === 'Delivered') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $row->orderStatus }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-twitter ">Consultation</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- PRODUCTS --}}
                @foreach($product_data as $row)
                    @php
                        $tableSeller = DB::table('orders')
                            ->join('products', 'orders.productID', '=', 'products.id')
                            ->join('users', 'products.userID', '=', 'users.id')
                            ->where('orders.productID', '=', $row->productID)->get();

                        $seller = new \App\Models\Order();
                        foreach ($tableSeller as $data){
                            $seller = $data;
                        }
                    @endphp
                    <div class="col-xl-4 col-lg-4 mb-3">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row text-uppercase mb-2">
                                    <strong>{{ $row->orderType }}</strong>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <img class="img-center userImg150" src="{{ asset('argon/argon/img/theme/'. $row->image) }}">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title text-uppercase h2 mb-0">{{ $row->productName }}</h5>
                                        <span class="h2 font-weight-bold mb-0">@currency($row->totalPrice),-</span>
                                    </div>
                                    <div class="col-auto">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Status</h5>
                                        <span class="badge badge-pill {{ ($row->orderStatus === 'Delivered') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $row->orderStatus }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $seller->name }}</strong> </span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- MEDICINE --}}
                @foreach($medicine_data as $row)
                    @php
                        $tableSeller = DB::table('orders')
                            ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
                            ->join('users', 'medicines.userID', '=', 'users.id')
                            ->where('orders.medicineID', '=', $row->medicineID)->get();

                        $seller = new \App\Models\Order();
                        foreach ($tableSeller as $data){
                            $seller = $data;
                        }
                    @endphp
                    <div class="col-xl-4 col-lg-4 mb-3">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row text-uppercase mb-2">
                                    <strong>{{ $row->orderType }}</strong>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <img class="img-center userImg150" src="{{ asset('img/medicineImage/'. $row->image) }}">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title text-uppercase h2 mb-0">{{ $row->medicineName }}</h5>
                                        <span class="h2 font-weight-bold mb-0">@currency($row->totalPrice),-</span>
                                    </div>
                                    <div class="col-auto">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Status</h5>
                                        <span class="badge badge-pill {{ ($row->orderStatus === 'Delivered') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $row->orderStatus }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $seller->name }}</strong></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- Pet Care --}}
                @foreach($petCare_data as $row)
                    @php
                        $tableSeller = DB::table('orders')
                            ->join('pet_cares', 'orders.petCareID', '=', 'pet_cares.id')
                            ->join('users', 'pet_cares.userID', '=', 'users.id')
                            ->where('orders.petCareID', '=', $row->petCareID)->get();

                        $seller = new \App\Models\Order();
                        foreach ($tableSeller as $data){
                            $seller = $data;
                        }
                    @endphp
                    <div class="col-xl-4 col-lg-4 mb-3">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row text-uppercase mb-2">
                                    <strong>{{ $row->orderType }}</strong>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <img class="img-center userImg150" src="{{ asset('img/careImages/'. $row->image) }}">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title text-uppercase h2 mb-0">{{ $row->packageName }}</h5>
                                        <span class="h2 font-weight-bold mb-0">@currency($row->totalPrice),-</span>
                                    </div>
                                    <div class="col-auto">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Status</h5>
                                        <span class="badge badge-pill {{ ($row->orderStatus === 'Delivered') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $row->orderStatus }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $seller->name }}</strong></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($grooming_data as $row)
                    @php
                        $tableSeller = DB::table('orders')
                            ->join('groomings', 'orders.groomingID', '=', 'groomings.id')
                            ->join('users', 'groomings.userID', '=', 'users.id')
                            ->where('orders.groomingID', '=', $row->groomingID)->get();

                        $seller = new \App\Models\Order();
                        foreach ($tableSeller as $data){
                            $seller = $data;
                        }
                    @endphp
                    <div class="col-xl-4 col-lg-4 mb-3">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row text-uppercase mb-2">
                                    <strong>{{ $row->orderType }}</strong>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <img class="img-center userImg150" src="{{ asset('img/groomingImages/'. $row->image) }}">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title text-uppercase h2 mb-0">{{ $row->groomingName }}</h5>
                                        <span class="h2 font-weight-bold mb-0">@currency($row->totalPrice),-</span>
                                    </div>
                                    <div class="col-auto">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Status</h5>
                                        <span class="badge badge-pill {{ ($row->orderStatus === 'Delivered') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $row->orderStatus }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $seller->name }}</strong></span>
                                    <span class="text-nowrap"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
