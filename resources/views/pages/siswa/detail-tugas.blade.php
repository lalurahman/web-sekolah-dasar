@extends('layouts.siswa')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  {{-- <h1 class="h3 mb-0 text-gray-800">Detail Tugas</h1> --}}
  
  
</div>

<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-12 mb-4">
    <div class="card bg-success text-white shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center mb-3">
                <div class="col-12">
                    {{-- <div class="mb-2">Mata Pelajaran : Bahasa Indonesia</div> --}}
                    <span class="badge badge-secondary mb-2 mt-0 py-1 px-2">Bahasa Indonesia</span>
                    <div class="font-weight-bold text-uppercase mb-2">
                        Tugas merangkum materi yang ada di halaman 2
                    </div>
                    <div class=" mb-2">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus architecto deserunt nobis, neque officiis vitae explicabo beatae qui impedit voluptatum illum quos magni nihil ad incidunt repellendus praesentium sequi iure eveniet mollitia veritatis tenetur, consectetur nisi ex! Nisi consectetur reprehenderit fuga! Perspiciatis, ipsam nostrum? Illo explicabo quibusdam magnam facilis aut.
                    </div>
                    <div class="text-gray">Batas Kumpul : 20/08/2021</div>
                </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-sm btn-primary">
                  <i class="fas fa-edit"></i>
                  <span class="text ml-1">Kumpul Tugas</span>
                </button>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
          <div class="card-body py-4">
            <div class="row mb-3 text-uppercase">
                <div class="col-12 col-md-4">
                    <h6>Nama Lengkap : Lalu Abdurrahman</h6>
                </div>
                <div class="col-12 col-md-4">
                    <h6>NISN : 09807897</h6>
                </div>
                <div class="col-12 col-md-2">
                    <h6>Nilai : -</h6>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12">
                  <div class="alert alert-success text-center">Tugas Belum Dikumpul</div>
                </div>
                {{-- <div class="col-12 col-md-6">
                    <img src="/assets/img/portfolio/portfolio-6.jpg" alt="foto tugas" class="w-100 img-thumbnail">
                </div>
                <div class="col-12 col-md-6">
                    <img src="/assets/img/portfolio/portfolio-5.jpg" alt="foto tugas" class="w-100 img-thumbnail">
                </div> --}}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
