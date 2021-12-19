<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-globe"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TEST MGS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ (request()->is("data/*")) ? 'active' : '' }}">
    <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
        <i class="fas fa-fw fa-database"></i>
        <span>Data</span>
    </a>
    <div id="collapseData" class="collapse mt-2" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ (request()->is("data/siswa*")) ? 'active' : '' }}" href="{{ route('data.siswa') }}">Siswa</a>
            <a class="collapse-item {{ (request()->is("data/wali_kelas*")) ? 'active' : '' }}" href="{{ route('data.wali_kelas') }}">Wali Kelas</a>
            <a class="collapse-item {{ (request()->is("data/kelas*")) ? 'active' : '' }}" href="{{ route('data.kelas') }}">Kelas</a>
            <a class="collapse-item {{ (request()->is("data/jurusan*")) ? 'active' : '' }}" href="{{ route('data.jurusan') }}">Jurusan</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ (request()->is("dokumen*")) ? 'active' : '' }}">
    <a class="nav-link pb-0" href="{{ route('dokumen') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Dokumen</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider mt-3">

<!-- Heading -->
<div class="sidebar-heading">
    User
</div>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link py-0" href="tables.html" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>