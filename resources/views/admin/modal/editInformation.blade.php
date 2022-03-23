@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')

    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Manage Information</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Manage Information</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-6">
        <form action="{{route('information.update', $information->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                Title
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-basket"></i></span>
                    </div>
                    <input class="form-control" placeholder="Title" type="text" name="title"
                           value="{{ $information->title }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                Information
                <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                    </div>
                    <input class="form-control" placeholder="Information" type="text" name="information" value="{{ $information->information }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                @csrf
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control @error('image') value="{{ $information->image }}" is-invalid @enderror">

                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mt-4" id="submit_button">Edit Product</button>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </form>
    </div>
@endsection
