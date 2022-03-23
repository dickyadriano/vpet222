@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Pet Shop</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-petShop') }}">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
{{--                    <div class="col-lg-6 col-5 text-right">--}}
{{--                        <a href="#" class="btn btn-sm btn-neutral">New</a>--}}
{{--                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col">
                                <h4 class="text-uppercase text-success ls-1 mb-1">Assign for Animal Care and Grooming</h4>
                            </div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Name</h6>
                                <h2 class="text-white mb-0">{{ auth()->user()->name }}</h2>
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Services</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" id="animalCare">
                                    <label class="form-check-label text-white-50" for="animalCare">
                                        Animal Care
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" id="grooming">
                                    <label class="form-check-label text-white-50" for="grooming">
                                        Grooming
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Description</h6>
                                <div class="input-group">
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
