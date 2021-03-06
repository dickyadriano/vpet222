@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    @include('petShop.modal.addProduct')

    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Manage Product</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-petShop') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('petShop-product') }}">Manage Product</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#ModalAdd">
                            <i class="fas fa-plus"></i> Add Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 table-responsive">
        <table class="table align-items-center">
            <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="id">Product Id</th>
                <th scope="col" class="sort" data-sort="name">Product Name</th>
                <th scope="col" class="sort" data-sort="qty">QTY</th>
                <th scope="col" class="sort" data-sort="qty">Price/unit</th>
                <th scope="col" class="sort" data-sort="qty">Picture</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody class="list">
            @foreach($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->productName}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>@currency($row->price),-</td>
                    <td>
                        <img src="{{asset('img/productImage/'.$row->image)}}" class="userImg rounded">
                    </td>
                    <td class="align-middle">
                        <div class="row">
                            <a href="{{ route('product.edit', $row->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{route('product.destroy', $row->id)}}" method="post" onclick="return confirm('Are you sure want to delete this user?')">
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
