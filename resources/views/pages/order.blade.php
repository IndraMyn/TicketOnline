@extends('layouts.layout')

@section('title', 'Order')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mb-3">
                <a type="button" href="/ticket" class="btn btn-primary ms-auto">Back</a>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Order</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" style="width: 100%">
                            <theadW>
                                <tr>
                                    <th colspan="1">No</th>
                                    <th colspan="1">Name</th>
                                    <th colspan="1">Email</th>
                                    <th colspan="1">Phone</th>
                                    <th colspan="1">Date</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = ($checkout->currentpage() - 1) * $checkout->perpage() + 1; ?>
                                    @foreach ($checkout as $item)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <form action="{{ url('order-delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    <a href="{{ url('order', $item->id) }}" type="button" class="btn btn-secondary">
                                                        Update
                                                    </a>
                                                    <button onclick="return confirm('Are you sure you want to delete this?');" type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        {{ $checkout->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
