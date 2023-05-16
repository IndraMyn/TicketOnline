@extends('layouts.layout')

@section('title', 'Ticket')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mb-3">
                <a type="button" href="/order" class="btn btn-primary ms-auto">Order</a>
                <a type="button" href="/report" class="btn btn-primary ms-3">Report</a>
            </div>
            <div class="col-12">
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
                    <div class="card-header text-center">
                        <h2>Check-In Ticket</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ticket') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text"
                                    class="form-control form-control-lg @error('ticketId') is-invalid @enderror"
                                    name="ticketId" id="ticketId" placeholder="Input ID Ticket Here">
                                @error('ticketId')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-success">Check-In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
