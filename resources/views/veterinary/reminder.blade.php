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
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reminder">Set Reminder</button>

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
