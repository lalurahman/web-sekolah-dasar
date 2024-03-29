@extends('layouts.admin')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Data Guru</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin-update-guru', $guru->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="classroom_id">Wali Kelas</label>
                    <select name="classroom_id" id="classroom_id" class="form-control">
                        <option value="">bukan wali kelas</option>
                        @foreach ($kelas as $kelas)
                            <option value="{{ $kelas->id }}" @if ($kelas->id == $guru->classroom_id) selected @endif>{{ $kelas->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-right">
                    <a href="{{ route('admin-data-guru') }}" class="btn btn-secondary mr-2">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
