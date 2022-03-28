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
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-customer') }}">Marketplace</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('customer.index') }}" class="btn btn-sm btn-neutral">Pet Needs</a>
                        <a href="{{ route('customer-medicine') }}" class="btn btn-sm btn-neutral">Medicine</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            <?php $count = 0; ?>
            @foreach($data_medicine as $row)
                <div class="col-xl-2 col-lg-4 pb-3">
                    <div class="card card-stats mb-4 mb-xl-0 modal24">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img class="img-center img-thumbnail" src="{{ asset('img/medicineImage/'. $row['image']) }}">
                                    <h5 class="card-title text-uppercase text-muted mb-0 mt-1">{{ $row['medicineName'] }}</h5>

                                    <span class="h2 font-weight-bold mb-0">@currency($row->medicinePrice),-</span>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100</span>
                                <span class="text-nowrap">Sold</span>
                            </p>
                            <a href="#" data-target="#detailMedicine<?php echo $count; ?>" data-toggle="modal" class="stretched-link">More Detail</a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="detailMedicine<?php echo $count; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <img class="img-center img-thumbnail" src="{{ asset('img/medicineImage/'. $row['image']) }}">
                                    </div>
                                    <div class="col">
                                        <h5 class="modal-title">{{ $row['medicineName'] }}</h5>
                                        <span class="h2 font-weight-bold mb-0">@currency($row->medicinePrice),-</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Add To Cart</button>
                                <button type="button" class="btn btn-primary">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $count++; ?>
            @endforeach
        </div>
    </div>
@endsection
