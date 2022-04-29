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
                        <a href="{{route('service.index')}}" class="btn btn-sm btn-neutral active">Veterinary</a>
                        <a href="{{route('petCare.index')}}" class="btn btn-sm btn-neutral">Animal Care</a>
                        <a href="{{route('grooming.index')}}" class="btn btn-sm btn-neutral">Grooming</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            @foreach($vetService_data as $row)
                <?php $count = $row->id; ?>
                <div class="col-xl-3 col-lg-4 pb-3">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/'. $row->avatar) }}">
                                    <h5 class="card-title text-black mb-0 mt-1">{{ $row->name }}</h5>
                                    <span class="h2 font-weight-bold mb-0">@currency($row->price)</span>
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
                                <h5 class="modal-title">Service Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <img class="img-center img-thumbnail" src="{{ asset('argon/argon/img/theme/'. $row->avatar) }}">
                                    </div>
                                    <div class="col">
                                        <h5 class="modal-title">{{ $row->name }}</h5>
                                        <span class="h2 font-weight-bold mb-0">@currency($row->price),-</span>
                                        <span class="container">
                                        <h4 class="text-black pt-4">{{ $row->detail }}</h4>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#detailPayment<?php echo $count; ?>">Pay to Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal Payment--}}
                <div class="modal fade" id="detailPayment<?php echo $count; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Payment Detail</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#detailService<?php echo $count; ?>">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden readonly>
                                <input type="number" name="serviceID" value="{{ $row->id }}" hidden readonly>
                                <input type="text" name="image" value="{{ $row->avatar }}" hidden readonly>
                                <input type="text" name="orderType" value="service" hidden readonly>
                                <input type="text" name="orderStatus" value="Pending" hidden readonly>
                                <input type="number" name="orderAmount" value="1" hidden readonly>
                                <input type="number" name="totalPrice" value="{{ $row->price }}" hidden readonly>

                                <div class="modal-body">
                                    <h2 class="mb-0 mt-0 bold">Transfer Options:</h2>
                                    <div class="row mt-3">
                                        <div class="col-1">
                                            <h3 class="text-left">1. </h3>
                                        </div>
                                        <div class="col-5">
                                            <h3 class="text-left">BNI: <i class="text-green">0808028910</i></h3>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-left">A.Name: <i class="text-green">Ida Bagus Jatem</i></h3>
                                        </div>
                                    </div>
                                    <hr class="my-1" style="border-top: dotted 1px;" />
                                    <div class="row mt-3">
                                        <div class="col-1">
                                            <h3 class="text-left">2. </h3>
                                        </div>
                                        <div class="col-5">
                                            <h3 class="text-left">BCA: <i class="text-green">0808028910</i></h3>
                                        </div>
                                        <div class="col-6">
                                            <h3 class="text-left">A.Name: <i class="text-green">Dicky Adrianto</i></h3>
                                        </div>
                                    </div>
                                    <hr class="my-1" style="border-top: dotted 1px;" />
                                    <h3 class="mb-0 mt-5 bold text-primary">Attach payment receipt here</h3>
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
