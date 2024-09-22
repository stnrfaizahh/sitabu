<div class="sidebar">
    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> --}}
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link  {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Siswa</li>
            <li class="nav-item">
                <a href="{{ url('/employee') }}" class="nav-link {{ $activeMenu == 'employee' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Data Siswa</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ url('/schedule') }}" class="nav-link {{ $activeMenu == 'schedule' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>Jadwal</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/salary') }}" class="nav-link {{ $activeMenu == 'salary' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-money-bill-alt"></i>
                    <p>Gaji</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/attendance') }}"
                    class="nav-link {{ $activeMenu == 'attendance' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-calendar-check"></i>
                    <p>Kehadiran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/leave') }}" class="nav-link {{ $activeMenu == 'leave' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-umbrella-beach"></i>
                    <p>Cuti</p>
                </a>
            </li>
            <li class="nav-header">Data User</li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
