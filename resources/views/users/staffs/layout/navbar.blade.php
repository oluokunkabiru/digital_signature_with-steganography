<div class="navbar-bg"></div>

<!-- Start app top navbar -->
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/images/img_avatar3.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ ucwords(Auth::user()->name) }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="" class="dropdown-item has-icon"><i class="fas fa-clock"></i>Create and encrypt Message</a>
                <a href="" class="dropdown-item has-icon"><i class="fas fa-home"></i>Decrypt Message</a>
                <a href="" class="dropdown-item has-icon"><i class="fas fa-users"></i>Send Message</a>
                 <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>
</nav>

<!-- Start main left sidebar menu -->
{{-- <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('welcome') }}">Smart QR code attendance</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('staffDashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>
                <li class="menu-header">Faculty</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-home"></i> <span>Faculty and department</span></a>
                <ul class="dropdown-menu">
                    {{--  <li><a href="">Add New Course</a></li>
                    <li><a href="{{ route('department-info.index') }}">Manage faculty and dept</a></li>

                </ul>
            </li>
            <li class="menu-header">Courses</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-compass"></i> <span>Courses</span></a>
                <ul class="dropdown-menu">
                    {{--  <li><a href="">Add New Course</a></li>
                    <li><a href="{{ route('courses-and-classes.index') }}">Manage Course</a></li>

                </ul>
            </li>

            <li class="menu-header">Attendance</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Attendance</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('attendance.index') }}">Manage Manage attendance</a></li>
                </ul>
            </li>

             <li class="menu-header">Student</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Students</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('student-info.create') }}">New student</a></li>
                    <li><a class="nav-link" href="{{ route('student-info.index') }}">Manage student</a></li>
                </ul>
            </li>

            @if (Auth::user()->email=="admin@vb.com")
            <li class="menu-header">Staff</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-lock"></i> <span>Staffs</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('student-attendance.create') }}">New staff</a></li>
                    <li><a class="nav-link" href="{{ route('manage-staffs') }}">Manage staff</a></li>
                </ul>
            </li>
            @endif






             </ul>

    </aside>
</div> --}}
