<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-primary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            @if(auth()->user()->type == 'customer')
                @php
                    $route = Route::currentRouteName();
                @endphp
                @if(Request::is('customer')||$route == 'search')
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" type="get" action="{{url('/searchProduct')}}" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="query" placeholder="Search" value="{{ $route == 'search' ? $search_text : '' }}" type="text">
                            </div>
                        </div>
                    </form>
                @elseif(Request::is('medicine')||$route == 'searchMedicine')
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" type="get" action="{{url('/searchMedicine')}}" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="query" placeholder="Search" value="{{ $route == 'searchMedicine' ? $search_text : '' }}" type="text">
                            </div>
                        </div>
                    </form>
                @elseif(Request::is('service')||$route == 'searchService')
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" type="get" action="{{url('/searchService')}}" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="query" placeholder="Search" value="{{ $route == 'searchService' ? $search_text : '' }}" type="text">
                            </div>
                        </div>
                    </form>
                @elseif(Request::is('petCare')||$route == 'searchPetCare')
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" type="get" action="{{url('/searchPetCare')}}" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="query" placeholder="Search" value="{{ $route == 'searchPetCare' ? $search_text : '' }}" type="text">
                            </div>
                        </div>
                    </form>
                @elseif(Request::is('grooming')||$route == 'searchGrooming')
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" type="get" action="{{url('/searchGrooming')}}" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="query" placeholder="Search" value="{{ $route == 'searchGrooming' ? $search_text : '' }}" type="text">
                            </div>
                        </div>
                    </form>
                @elseif(Request::is('vaccine')||$route == 'searchVaccine')
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" type="get" action="{{url('/searchVaccine')}}" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="query" placeholder="Search" value="{{ $route == 'searchVaccine' ? $search_text : '' }}" type="text">
                            </div>
                        </div>
                    </form>
                @endif
            @elseif(auth()->user()->type == 'vetClinic')
                <h1 class="text-white mx-1">Welcome to the Dashboard of </h1>
                <h1 class="text-yellow mx-1">Vet Clinic</h1>
            @elseif(auth()->user()->type == 'petShop')
                <h1 class="text-white mx-1">Welcome to the Dashboard of </h1>
                <h1 class="text-yellow mx-1">Pet Shop</h1>
            @elseif(auth()->user()->type == 'admin')
                <h1 class="text-white mx-1">Welcome to the Dashboard of </h1>
                <h1 class="text-yellow mx-1">Admin</h1>
            @elseif(auth()->user()->type == 'veterinary')
                <h1 class="text-white mx-1">Welcome to the Dashboard of </h1>
                <h1 class="text-yellow mx-1">Veterinary</h1>
            @endif
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-sm-none">
                    <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                        <i class="ni ni-zoom-split-in"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55 xfa-inverse"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                        <!-- Dropdown header -->
                        <div class="px-3 py-3">
                            <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                        </div>
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="{{asset('argon/assets/img/theme/team-2.jpg')}}" class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">John Snow</h4>
                                            </div>
                                            <div class="text-right text-muted">
                                                <small>3 hrs ago</small>
                                            </div>
                                        </div>
                                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- View all -->
                        <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ asset('argon/argon/img/theme/' . Auth::user()->avatar) }}">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->name}}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="{{ route('customer-profile', Auth::user()->id) }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

