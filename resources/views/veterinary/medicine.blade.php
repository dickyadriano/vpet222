@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <?php
    use App\Http\Controllers\MedicineController;
    $total = MedicineController::cartItem();
    ?>
    <!-- CART -->
    <div id="ex4" class="action" data-toggle="modal" data-target="#medicineCart">
        <span class="p1 fa-stack fa-2x has-badge" data-count="{{$total}}">
            <i class="p3 fa fa-cart-plus fa-stack-1x xfa-inverse" data-count="4"></i>
        </span>
    </div>
    {{-- CART MODAL --}}
    <div class="modal fade bd-example-modal-lg" id="medicineCart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Your Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                /*$dataId = array();*/
                @endphp
                    <div class="modal-body">
                        @foreach($medicineInCart_data as $row)

                            <div class="card border">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <img class="img-thumbnail userImg150" src="{{ asset('img/medicineImage/'. $row->image) }}">
                                        </div>
                                        <div class="col">
                                            <h4 class="text-black">{{ $row->medicineName }}</h4>
                                            <span class="h4 font-weight-bold">@currency($row->medicinePrice),-</span>
                                            <span class="container">
                                            <h3 class="text-gray pt-1">x{{ $row->orderAmount }}</h3>
                                        </span>
                                        </div>
                                        <div class="col">
                                            <h3 class="text-gray pt-0">Total Price</h3>
                                            <h3 class="text-gray">@currency($row->orderAmount * $row->medicinePrice),-</h3>
                                        </div>
                                        <div class="col centerCol">
                                            <a href="{{ route('cart.delete', ['cartId' => $row->cartId]) }}" type="submit" name="delete" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                <form action="{{route('cart_update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-footer row">
                        <div class="col pt-3">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <select name='userID' class="form-control" required>
                                        <option value="" hidden selected>Share to Customers</option>
                                        @foreach($data_users as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="cashOut" class="btn btn-primary">Share to Customer Cart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('medicine.index') }}">Create Medicine Recipe</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            @foreach($data_medicine as $row)
                <?php $count = $row->id; ?>
                <div class="col-xl-2 col-lg-4 pb-3">
                    <div class="card card-stats">
                        <div class="card-body m-lg-0 m-sm-2 m-md-8">
                            <div class="row">
                                <div class="col">
                                    <img class="img-center img-thumbnail" src="{{ asset('img/medicineImage/'. $row['image']) }}">
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="card-title text-uppercase text-black mb-0 mt-1">{{ $row['medicineName'] }}</h5>
                            </div>
                            <div class="row">
                                <span class="h2 font-weight-bold mb-0">@currency($row->medicinePrice),-</span>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100</span>
                                <span class="text-nowrap">Sold</span>
                            </p>
                            <a href="#" data-target="#detailMedicine<?php echo $count; ?>" data-toggle="modal" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <!-- DETAIL MODAL -->
                <div class="modal fade" id="detailMedicine<?php echo $count; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden readonly>
                                <input type="number" name="medicineID" value="{{ $row->id }}" hidden readonly>
                                <input type="text" name="orderType" value="medicine" hidden readonly>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <img class="img-center img-thumbnail" src="{{ asset('img/medicineImage/'. $row['image']) }}">
                                        </div>
                                        <div class="col">
                                            <h5 class="modal-title">{{ $row['medicineName'] }}</h5>
                                            <span class="h2 font-weight-bold mb-0">@currency($row->medicinePrice),-</span>
                                            <span class="container">
                                                <h4 class="text-black pt-4">{{ $row['medicineDetail'] }}</h4>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative mb-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="QTY" value="1" type="number" name="orderAmount" required autofocus>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
