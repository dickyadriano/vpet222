@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Veterinary</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('reminder.index') }}">Reminder</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('order.index') }}" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#reminder">
                            Set Reminder
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            @foreach($data_reminderVet as $data)
                <div class="col-xl-3 col-md-4 col-sm-6 mb-5 mb-xl-0">
                    <div class="card bg-gradient-purple shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="text-uppercase text-white ls-1 mb-3">{{ $data->title }}</h4>
                                    <h1 class="text-warning ls-1 mb-3">
                                        @php
                                            $date = strtotime($data->timeReminder);
                                            $remaining = $date - time();
                                            $days_remaining = floor($remaining / 86400);
                                            if ($days_remaining >= 0){
                                                echo "$days_remaining Days Left";
                                            }
                                            else{
                                                echo "Overdue";
                                            }
                                        @endphp
                                    </h1>
                                    <h2 class="text-uppercase text-success ls-1 mb-0">{{ date("Y-m-d",strtotime($data->timeReminder)) }}</h2>
{{--                                    <h6 class="text-white ls-1 mb-1"></h6>--}}
                                </div>
                                <div class="col-6 centerCol">
                                    <h5 class="text-info ls-1 mb-1">{{ str_replace('~', "|", $data->description) }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Modal -->
        <div class="modal fade" id="reminder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="{{ route('reminder.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="number" class="form-control" name="userId">
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
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title of Reminder">
                            </div>
                            <div class="form-group">
                                <label for="timeReminder">Date</label>
                                <input type="datetime-local" class="form-control" name="timeReminder" id="timeReminder">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Break Text With '~'. Example: Name: A ~ Type: Pet"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Reminder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
