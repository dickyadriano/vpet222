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
                                <li class="breadcrumb-item"><a href="{{ route('vaccine.index') }}">Vaccines</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            @foreach($vaccine_data as $row)
                <?php $count = $row->id; ?>
                <div class="col-xl-3 col-lg-4 pb-3">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img class="img-center img-thumbnail" src="{{ asset('img/vaccineImages/'. $row->image) }}" style="width: 240px; height: 240px">
                                    <h5 class="card-title text-black mb-0 mt-1">{{ $row->vaccineName }}</h5>
                                    <span class="h2 font-weight-bold mb-0">@currency($row->vaccinePrice)</span>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 99+</span>
                                <span class="text-nowrap">Order</span>
                            </p>
                            <a href="#" data-target="#detailService<?php echo $count; ?>" data-toggle="modal" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="detailService<?php echo $count; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Vaccine Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden readonly>
                                <input type="number" name="vaccineID" value="{{ $row->id }}" hidden readonly>
                                <input type="text" name="orderType" value="vaccine" hidden readonly>
                                <input type="text" name="orderStatus" value="Pending" hidden readonly>
                                <input type="number" name="orderAmount" value="1" hidden readonly>
                                <input type="number" name="totalPrice" value="{{ $row->vaccinePrice }}" hidden readonly>

                                <div class="modal-body">
                                    <img class="img-center img-thumbnail" src="{{ asset('img/vaccineImages/'. $row->image) }}" style="width: auto; height: auto">
                                    <h1 class="mb-0 bold">{{ $row->vaccineName }}</h1>
                                    <h2 class="text-green">@currency($row->vaccinePrice),-</h2>
                                    <h4 class="text-black text-justify mt-3" style="text-indent: 30px">{{ $row->vaccineDetail }}</h4>
                                    <hr class="my-3" style="border-top: dotted 1px;" />
                                    <h2 class="mb-0 mt-0 bold">Pay First to Order</h2>
                                    <h3 class="mb-0 mt-2 bold text-primary">Attach payment receipt here</h3>
                                    <input type="file" id="receiptImage" name="receiptImage" class="form-control @error('receiptImage') is-invalid @enderror" required>
                                    <h3 class="mb-0 mt-2 bold text-primary">Order Detail</h3>
                                    <textarea class="form-control" rows="5" type="text" name="orderDetail" required autofocus>{{ old('orderDetail') }}</textarea>

                                </div>
                                <div class="modal-footer" style="justify-content: center">
                                    <button type="submit" class="btn btn-primary">Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
