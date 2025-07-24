@extends('frontend.layouts.master')
@section('title','Password Reset')
@section('content')
@if ($errors->any())

 
    <div class="alert alert-danger alert-dismissible fade show" role="alert" >
 <div class="alert alert-danger text-primary d-flex align-items-center justify-content-between" role="alert">
    <div>
        <strong>Oops! Something went wrong:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

</div>
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
    <div class="text-success">
    </div>
    <a href="{{ route('login.form') }}" class="btn btn-sm btn-outline-success ms-3">
        Go to Login
    </a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <style>
.container.my-5 {
    background: linear-gradient(to right, #e0f2f7, #d0efff); /* Light gradient background for the container */
    padding: 20px; /* Add some padding around the form */
    border-radius: 10px; /* Slightly rounded corners for the container */
}
 
.card-title {
    color: #3ac6bfff; 
    font-size: 1.8rem; 
    margin-bottom: 1.5rem;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.1); 
}
.form-control {
    border-radius: 5px; 
    border: 1px solid #ced4da; 
    padding: .75rem 1rem; 
    font-size: 1rem;
}
.btn-primary {
    background: linear-gradient(to right, #4CAF50, #8bc34a); 
    border: none;
    padding: 0.75rem 1.5rem;
    font-size: 1.1rem;
    border-radius: 50px; /* Pill-shaped button */
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
.btn-primary:hover {
    background: linear-gradient(to right, #8bc34a, #4CAF50); 
    box-shadow: 0 6px 12px rgba(0,0,0,0.3);
    transform: translateY(-2px); 
}
    </style>
 
 


 
<div class="container my-5" style="max-width: 420px;">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h4 class="card-title text-center mb-4">Reset Your Password</h4>

            <form method="POST" action="{{ route('password.reset.update', $token) }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your new password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary fw-bold">Update Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
 @endsection