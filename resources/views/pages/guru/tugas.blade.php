@extends('layouts.guru')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Daftar Tugas {{ Auth::user()->kelas->name }}</h1>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahTugasModal"><i class="fas fa-plus"></i> Buat Tugas Baru</button>
  
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
                <a href="{{ route('guru-detail-tugas') }}" class="btn btn-block btn-sm btn-primary">
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
      <form action="" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="row">
                  <div class="form-group col-12">
                      <label for="lessons_id">Mata Pelajaran</label>
                      <select name="leesons_id" id="lessons_id" class="form-control">
                        @foreach ($mata_pelajaran as $pelajaran)
                            <option value="{{ $pelajaran->id }}">{{ $pelajaran->name }}</option>
                        @endforeach
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