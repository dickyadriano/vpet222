@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Manage User</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin-user') }}">Manage User</a></li>
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
                    <th scope="col"></th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="name">Username</th>
                    <th scope="col" class="sort" data-sort="name">Email</th>
                    <th scope="col" class="sort" data-sort="name">Phone No</th>
                    <th scope="col" class="sort" data-sort="name">Role</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($data_user as $data_u)
                    <tr>
                        <td><img alt="Image placeholder" src="{{ asset('argon/argon/img/theme/' . $data_u['avatar']) }}" class="userImg rounded" ></td>
                        <td value>{{ $data_u['name'] }}</td>
                        <td>{{ $data_u['username'] }}</td>
                        <td>{{ $data_u['email'] }}</td>
                        <td>{{ $data_u['phoneNo'] }}</td>
                        <td>{{ $data_u['type'] }}</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <button class="dropdown-item btn btn-info shadow-none" data-toggle="modal" data-target=".bd-example-modal-lg">Info</button>
                                    <form action="/users/{{ $data_u->id }}" method="post" onclick="return confirm('Are you sure want to delete this user?')">
                                        @method('delete')
                                        @csrf
                                        <button class="dropdown-item btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">User Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Product Sold : 10
                                    <br>
                                    Sell Product : 10

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

