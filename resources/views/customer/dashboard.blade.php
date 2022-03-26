@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <?php
    use App\Http\Controllers\ProductController;
    $total = ProductController::cartItem();
    ?>
    <div id="ex4" class="action {{--{{ ($title === 'Customer Dashboard') || ($title === 'Veterinary Service') ? '' : 'hidden' }}--}}" data-toggle="modal" data-target="#cart">
        <span class="p1 fa-stack fa-2x has-badge" data-count="{{$total}}">
            <i class="p3 fa fa-cart-plus fa-stack-1x xfa-inverse" data-count="4"></i>
        </span>
    </div>

    <div class="modal fade bd-example-modal-lg" id="cart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Your's Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($products_data as $row)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <img class="img-thumbnail userImg150" src="{{ asset('argon/argon/img/theme/'. $row->image) }}">
                                    </div>
                                    <div class="col">
                                        <h4 class="text-black">{{ $row->productName }}</h4>
                                        <span class="h4 font-weight-bold">@currency($row->price),-</span>
                                        <span class="container">
                                            <h3 class="text-gray pt-1">x{{ $row->orderAmount }}</h3>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-gray pt-0">Total Price</h3>
                                        <h3 class="text-gray">@currency($row->orderAmount * $row->price),-</h3>
                                    </div>
                                    <div class="col centerCol">
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Cash Out</button>
                </div>
            </div>
        </div>
    </div>
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
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-customer') }}">Marketplace</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">Medicine</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            @foreach($data_product as $row)
                <?php $count = $row->id; ?>
                <div class="col-xl-2 col-lg-4 pb-3">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/'. $row['image']) }}">
                                    <h5 class="card-title text-uppercase text-muted mb-0 mt-1">{{ $row['productName'] }}</h5>

                                    <span class="h2 font-weight-bold mb-0">@currency($row->price),-</span>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100</span>
                                <span class="text-nowrap">Sold</span>
                            </p>
                            <a href="#" data-target="#detailProduct<?php echo $count; ?>" data-toggle="modal" class="stretched-link">More Detail</a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="detailProduct<?php echo $count; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <input class="form-control" type="number" name="userID" value="{{ Auth::user()->id }}" required hidden readonly>
                                <input class="form-control" type="number" name="productID" value="{{ $row['id'] }}" required hidden readonly>
                                <input class="form-control" type="number" name="medicineID" value="0" required hidden readonly>
                                <input class="form-control" type="number" name="groomingID" value="0" required hidden readonly>
                                <input class="form-control" type="number" name="petCareID" value="0" required hidden readonly>
                                <input class="form-control" type="text" name="note" value="-" required hidden readonly>
                                <input class="form-control" type="text" name="orderType" value="product" required hidden readonly>
                                <input class="form-control" type="text" name="orderStatus" value="Wait for Payment" required hidden readonly>
                                <input class="form-control" type="text" name="orderDetail" value="Wait for Payment" required hidden readonly>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/'. $row['image']) }}">
                                        </div>
                                        <div class="col">
                                            <h5 class="modal-title">{{ $row['productName'] }}</h5>
                                            <span class="h2 font-weight-bold mb-0">@currency($row->price),-</span>
                                            <span class="container">
                                                <h4 class="text-gray pt-4">{{ $row['detail'] }}</h4>
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
                                            <input class="form-control" placeholder="QTY" type="number" name="orderAmount" required autofocus>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                                    <button type="" class="btn btn-primary">Buy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
