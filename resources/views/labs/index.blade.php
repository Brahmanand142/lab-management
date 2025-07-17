  @extends('teacher.layouts.master')
@section('title','Lab Table')
@section('content')
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab Table</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Inter font (for better aesthetics) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
       
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
            padding: 12px;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
            border-bottom: none;
        }
        .table tbody tr:nth-of-type(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .pagination {
            justify-content: center;
            margin-top: 30px;
        }
        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        .page-link {
            color: #007bff;
            border-radius: 5px;
            margin: 0 2px;
        }
        .page-link:hover {
            color: #0056b3;
            background-color: #e9ecef;
        }
        h2 {
            color: #343a40;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">


        <a href='{{ route("lab.create")}}' class='btn btn-primary' >Create New</a>
        <h2 class="mb-4">Labs List</h2>

        <div class="table-responsive rounded-3">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name/th>
                        <th scope="col">Faculty</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through the assignments data -->
@forelse ($labs as $lab)
    <tr>
        <td>{{ $lab->id }}</td>
        <td>{{ $lab->name }}</td>
        <td>{{ $lab->faculty }}</td>
        <td>
            <a href="{{ route('lab.edit', $lab->id)}}" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-danger">Show</a>
        </td>
    </tr>
@empty
     
                        <tr>
                            <td colspan="9" class="text-center py-4">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $labs->links('') }}
        </div>
    </div>

    <!-- Bootstrap JS CDN (Bundle includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
@endsection
