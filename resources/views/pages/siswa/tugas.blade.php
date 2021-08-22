@extends('layouts.siswa')

@section('content')
@if (Auth::user()->classroom)
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Daftar Tugas {{ Auth::user()->classroom->name }}</h1>
  
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  @foreach ($tugas as $tugas)
    <div class="col-12 col-md-6 mb-4">
        <div class="card shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center mb-3">
                    <div class="col-12">
                        {{-- <div class="mb-2 text-xs text-gray-800 ">Bahasa Indonesia</div> --}}
                        <span class="badge badge-secondary mb-3 mt-0 text-xs">{{ $tugas->lesson->name }}</span>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                            {{ $tugas->title }}
                        </div>
                        
                        <div class="text-gray text-xs">Batas Kumpul : {{ date('d-m-Y', strtotime($tugas->due_date)) }}</div>
                    </div>
                </div>
                {{-- @if ($detail_tugas->task_id == $tugas->id) --}}
                  {{-- <div class="row">
                    <div class="col-12 text-center">
                      <a href="{{ route('siswa-detail-tugas', $tugas->id) }}" class="btn btn-block btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                        <span class="text ml-1">Kerjakan Tugas</span>
                      </a>
                    </div>
                  </div> --}}
                {{-- @else --}}
                  <div class="row">
                    <div class="col-12 text-center">
                      <a href="{{ route('siswa-detail-tugas', $tugas->id) }}" class="btn btn-block btn-sm btn-info">
                        <i class="fas fa-eye"></i>
                        <span class="text ml-1">Lihat Tugas</span>
                      </a>
                    </div>
                    
                    @if (!$detail_tugas->task_id)
                        
                    <div class="col-12 text-center mt-2">
                        <form action="{{ route('siswa-kerjakan-tugas') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="task_id" value="{{ $tugas->id }}">
                          <button type="submit" class="btn btn-sm btn-primary btn-block">
                            <span class="text ml-1 px-2">Kerjakan Tugas</span>
                          </button>
                        </form>
                    </div>
                    @endif
                    
                  </div>
                  
                {{-- @endif --}}
            </div>
        </div>
    </div>
  @endforeach

</div>
@else
belum ada kelas
@endif
@endsection