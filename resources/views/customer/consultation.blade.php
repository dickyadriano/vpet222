@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')

    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xl-8 chat">
                <input type="text" name="username" id="username" value="{{ Auth::user()->name }}" disabled>
                    @foreach($users as $user)
                        <button class="user_info" id="{{ $user->id }}">
                            <span class="bg-danger" >{{ $user->name }}</span>
                        </button>
                    @endforeach
                <div class="card" id="messages">

                </div>
            </div>
        </div>
    </div>
@endsection
