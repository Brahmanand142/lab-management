@extends('user.layouts.master')
@section('title','Assignments Table')
@section('content')
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments Table</title>
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
        <h2 class="mb-4">Assignments List</h2>
        <div class="table-responsive rounded-3">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Assignment Name</th>
                        <th scope="col">Assignment Type</th>
                         <th scope="col">Assignment description</th>
                        <th scope="col">Submission Date</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Lab Name</th>
                        <th scope="col">Teacher Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
              <tbody>
                    @forelse ($assignments as $assignment)
                        <tr>
                            <td>{{ $assignment->assignment_id }}</td>
                            <td>{{ $assignment->assignment_name }}</td>
                            <td>{{ $assignment->assignment_type }}</td>
                            <td>{{ $assignment->assignment_description }}</td>
                            {{-- Format Unix timestamp to a readable date --}}
                            <td>{{  $assignment->submission_date  }}</td>
                            <td>{{ $assignment->subject }}</td>
                            <td>{{ $assignment->labname }}</td>
                            <td>{{ $assignment->t_name }}</td>
                            <td>{{ $assignment->created_at }}</td>
                            <td>{{ $assignment->updated_at }}</td>
                            <td>
                                <a href="{{ route('assignment.submit_form', [
    'assignment_name' => $assignment->assignment_name,
    'teacher_name'    => $assignment->t_name,
    'labname'         => $assignment->labname,  
    'subject'         => $assignment->subject,
]) }}" class="btn btn-success">Submit Assignment</a>  <!-- use 'labname' key -->

                                       <!-- add any other data you want to prefill the form -->
                                  <form action="{{ route('assignment.destroy', $assignment->assignment_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this lab?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">No assignments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
 
       
    </div>

    <!-- Bootstrap JS CDN (Bundle includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
@endsection