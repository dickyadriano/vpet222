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
                                <li class="breadcrumb-item"><a href="{{ route('petCare.index') }}">Animal Care</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-body">
                        <form action="{{ route('petCare.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" placeholder="User ID" type="number" name="userID" value="{{ Auth::user()->id }}" required hidden readonly>

                            <div class="row align-items-center mb-3">
                                <div class="col">
                                    <h4 class="text-uppercase text-success ls-1 mb-1">Add Animal Care Package</h4>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Package Name</h6>
                                    <input class="form-control" placeholder="Package Name" type="text" name="packageName" required autofocus>                            </div>
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Price</h6>
                                    <input class="form-control" placeholder="Price" type="number" name="price" required autofocus>
                                </div>
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Image</h6>
                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Package Detail</h6>
                                    <div class="input-group">
                                        <textarea class="form-control" rows="3" aria-label="With textarea" name="packageDetail"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center mb-0">
                                <button type="submit" class="btn btn-success" id="submit_button">Create Package</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 table-responsive">
        <table class="table align-items-center">
            <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="id">Package Id</th>
                <th scope="col" class="sort" data-sort="name">Package Name</th>
                <th scope="col" class="sort" data-sort="image">Package Price</th>
                <th scope="col" class="sort" data-sort="image">Image</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody class="list">
            @foreach($show as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->packageName}}</td>
                    <td>@currency($row->price),-</td>
                    <td>
                        <img src="{{asset('img/careImages/'.$row->image)}}" alt="" style="width: 50px">
                    </td>
                    <td class="align-middle">
                        <div class="row">
                            <a href="{{ route('petCare.edit', $row->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{route('petCare.destroy', $row->id)}}" method="post" onclick="return confirm('Are you sure want to delete this Information?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection