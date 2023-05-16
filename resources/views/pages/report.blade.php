@extends('layouts.layout')


@section('title', 'Report')


@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mb-3">
                <a type="button" href="/ticket" class="btn btn-primary ms-auto">Back</a>
                <a href="/report/pdf" type="button" class="btn btn-secondary me-3" target="_blank">PDF</a>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Report</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" style="width: 100%">
                            <theadW>
                                <tr>
                                    <th colspan="1">No</th>
                                    <th colspan="1">Name</th>
                                    <th colspan="1">Email</th>
                                    <th colspan="1">Phone</th>
                                    <th colspan="1">ID Ticket</th>
                                    <th colspan="1">Check-in</th>
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
                                        <td>{{ $item->ticket_id }}</td>
                                        <td>{{ $item->is_checkin ? "Yes" : "No" }}</td>
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
