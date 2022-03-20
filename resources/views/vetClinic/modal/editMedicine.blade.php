@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')

    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Edit Medicine</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-vetClinic') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('vetClinic-medicine') }}">Manage Medicine</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-6">
        <form action="{{route('medicine.update', $medicine->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                Medicine Name
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-basket"></i></span>
                    </div>
                    <input class="form-control" placeholder="Medicine Name" type="text" name="medicineName" value="{{ $medicine->medicineName }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                Medicine Amount
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                    </div>
                    <input class="form-control" placeholder="Medicine Amount" type="number" name="medicineAmount" value="{{ $medicine->medicineAmount }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                Medicine Price
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                    </div>
                    <input class="form-control" placeholder="Medicine Price" type="text" name="medicinePrice" value="{{ $medicine->medicinePrice }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Medicine Picture</label>
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">

                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mt-4" id="submit_button">Edit Medicine</button>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </form>
    </div>
@endsection
