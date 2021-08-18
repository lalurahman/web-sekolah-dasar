<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <div class="sidebar-brand d-flex align-items-center justify-content-center mt-2" >
      <div class="sidebar-brand-icon">
          {{-- <i class="fas fa-laugh-wink"></i> --}}
          <img src="/assets/img/logo.png" width="60" alt="">
      </div>
      {{-- <div class="sidebar-brand-text mx-3">SD Inpres Bambamanurung</div> --}}
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider my-0 mt-4">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ (request()->is('administrator')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard-admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">


  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ (request()->is('administrator/data-guru*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin-data-guru') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Guru</span>
      </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

<li class="nav-item {{ (request()->is('administrator/data-staff*')) ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin-data-staff') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Data Staff</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ (request()->is('administrator/data-siswa*')) ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin-data-siswa') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Data Siswa</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ (request()->is('administrator/data-kelas*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin-data-kelas') }}">
          <i class="fas fa-fw fa-list"></i>
          <span>Data Kelas</span>
      </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item {{ (request()->is('administrator/data-pelajaran*')) ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin-data-pelajaran') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Data Mata Pelajaran</span>
    </a>
  </li>



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


</ul>