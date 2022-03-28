@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <?php
    use App\Http\Controllers\ProductController;
    $total = ProductController::cartItem();
    ?>
    <div id="ex4" class="action" data-toggle="modal" data-target="#cart">
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

                <form action="{{ route('order.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @foreach($productInCart_data as $row)
                            <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden readonly>
                            <input type="number" name="productID" value="{{ $row->id }}" hidden readonly>
                            <input type="number" name="medicineID" value="0" hidden readonly>
                            <input type="text" name="image" value="{{ $row->image }}" hidden readonly>
                            <input type="text" name="orderDetail" value="-" hidden readonly>
                            <input type="text" name="orderType" value="product" hidden readonly>
                            <input type="text" name="orderStatus" value="Wait for Payment" hidden readonly>
                            <input type="number" name="orderAmount" value="{{ $row->orderAmount }}" hidden readonly>
                            <input type="number" name="totalPrice" value="{{ ($row->orderAmount * $row->price) }}" hidden readonly>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <img class="img-thumbnail userImg150" src="{{ asset('img/productImage/'. $row->image) }}">
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
                                            <a href="{{ route('cart.delete', ['cartId' => $row->cartId]) }}" type="submit" name="delete" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="cashOut" class="btn btn-primary">Cash Out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Marketplace</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('customer.index') }}" class="btn btn-sm btn-neutral">Pet Needs</a>
                        <a href="{{ route('medicine.index') }}" class="btn btn-sm btn-neutral">Medicine</a>
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
                    <div class="card card-stats mb-4 mb-xl-0 modal24">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img class="img-center img-thumbnail" src="{{ asset('img/productImage/'. $row['image']) }}">
                                    <h5 class="card-title text-uppercase text-muted mb-0 mt-1">{{ $row['productName'] }}</h5>

                                    <span class="h2 font-weight-bold mb-0">@currency($row->price),-</span>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100</span>
                                <span class="text-nowrap">Sold</span>
                            </p>
                            <a href="#" data-target="#detailProduct<?php echo $count; ?>" data-toggle="modal" class="stretched-link"></a>
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
                                <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden readonly>
                                <input type="number" name="productID" value="{{ $row->id }}" hidden readonly>
                                <input type="text" name="orderType" value="product" hidden readonly>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <img class="img-center img-thumbnail" src="{{ asset('img/productImage/'. $row['image']) }}">
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
