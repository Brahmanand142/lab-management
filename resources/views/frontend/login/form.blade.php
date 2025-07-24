@extends('frontend.layouts.log')
@section('title', 'Login & Signup')
@section('content')


<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <form method="POST" action="{{ route('signup') }}">
        @csrf
        @method('POST')

        <h4 class="text-center mb-3">Sign Up</h4>
        <div class="mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full Name" required>
        </div>
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="d-grid">
          <button class="btn btn-success">Sign Up</button>
        </div>
        <p class="text-center mt-3">
          Already have an account?
          <a href="#" id="openLogin">Login here</a>
        </p>
      </form>
    </div>
  </div>
</div>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <form method="POST" action="{{ route('login') }}" encoding="multipart/form-data">
        @csrf
        <h4 class="text-center mb-3">Login</h4>
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="d-grid">
          <button class="btn btn-primary">Login</button>
        </div>
        <p class="text-center mt-3">
          Don't have an account?
          <a href="#" id="openSignup">Sign Up here</a>
       </p>
        <p class="text-center mt-3">
          Forgotten Password?
          <a href="{{ route('password.reset')}}"  id="openSignup">Reset</a>
       </p>
      </form>
       
    </div>
  </div>
</div>



<!-- Modal Switcher Script -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    const signupModal = new bootstrap.Modal(document.getElementById('signupModal'));

    loginModal.show(); // Show login modal on page load

    document.getElementById('openSignup').addEventListener('click', (e) => {
      e.preventDefault();
      loginModal.hide();
      setTimeout(() => signupModal.show(), 300);
    });

    document.getElementById('openLogin').addEventListener('click', (e) => {
      e.preventDefault();
      signupModal.hide();
      setTimeout(() => loginModal.show(), 300);
    });
  });
</script>

@endsection
