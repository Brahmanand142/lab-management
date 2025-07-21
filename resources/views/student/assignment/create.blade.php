@extends('student.layouts.master')
@section('title','Submit Assignment')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Submission Form</title>
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
            max-width: 700px; /* Limit form width for better readability */
        }
        h2 {
            color: #343a40;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
        }
    </style>
 </head>
  <body>

    <div class="container">
    <h2 class="mb-5">Student Assignment Submission</h2>

    <form action="{{ route('assignment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="assignment_name" class="form-label">Assignment Name</label>
            <input type="text" class="form-control" id="assignment_name" name="assignment_name" placeholder="e.g., Chapter 5 Homework" required>
        </div>

        <div class="mb-3">
            <label for="assignment_description" class="form-label">Assignment Description</label>
            <textarea class="form-control" id="assignment_description" name="assignment_description" rows="3" placeholder="Brief description about your assignment..." required></textarea>
        </div>

        <div class="mb-3">
            <label for="assignment_file" class="form-label">Upload File</label>
            <input type="file" class="form-control" id="assignment_file" name="assignment_file" required>
        </div>

        <div class="mb-3">
            <label for="submission_date" class="form-label">Submission Date</label>
            <input type="date" class="form-control" id="submission_date" name="submission_date" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="e.g., Mathematics" required>
        </div>

        <div class="mb-3">
            <label for="faculty" class="form-label">Faculty</label>
            <input type="text" class="form-control" id="faculty" name="faculty" placeholder="e.g., Engineering" required>
        </div>

        <div class="mb-3">
            <label for="t_name" class="form-label">Teacher Name</label>
            <input type="text" class="form-control" id="t_name" name="t_name" placeholder="e.g., Mr. Sharma" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit Assignment</button>
        </div>
    </form>
    </div>
    </body>
</html>

@endsection
