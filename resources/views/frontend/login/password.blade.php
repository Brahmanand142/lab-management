 <form method="POST" action="{{ route('login') }}" encoding="multipart/form-data">
        @csrf
        <h4 class="text-center mb-3">Password</h4>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="passwrod" required>
        </div>
        <div class="mb-3">
          <input type="password" name="confirm-password" class="form-control" placeholder=" confirm your Password" required>
        </div>
        <div class="d-grid">
          <button class="btn btn-primary">Login</button>
        </div>
        </form>