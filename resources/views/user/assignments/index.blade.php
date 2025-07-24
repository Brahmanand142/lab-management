@extends('student.layouts.master')
@section('title','My Assignments')
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
<div class="container">
    <h2 class="mb-4 text-center">My Assignments</h2>

    <div class="table-responsive rounded-3">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Assignment Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Submission Date</th>
                    <th>Subject</th>
                    <th>Faculty</th>
                    <th>Teacher</th>
                    <th>Submit File</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->assignment_id }}</td>
                        <td>{{ $assignment->assignment_name }}</td>
                        <td>{{ $assignment->assignment_type }}</td>
                        <td>{{ $assignment->assignment_description }}</td>
                        <td>{{ \Carbon\Carbon::parse($assignment->submission_date)->format('Y-m-d') }}</td>
                        <td>{{ $assignment->subject }}</td>
                        <td>{{ $assignment->faculty }}</td>
                        <td>{{ $assignment->t_name }}</td>
                        <td>
                            <form action="{{ route('assignment.submit', $assignment->assignment_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="submission_file" class="form-control mb-2" required>
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
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

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $assignments->links() }}
    </div>
</div>
@endsection