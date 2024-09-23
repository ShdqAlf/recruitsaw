<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('mazer/assets/images/logo/logo.png') }}" alt="Logo"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Kelola</li>
                <li class="sidebar-item">
                    <a href="{{ route('manage.jobs') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Kelola Lowongan Kerja</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('manage.applicants') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Kelola Data Pelamar</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('manage.interviews') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Kelola Jadwal Interview</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
