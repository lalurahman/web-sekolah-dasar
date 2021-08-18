@extends('layouts.guru')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Daftar Tugas {{ Auth::user()->kelas->name }}</h1>
  <a href="#" class="btn btn-info"><i class="fas fa-plus"></i> Buat Tugas Baru</a>
  
</div>

<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-12 col-md-3 mb-4">
    <div class="card shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center mb-3">
                <div class="col-12">
                    {{-- <div class="mb-2 text-xs text-gray-800 ">Bahasa Indonesia</div> --}}
                    <span class="badge badge-secondary mb-2 mt-0">Bahasa Indonesia</span>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                        Tugas merangkum materi yang ada di halaman 2
                    </div>
                    <div class="text-gray text-xs">Batas Kumpul : 20/08/2021</div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <a href="#" class="btn btn-block btn-sm btn-primary">
                  <i class="fas fa-eye"></i>
                  <span class="text ml-1">Lihat Detail Tugas</span>
                </a>
              </div>
            </div>
        </div>
    </div>
  </div>

  <div class="col-12 col-md-3 mb-4">
    <div class="card shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center mb-3">
                <div class="col-12">
                    {{-- <div class="mb-2 text-xs text-gray-800 ">Bahasa Indonesia</div> --}}
                    <span class="badge badge-secondary mb-2 mt-0">Bahasa Indonesia</span>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                        Tugas merangkum materi yang ada di halaman 2
                    </div>
                    <div class="text-gray text-xs">Batas Kumpul : 20/08/2021</div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <a href="#" class="btn btn-block btn-sm btn-primary">
                  <i class="fas fa-eye"></i>
                  <span class="text ml-1">Lihat Detail Tugas</span>
                </a>
              </div>
            </div>
        </div>
    </div>
  </div>

  <div class="col-12 col-md-3 mb-4">
    <div class="card shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center mb-3">
                <div class="col-12">
                    {{-- <div class="mb-2 text-xs text-gray-800 ">Bahasa Indonesia</div> --}}
                    <span class="badge badge-secondary mb-2 mt-0">Bahasa Indonesia</span>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                        Tugas merangkum materi yang ada di halaman 2
                    </div>
                    <div class="text-gray text-xs">Batas Kumpul : 20/08/2021</div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <a href="#" class="btn btn-block btn-sm btn-primary">
                  <i class="fas fa-eye"></i>
                  <span class="text ml-1">Lihat Detail Tugas</span>
                </a>
              </div>
            </div>
        </div>
    </div>
  </div>

  <div class="col-12 col-md-3 mb-4">
    <div class="card shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center mb-3">
                <div class="col-12">
                    {{-- <div class="mb-2 text-xs text-gray-800 ">Bahasa Indonesia</div> --}}
                    <span class="badge badge-secondary mb-2 mt-0">Bahasa Indonesia</span>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                        Tugas merangkum materi yang ada di halaman 2
                    </div>
                    <div class="text-gray text-xs">Batas Kumpul : 20/08/2021</div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <a href="#" class="btn btn-block btn-sm btn-primary">
                  <i class="fas fa-eye"></i>
                  <span class="text ml-1">Lihat Detail Tugas</span>
                </a>
              </div>
            </div>
        </div>
    </div>
  </div>


</div>
@endsection