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
                                <div class="row" style="justify-content: right">
                                    @if($row->orderStatus == 'Accepted')
                                        <button class="user_info btn btn-twitter" id="{{ $order->id }}" data-toggle="modal" data-target="#consultation_chat">Do Consultation with Doctor</button>
                                    @elseif($row->orderStatus == 'Completed')
                                        <button type="button" class="btn btn-facebook mr-3" data-toggle="modal" data-target="#reviewService">Review Service</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Consultation --}}
                    <div class="modal fade bd-example-modal-lg" id="consultation_chat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Consultation</h4>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="card" id="messages">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Review Service --}}
                    <div class="modal fade" id="reviewService" tabindex="-1" role="dialog" aria-labelledby="reviewServiceTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden>
                                        <input type="number" name="serviceID" value="{{ $row->serviceID }}" hidden>
                                        <div class="form-group">
                                            <label for="rate">Rate</label>
                                            <select name="rate" class="form-control" id="rate">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control form-control-alternative" rows="3" placeholder="Write a review here ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{--VACCINE--}}
                @foreach($vaccine_data as $row)
                    @php
                        $tableOrder = DB::table('orders')
                            ->join('vaccines', 'orders.vaccineID', '=', 'vaccines.id')
                            ->join('users', 'vaccines.userID', '=', 'users.id')
                            ->where('orders.vaccineID', '=', $row->vaccineID)->get();

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
                                        <img class="img-center userImg150" src="{{ asset('img/vaccineImages/'. $row->image) }}">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title h2 mb-0">{{ $order->vaccineName }}</h5>
                                        <span class="h2 font-weight-bold mb-0">@currency($row->totalPrice),-</span>
                                    </div>
                                    <div class="col-auto">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Status</h5>
                                        <span class="badge badge-pill {{ ($row->orderStatus === 'Delivered') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $row->orderStatus }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $order->name }}</strong> </span>
                                    <span class="text-nowrap"></span>
                                </p>
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
                                <div class="row" style="justify-content: right">
                                    <div class="col">
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $seller->name }}</strong> </span>
                                            <span class="text-nowrap"></span>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        @if($row->orderStatus == 'Completed')
                                            <button type="button" class="btn btn-facebook mr-3" data-toggle="modal" data-target="#reviewProduct">Review Service</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Review Product --}}
                    <div class="modal fade" id="reviewProduct" tabindex="-1" role="dialog" aria-labelledby="reviewProductTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden>
                                        <input type="number" name="productID" value="{{ $row->productID }}" hidden>
                                        <input type="text" name="orderType" value="{{ $row->orderType }}" hidden>
                                        <div class="form-group">
                                            <label for="rate">Rate</label>
                                            <select name="rate" class="form-control" id="rate">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control form-control-alternative" rows="3" placeholder="Write a review here ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
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
                                <div class="row" style="justify-content: right">
                                    <div class="col">
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $seller->name }}</strong> </span>
                                            <span class="text-nowrap"></span>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        @if($row->orderStatus == 'Completed')
                                            <button type="button" class="btn btn-facebook mr-3" data-toggle="modal" data-target="#reviewMedicine">Review Service</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Review Medicine --}}
                    <div class="modal fade" id="reviewMedicine" tabindex="-1" role="dialog" aria-labelledby="reviewMedicineTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden>
                                        <input type="number" name="medicineID" value="{{ $row->medicineID }}" hidden>
                                        <input type="text" name="orderType" value="{{ $row->orderType }}" hidden>
                                        <div class="form-group">
                                            <label for="rate">Rate</label>
                                            <select name="rate" class="form-control" id="rate">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control form-control-alternative" rows="3" placeholder="Write a review here ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
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
                                <div class="row" style="justify-content: right">
                                    <div class="col">
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $seller->name }}</strong> </span>
                                            <span class="text-nowrap"></span>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        @if($row->orderStatus == 'Completed')
                                            <button type="button" class="btn btn-facebook mr-3" data-toggle="modal" data-target="#reviewPetCare">Review Service</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Review Pet Care --}}
                    <div class="modal fade" id="reviewPetCare" tabindex="-1" role="dialog" aria-labelledby="reviewPetCareTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden>
                                        <input type="number" name="petCareID" value="{{ $row->petCareID }}" hidden>
                                        <input type="text" name="orderType" value="{{ $row->orderType }}" hidden>
                                        <div class="form-group">
                                            <label for="rate">Rate</label>
                                            <select name="rate" class="form-control" id="rate">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control form-control-alternative" rows="3" placeholder="Write a review here ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
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
                                <div class="row" style="justify-content: right">
                                    <div class="col">
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <span class="text-nowrap mr-2">From: <strong class="text-primary">{{ $seller->name }}</strong> </span>
                                            <span class="text-nowrap"></span>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        @if($row->orderStatus == 'Completed')
                                            <button type="button" class="btn btn-facebook mr-3" data-toggle="modal" data-target="#reviewGrooming">Review Service</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Review Grooming --}}
                    <div class="modal fade" id="reviewGrooming" tabindex="-1" role="dialog" aria-labelledby="reviewGroomingTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden>
                                        <input type="number" name="groomingID" value="{{ $row->groomingID }}" hidden>
                                        <input type="text" name="orderType" value="{{ $row->orderType }}" hidden>
                                        <div class="form-group">
                                            <label for="rate">Rate</label>
                                            <select name="rate" class="form-control" id="rate">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control form-control-alternative" rows="3" placeholder="Write a review here ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
