@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8 py-5">
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
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun Siswa Baru</h1>
                            </div>
                            <form class="user" action="{{ route('register-student') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        id="name" name="name"
                                        placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Masukkan Email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar Akun
                                </button>
                                <hr>
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-user btn-block">
                                    Masuk akun yang sudah terdaftar
                                </a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection