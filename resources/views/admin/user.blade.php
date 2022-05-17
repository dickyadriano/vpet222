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
                    <th scope="col">Profile Picture</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="name">Username</th>
                    <th scope="col" class="sort" data-sort="name">Email</th>
                    <th scope="col" class="sort" data-sort="name">Phone No</th>
                    <th scope="col" class="sort" data-sort="name">Role</th>
                    <th scope="col">Control</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($data_user as $data_u)
                    @if($data_u->type != 'admin')
                        <tr>
                            <td><img alt="Image placeholder" src="{{ asset('argon/argon/img/theme/' . $data_u['avatar']) }}" class="userImg rounded" ></td>
                            <td >{{ $data_u['name'] }}</td>
                            <td>{{ $data_u['username'] }}</td>
                            <td>{{ $data_u['email'] }}</td>
                            <td>{{ $data_u['phoneNo'] }}</td>
                            <td>{{ $data_u['type'] }}</td>
                            <td class="align-middle">
                                <div class="row">
                                    <form action="/users/{{ $data_u->id }}" method="post" onclick="return confirm('Are you sure want to delete this user?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

