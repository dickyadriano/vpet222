@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Order History</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-petShop') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Orders</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('order.index') }}" class="btn btn-sm btn-neutral">Order List</a>
                        <a href="{{ route('orderHistory') }}" class="btn btn-sm btn-neutral active">Product Order History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 table-responsive">
        <table class="table align-items-center">
            <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="id">Order ID</th>
                <th scope="col" class="sort" data-sort="customer">Customer Username</th>
                <th scope="col" class="sort" data-sort="customer">Product Name</th>
                <th scope="col" class="sort" data-sort="amount">Order Amount</th>
                <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody class="list">
            @foreach($show as $row)
                @php
                    $tableUser = DB::table('users')->where('id', '=', $row->userID)->get();

                    $user = new \App\Models\User();
                    foreach ($tableUser as $data){
                        $user = $data;
                    }
                @endphp
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$row->productName}}</td>
                    <td>{{$row->orderAmount}}</td>
                    <td>
                        <span class="badge badge-pill {{ ($row->orderStatus === 'Completed') ? 'badge-success' : 'badge-warning' }}">{{ $row->orderStatus }}</span>
                    </td>
                    <td class="align-middle">
                        <div class="row">
                            <a href="{{ route('order.show', $row->id) }}" class="btn btn-primary">Info</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
