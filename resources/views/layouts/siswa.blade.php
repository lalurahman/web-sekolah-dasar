<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SDI Bambamanurung</title>

    @include('includes.admin.style')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
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
            <li class="nav-item {{ (request()->is('siswa')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard-siswa') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
          
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
          
            <li class="nav-item {{ (request()->is('siswa/tugas*')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Kelas</span>
                </a>
                <div id="collapseUtilities" class="collapse {{ (request()->is('siswa/tugas*')) ? 'show' : '' }}" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('siswa/tugas*')) ? 'active' : '' }}" href="{{ route('siswa-data-tugas') }}">Daftar Tugas</a>
                        <a class="collapse-item" href="#">Jadwal Pelajaran</a>
                        <a class="collapse-item" href="#">Pengumuman</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item {{ (request()->is('siswa/tugas*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('siswa-data-tugas') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Daftar Tugas</span>
                </a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ (request()->is('siswa/profil*')) ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>
        
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
          
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
          
          
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('includes.admin.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('includes.admin.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @include('includes.admin.script')
    @stack('addon-script')

</body>

</html>