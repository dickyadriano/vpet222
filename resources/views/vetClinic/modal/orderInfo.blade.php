@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')

    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Order Detail</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-vetClinic') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Order Detail</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-6">
        <form action="{{route('product.update', $order->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @php
                $tableMedicine = DB::table('medicines')->where('id', '=', $order->medicineID)->get();
                $tableUser = DB::table('users')->where('id', '=', $order->userID)->get();

                $medicine = new \App\Models\Product();
                foreach ($tableMedicine as $data){
                    $medicine = $data;
                }

                $user = new \App\Models\User();
                foreach ($tableUser as $data){
                    $user = $data;
                }
            @endphp
            <div class="form-group row" >
                <div class="col text-center">
                    <img src="{{asset('img/medicineImage/'.$medicine->image)}}" class="rounded" style="width: 200px">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    Medicine Name
                    <div class="input-group input-group-alternative">
                        <input class="form-control text-blue" value="{{ $medicine->medicineName }}" required autofocus disabled>
                    </div>
                </div>
                <div class="col">
                    Customer Name
                    <div class="input-group input-group-alternative">
                        <input class="form-control text-blue" value="{{ $user->name }}" required autofocus disabled>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    Order Amount
                    <div class="input-group input-group-alternative">
                        <input class="form-control text-blue" value="{{ $order->orderAmount }}" disabled required autofocus>
                    </div>
                </div>
                <div class="col">
                    Status
                    <div class="input-group input-group-alternative">
                        <input class="form-control text-blue" value="{{ $order->orderStatus }}" disabled required autofocus>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    Order Detail
                    <div class="input-group input-group-alternative">
                        <textarea class="form-control text-blue" disabled required autofocus>{{ $order->orderDetail }}</textarea>
                    </div>
                </div>
            </div>

            {{--            <div class="form-group">--}}
            {{--                @csrf--}}
            {{--                <label for="image">Product Picture</label>--}}
            {{--                <input type="file" id="image" name="image" class="form-control @error('image') value="{{ $order->orderAmount }}" is-invalid @enderror">--}}

            {{--                @error('image')--}}
            {{--                <span class="text-danger">{{ $message }}</span>--}}
            {{--                @enderror--}}
            {{--            </div>--}}

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </form>
    </div>
@endsection
