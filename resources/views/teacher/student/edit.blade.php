 @extends('teacher.layouts.master')  

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
     
        <a href="{{ route('table.student.index') }}" class="btn btn-secondary">Back to Students List</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Corrected form action: Should use 'admin.students.update' --}}
    <form action="{{ route('table.student.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Use PUT method for updates --}}

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="faculty" class="form-label">Faculty</label>
            <input type="text" class="form-control" id="faculty" name="faculty" value="{{ old('faculty', $student->faculty) }}" required>
        </div>

        <div class="mb-3">
            <label for="lab_id" class="form-label">Lab ID</label>
            <input type="number" class="form-control" id="lab_id" name="lab_id" value="{{ old('lab_id', $student->lab_id) }}" required min="0">
        </div>

        <div class="mb-3">
            <label for="assignment_id" class="form-label">Assignment ID</label>
            <input type="number" class="form-control" id="assignment_id" name="assignment_id" value="{{ old('assignment_id', $student->assignment_id) }}" required min="0">
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection