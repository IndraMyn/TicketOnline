@extends('layouts.layout')

@section('title', 'Edit Order')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                @if (Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        Successfully
                    </div>
                @endif
                @if (Session::get('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('failed') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Edit
                    </div>
                    <div class="card-body">
                        <form action="{{ url('order-update', $checkout->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Your name" value={{ $checkout->name }}>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Your Email" value={{ $checkout->email }}>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="phone-number" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phoneNumber') is-invalid @enderror"
                                    name="phoneNumber" id="phone-number" placeholder="Your Phone Number"
                                    value={{ $checkout->phone_number }}>
                                @error('phoneNumber')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-3 text-center">
                                <a href="/order" type="button" class="btn btn-secondary me-3">Back</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
