@extends('student.layouts.master')
@section('title', 'Submit Assignment')
@section('content')

<div class="container">

    <style>
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
            max-width: 700px;
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
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
        }
    </style>

    <h2>Submit Assignment</h2>

    <form action="{{ route('student.assignment.submit', $assignment->assignment_id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Assignment Name</label>
            <input type="text" class="form-control" value="{{ $assignment->assignment_name }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Assignment Description</label>
            <textarea class="form-control" rows="3" disabled>{{ $assignment->assignment_description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Submission Date</label>
            <input type="text" class="form-control" value="{{ $assignment->submission_date }}" disabled>
        </div>

        <div class="mb-3">
            <label for="submission_file" class="form-label">Upload Assignment File</label>
            <input type="file" class="form-control" name="submission_file" id="submission_file" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection
