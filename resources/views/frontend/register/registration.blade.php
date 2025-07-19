@extends('frontend.layouts.apps') 
@section('title', 'Student Registration')

@section('content')
<div class="container mt-5">
    <h2>Student Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('signup') }} ">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="faculty" class="form-label">Faculty</label>
            <input type="text" name="faculty" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Register Student</button>
    </form>
</div>
@endsection
