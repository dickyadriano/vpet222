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
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        @if(auth()->user()->type == 'customer')
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/welcome">
                                    <i class="fas fa-home text-primary"></i>
                                    <span class="nav-link-text">{{ __('Home') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('customer') ? 'active' : '' }}" href="{{ route('customer.index') }}">
                                    <i class="fa fa-store text-primary"></i>
                                    <span class="nav-link-text">Marketplace</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('service') ? 'active' : '' }}" href="{{ route('service.index') }}">
                                    <i class="fa fa-heartbeat text-primary"></i>
                                    <span class="nav-link-text">Veterinary Service</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{--{{ ($title === 'Location') ? 'active' : '' }}--}}" href="{{ route('customer-location') }}">
                                    <i class="ni ni-square-pin text-primary"></i>
                                    <span class="nav-link-text">Location</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{--{{ ($title === 'Diagnosis of Diseases') ? 'active' : '' }}--}}" href="{{ route('customer-diagnosis') }}">
                                    <i class="fa fa-heartbeat text-primary"></i>
                                    <span class="nav-link-text">Diagnosis of Diseases</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('order') ? 'active' : '' }}" href="{{ route('order.index') }}">
                                    <i class="ni ni-bag-17 text-primary"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{--{{ ($title === 'Reminder') ? 'active' : '' }}--}}" href="{{ route('customer-reminder') }}">
                                    <i class="ni ni-time-alarm text-primary"></i>
                                    <span class="nav-link-text">Reminder</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'veterinary')
                            <li class="nav-item">
                                <a class="nav-link {{--{{ Request::is('service') ? 'active' : '' }}--}}" href="#">
                                    <i class="ni ni-bag-17 text-primary"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{--{{ ($title === 'Reminder') ? 'active' : '' }}--}}" href="#">
                                    <i class="ni ni-time-alarm text-primary"></i>
                                    <span class="nav-link-text">Reminder</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{--{{ ($title === 'Medicine Recipe') ? 'active' : '' }}--}}" href="#">
                                    <i class="fas fa-mortar-pestle text-primary"></i>
                                    <span class="nav-link-text">Create Medicine Recipe</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'vetClinic')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('medicine') ? 'active' : '' }}" href="{{ route('medicine.index') }}">
                                    <i class="fas fa-capsules text-primary"></i>
                                    <span class="nav-link-text">Manage Medicine</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('medicine') ? 'active' : '' }}" href="#">
                                    <i class="fas fa-syringe text-primary"></i>
                                    <span class="nav-link-text">Manage Vaccine</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('medicine') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-bag-17 text-primary"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'petShop')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('petShop-product') }}">
                                    <i class="fas fa-box-open text-primary"></i>
                                    <span class="nav-link-text">Manage Product</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('petShop-petCare')}}">
                                    <i class="fas fa-calendar-day text-primary"></i>
                                    <span class="nav-link-text">Animal Care</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-paw text-primary"></i>
                                    <span class="nav-link-text">Grooming</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="ni ni-bag-17 text-primary"></i>
                                    <span class="nav-link-text">Order</span>
                                </a>
                            </li>
                        @elseif(auth()->user()->type == 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{--{{ ($title === 'Manage Information') ? 'active' : '' }}--}}" href="#">
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
                                <a class="nav-link {{--{{ ($title === 'Payment') ? 'active' : '' }}--}}" href="#">
                                    <i class="ni ni-money-coins text-primary"></i>
                                    <span class="nav-link-text">Payment</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{--{{ ($title === 'Payment') ? 'active' : '' }}--}}" href="{{ route('service.index') }}">
                                    <i class="ni ni-single-copy-04 text-primary"></i>
                                    <span class="nav-link-text">Vet Verification</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
