<ul class="sidebar navbar-nav">
    <li class="nav-item  {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/house-type*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.house-type.index') }}">
            <i class="fas fa-home"></i>
            <span>House Type</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/house-info*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.house-info.index') }}">
            <i class="fas fa-warehouse"></i>
            <span>House Info</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/rent-type*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.rent-type.index') }}">
            <i class="fas fa-american-sign-language-interpreting"></i>
            <span>Rent Type</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/customer-type*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.customer-type.index') }}">
            <i class="fas fa-user-astronaut"></i>
            <span>Customer Type</span></a>
    </li>
    <li class="nav-item dropdown {{ Request::is('admin/country*') ? 'active' : '' || Request::is('admin/division*') ? 'active' : '' || Request::is('admin/city*') ? 'active' : '' || Request::is('admin/police-station*') ? 'active' : '' || Request::is('admin/village*') ? 'active' : '' || Request::is('admin/word*') ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-map-marker-alt"></i>
            <span>Location</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item {{ Request::is('admin/country*') ? 'active' : '' }}" href="{{ route('admin.country.index') }}">Country</a>
            <a class="dropdown-item {{ Request::is('admin/division*') ? 'active' : '' }}" href="{{ route('admin.division.index') }}">Division</a>
            <a class="dropdown-item {{ Request::is('admin/city*') ? 'active' : '' }}" href="{{ route('admin.city.index') }}">District / City</a>
            <a class="dropdown-item {{ Request::is('admin/police-station*') ? 'active' : '' }}" href="{{ route('admin.police-station.index') }}">Police Staion / Upazila</a>
            <a class="dropdown-item {{ Request::is('admin/village*') ? 'active' : '' }}" href="{{ route('admin.village.index') }}">Village / Moholla</a>
            <a class="dropdown-item {{ Request::is('admin/word*') ? 'active' : '' }}" href="{{ route('admin.word.index') }}">Word / Union</a>
        </div>
    </li>
    {{-- <li class="nav-item {{ Request::is('admin/house-location*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.house-location.index') }}">
            <i class="fas fa-map-marker-alt"></i>
            <span>House Location</span></a>
    </li> --}}

    {{-- default --}}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
    </li>
</ul>