@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Order</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-petShop') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Orders</a></li>
                            </ol>
                        </nav>
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
                <th scope="col" class="sort" data-sort="customer">Customer ID</th>
                <th scope="col" class="sort" data-sort="amount">Order Amount</th>
                <th scope="col" class="sort" data-sort="detail">Order Detail</th>
                <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody class="list">
            @foreach($show as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->groomingName}}</td>
                    <td>@currency($row->price),-</td>
                    <td>
                        <img src="{{asset('img/groomingImages/'.$row->image)}}" class="userImg rounded">
                    </td>
                    <td class="align-middle">
                        <div class="row">
                            <a href="{{ route('grooming.edit', $row->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{route('grooming.destroy', $row->id)}}" method="post" onclick="return confirm('Are you sure want to delete this Grooming?')">
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
