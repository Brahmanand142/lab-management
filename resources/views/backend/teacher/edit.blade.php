@extends(' backend.layouts.master') 

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Teacher: {{ $teacher->name }}</h2>
        <a href="{{ route('backend.teacher.index') }}" class="btn btn-secondary">Cancel</a>
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

    <form action="{{ route('backend.teacher.update', $teacher->id) }}" method="POST">
        @csrf   
        @method('PUT')  

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $teacher->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $teacher->email) }}" required>
        </div>

        

        <div class="mb-3">
            <label for="faculty" class="form-label">Faculty</label>
            <input type="text" class="form-control" id="faculty" name="faculty" value="{{ old('faculty', $teacher->faculty) }}" required>
        </div>

        <div class="mb-3">
            <label for="lab" class="form-label">Lab Assigned</label>
            <input type="text" class="form-control" id="lab" name="lab" value="{{ old('lab', $teacher->lab) }}" required>
        </div>

        <div class="mb-3">
            <label for="assignment" class="form-label">Assignment (Optional)</label>
            <input type="text" class="form-control" id="assignment" name="assignment" value="{{ old('assignment', $teacher->assignment) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Teacher</button>
    </form>
</div>
@endsection