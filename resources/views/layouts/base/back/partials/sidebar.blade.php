<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
    <div class="settings-widget dash-profile">
        <div class="settings-menu p-0">
            <div class="profile-bg">
                <h5>Beginner</h5>
                
                <img src="{{ asset('') }}assets/back/img/instructor-profile-bg.jpg" alt="">
                <div class="profile-img">
                    <a href="instructor-profile.html">
                        @role('admin')
                        <img src="{{ asset('') }}images/default.jpg"
                            alt=""></a>
                            @endrole
                        @role('user')
                        <img src="{{ asset('') }}images/pelanggan/{{ Auth::user()->pelanggan->foto }}"
                            alt=""></a>
                            @endrole
                        @role('rental')
                        <img src="{{ asset('') }}images/rental/{{ Auth::user()->rental->foto_rental }}"
                            alt=""></a>
                            @endrole
                </div>
            </div>
            <div class="profile-group">
                <div class="profile-name text-center">
                    <h4><a href="instructor-profile.html">{{ Auth::user()->name }}</a></h4>
                    <p>Instructor</p>
                </div>
                <div class="go-dashboard text-center">
                    <a href="{{ url('/') }}" class="btn btn-primary">Landing Page</a>
                </div>
            </div>
        </div>
    </div>
    <div class="settings-widget account-settings">
        <div class="settings-menu">
            <h3>DASHBOARD</h3>
            <ul>
                <li class="nav-item">
                    <a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}" class="nav-link">
                        <i class="feather-home"></i> My Dashboard
                    </a>
                </li>
                @role('rental')
                <li class="nav-item">
                    <a class="{{ Request::is('rental/mobil') ? 'active' : '' }}" href="{{ url('rental/mobil') }}" class="nav-link">
                        <i class="feather-book"></i> My Cars
                    </a>
                </li>

                <li class="nav-item">
                    <a class="{{ Request::is('rental/persyaratan') ? 'active' : '' }}" href="{{ url('rental/persyaratan') }}" class="nav-link">
                        <i class="feather-shopping-bag"></i> Persyaratan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Request::is('rental/kontrak') ? 'active' : '' }}" href="{{ url('rental/kontrak') }}" class="nav-link">
                        <i class="feather-shopping-bag"></i> Kontrak
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Request::is('rental/supir') ? 'active' : '' }}" href="{{ url('rental/supir') }}" class="nav-link">
                        <i class="feather-shopping-bag"></i> Supir
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Request::is('rental/orders/*') ? 'active' : '' }}" href="{{ url('rental/orders') }}" class="nav-link">
                        <i class="feather-shopping-bag"></i> Orders
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="nav-item">
                    <a class="{{ Request::is('admin/orders') ? 'active' : '' }}" href="{{ url('admin/orders') }}" class="nav-link">
                        <i class="feather-shopping-bag"></i> Orders
                    </a>
                </li>

                <li class="nav-item">
                    <a class="{{ Request::is('admin/rental') ? 'active' : '' }}" href="{{ url('admin/rental') }}" class="nav-link">
                        <i class="feather-users"></i> Data Rental
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Request::is('admin/mobil') ? 'active' : '' }}" href="{{ url('admin/mobil') }}" class="nav-link">
                        <i class="feather-users"></i> Data Mobil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Request::is('admin/customer') ? 'active' : '' }}" href="{{ url('admin/customer') }}" class="nav-link">
                        <i class="feather-users"></i> Data Customer
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Request::is('admin/profil') ? 'active' : '' }}" href="{{ url('admin/profil') }}" class="nav-link">
                        <i class="feather-users"></i> Profil
                    </a>
                </li>

                @endrole

                @role('user')
                <li class="nav-item">
                    <a class="{{ Request::is('user/orders') ? 'active' : '' }}" href="{{ url('user/orders') }}" class="nav-link">
                        <i class="feather-dollar-sign"></i> Order
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Request::is('user/profil') ? 'active' : '' }}" href="{{ url('user/profil') }}" class="nav-link">
                        <i class="feather-users"></i> Profil
                    </a>
                </li>
                @endrole                
            </ul>
            <div class="instructor-title">
                <h3>ACCOUNT SETTINGS</h3>
            </div>
            <ul>
                @role('rental')
                <li class="nav-item">
                    <a class="{{ Request::is('rental/profil') ? 'active' : '' }}" href="{{ url('rental/profil') }}" class="nav-link ">
                        <i class="feather-settings"></i>Profil
                    </a>
                </li>
                @endrole
                {{-- @role('rental')
                <li class="nav-item">
                    <a class="" href="{{ url('user/profil') }}" class="nav-link ">
                        <i class="feather-settings"></i>Profil
                    </a>
                </li>
                @endrole --}}
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" id="myform">
                        @csrf
                        <a href="#" class="nav-link" onclick="document.getElementById('myform').submit()">
                            <i class="feather-power"></i> Sign Out
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>