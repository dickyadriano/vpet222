<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('argon/assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        @if(auth()->user()->type != 'customer')
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/template">
                                    <i class="ni ni-tv-2 text-primary"></i>
                                    <span class="nav-link-text">{{ __('Dashboard') }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/welcome">
                                <i class="fas fa-home text-primary"></i>
                                <span class="nav-link-text">{{ __('Home') }}</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        @if(auth()->user()->type == 'customer')
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Customer Dashboard') ? 'active' : '' }}" href="{{ route('dashboard-customer') }}">
                                    <i class="fa fa-store text-primary"></i>
                                    <span class="nav-link-text">Marketplace</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Veterinary Service') ? 'active' : '' }}" href="{{ route('customer-service') }}">
                                    <i class="fa fa-heartbeat text-primary"></i>
                                    <span class="nav-link-text">Veterinary Service</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Location') ? 'active' : '' }}" href="{{ route('customer-location') }}">
                                    <i class="ni ni-square-pin text-primary"></i>
                                    <span class="nav-link-text">Location</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Diagnosis of Diseases') ? 'active' : '' }}" href="{{ route('customer-diagnosis') }}">
                                    <i class="fa fa-heartbeat text-primary"></i>
                                    <span class="nav-link-text">Diagnosis of Diseases</span>
                                </a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link {{ ($title === 'View Cart') ? 'active' : '' }}" href="#">--}}
{{--                                    <i class="ni ni-basket text-primary"></i>--}}
{{--                                    <span class="nav-link-text">View Cart</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Order Customer') ? 'active' : '' }}" href="{{ route('customer-order') }}">
                                    <i class="ni ni-bag-17 text-primary"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Reminder') ? 'active' : '' }}" href="{{ route('customer-reminder') }}">
                                    <i class="ni ni-time-alarm text-primary"></i>
                                    <span class="nav-link-text">Reminder</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'veterinary')
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Vet Order') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-bag-17 text-primary"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Reminder') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-time-alarm text-primary"></i>
                                    <span class="nav-link-text">Reminder</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Medicine Recipe') ? 'active' : '' }}" href="#">
                                    <i class="fas fa-mortar-pestle text-primary"></i>
                                    <span class="nav-link-text">Create Medicine Recipe</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'vetClinic')
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Manage Medicine') ? 'active' : '' }}" href="{{ route('vetClinic-medicine') }}">
                                    <i class="fas fa-capsules text-primary"></i>
                                    <span class="nav-link-text">Manage Medicine</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Manage Vaccine') ? 'active' : '' }}" href="#">
                                    <i class="fas fa-syringe text-primary"></i>
                                    <span class="nav-link-text">Manage Vaccine</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Clinic Order') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-bag-17 text-primary"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'petShop')
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Manage Product') ? 'active' : '' }}" href="{{ route('petShop-product') }}">
                                    <i class="fas fa-box-open text-primary"></i>
                                    <span class="nav-link-text">Manage Product</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Animal Care and Grooming') ? 'active' : '' }}" href="#">
                                    <i class="fas fa-paw text-primary"></i>
                                    <span class="nav-link-text">Animal Care and Grooming</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ($title === 'Shop Order') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-bag-17 text-primary"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-books text-primary"></i>
                                    <span class="nav-link-text">Manage Information</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                    <i class="ni ni-badge text-primary"></i>
                                    <span class="nav-link-text">Manage User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-money-coins text-primary"></i>
                                    <span class="nav-link-text">Payment</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
