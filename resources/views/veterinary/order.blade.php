@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Order List</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-veterinary') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Orders</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('order.index') }}" class="btn btn-sm btn-neutral active">
                            Service Order List
                        </a>
                        <a href="{{ route('orderHistory') }}" class="btn btn-sm btn-neutral">
                            Service Order History
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
                <th scope="col" class="sort" data-sort="id">Order ID</th>
                <th scope="col" class="sort" data-sort="customer">Customer Username</th>
                <th scope="col" class="sort" data-sort="customer">Service Name</th>
                <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody class="list">
            @foreach($showService as $row)
                @php
                    $tableUser = DB::table('users')->where('id', '=', $row->userID)->get();

                    $user = new \App\Models\User();
                    foreach ($tableUser as $data){
                        $user = $data;
                    }
                @endphp
                @if($row->orderStatus == 'Accepted')
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$row->serviceName}}</td>
                        <td><span class="badge badge-pill badge-primary">{{$row->orderStatus}}</span></td>
                        <td class="align-middle">
                            <div class="row">
                                <form action="{{ route('order.update', $row->id) }}" method="post" class="mx-1">
                                    @csrf
                                    @method('put')
                                    <input name="orderStatus" value="{{'Completed'}}" type="text" hidden readonly required>
                                    <button class="btn btn-success">Complete</button>
                                </form>
                                <button class="user_info btn btn-twitter" id="{{ $user->id }}" data-toggle="modal" data-target="#consultation_chat">Chat Customer</button>
                            </div>
                        </td>
                    </tr>
                    {{-- Modal Consultation --}}
                    <div class="modal fade bd-example-modal-lg" id="consultation_chat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Consultation</h4>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-11 col-xl-11">
                                        <div class="card" id="messages">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt--5 p-3 justify-content-center">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-google-plus" data-toggle="modal" data-target="#reminder">Set Reminder</button>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-facebook" href="{{route('medicine.index')}}">Create Medicine Recipe</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Reminder --}}
                    <div class="modal fade" id="reminder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('reminder.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="number" class="form-control" name="userId" value="{{ $user->id }}" hidden>
                                    <input type="text" class="form-control" name="createdBy" value="{{ Auth::user()->name }}" hidden>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Set Reminder</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Title of Reminder" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="timeReminder">Date</label>
                                            <input type="datetime-local" class="form-control" name="timeReminder" id="timeReminder" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="Break Text With '~'. Example: Name: A ~ Type: Pet" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save Reminder</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
