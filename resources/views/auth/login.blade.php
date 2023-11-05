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
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                       id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
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