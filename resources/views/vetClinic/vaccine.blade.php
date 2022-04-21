@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    @include('vetClinic.modal.addVaccine')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Manage Vaccines</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-vetClinic') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('vaccine.index') }}">Manage Vaccine</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#ModalAddVaccine">
                            <i class="fas fa-plus"></i> Add Vaccine
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
                <th scope="col" class="sort" data-sort="id">Vaccine Id</th>
                <th scope="col" class="sort" data-sort="name">Vaccine Name</th>
                <th scope="col" class="sort" data-sort="qty">Stock</th>
                <th scope="col" class="sort" data-sort="price">Price/vaccine</th>
                <th scope="col" class="sort" data-sort="picture">Picture</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody class="list">

            @foreach($show as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->vaccineName}}</td>
                    <td>{{$row->stock}}</td>
                    <td>@currency($row->vaccinePrice),00-</td>
                    <td>
                        <img src="{{asset('img/vaccineImages/'.$row->image)}}" class="userImg rounded">
                    </td>
                    <td class="align-middle">
                        <div class="row">
                            <a href="{{ route('vaccine.edit', $row->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{route('vaccine.destroy', $row->id)}}" method="post" onclick="return confirm('Are you sure want to delete this Vaccine?')">
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
