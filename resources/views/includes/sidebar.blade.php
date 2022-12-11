<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">SIMAO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen
    </div>
    @if (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/kepengurusan">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kepengurusan</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/divisi">
            <i class="fas fa-fw fa-camera"></i>
            <span>Divisi</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages3"
            aria-expanded="true" aria-controls="collapsePages3">
            <i class="fas fa-fw fa-folder"></i>
            <span>Program Kerja</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/proker">Planning</a>
                <a class="collapse-item" href="/monitoring">monitoring</a>
                <a class="collapse-item" href="/riwayatkerja">riwayat</a>
            </div>
        </div>
    </li>
    @endif
    @if (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/dokumentasi">
            <i class="fas fa-fw fa-camera"></i>
            <span>Dokumentasi</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/pengumuman">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Pengumuman</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/prestasi">
            <i class="fas fa-fw fa-trophy"></i>
            <span>Prestasi</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'su' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-fw fa-folder"></i>
            <span>Penerimaan Anggota</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/pendaftaran">Seleksi Berkkas</a>
                <a class="collapse-item" href="/wawancara">Seleksi Wawancara</a>
                <a class="collapse-item" href="/anggota">Anggota</a>
            </div>
        </div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="/teknisi">
            <i class="fa fa-gavel" aria-hidden="true"></i>
            <span>Teknisi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages1"
            aria-expanded="false" aria-controls="collapsePages1">
            <i class="fas fa-fw fa-folder"></i>
            <span>Servis</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/service">Jadwal Servis</a>
                <a class="collapse-item" href="/riwayat">Riwayat Servis</a>
            </div>
        </div>
    </li>
    @if (auth()->user()->role == 'su')
    <li class="nav-item">
        <a class="nav-link" href="/kelola">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span>Kelola user</span></a>

    </li>
    @endif
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    {{-- sidebar start --}}
    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->


    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="dashboard/img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}
    {{-- sidebar end --}}
</ul>
