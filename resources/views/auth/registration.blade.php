@extends('layout/template')

@section('container')
<main class="signup-form">
    <div class="cotainer  row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User <i class="fas fa-user-plus"></i></h3>
                    <div class="card-body">

                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary">Sign up</button><br>
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
