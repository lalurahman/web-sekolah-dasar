@extends('layouts.guru')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Daftar Tugas {{ Auth::user()->classroom->name }}</h1>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahTugasModal"><i class="fas fa-plus"></i> Buat Tugas Baru</button>
  
</div>

<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
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

  @foreach ($tugas as $tugas)
  
    <div class="col-12 col-md-3 mb-4">
      <div class="card shadow h-100">
          <div class="card-body">
              <div class="row no-gutters align-items-center mb-3">
                  <div class="col-12">
                      {{-- <div class="mb-2 text-xs text-gray-800 ">Bahasa Indonesia</div> --}}
                      <span class="badge badge-secondary mb-2 mt-0">{{ $tugas->lesson->name }}</span>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                          {{ $tugas->title }}
                      </div>
                      <div class="text-gray text-xs">Batas Kumpul : {{ date('d-m-Y', strtotime($tugas->due_date)) }}</div>
                  </div>
              </div>
              <div class="row">
                <div class="col-12 text-center">
                  <a href="{{ route('guru-detail-tugas', $tugas->id) }}" class="btn btn-block btn-sm btn-primary">
                    <i class="fas fa-eye"></i>
                    <span class="text ml-1">Lihat Detail Tugas</span>
                  </a>
                </div>
              </div>
          </div>
      </div>
    </div>
  @endforeach


</div>
@endsection

@push('addon-script')
<div class="modal fade" id="tambahTugasModal" tabindex="-1" aria-labelledby="tambahTugasModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahTugasModalLabel">Tambah Tugas Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('guru-tambah-tugas') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="row">
                  <div class="form-group col-12">
                      <label for="lesson_id">Mata Pelajaran</label>
                      <select name="lesson_id" id="lesson_id" class="form-control">
                        @foreach ($mata_pelajaran as $pelajaran)
                            <option value="{{ $pelajaran->id }}">{{ $pelajaran->name }}</option>
                        @endforeach
                      </select>
                      @error('lesson_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group col-12">
                      <label for="title">Judul Tugas</label>
                      <input type="text" name="title" id="title" class="form-control" required>
                      @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group col-12">
                    <label for="detail">Detail Tugas</label>
                    <input type="text" name="detail" id="detail" class="form-control">
                    @error('detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group col-12">
                    <label for="due_date">Batas Waktu Kumpul</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" required>
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