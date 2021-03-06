@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('reminder.index') }}">Reminder</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            @foreach($data_reminder as $data)
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
                                    <h6 class="text-white ls-1 mb-1">From: {{$data->createdBy}}</h6>
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
    </div>
{{--    <div class="container-fluid pt-3">--}}
{{--        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
{{--            <ol class="carousel-indicators">--}}
{{--                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
{{--                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
{{--                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
{{--            </ol>--}}
{{--            <div class="carousel-inner">--}}
{{--                <div class="carousel-item active">--}}
{{--                    <img class="d-block w-100" src="{{ asset('img/vetImage/license/pexels-maxime-francis-2246476.jpg') }}">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img class="d-block w-100" src="{{ asset('img/vetImage/license/Screenshot 2022-02-03 151138.png') }}">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img class="d-block w-100" src="{{ asset('img/vetImage/license/977913.jpg') }}">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img class="d-block w-100" src="{{ asset('img/vetImage/license/Screenshot 2022-02-03 151138.png') }}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
{{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Previous</span>--}}
{{--            </a>--}}
{{--            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
{{--                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                <span class="sr-only">Next</span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}



@endsection
