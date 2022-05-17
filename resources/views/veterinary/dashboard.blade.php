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
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-body">
                        @php
                            $data_vetService = DB::table('services')
                                ->where('services.userID', '=', Auth::user()->id)
                                ->get();

                            $vet = new \App\Models\Service();
                            foreach ($data_vetService as $data){
                                $vet = $data;
                            }
                        @endphp
                        @if($vet->verificationStatus == 'Verified' || $vet->verificationStatus == 'Pending')
                            <div class="row align-items-center mb-2">
                                <div class="col">
                                    <h4 class="text-uppercase text-info ls-1 mb-1">Verification of Veterinary Services</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="row align-items-center mb-4">
                                        <div class="col-6">
                                            <h6 class="text-uppercase text-light ls-1 mb-1">Name</h6>
                                            <h2 class="text-cyan mb-0">{{ auth()->user()->name }}</h2>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-uppercase text-light ls-1 mb-1">Service Price</h6>
                                            <h2 class="text-white mb-0">@currency($data->price),-</h2>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h6 class="text-uppercase text-light ls-1 mb-1">Status</h6>
                                            <span class="badge badge-pill {{ ($vet->verificationStatus === 'Verified') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $vet->verificationStatus }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Description</h6>
                                    <h4 class="text-white mb-0">{{ $vet->detail }}</h4>
                                </div>
                                <div class="col-2">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">ID Card</h6>
                                    <img class="img-thumbnail userImg200" src="{{ asset('img/vetImage/idCard/'. $vet->idCard) }}">
                                </div>
                                <div class="col-2">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Veterinary License</h6>
                                    <img class="img-thumbnail userImg200" src="{{ asset('img/vetImage/license/'. $vet->vetLicense) }}">
                                </div>
                            </div>

                            {{--                                 <div class="col-1 justify-content-center align-self-center">--}}
                            {{--                                    <div class="row justify-content-center align-self-center" >--}}
                            {{--                                        <button class="btn btn-success" data-toggle="modal" data-target="#editVet">Edit</button>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}



                            {{--                             MODAL --}}
                            {{--                            <div class="modal fade text-left" id="editVet" tabindex="-1" role="dialog" aria-hidden="true">--}}
                            {{--                                <div class="modal-dialog modal-lg" role="document">--}}
                            {{--                                    <div class="modal-content">--}}
                            {{--                                        <div class="modal-header">--}}
                            {{--                                            <h4 class="modal-title">{{__('Edit Vet') }}</h4>--}}
                            {{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                            {{--                                                <span aria-hidden="true">&times;</span>--}}
                            {{--                                            </button>--}}

                            {{--                                        </div>--}}
                            {{--                                        <div class="modal-body">--}}
                            {{--                                            <form action="{{route('update-vet', $data->userID)}}" method="POST" enctype="multipart/form-data">--}}
                            {{--                                                @csrf--}}
                            {{--                                                @method('put')--}}
                            {{--                                                <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden>--}}
                            {{--                                                <input type="text" name="verificationStatus" value="{{ "Pending" }}" hidden>--}}
                            {{--                                                <input type="text" name="serviceName" value="{{ Auth::user()->name }}" hidden>--}}
                            {{--                                                <input type="text" name="image" value="{{ Auth::user()->avatar }}" hidden>--}}

                            {{--                                                <div class="form-group">--}}
                            {{--                                                    Service Price--}}
                            {{--                                                    <div class="input-group input-group-alternative mb-3">--}}
                            {{--                                                        <div class="input-group-prepend">--}}
                            {{--                                                            <span class="input-group-text"><i class="ni ni-ungroup"></i></span>--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <input class="form-control" placeholder="Service Price" min="1" type="number" name="price" value="{{ $data->price }}" required autofocus>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}

                            {{--                                                <div class="form-group">--}}
                            {{--                                                    <label for="idCard">ID Card</label>--}}
                            {{--                                                    <input type="file" id="idCard" name="idCard" class="form-control" @error('image') value="{{ $data->idCard }}" is-invalid @enderror>--}}

                            {{--                                                    @error('image')--}}
                            {{--                                                    <span class="text-danger">{{ $message }}</span>--}}
                            {{--                                                    @enderror--}}
                            {{--                                                </div>--}}

                            {{--                                                <div class="form-group">--}}
                            {{--                                                    <label for="vetLicense">Veterinary License</label>--}}
                            {{--                                                    <input type="file" id="vetLicense" name="vetLicense" class="form-control" @error('image') value="{{ $data->vetLicense }}" is-invalid @enderror>--}}

                            {{--                                                    @error('image')--}}
                            {{--                                                    <span class="text-danger">{{ $message }}</span>--}}
                            {{--                                                    @enderror--}}
                            {{--                                                </div>--}}

                            {{--                                                <div class="form-group">--}}
                            {{--                                                    Description--}}
                            {{--                                                    <div class="input-group input-group-alternative mb-3">--}}
                            {{--                                                        <div class="input-group-prepend">--}}
                            {{--                                                            <span class="input-group-text"><i class="ni ni-ungroup"></i></span>--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <textarea class="form-control" rows="5" placeholder="Description" type="text" name="detail" required autofocus>{{ $data->detail }}</textarea>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}

                            {{--                                                <div class="form-group text-center">--}}
                            {{--                                                    <button type="submit" class="btn btn-primary mt-4" id="submit_button">Edit Vet Data</button>--}}
                            {{--                                                </div>--}}
                            {{--                                                @if (session('success'))--}}
                            {{--                                                    <div class="alert alert-success" role="alert">--}}
                            {{--                                                        {{ session('success') }}--}}
                            {{--                                                    </div>--}}
                            {{--                                                @endif--}}
                            {{--                                            </form>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        @else
                            <form action="{{ route('vet.index') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="number" name="userID" value="{{ Auth::user()->id }}" hidden>
                                <input type="text" name="verificationStatus" value="{{ "Pending" }}" hidden>
                                <input type="text" name="serviceName" value="{{ Auth::user()->name }}" hidden>
                                <input type="text" name="image" value="{{ Auth::user()->avatar }}" hidden>


                                <div class="row align-items-center mb-3">
                                    <div class="col">
                                        <h4 class="text-uppercase text-info ls-1 mb-1">Verification of Veterinary Services</h4>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-3">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">Name</h6>
                                        <h2 class="text-cyan mb-0">{{ auth()->user()->name }}</h2>
                                    </div>
                                    <div class="col-2">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">Service Price</h6>
                                        <input type="number" id="price" name="price" class="form-control" placeholder="Service Price">
                                    </div>
                                    <div class="col-3">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">ID Card</h6>
                                        <input type="file" id="idCard" name="idCard" class="form-control @error('image') is-invalid @enderror">
                                    </div>
                                    <div class="col-3">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">Veterinary License</h6>
                                        <input type="file" id="vetLicense" name="vetLicense" class="form-control @error('image') is-invalid @enderror">
                                    </div>
                                    <div class="col-1">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">Status</h6>
                                        <span class="badge badge-pill badge-warning badge-lg">Pending</span>
                                    </div>

                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-11">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">Description</h6>
                                        <div class="input-group">
                                            <textarea class="form-control" name="detail"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
