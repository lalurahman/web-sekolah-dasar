@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">

    <div class="col-12 col-md-6 py-5">

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
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-5">Selamat Datang!</h1>
                    </div>
                    <form class="user" action="{{ route('login-process') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan Email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Masuk
                        </button>
                        <hr>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-user btn-block">
                            Daftar Akun Siswa Baru
                        </a>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>

</div>
@endsection