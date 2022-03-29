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
                                <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Veterinary Service</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('service.index') }}" class="btn btn-sm btn-neutral">Veterinary</a>
                        <a href="#" class="btn btn-sm btn-neutral">Grooming</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            @foreach($petCare_data as $row)
                <?php $count = $row->id; ?>
                <div class="col-xl-2 col-lg-4 pb-3">
                    <div class="card card-stats mb-4 mb-xl-0 modal24">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img class="img-center img-thumbnail" src="{{ asset('img/careImages/'. $row->image) }}">
                                    <h5 class="card-title text-uppercase text-muted mb-0 mt-1">{{ $row->packageName }}</h5>

                                    <span class="h2 font-weight-bold mb-0">@currency($row->price),-</span>
                                </div>
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
                                            <img class="img-center img-thumbnail" src="{{ asset('img/careImages/'. $row->image) }}">
                                        </div>
                                        <div class="col">
                                            <h5 class="modal-title">{{ $row->packageName }}</h5>
                                            <span class="h2 font-weight-bold mb-0">@currency($row->price),-</span>
                                            <span class="container">
                                                <h4 class="text-gray pt-4">detail{{--{{ $row['detail'] }}--}}</h4>
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
