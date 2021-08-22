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
            
            {{-- kerjakan tugas --}}
            @if (!$detail_tugas)
              <div class="row">
                <div class="col-12">
                  <form action="{{ route('siswa-kerjakan-tugas') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $tugas->id }}">
                    <button type="submit" class="btn btn-sm btn-primary">
                      <span class="text ml-1 px-2">Kerjakan Tugas</span>
                    </button>
                  </form>
                </div>
              </div>
            @else 
            <div class="row">
              <div class="col-12">
                <form action="{{ route('siswa-upload-tugas') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="detail_task_id" value="{{ $detail_tugas->id }}">
                  <input type="file" id="file" class="d-none" name="photo" onchange="form.submit()">
                  <button type="button" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i>
                    <span class="text ml-1 px-2" onclick="thisFileUpload()">Kumpul Tugas</span>
                  </button>
                </form>
              </div>
            </div>
            @endif
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
    @if ($detail_tugas)
      <div class="col-12">
          <div class="card shadow">
            <div class="card-body py-4">
              <div class="row mb-3 text-uppercase">
                  <div class="col-12 col-md-4">
                      <h6>Nama Lengkap : {{ Auth::user()->name }}</h6>
                  </div>
                  <div class="col-12 col-md-4">
                      <h6>NISN : {{ Auth::user()->nisn }}</h6>
                  </div>
                  <div class="col-12 col-md-2">
                      <h6>Nilai : {{ $detail_tugas->nilai }}</h6>
                      {{-- <h6>{{ $detail_tugas->id }}</h6> --}}
                  </div>    
              </div>
              <div class="row">
                @forelse ($detail_tugas->detail_task_gallery as $tugas_siswa)
                  <div class="col-12 col-md-6 mb-3">
                    <img src="{{ asset('tugas-siswa/'.$tugas_siswa->photo) }}" alt="foto tugas" class="w-100 img-thumbnail">
                  </div>
                @empty
                  <div class="col-12">
                    <div class="alert alert-success text-center">Tugas Belum Dikumpul</div>
                  </div>
                @endforelse
                
              </div>
            </div>
          </div>
      </div>
    @endif
</div>
@endsection

@push('addon-script')
<script>
  function thisFileUpload() {
      document.getElementById("file").click();
  }
</script>
@endpush
