<!DOCTYPE html>
<html>
<head>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
 
	<div class="container-fluid">
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
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
                        @foreach ($checkout as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->ticket_id }}</td>
                                <td>{{ $item->is_checkin ? "Yes" : "No" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 
</body>
</html>
