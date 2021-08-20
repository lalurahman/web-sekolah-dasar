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
            <h6 class="m-0 font-weight-bold text-white text-uppercase">{{ $detail_tugas_siswa->task->title }}</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="detailTugas">
            <div class="card-body">
                {{ $detail_tugas_siswa->task->detail }}
            </div>
        </div>
    </div>
    
  </div>
</div>
<div class="row">
    <div class="col-12">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>     
                    <span>{{ $error }}</span>
                </div>
            @endforeach
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <span>{{ $message }}</span>
            </div>
        @endif
    </div>
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body py-4">
                <div class="row mb-3 text-uppercase">
                    <div class="col-12 col-md-4">
                        <h6>Nama Lengkap : {{ $detail_tugas_siswa->user->name }}</h6>
                    </div>
                    <div class="col-12 col-md-4">
                        <h6>NISN : {{ $detail_tugas_siswa->user->nisn }}</h6>
                    </div>
                    <div class="col-12 col-md-2">
                        <h6>Nilai : {{ $detail_tugas_siswa->nilai }}</h6>
                    </div>
                    
                    <div class="col-12 col-md-2">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#beriNilaiModal">Beri Nilai</button>
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
<div class="modal fade" id="beriNilaiModal" tabindex="-1" aria-labelledby="beriNilaiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="beriNilaiModalLabel">Beri Nilai Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('guru-beri-nilai-tugas-siswa', $detail_tugas_siswa->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
          @csrf
          <div class="modal-body">
              <div class="row">
                  <div class="form-group col-12">
                      <label for="nilai">Masukkan Nilai (1-100)</label>
                      <input type="number" name="nilai" id="nilai" class="form-control" value="{{ $detail_tugas_siswa->nilai }}" required>
                      @error('nilai')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Beri Nilai</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endpush