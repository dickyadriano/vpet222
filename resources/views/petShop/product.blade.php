@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-6">
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
                        <a href="#" class="btn btn-sm btn-neutral">
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
                <tr>
                    <td>1</td>
                    <td>Wiskas</td>
                    <td>100</td>
                    <td>Rp. 125.000,00</td>
                    <td>Wiskas.jpg</td>
                    <td>
                        <button class="btn btn-success">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Proplan</td>
                    <td>50</td>
                    <td>Rp. 90.000,00</td>
                    <td>Proplan.jpg</td>
                    <td>
                        <button class="btn btn-success">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Royal Canin Kitten</td>
                    <td>75</td>
                    <td>Rp. 130.000,00</td>
                    <td>Royal_Canin_Kitten.jpg</td>
                    <td>
                        <button class="btn btn-success">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
