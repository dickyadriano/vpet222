@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $showInfo = DB::table('information')->get();
    @endphp
    @foreach($showInfo as $row)
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-gradient-indigo shadow">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-3 align-middle">
                                    <img src="{{asset('img/informationImages/'.$row->image)}}" style="width: 200px; height: 200px;">
                                </div>
                                <div class="col-9">
                                    <h4 class="text-uppercase text-success mb-3">{{$row->title}}</h4>
                                    <h4 class="text-white">{{$row->information}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
