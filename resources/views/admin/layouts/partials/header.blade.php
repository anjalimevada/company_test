<div id="wrapper">
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="{{ route('adminDashboard') }}" class="logo"> <i class="fa fa-cutlery icon-c-logo"></i> <span>Admin Panel</span></a>
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <nav class="navbar-custom">
            <div class= "col-6 offset-5" style="position:fixed; z-index:999">
                @include('flash-message')
                {{ \Session::forget('success') }}
            </div>
            
            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notification-list">
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <!-- item-->
                        @if( auth()->guard('admin')->user()->name ) 
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small>{{ auth()->guard('admin')->user()->name }}</small> </h5>
                            </div>

                            <!-- item-->
                            <a href="{{ route('adminLogout') }}" class="dropdown-item notify-item">
                                <i class="md md-settings-power"></i> <span>Logout</span>
                            </a>
                        @endif
                    </div>
                </li>
            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
            </ul>
        </nav>
    </div>