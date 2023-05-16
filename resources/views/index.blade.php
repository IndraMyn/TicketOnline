@extends('layouts.layout')

@section('title', 'Home')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h1>Selamat datang di pemesanan tiket konser</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('checkout') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Your name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Your Email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="phone-number" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phoneNumber') is-invalid @enderror"
                                    name="phoneNumber" id="phone-number" placeholder="Your Phone Number">
                                @error('phoneNumber')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-success">Order</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if (Session::get('success'))
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1>Your Id Ticket</h1>
                                <input style="text-align: center" class="form-control form-control-large" readonly id="copy" value="{{ Session::get('success') }}" />
                                <a href="#" onclick="handleCopy()">copy</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script>
        function handleCopy() {
            // Get the text field
            var copyText = document.getElementById("copy");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            alert("Success copy ID Ticket");
        }
    </script>

@endsection
