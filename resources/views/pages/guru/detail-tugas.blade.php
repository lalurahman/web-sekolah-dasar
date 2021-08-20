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
    <div class="card bg-success text-white shadow h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center mb-3">
                <div class="col-12">
                    {{-- <div class="mb-2">Mata Pelajaran : Bahasa Indonesia</div> --}}
                    <span class="badge badge-secondary mb-2 mt-0 py-1 px-2">{{ $tugas->lesson->name }}</span>
                    <div class="font-weight-bold text-uppercase mb-2">
                        {{ $tugas->title }}
                    </div>
                    @if ($tugas->detail)
                        <div class=" mb-2">
                            {{ $tugas->detail }}
                        </div>
                    @endif
                    <div class="text-gray">Batas Kumpul : {{ date('d-m-Y', strtotime($tugas->due_date)) }}</div>
                </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editTugasModal">
                  <i class="fas fa-edit"></i>
                  <span class="text ml-1">Edit Tugas</span>
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Siswa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>sfs</td>
                                    <td>aadsf</td>
                                    <td><span class="badge badge-danger">belum diperiksa</span></td>
                                    
                                    <td>
                                        <a href="{{ route('guru-detail-tugas-siswa') }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Periksa</a>
                                        
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>sfs</td>
                                    <td>aadsf</td>
                                    <td><span class="badge badge-info">sudah diperiksa</span></td>
                                    
                                    <td>
                                        <a href="{{ route('guru-detail-tugas-siswa') }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat Tugas</a>
                                        
                                    </td>
                                </tr>
                            
                        </tbody>
                    </table>
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
      <form action="{{ route('guru-update-tugas', $tugas->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
          @csrf
          <div class="modal-body">
              <div class="row">
                  <div class="form-group col-12">
                      <label for="lesson_id">Mata Pelajaran</label>
                      <select name="lesson_id" id="lesson_id" class="form-control" >
                          @foreach ($mata_pelajaran as $pelajaran)
                            <option value="{{ $pelajaran->id }}" @if ($pelajaran->id == $tugas->lesson->id) selected @endif>{{ $pelajaran->name }}</option>
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
                      <input type="text" name="title" id="title" class="form-control" value="{{ $tugas->title }}" required>
                      @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group col-12">
                    <label for="detail">Detail Tugas</label>
                    <input type="text" name="detail" id="detail" class="form-control" value="{{ $tugas->detail }}">
                    @error('detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group col-12">
                    <label for="due_date">Batas Waktu Kumpul</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $tugas->due_date }}" required>
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