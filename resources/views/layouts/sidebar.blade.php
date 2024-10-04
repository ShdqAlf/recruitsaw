<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('mazer/assets/images/logo/logo.png') }}"
                            alt="Logo"></a>
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
                        <i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Kelola</li>
                <li class="sidebar-item {{ request()->is('manage/jobs*') ? 'active' : '' }}">
                    <a href="{{ route('manage.jobs') }}" class='sidebar-link'>
                        <i class="bi bi-briefcase-fill"></i>
                        <span>Kelola Lowongan Kerja</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('manage/applicants*') ? 'active' : '' }}">
                    <a href="{{ route('manage.applicants') }}" class='sidebar-link'>
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Daftar Pelamar</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('manage/interviews*') ? 'active' : '' }}">
                    <a href="{{ route('manage.interviews') }}" class='sidebar-link'>
                        <i class="bi bi-calendar-event-fill"></i>
                        <span>Kelola Jadwal Interview</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i> <!-- Logout icon -->
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Form Logout -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

