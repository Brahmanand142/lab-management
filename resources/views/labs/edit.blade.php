@extends('teacher.layouts.master')
@section('title','Lab Form')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <style>
      .form-container {
          background-color: #ffffff;
            padding: 30px;
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px; /* Max width for the form */
            margin-left: 400px; /* This will push the element to the right */
 
        }
        .form-label {
            font-weight: 500;
            color: #343a40;
        }
        .form-control, .form-select {
            border-radius: 8px; /* Rounded corners for inputs */
            padding: 10px 15px;
            border: 1px solid #ced4da;
        }
        .form-control:focus, .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px; /* Rounded corners for button */
            padding: 10px 20px;
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px); /* Slight lift on hover */
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
            font-weight: 700;
        }
 </style>
</head>
<body>
 <form action="{{route('lab.update', $lab->id)}}" class="form-container" method="POST">
@csrf
@method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" required name="name" value="{{ old('name', $lab->name) }}" >
    </div>

    <div class="mb-3">
        <label for="faculty" class="form-label">Faculty</label>
        <input type="text" class="form-control" id="faculty" placeholder="Enter faculty" name="faculty"     value="{{ old('faculty', $lab->faculty) }}"></div>

    <div class="mb-4">
        <label for="status" class="form-label">Status</label>
        <input class="form-select" id="status" required name="status " value="{{ old('status', $lab->status) }}">
    </input>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection