@extends('layouts.guru')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Profil {{ Auth::user()->name }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
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
        <form action="{{ route('update-profil-guru', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="name">Nama Guru</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $guru->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $guru->email }}" readonly>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" >
                    <small>kosongkan bila tidak diganti</small>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="nip">NIP</label>
                    <input type="number" name="nip" id="nip" class="form-control" value="{{ $guru->nip }}">
                    @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="phone">Nomor HP</label>
                    <input type="number" name="phone" id="phone" class="form-control" value="{{ $guru->phone }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $guru->address }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control">
                        @if ($guru->gender == 1)
                            <option value="1" selected>Laki Laki</option>
                            <option value="0">Perempuan</option>
                        @else
                            <option value="1">Laki Laki</option>
                            <option value="0" selected>Perempuan</option>
                        @endif
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ $guru->tempat_lahir }}">
                    @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $guru->tanggal_lahir }}">
                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" value="{{ $guru->kewarganegaraan }}">
                    @error('kewarganegaraan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-right">
                    
                    <button type="submit" class="btn btn-success">Update Profil</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
