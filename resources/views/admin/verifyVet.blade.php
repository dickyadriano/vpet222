@extends('template')

@section('main-content')
    @include('layouts.navbars.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Veterinary Verification</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Vet Verification</a></li>
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
            <?php
                $data_sort = null;
                foreach ($vet_data as $data){
                    $data_sort = $data;
                }
            ?>
            <tr>
                <th scope="col">Profile Picture</th>
                <th scope="col" class="sort" data-sort="<?php $data_sort; ?>">Name</th>
                <th scope="col" class="sort" data-sort="name">Price</th>
                <th scope="col">ID Card</th>
                <th scope="col">Vet License</th>
                <th scope="col" class="sort" data-sort="name">Verification Status</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody class="list">
            @foreach($vet_data as $row)
                <?php $count = $row->id; ?>
                <tr>
                    <td><img alt="Image placeholder" src="{{ asset('argon/argon/img/theme/' . $row->avatar) }}" class="userImg rounded" ></td>
                    <td>{{ $row->name }}</td>
                    <td>@currency($row->price),-</td>
                    <td>
                        <a class="cursor-pointer" data-toggle="modal" data-target="#modalIdCard<?php echo $count; ?>">
                            <img src="{{ asset('img/vetImage/idCard/' . $row->idCard) }}" class="userImg100 rounded" >
                        </a>
                    </td>
                    <td>
                        <a class="cursor-pointer" data-toggle="modal" data-target="#modalVetLicense<?php echo $count; ?>">
                            <img src="{{ asset('img/vetImage/license/' . $row->vetLicense) }}" class="userImg100 rounded">
                        </a>
                    </td>
                    <td><span class="badge badge-pill {{ ($row->verificationStatus === 'Verified') ? 'badge-success' : 'badge-warning' }} badge-lg">{{ $row->verificationStatus }}</span></td>
                    <td class="align-middle">
                        <div class="row">
                            <form action="{{route('update-statusVet', $row->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="verificationStatus" value="Verified" required hidden readonly>
                                <input type="text" name="id" value="{{ $row->id }}" required hidden readonly>
                                <button type="submit" class="btn btn-success m-1" >Accept</button>
                            </form>

                            <form action="{{route('update-statusVet', $row->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="verificationStatus" value="Rejected" required hidden readonly>
                                <input type="text" name="id" value="{{ $row->id }}" required hidden readonly>
                                <button type="submit" class="btn btn-danger m-1" >Rejected</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="modalIdCard<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="modalIdCard" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">ID Card</h5>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('img/vetImage/idCard/' . $row->idCard) }}" class="rounded max-image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-lg" id="modalVetLicense<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="modalVetLicense" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Vet License</h5>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('img/vetImage/license/' . $row->vetLicense) }}" class="rounded max-image">
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection

