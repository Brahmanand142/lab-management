@extends('backend.layouts.master') 
@section('title', 'Registration')

@section('content')
<div class="container mt-5">
    <h2>Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.register') }}" method="POST">
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
            <label for="password" class="form-label">Password</label>
            <input type="password" name="email" class="form-control" required>
        </div>
        
         <div class="mb-3">
          <select name="role" class="form-select" required>
             
            <option value="teacher">Teacher</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
