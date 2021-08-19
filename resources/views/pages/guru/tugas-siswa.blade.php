@extends('layouts.guru')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  {{-- <h1 class="h3 mb-0 text-gray-800">Detail Tugas</h1> --}}
  
  
</div>

<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-12 mb-4">
    <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a href="#detailTugas" class="d-block bg-success card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="detailTugas">
            <h6 class="m-0 font-weight-bold text-white text-uppercase">Tugas merangkum materi yang ada di halaman 2</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="detailTugas">
            <div class="card-body">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus architecto deserunt nobis, neque officiis vitae explicabo beatae qui impedit voluptatum illum quos magni nihil ad incidunt repellendus praesentium sequi iure eveniet mollitia veritatis tenetur, consectetur nisi ex! Nisi consectetur reprehenderit fuga! Perspiciatis, ipsam nostrum? Illo explicabo quibusdam magnam facilis aut.
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
                    <div class="col-12 col-md-2">
                        <button class="btn btn-sm btn-primary">Beri Nilai</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img src="/assets/img/portfolio/portfolio-6.jpg" alt="foto tugas" class="w-100 img-thumbnail">
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="/assets/img/portfolio/portfolio-5.jpg" alt="foto tugas" class="w-100 img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<div class="modal fade" id="editTugasModal" tabindex="-1" aria-labelledby="editTugasModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTugasModalLabel">Tambah Tugas Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="row">
                  <div class="form-group col-12">
                      <label for="lessons_id">Mata Pelajaran</label>
                      <select name="leesons_id" id="lessons_id" class="form-control">
                        
                      </select>
                      @error('lessons_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group col-12">
                      <label for="title">Judul Tugas</label>
                      <input type="text" name="title" id="title" class="form-control">
                      @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group col-12">
                    <label for="detail_task">Detail Tugas</label>
                    <input type="text" name="detail_task" id="detail_task" class="form-control">
                    @error('detail_task')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group col-12">
                    <label for="due_date">Batas Waktu Kumpul</label>
                    <input type="date" name="due_date" id="due_date" class="form-control">
                    @error('due_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Tugas</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endpush