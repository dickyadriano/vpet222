@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Payment Verification</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('orderHistory') }}">Payment History</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('order.index') }}" class="btn btn-sm btn-neutral">
                            Payment Verification
                        </a>
                        <a href="{{ route('orderHistory') }}" class="btn btn-sm btn-neutral {{ Request::is('petShop/orderHistory') ? 'active' : '' }}">
                            Payment History
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 table-responsive">
        <table class="table align-items-center">
            <thead class="thead-light">
            <?php
            $data_sort = null;

            foreach ($payment_data as $data){
                $data_sort = $data;
            }
            ?>
            <tr>
                <th scope="col" class="sort" data-sort="<?php $data_sort; ?>">Customer Name</th>
                <th scope="col" class="sort" data-sort="<?php $data_sort; ?>">Seller Name</th>
                <th scope="col" class="sort" data-sort="name">Total Price</th>
                <th scope="col" class="sort" data-sort="name">Order Type</th>
                <th scope="col">Payment Receipt</th>
                <th scope="col" class="sort" data-sort="name">Verification Status</th>
{{--                <th scope="col">Control</th>--}}

            </tr>
            </thead>
            <tbody class="list">
            @foreach($payment_data as $row)
                <?php
                $count = $row->id;

                if ($row->productID != 0){
                    $payment = DB::table('products')
                        ->join('users', 'products.userID', '=', 'users.id')
                        ->where('products.id', '=', $row->productID)->first();
                }
                if ($row->medicineID != 0){
                    $payment = DB::table('medicines')
                        ->join('users', 'medicines.userID', '=', 'users.id')
                        ->where('medicines.id', '=', $row->medicineID)->first();
                }
                if ($row->serviceID != 0){
                    $payment = DB::table('services')
                        ->join('users', 'services.userID', '=', 'users.id')
                        ->where('services.id', '=', $row->serviceID)->first();
                }
                if ($row->groomingID != 0){
                    $payment = DB::table('groomings')
                        ->join('users', 'groomings.userID', '=', 'users.id')
                        ->where('groomings.id', '=', $row->groomingID)->first();
                }
                if ($row->petCareID != 0){
                    $payment = DB::table('pet_cares')
                        ->join('users', 'pet_cares.userID', '=', 'users.id')
                        ->where('pet_cares.id', '=', $row->petCareID)->first();
                }
                if ($row->vaccineID != 0){
                    $payment = DB::table('vaccines')
                        ->join('users', 'vaccines.userID', '=', 'users.id')
                        ->where('vaccines.id', '=', $row->vaccineID)->first();
                }

                ?>
                @if($row->orderStatus != 'Pending')
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $payment->name }}</td>
                        <td>@currency($row->totalPrice),-</td>
                        <td>{{ $row->orderType }}</td>
                        <td>
                            <a class="cursor-pointer" data-toggle="modal" data-target="#modalPaymentReceipt<?php echo $count; ?>">
                                <img src="{{ asset('img/orderImages/' . $row->receiptImage) }}" class="userImg100 rounded">
                            </a>
                        </td>
                        <td><span class="badge badge-pill {{ ($row->orderStatus === 'Accepted') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $row->orderStatus }}</span></td>
{{--                        <td class="align-middle">--}}
{{--                            <div class="row">--}}
{{--                                <form action="{{route('update-statusOrder', $row->id)}}" method="POST" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
{{--                                    <input type="text" name="orderStatus" value="Accepted" required hidden readonly>--}}
{{--                                    <input type="text" name="id" value="{{ $row->id }}" required hidden readonly>--}}
{{--                                    <button type="submit" class="btn btn-success m-1" >Accept</button>--}}
{{--                                </form>--}}

{{--                                <form action="{{route('update-statusOrder', $row->id)}}" method="POST" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
{{--                                    <input type="text" name="orderStatus" value="Rejected" required hidden readonly>--}}
{{--                                    <input type="text" name="id" value="{{ $row->id }}" required hidden readonly>--}}
{{--                                    <button type="submit" class="btn btn-danger m-1" >Reject</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </td>--}}

                    </tr>
                @endif
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="modalPaymentReceipt<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="modalPaymentReceipt" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Payment Receipt</h5>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('img/orderImages/' . $row->receiptImage) }}" class="rounded max-image">
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection

