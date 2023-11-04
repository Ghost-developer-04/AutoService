@extends('layouts.app')
@section('title') Login | AutoService @endsection
@section('main')
    <div class="container-xl my-4">
        <div class="row justify-content-center g-3 g-sm-4">
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body p-3">
                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                @error('full_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <a href="{{ route('register') }}" class="text-decoration-none text-danger border-bottom border-3 border-danger">Register</a>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm mt-5">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection