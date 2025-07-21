@extends('layouts.admin')  
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.teachers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email"  required>
        </div>

       

        <div class="mb-3">
            <label for="faculty" class="form-label">Faculty</label>
            <input type="text" class="form-control" id="faculty" name="faculty"   required>
        </div>

        <div class="mb-3">
            <label for="lab" class="form-label">Lab Assigned</label>
            <input type="text" class="form-control" id="lab" name="lab"   required>
        </div>

        <div class="mb-3">
            <label for="assignment" class="form-label">Assignment (Optional)</label>
            <input type="text" class="form-control" id="assignment" name="assignment" value="{{ old('assignment') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create Teacher</button>
    </form>
</div>
@endsection