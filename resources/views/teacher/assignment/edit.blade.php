@extends('teacher.layouts.master')
@section('title', 'Edit Assignment')
@section('content')
<div class="container">
 
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
    
         <h1 class="mb-4">Edit Assignment #{{ $assignment->assignment_id }}</h1>

        <form action="{{ route('assignment.update', $assignment->assignment_id) }}" method="POST">
         @csrf
          @method('PUT')

            <div class="mb-3">
                <label for="assignment_name" class="form-label">Assignment Name</label>
                <input type="text" class="form-control" id="assignment_name" name="assignment_name"  value="{{ old('assignment_name', $assignment->assignment_name) }}">
            </div>
 <div class="mb-3">
    <label for="assignment_description" class="form-label">Assignment Description</label>
    <textarea class="form-control" id="assignment_description" name="assignment_description" rows="3">{{ old('assignment_description', $assignment->assignment_description) }}</textarea>
</div>

            <div class="mb-3">
          <label for="assignment_type" class="form-label">Assignment Type</label>
                <select class="form-select" id="assignment_type" name="assignment_type" required>
                    {{-- The "Select Type" option has been removed as requested --}}
                    @php
                        $types = ['Homework', 'Project', 'Quiz', 'Exam', 'Presentation'];
                    @endphp
                    @foreach ($types as $type)
                        <option value="{{ $type }}" {{ old('assignment_type', $assignment->assignment_type) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="submission_date" class="form-label">Submission Date</label>
                <input type="date" class="form-control" id="submission_date"  name="submission_date"  value = "{{ old('submission_date', $assignment->submission_date) }}" >
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject"  value = "{{ old('subject', $assignment->subject) }}">
            </div>

            <div class="mb-3">
                <label for="faculty" class="form-label">Faculty</label>
                <input type="text" class="form-control" id="faculty" name="faculty"  value = "{{ old('faculty', $assignment->faculty) }}" >
            </div>

            <div class="mb-4">
                <label for="t_name" class="form-label">Teacher Name</label>
                <input type="text" class="form-control" id="t_name" name="t_name"  value = "{{ old('t_name', $assignment->t_name) }}" >
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit Assignment</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS CDN (Bundle includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
@endsection 
