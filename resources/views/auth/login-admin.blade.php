@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">

    <div class="col-12 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login Administrator</h1>
                    </div>
                    <form class="user" action="{{ route('login-process') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Masuk
                        </button>
                        
                    </form>
                    
                </div>
            </div>
        </div>

    </div>

</div>
@endsection