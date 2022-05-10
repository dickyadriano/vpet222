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
                                <li class="breadcrumb-item"><a href="{{ route('diagnosis.index') }}">Diagnosis of Diseases</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-inner--text"><strong>Disclaimer,
                The results of this diagnosis are not 100% correct !!!</strong>
                Because the pets cannot tell us how he or she is feeling,
                blood tests or other tests are needed to diagnose illness. Please call/order the vet!!!
            </span>
        </div>
        @if ($message = Session::get('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <span class="alert-inner--text"><strong>{{ $message }}</strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($message = Session::get('sucess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-inner--text">Diagnosis Success !!! &nbsp;<strong class="text-warning">{{ $message }}</strong></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Diagnosis of</h6>
                                <h2 class="text-white mb-0">Diseases</h2>
                            </div>
                            <div class="col-2 pt-3">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <select name='type' id='pets' class="form-control" onchange="showDiv(this)">
                                            <option value="" hidden selected>Type of Pets</option>
                                            <option value="Dog">Dog Symptom</option>
                                            <option value="Cat">Cat Symptom</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center ">
                            <div class="col-12 pt-1 ml-3" id="dogSymptom" style="display:none">
                                <form action="{{ route('diagnosis.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="number" value="{{ Auth::user()->id }}" name="userID" hidden>
                                        <input type="text" value="dog" name="petsType" hidden>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="fever" id="feverDog" name="symptom[]">
                                            <label class="custom-control-label" for="feverDog">
                                                Fever
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="diarrhea" id="diarrheaDog" name="symptom[]">
                                            <label class="custom-control-label" for="diarrheaDog">
                                                Diarrhea
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="vomit" id="vomitDog" name="symptom[]">
                                            <label class="custom-control-label" for="vomitDog">
                                                Vomit
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="limp" id="limpDog" name="symptom[]">
                                            <label class="custom-control-label" for="limpDog">
                                                Limp
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-2">
                                            <input class="custom-control-input" type="checkbox" value="noAppetite" id="noAppetiteDog" name="symptom[]">
                                            <label class="custom-control-label" for="noAppetiteDog">
                                                No Appetite
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="itchy" id="itchyDog" name="symptom[]">
                                            <label class="custom-control-label" for="itchyDog">
                                                Itchy
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-2">
                                            <input class="custom-control-input" type="checkbox" value="hairLoss" id="hairLossDog" name="symptom[]">
                                            <label class="custom-control-label" for="hairLossDog">
                                                Hair Loss
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-2">
                                            <input class="custom-control-input" type="checkbox" value="wateryEyes" id="wateryEyesDog" name="symptom[]">
                                            <label class="custom-control-label" for="wateryEyesDog">
                                                Watery Eyes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row pt-4">
                                        <button class="btn btn-primary" type="submit">Diagnosis</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 pt-1 ml-3" id="catSymptom" style="display:none">
                                <form action="{{ route('diagnosis.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="number" value="{{ Auth::user()->id }}" name="userID" hidden>
                                        <input type="text" value="cat" name="petsType" hidden>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="fever" id="fever" name="symptom[]">
                                            <label class="custom-control-label" for="fever">
                                                Fever
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="diarrhea" id="diarrhea" name="symptom[]">
                                            <label class="custom-control-label" for="diarrhea">
                                                Diarrhea
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="vomit" id="vomit" name="symptom[]">
                                            <label class="custom-control-label" for="vomit">
                                                Vomit
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="flu" id="flu" name="symptom[]">
                                            <label class="custom-control-label" for="flu">
                                                Flu
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="limp" id="limp" name="symptom[]">
                                            <label class="custom-control-label" for="limp">
                                                Limp
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="noAppetite" id="noAppetite" name="symptom[]">
                                            <label class="custom-control-label" for="noAppetite">
                                                No Appetite
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="itchy" id="itchy" name="symptom[]">
                                            <label class="custom-control-label" for="itchy">
                                                Itchy
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="hairLoss" id="hairLoss" name="symptom[]">
                                            <label class="custom-control-label" for="hairLoss">
                                                Hair Loss
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="thrush" id="thrush" name="symptom[]">
                                            <label class="custom-control-label" for="thrush">
                                                Thrush
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox col-md-1">
                                            <input class="custom-control-input" type="checkbox" value="wateryEyes" id="wateryEyes" name="symptom[]">
                                            <label class="custom-control-label" for="wateryEyes">
                                                Watery Eyes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row pt-4">
                                        <button class="btn btn-primary" type="submit">Diagnosis</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-3 table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="id">No</th>
                            <th scope="col" class="sort" data-sort="id">Pet</th>
                            <th scope="col" class="sort" data-sort="name">Symptom</th>
                            <th scope="col" class="sort" data-sort="qty">Diagnosis</th>
                            <th scope="col" class="sort" data-sort="qty">Detail</th>
                            <th scope="col" class="sort" data-sort="qty">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach($resultDiagnosis as $row)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $row->petsType }}</td>
                            <td>{{ $row->symptom }}</td>
                            @if($row->petsType == 'dog')
                                @if($row->symptom == 'fever' || $row->symptom == 'fever, diarrhea' ||
                                    $row->symptom == 'fever, vomit' || $row->symptom == 'fever, limp' ||
                                    $row->symptom == 'fever, noAppetite' || $row->symptom == 'diarrhea, vomit' ||
                                    $row->symptom == 'vomit' || $row->symptom == 'vomit, limp' ||
                                    $row->symptom == 'vomit, noAppetite' || $row->symptom == 'fever, diarrhea, vomit' ||
                                    $row->symptom == 'fever, diarrhea, limp' || $row->symptom == 'fever, diarrhea, noAppetite' ||
                                    $row->symptom == 'fever, vomit, limp' || $row->symptom == 'fever, vomit, noAppetite' ||
                                    $row->symptom == 'diarrhea, vomit, limp' || $row->symptom == 'diarrhea, vomit, noAppetite' ||
                                    $row->symptom == 'vomit, limp, noAppetite' || $row->symptom == 'fever, diarrhea, vomit, limp' ||
                                    $row->symptom == 'fever, diarrhea, vomit, noAppetite' || $row->symptom == 'fever, vomit, limp, noAppetite' ||
                                    $row->symptom == 'diarrhea, vomit, limp, noAppetite' ||
                                    $row->symptom == 'fever, diarrhea, vomit, limp, noAppetite')
                                    @if($row->symptom == 'fever, diarrhea' || $row->symptom == 'fever, vomit' ||
                                        $row->symptom == 'fever, limp' || $row->symptom == 'fever, noAppetite' ||
                                        $row->symptom == 'diarrhea, vomit' || $row->symptom == 'vomit, limp' ||
                                        $row->symptom == 'vomit, noAppetite' || $row->symptom == 'fever, diarrhea, vomit' ||
                                        $row->symptom == 'fever, diarrhea, limp' || $row->symptom == 'fever, diarrhea, noAppetite' ||
                                        $row->symptom == 'fever, vomit, limp' || $row->symptom == 'fever, vomit, noAppetite' ||
                                        $row->symptom == 'diarrhea, vomit, limp' || $row->symptom == 'diarrhea, vomit, noAppetite' ||
                                        $row->symptom == 'vomit, limp, noAppetite' || $row->symptom == 'fever, diarrhea, vomit, limp' ||
                                        $row->symptom == 'fever, diarrhea, vomit, noAppetite' || $row->symptom == 'fever, vomit, limp, noAppetite' ||
                                        $row->symptom == 'diarrhea, vomit, limp, noAppetite' ||
                                        $row->symptom == 'fever, diarrhea, vomit, limp, noAppetite')
                                        @if($row->symptom == 'fever, diarrhea, vomit' || $row->symptom == 'fever, diarrhea, limp' ||
                                            $row->symptom == 'fever, diarrhea, noAppetite' || $row->symptom == 'fever, vomit, limp' ||
                                            $row->symptom == 'fever, vomit, noAppetite' || $row->symptom == 'diarrhea, vomit, limp' ||
                                            $row->symptom == 'diarrhea, vomit, noAppetite' || $row->symptom == 'vomit, limp, noAppetite' ||
                                            $row->symptom == 'fever, diarrhea, vomit, limp' || $row->symptom == 'fever, diarrhea, vomit, noAppetite' ||
                                            $row->symptom == 'fever, vomit, limp, noAppetite' || $row->symptom == 'diarrhea, vomit, limp, noAppetite' ||
                                            $row->symptom == 'fever, diarrhea, vomit, limp, noAppetite')
                                            @if($row->symptom == 'fever, diarrhea, vomit, limp' || $row->symptom == 'fever, diarrhea, vomit, noAppetite' ||
                                                $row->symptom == 'fever, vomit, limp, noAppetite' || $row->symptom == 'diarrhea, vomit, limp, noAppetite' ||
                                                $row->symptom == 'fever, diarrhea, vomit, limp, noAppetite')
                                                @if($row->symptom == 'fever, diarrhea, vomit, limp, noAppetite')
                                                    <td>
                                                        <span class="text-warning mr-2">Possibly one or more of:</span><br>
                                                        <span class="text-success mr-2">¹›100%</span>of Canine Parvo Virus <br>
                                                        <span class="text-success mr-2">²›100%</span>of Canine Corona Virus <br>
                                                        <span class="text-success mr-2">³›100%</span>of Enteritis <br>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="text-success mr-2">¹›80%</span>of Canine Parvo Virus <br>
                                                        <span class="text-success mr-2">²›80%</span>of Canine Corona Virus <br>
                                                        <span class="text-success mr-2">³›80%</span>of Enteritis <br>
                                                    </td>
                                                @endif
                                            @else
                                                <td>
                                                    <span class="text-success mr-2">¹›60%</span>of Canine Parvo Virus <br>
                                                    <span class="text-success mr-2">²›60%</span>of Canine Corona Virus <br>
                                                    <span class="text-success mr-2">³›60%</span>of Enteritis <br>
                                                </td>
                                            @endif
                                        @else
                                            <td>
                                                <span class="text-success mr-2">¹›40%</span>of Canine Parvo Virus <br>
                                                <span class="text-success mr-2">²›40%</span>of Canine Corona Virus <br>
                                                <span class="text-success mr-2">³›40%</span>of Enteritis <br>
                                            </td>
                                        @endif
                                    @else
                                        <td>
                                            <span class="text-success mr-2">¹›20%</span>of Canine Parvo Virus <br>
                                            <span class="text-success mr-2">²›20%</span>of Canine Corona Virus <br>
                                            <span class="text-success mr-2">³›20%</span>of Enteritis <br>
                                        </td>
                                    @endif
                                    <td>
                                        <span class="text-success mr-2">¹› Canine Parvo Virus</span>is a contagious virus
                                        mainly affecting dogs. CPV is highly contagious and is spread from dog to dog by
                                        direct or indirect contact with their feces. Vaccines can prevent this infection,
                                        but mortality can reach 91% in untreated cases. Treatment often involves veterinary
                                        hospitalization. <br>
                                        <span class="text-success mr-2">²› Canine Corona Virus</span>is an enveloped,
                                        positive-sense, single-stranded RNA virus which is a member of the species
                                        Alphacoronavirus 1. It causes a highly contagious intestinal disease worldwide
                                        in dogs. The infecting virus enters its host cell by binding to the APN receptor. <br>
                                        <span class="text-success mr-2">³› Enteritis</span>is an inflammation of the small
                                        intestine and is caused by a wide range of potential problems. Parasites, bacteria,
                                        viruses, or allergies can all inflame the small intestines of your dog, causing
                                        diarrhea. <br>
                                    </td>
                                @elseif($row->symptom == 'diarrhea' || $row->symptom == 'diarrhea, limp' ||
                                        $row->symptom == 'diarrhea, noAppetite' || $row->symptom == 'limp' ||
                                        $row->symptom == 'limp, noAppetite' || $row->symptom == 'noAppetite' ||
                                        $row->symptom == 'diarrhea, limp, noAppetite')
                                    @if($row->symptom == 'diarrhea, limp' || $row->symptom == 'diarrhea, noAppetite' ||
                                        $row->symptom == 'limp, noAppetite' || $row->symptom == 'diarrhea, limp, noAppetite')
                                        @if($row->symptom == 'diarrhea, limp, noAppetite')
                                            <td>
                                                <span class="text-success mr-2">¹›100%</span>of Giardiasis <br>
                                                <span class="text-warning mr-2">²›60%</span>of Canine Parvo Virus <br>
                                                <span class="text-warning mr-2">³›60%</span>of Canine Corona Virus <br>
                                                <span class="text-warning mr-2">⁴›60%</span>of Enteritis <br>
                                            </td>
                                        @else
                                            <td>
                                                <span class="text-success mr-2">¹›66.6%</span>of Giardiasis <br>
                                                <span class="text-warning mr-2">²›40%</span>of Canine Parvo Virus <br>
                                                <span class="text-warning mr-2">³›40%</span>of Canine Corona Virus <br>
                                                <span class="text-warning mr-2">⁴›40%</span>of Enteritis <br>
                                            </td>
                                        @endif
                                    @else
                                        <td>
                                            <span class="text-success mr-2">¹›33.3%</span>of Giardiasis <br>
                                            <span class="text-warning mr-2">²›20%</span>of Canine Parvo Virus <br>
                                            <span class="text-warning mr-2">³›20%</span>of Canine Corona Virus <br>
                                            <span class="text-warning mr-2">⁴›20%</span>of Enteritis <br>
                                        </td>
                                    @endif
                                    <td>
                                        <span class="text-success mr-2">¹› Giardiasis</span>is a single-celled parasite that
                                        lives in your dog's intestine. It infects older dogs but more frequently infects
                                        puppies. Dogs become infected when they swallow Giardia that may be present in
                                        water or other substances that have been soiled with feces. <br>
                                        <span class="text-warning mr-2">²› Canine Parvo Virus</span>is a contagious virus
                                        mainly affecting dogs. CPV is highly contagious and is spread from dog to dog by
                                        direct or indirect contact with their feces. Vaccines can prevent this infection,
                                        but mortality can reach 91% in untreated cases. Treatment often involves veterinary
                                        hospitalization. <br>
                                        <span class="text-warning mr-2">³› Canine Corona Virus</span>is an enveloped,
                                        positive-sense, single-stranded RNA virus which is a member of the species
                                        Alphacoronavirus 1. It causes a highly contagious intestinal disease worldwide
                                        in dogs. The infecting virus enters its host cell by binding to the APN receptor. <br>
                                        <span class="text-warning mr-2">⁴› Enteritis</span>is an inflammation of the small
                                        intestine and is caused by a wide range of potential problems. Parasites, bacteria,
                                        viruses, or allergies can all inflame the small intestines of your dog, causing
                                        diarrhea. <br>
                                    </td>
                                @elseif($row->symptom == 'itchy' || $row->symptom == 'itchy, hairLoss' ||
                                        $row->symptom == 'hairLoss')
                                    @if($row->symptom == 'itchy, hairLoss')
                                        <td>
                                            <span class="text-warning mr-2">Possibly one or more of:</span><br>
                                            <span class="text-success mr-2">¹›100%</span>of Dermatophytosis <br>
                                            <span class="text-success mr-2">²›100%</span>of Scabies <br>
                                            <span class="text-success mr-2">³›100%</span>of Demodectic <br>
                                        </td>
                                    @else
                                        <td>
                                            <span class="text-success mr-2">¹›50%</span>of Dermatophytosis <br>
                                            <span class="text-success mr-2">²›50%</span>of Scabies <br>
                                            <span class="text-success mr-2">³›50%</span>of Demodectic <br>
                                        </td>
                                    @endif
                                    <td>
                                        <span class="text-success mr-2">¹› Dermatophytosis</span>is a superficial fungal
                                        skin disease of cats and dogs. The most common pathogens of small animals belong
                                        to the genera Microsporum and Trichophyton. It is an important skin disease because
                                        it is contagious, infectious and can be transmitted to people. <br>
                                        <span class="text-success mr-2">²› Sarcoptic mange, also called scabies</span>
                                        in dogs is caused by the Sarcoptes scabiei mite, a highly contagious skin parasite.
                                        The mites burrow into the skin and cause severe itching, which can result in the
                                        formation of scabs and hair loss. It is a nonseasonal parasite that can be found
                                        in dogs of all ages and breeds. <br>
                                        <span class="text-success mr-2">³› Demodectic</span>mange is caused by Demodectic canis,
                                        a parasitic mite that lives in the hair follicles of dogs. Under the microscope,
                                        this mite is shaped like a cigar with eight legs. Demodectic mange, sometimes just
                                        called 'Demodectic' or 'red mange', is the most common form of mange in dogs. <br>
                                    </td>
                                @elseif($row->symptom == 'wateryEyes')
                                    <td>
                                        <span class="text-success mr-2">¹›100%</span>of Conjunctivitis <br>
                                    </td>
                                    <td>
                                        <span class="text-success mr-2">¹› Conjunctivitis,</span>also known as pinkeye or
                                        red eye, is as common in dogs as it is in humans. It's an itchy inflammation of
                                        the tissue that coats the eye and the lining of the eyelids, called the conjunctiva.
                                        Conjunctivitis can happen at any age, by itself or because of another eye problem. <br>
                                    </td>
                                @endif


                            @elseif($row->petsType == 'cat')
                                @if($row->symptom == 'fever' || $row->symptom == 'flu' || $row->symptom == 'fever, flu' ||
                                    $row->symptom == 'fever, limp' || $row->symptom == 'fever, noAppetite' ||
                                    $row->symptom == 'fever, thrush' || $row->symptom == 'fever, wateryEyes' ||
                                    $row->symptom == 'flu, limp' || $row->symptom == 'flu, noAppetite' ||
                                    $row->symptom == 'flu, thrush' || $row->symptom == 'flu, wateryEyes' ||
                                    $row->symptom == 'fever, diarrhea, vomit' || $row->symptom == 'fever, diarrhea, limp' ||
                                    $row->symptom == 'fever, diarrhea, noAppetite' || $row->symptom == 'fever, vomit, limp' ||
                                    $row->symptom == 'fever, vomit, noAppetite' || $row->symptom == 'fever, limp, noAppetite' ||
                                    $row->symptom == 'fever, limp, thrush' || $row->symptom == 'fever, limp, wateryEyes' ||
                                    $row->symptom == 'fever, flu, limp' || $row->symptom == 'fever, flu, noAppetite' ||
                                    $row->symptom == 'fever, flu, thrush' || $row->symptom == 'fever, flu, wateryEyes' ||
                                    $row->symptom == 'fever, noAppetite, thrush' || $row->symptom == 'fever, noAppetite, wateryEyes' ||
                                    $row->symptom == 'diarrhea, vomit, limp' || $row->symptom == 'diarrhea, vomit, noAppetite' ||
                                    $row->symptom == 'diarrhea, limp, noAppetite' || $row->symptom == 'vomit, limp, noAppetite' ||
                                    $row->symptom == 'flu, limp, noAppetite' || $row->symptom == 'flu, limp, thrush' ||
                                    $row->symptom == 'flu, limp, wateryEyes' || $row->symptom == 'flu, noAppetite, thrush' ||
                                    $row->symptom == 'flu, noAppetite, wateryEyes' || $row->symptom == 'limp, noAppetite, thrush' ||
                                    $row->symptom == 'limp, noAppetite, wateryEyes' || $row->symptom == 'fever, flu, limp, noAppetite' ||
                                    $row->symptom == 'fever, flu, limp, thrush' || $row->symptom == 'fever, flu, limp, wateryEyes' ||
                                    $row->symptom == 'fever, limp, noAppetite, thrush' || $row->symptom == 'fever, limp, noAppetite, noAppetite' ||

                                    $row->symptom == 'fever, diarrhea, vomit, limp, noAppetite' || $row->symptom == 'fever, flu, limp, noAppetite, thrush' ||
                                    $row->symptom == 'fever, flu, limp, noAppetite, wateryEyes')

                                    @if($row->symptom == 'fever, limp' || $row->symptom == 'fever, noAppetite' ||
                                        $row->symptom == 'fever, limp, noAppetite')
                                        <td>
                                            @if($row->symptom == 'fever, limp, noAppetite')
                                                <span class="text-success mr-2">¹›60%</span>of Feline Parvo Virus <br>
                                                <span class="text-success mr-2">²›60%</span>of Canine Corona Virus <br>
                                                <span class="text-success mr-2">³›60%</span>of Calicivirus <br>
                                                <span class="text-success mr-2">⁴›60%</span>of Chlamydia <br>
                                            @else
                                                <span class="text-success mr-2">¹›40%</span>of Feline Parvo Virus <br>
                                                <span class="text-success mr-2">²›40%</span>of Canine Corona Virus <br>
                                                <span class="text-success mr-2">³›40%</span>of Calicivirus <br>
                                                <span class="text-success mr-2">⁴›40%</span>of Chlamydia <br>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-success mr-2">¹› Feline parvovirus</span>is a virus that
                                            can cause severe disease in cats, particularly kittens. It can be fatal. The
                                            disease is also known as feline infectious enteritis (FIE) and feline panleukopenia.
                                            The virus is extremely resilient and can survive in the environment for long
                                            periods of time. <br>
                                            <span class="text-success mr-2">²› Canine Corona Virus</span>is an enveloped,
                                            positive-sense, single-stranded RNA virus which is a member of the species
                                            Alphacoronavirus 1. It causes a highly contagious intestinal disease worldwide
                                            in dogs. The infecting virus enters its host cell by binding to the APN receptor. <br>
                                            <span class="text-success mr-2">³› Calici Virus</span>is a highly
                                            contagious virus that causes a mild to severe respiratory infection and oral
                                            disease in cats. It is especially common in shelters and breeding colonies,
                                            and often infects young cats. Most cats recover completely after a calicivirus
                                            infection, but rare strains can be especially deadly. The virus poses no threat
                                            to humans. <br>
                                            <span class="text-success mr-2">⁴› Chlamydia</span>in cats is a bacterial
                                            infection that typically affects the eyes. It can cause conjunctivitis, or
                                            infection of the inner eyelids and sclera, or whites of the eyes. Here's what
                                            you should know about the symptoms, diagnosis and treatment of this common eye
                                            infection in cats. <br>
                                        </td>
                                    @else
                                        <td>
                                            @if($row->symptom == 'fever, flu' || $row->symptom == 'fever, thrush' ||
                                                $row->symptom == 'fever, wateryEyes' || $row->symptom == 'flu, limp' ||
                                                $row->symptom == 'flu, noAppetite' || $row->symptom == 'flu, thrush' ||
                                                $row->symptom == 'flu, wateryEyes' || $row->symptom == 'fever, diarrhea, vomit' ||
                                                $row->symptom == 'fever, diarrhea, limp' || $row->symptom == 'fever, diarrhea, noAppetite' ||
                                                $row->symptom == 'vomit, limp, noAppetite' ||
                                                $row->symptom == 'fever, flu, limp' || $row->symptom == 'fever, flu, noAppetite' ||
                                                $row->symptom == 'fever, flu, thrush' || $row->symptom == 'fever, flu, wateryEyes' ||
                                                $row->symptom == 'fever, limp, thrush' || $row->symptom == 'fever, limp, wateryEyes' ||
                                                $row->symptom == 'fever, noAppetite, thrush' || $row->symptom == 'fever, noAppetite, wateryEyes'||
                                                $row->symptom == 'flu, limp, noAppetite' || $row->symptom == 'flu, limp, thrush' ||
                                                $row->symptom == 'flu, limp, wateryEyes' || $row->symptom == 'flu, noAppetite, thrush' ||
                                                $row->symptom == 'flu, noAppetite, wateryEyes' || $row->symptom == 'limp, noAppetite, thrush' ||
                                                $row->symptom == 'limp, noAppetite, wateryEyes' || $row->symptom == 'fever, flu, limp, noAppetite' ||
                                                $row->symptom == 'fever, flu, limp, thrush' || $row->symptom == 'fever, flu, limp, wateryEyes' ||
                                                $row->symptom == 'fever, limp, noAppetite, thrush' ||
                                                $row->symptom == 'fever, limp, noAppetite, noAppetite' ||
                                                $row->symptom == 'fever, diarrhea, vomit, limp, noAppetite' ||
                                                $row->symptom == 'fever, flu, limp, noAppetite, thrush' ||
                                                $row->symptom == 'fever, flu, limp, noAppetite, wateryEyes')
                                                @if($row->symptom == 'fever, diarrhea, vomit' || $row->symptom == 'fever, diarrhea, limp' ||
                                                    $row->symptom == 'fever, diarrhea, noAppetite' || $row->symptom == 'fever, vomit, limp' ||
                                                    $row->symptom == 'fever, vomit, noAppetite' || $row->symptom == 'vomit, limp, noAppetite' ||
                                                    $row->symptom == 'fever, flu, limp' || $row->symptom == 'fever, flu, noAppetite' ||
                                                    $row->symptom == 'fever, flu, thrush' || $row->symptom == 'fever, flu, wateryEyes' ||
                                                    $row->symptom == 'fever, limp, thrush' || $row->symptom == 'fever, limp, wateryEyes' ||
                                                    $row->symptom == 'fever, noAppetite, thrush' || $row->symptom == 'fever, noAppetite, wateryEyes' ||
                                                    $row->symptom == 'flu, limp, noAppetite' || $row->symptom == 'flu, limp, thrush' ||
                                                    $row->symptom == 'flu, limp, wateryEyes' || $row->symptom == 'flu, noAppetite, thrush' ||
                                                    $row->symptom == 'flu, noAppetite, wateryEyes' || $row->symptom == 'limp, noAppetite, thrush' ||
                                                    $row->symptom == 'limp, noAppetite, wateryEyes' || $row->symptom == 'fever, flu, limp, noAppetite' ||
                                                    $row->symptom == 'fever, flu, limp, thrush' || $row->symptom == 'fever, flu, limp, wateryEyes' ||
                                                    $row->symptom == 'fever, limp, noAppetite, thrush' ||
                                                    $row->symptom == 'fever, limp, noAppetite, noAppetite' ||
                                                    $row->symptom == 'fever, diarrhea, vomit, limp, noAppetite' ||
                                                    $row->symptom == 'fever, flu, limp, noAppetite, thrush' ||
                                                    $row->symptom == 'fever, flu, limp, noAppetite, wateryEyes')
                                                    @if($row->symptom == 'fever, flu, limp, noAppetite' ||
                                                        $row->symptom == 'fever, flu, limp, thrush' ||
                                                        $row->symptom == 'fever, flu, limp, wateryEyes' ||
                                                        $row->symptom == 'fever, limp, noAppetite, thrush' ||
                                                        $row->symptom == 'fever, limp, noAppetite, noAppetite')
                                                        <span class="text-success mr-2">¹›80%</span>of Calicivirus <br>
                                                        <span class="text-success mr-2">²›80%</span>of Chlamydia <br>
                                                    @elseif($row->symptom == 'fever, diarrhea, vomit, limp, noAppetite')
                                                        <span class="text-warning mr-2">Possibly one or more of:</span><br>
                                                        <span class="text-success mr-2">¹›100%</span>of Calicivirus <br>
                                                        <span class="text-success mr-2">²›100%</span>of Chlamydia <br>
                                                    @elseif($row->symptom == 'fever, flu, limp, noAppetite, thrush')
                                                        <span class="text-success mr-2">¹›100%</span>of Calicivirus <br>
                                                    @elseif($row->symptom == 'fever, flu, limp, noAppetite, wateryEyes')
                                                        <span class="text-success mr-2">¹›100%</span>of Chlamydia <br>
                                                    @else
                                                        <span class="text-success mr-2">¹›60%</span>of Calicivirus <br>
                                                        <span class="text-success mr-2">²›60%</span>of Chlamydia <br>
                                                    @endif
                                                @else
                                                    <span class="text-success mr-2">¹›40%</span>of Calicivirus <br>
                                                    <span class="text-success mr-2">²›40%</span>of Chlamydia <br>
                                                @endif
                                            @else
                                                @if($row->symptom == 'fever')
                                                    <span class="text-success mr-2">¹›20%</span>of Feline Parvo Virus <br>
                                                    <span class="text-success mr-2">²›20%</span>of Canine Corona Virus <br>
                                                @endif
                                                <span class="text-success mr-2">³›20%</span>of Calicivirus <br>
                                                <span class="text-success mr-2">⁴›20%</span>of Chlamydia <br>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->symptom == 'fever, flu, limp, noAppetite, thrush')
                                                <span class="text-success mr-2">¹› Calici Virus</span>is a highly
                                                contagious virus that causes a mild to severe respiratory infection and oral
                                                disease in cats. It is especially common in shelters and breeding colonies,
                                                and often infects young cats. Most cats recover completely after a calicivirus
                                                infection, but rare strains can be especially deadly. The virus poses no threat
                                                to humans. <br>
                                            @elseif($row->symptom == 'fever, flu, limp, noAppetite, wateryEyes')
                                                <span class="text-success mr-2">¹› Chlamydia</span>in cats is a bacterial
                                                infection that typically affects the eyes. It can cause conjunctivitis, or
                                                infection of the inner eyelids and sclera, or whites of the eyes. Here's what
                                                you should know about the symptoms, diagnosis and treatment of this common eye
                                                infection in cats. <br>
                                            @else
                                                <span class="text-success mr-2">³› Calici Virus</span>is a highly
                                                contagious virus that causes a mild to severe respiratory infection and oral
                                                disease in cats. It is especially common in shelters and breeding colonies,
                                                and often infects young cats. Most cats recover completely after a calicivirus
                                                infection, but rare strains can be especially deadly. The virus poses no threat
                                                to humans. <br>
                                                <span class="text-success mr-2">⁴› Chlamydia</span>in cats is a bacterial
                                                infection that typically affects the eyes. It can cause conjunctivitis, or
                                                infection of the inner eyelids and sclera, or whites of the eyes. Here's what
                                                you should know about the symptoms, diagnosis and treatment of this common eye
                                                infection in cats. <br>
                                            @endif
                                        </td>
                                    @endif


                                @elseif($row->symptom == 'diarrhea' || $row->symptom == 'vomit' ||
                                        $row->symptom == 'fever, diarrhea' || $row->symptom == 'fever, vomit' ||
                                        $row->symptom == 'diarrhea, vomit' || $row->symptom == 'diarrhea, limp' ||
                                        $row->symptom == 'diarrhea, noAppetite' || $row->symptom == 'vomit, limp' ||
                                        $row->symptom == 'vomit, noAppetite' || $row->symptom == 'diarrhea, vomit, limp' ||
                                        $row->symptom == 'diarrhea, vomit, noAppetite' || $row->symptom == 'diarrhea, limp, noAppetite' ||
                                        $row->symptom == 'fever, diarrhea, vomit, limp' || $row->symptom == 'fever, diarrhea, vomit, noAppetite' ||
                                        $row->symptom == 'fever, vomit, limp, noAppetite' || $row->symptom == 'diarrhea, limp, noAppetite, wateryEyes')
                                    @if($row->symptom == 'fever, diarrhea' || $row->symptom == 'fever, vomit' ||
                                        $row->symptom == 'diarrhea, vomit' || $row->symptom == 'diarrhea, limp' ||
                                        $row->symptom == 'diarrhea, noAppetite' || $row->symptom == 'vomit, limp' ||
                                        $row->symptom == 'vomit, noAppetite' || $row->symptom == 'diarrhea, vomit, limp' ||
                                        $row->symptom == 'diarrhea, vomit, noAppetite' || $row->symptom == 'diarrhea, limp, noAppetite' ||
                                        $row->symptom == 'fever, diarrhea, vomit, limp' || $row->symptom == 'fever, diarrhea, vomit, noAppetite' ||
                                        $row->symptom == 'fever, vomit, limp, noAppetite' || $row->symptom == 'diarrhea, limp, noAppetite, wateryEyes')
                                        <td>
                                            @if($row->symptom == 'diarrhea, vomit, limp' || $row->symptom == 'diarrhea, vomit, noAppetite' ||
                                                $row->symptom == 'diarrhea, limp, noAppetite' || $row->symptom == 'fever, diarrhea, vomit, limp' ||
                                                $row->symptom == 'fever, diarrhea, vomit, noAppetite' || $row->symptom == 'fever, vomit, limp, noAppetite' ||
                                                $row->symptom == 'diarrhea, limp, noAppetite, wateryEyes')
                                                @if($row->symptom == 'fever, diarrhea, vomit, limp' ||
                                                    $row->symptom == 'fever, diarrhea, vomit, noAppetite' ||
                                                    $row->symptom == 'fever, vomit, limp, noAppetite')
                                                    <span class="text-success mr-2">¹›80%</span>of Feline Parvo Virus <br>
                                                    <span class="text-success mr-2">²›80%</span>of Canine Corona Virus <br>
                                                @elseif($row->symptom == 'diarrhea, limp, noAppetite, wateryEyes')
                                                    <span class="text-success mr-2">¹›100%</span>of Giardiasis <br>
                                                @else
                                                    <span class="text-warning mr-2">¹›60%</span>of Feline Parvo Virus <br>
                                                    <span class="text-warning mr-2">²›60%</span>of Canine Corona Virus <br>
                                                    <span class="text-success mr-2">³›75%</span>of Giardiasis <br>
                                                @endif
                                            @else
                                                <span class="text-success mr-2">¹›40%</span>of Feline Parvo Virus <br>
                                                <span class="text-success mr-2">²›40%</span>of Canine Corona Virus <br>
                                                @if($row->symptom == 'diarrhea, limp' || $row->symptom == 'diarrhea, noAppetite')
                                                    <span class="text-success mr-2">³›50%</span>of Giardiasis <br>
                                                @endif
                                            @endif
                                        </td>
                                    @else
                                        <td>
                                            <span class="text-success mr-2">¹›20%</span>of Feline Parvo Virus <br>
                                            <span class="text-success mr-2">²›20%</span>of Canine Corona Virus <br>
                                            @if($row->symptom == 'diarrhea')
                                                <span class="text-success mr-2">³›25%</span>of Giardiasis <br>
                                            @endif
                                        </td>
                                    @endif
                                    <td>
                                        @if($row->symptom == 'diarrhea, limp' || $row->symptom == 'diarrhea, noAppetite' ||
                                            $row->symptom == 'diarrhea, vomit, limp' || $row->symptom == 'diarrhea, vomit, noAppetite' ||
                                            $row->symptom == 'diarrhea, limp, noAppetite' || $row->symptom == 'fever, diarrhea, vomit, limp' ||
                                            $row->symptom == 'fever, diarrhea, vomit, noAppetite' || $row->symptom == 'fever, vomit, limp, noAppetite' ||
                                            $row->symptom == 'diarrhea, limp, noAppetite, wateryEyes' || $row->symptom == 'diarrhea')
                                            <span class="text-success mr-2">¹› Feline parvovirus</span>is a virus that
                                            can cause severe disease in cats, particularly kittens. It can be fatal. The
                                            disease is also known as feline infectious enteritis (FIE) and feline panleukopenia.
                                            The virus is extremely resilient and can survive in the environment for long
                                            periods of time. <br>
                                            <span class="text-success mr-2">²› Canine Corona Virus</span>is an enveloped,
                                            positive-sense, single-stranded RNA virus which is a member of the species
                                            Alphacoronavirus 1. It causes a highly contagious intestinal disease worldwide
                                            in dogs. The infecting virus enters its host cell by binding to the APN receptor. <br>
                                        @endif
                                        @if($row->symptom == 'diarrhea' || $row->symptom == 'diarrhea, limp, noAppetite, wateryEyes' ||
                                            $row->symptom == 'diarrhea, limp' || $row->symptom == 'diarrhea, noAppetite')
                                            <span class="text-success mr-2">³› Giardiasis</span>is a single-celled parasite that
                                                lives in your dog's intestine. It infects older dogs but more frequently infects
                                                puppies. Dogs become infected when they swallow Giardia that may be present in
                                                water or other substances that have been soiled with feces. <br>
                                        @endif
                                    </td>
                                @elseif($row->symptom == 'limp' || $row->symptom == 'noAppetite' ||
                                        $row->symptom == 'limp, noAppetite' || $row->symptom == 'limp, thrush' ||
                                        $row->symptom == 'limp, wateryEyes')
                                    @if($row->symptom == 'limp, noAppetite' || $row->symptom == 'limp, thrush' ||
                                        $row->symptom == 'limp, wateryEyes')
                                        <td>
                                            @if($row->symptom == 'limp, noAppetite')
                                                <span class="text-success mr-2">¹›40%</span>of Feline Parvo Virus <br>
                                                <span class="text-success mr-2">²›40%</span>of Canine Corona Virus <br>
                                                <span class="text-success mr-2">³›50%</span>of Giardiasis <br>
                                            @endif
                                            <span class="text-success mr-2">⁴›40%</span>of Calicivirus <br>
                                            <span class="text-success mr-2">⁵›40%</span>of Chlamydia <br>
                                        </td>
                                    @else
                                        <td>
                                            <span class="text-success mr-2">¹›20%</span>of Feline Parvo Virus <br>
                                            <span class="text-success mr-2">²›20%</span>of Canine Corona Virus <br>
                                            <span class="text-success mr-2">³›25%</span>of Giardiasis <br>
                                            <span class="text-success mr-2">⁴›20%</span>of Calicivirus <br>
                                            <span class="text-success mr-2">⁵›20%</span>of Chlamydia <br>
                                        </td>
                                    @endif
                                    <td>
                                        @if($row->symptom == 'limp, noAppetite')
                                            <span class="text-success mr-2">¹› Feline parvovirus</span>is a virus that
                                            can cause severe disease in cats, particularly kittens. It can be fatal. The
                                            disease is also known as feline infectious enteritis (FIE) and feline panleukopenia.
                                            The virus is extremely resilient and can survive in the environment for long
                                            periods of time. <br>
                                            <span class="text-success mr-2">²› Canine Corona Virus</span>is an enveloped,
                                            positive-sense, single-stranded RNA virus which is a member of the species
                                            Alphacoronavirus 1. It causes a highly contagious intestinal disease worldwide
                                            in dogs. The infecting virus enters its host cell by binding to the APN receptor. <br>
                                            <span class="text-success mr-2">³› Giardiasis</span>is a single-celled parasite that
                                            lives in your dog's intestine. It infects older dogs but more frequently infects
                                            puppies. Dogs become infected when they swallow Giardia that may be present in
                                            water or other substances that have been soiled with feces. <br>
                                        @endif
                                        <span class="text-success mr-2">⁴› Calici Virus</span>is a highly
                                        contagious virus that causes a mild to severe respiratory infection and oral
                                        disease in cats. It is especially common in shelters and breeding colonies,
                                        and often infects young cats. Most cats recover completely after a calicivirus
                                        infection, but rare strains can be especially deadly. The virus poses no threat
                                        to humans. <br>
                                        <span class="text-success mr-2">⁵› Chlamydia</span>in cats is a bacterial
                                        infection that typically affects the eyes. It can cause conjunctivitis, or
                                        infection of the inner eyelids and sclera, or whites of the eyes. Here's what
                                        you should know about the symptoms, diagnosis and treatment of this common eye
                                        infection in cats. <br>
                                    </td>
                                @elseif($row->symptom == 'itchy' || $row->symptom == 'hairLoss' ||
                                        $row->symptom == 'itchy, hairLoss')
                                    @if($row->symptom == 'hairLoss' || $row->symptom == 'itchy, hairLoss')
                                        <td>
                                            <span class="text-warning mr-2">Possibly one or more of:</span><br>
                                            <span class="text-success mr-2">¹›100%</span>of Dermatophytosis  <br>
                                            <span class="text-success mr-2">²›100%</span>of Scabies <br>
                                            <span class="text-success mr-2">³›100%</span>of Demodectic <br>
                                        </td>
                                    @else
                                        <td>
                                            <span class="text-success mr-2">¹›50%</span>of Dermatophytosis  <br>
                                            <span class="text-success mr-2">²›50%</span>of Scabies <br>
                                            <span class="text-success mr-2">³›50%</span>of Demodectic <br>
                                        </td>
                                    @endif
                                    <td>
                                        <span class="text-success mr-2">¹› Dermatophytosis</span>is a superficial fungal
                                        skin disease of cats and dogs. The most common pathogens of small animals belong
                                        to the genera Microsporum and Trichophyton. It is an important skin disease because
                                        it is contagious, infectious and can be transmitted to people. <br>
                                        <span class="text-success mr-2">²› Sarcoptic mange, also called scabies</span>
                                        in dogs is caused by the Sarcoptes scabiei mite, a highly contagious skin parasite.
                                        The mites burrow into the skin and cause severe itching, which can result in the
                                        formation of scabs and hair loss. It is a nonseasonal parasite that can be found
                                        in dogs of all ages and breeds. <br>
                                        <span class="text-success mr-2">³› Demodectic</span>mange is caused by Demodectic canis,
                                        a parasitic mite that lives in the hair follicles of dogs. Under the microscope,
                                        this mite is shaped like a cigar with eight legs. Demodectic mange, sometimes just
                                        called 'Demodectic' or 'red mange', is the most common form of mange in dogs. <br>
                                    </td>
                                @elseif($row->symptom == 'thrush')
                                    <td>
                                        <span class="text-success mr-2">¹›20%</span>of Calicivirus  <br>
                                    </td>
                                    <td>
                                        <span class="text-success mr-2">¹› Calici Virus</span>is a highly
                                        contagious virus that causes a mild to severe respiratory infection and oral
                                        disease in cats. It is especially common in shelters and breeding colonies,
                                        and often infects young cats. Most cats recover completely after a calicivirus
                                        infection, but rare strains can be especially deadly. The virus poses no threat
                                        to humans. <br>
                                    </td>
                                @elseif($row->symptom == 'wateryEyes')
                                    <td>
                                        <span class="text-success mr-2">¹›20%</span>of Chlamydia  <br>
                                    </td>
                                    <td>
                                        <span class="text-success mr-2">¹› Chlamydia</span>in cats is a bacterial
                                        infection that typically affects the eyes. It can cause conjunctivitis, or
                                        infection of the inner eyelids and sclera, or whites of the eyes. Here's what
                                        you should know about the symptoms, diagnosis and treatment of this common eye
                                        infection in cats. <br>
                                    </td>
                                @endif
                            @endif
                            <td>{{ $row->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
