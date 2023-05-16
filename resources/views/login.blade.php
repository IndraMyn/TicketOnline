@extends('layouts.layout')

@section('title', 'Login')

@section('content')

    <div class="container mt-5">
        <div class="col">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    Username or password is wrong!
                </div>
            @endif

            <div class="card">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="Your Email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Your Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <hr />
                        <div class="mb-3 text-center">
                            <a type="button" href="/register" class="btn btn-primary">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
