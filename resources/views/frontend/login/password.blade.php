 
 <form method="POST" action="{{ route('password.reset.update',$token) }}" encoding="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $token}}" name="token">
        <h4 class="text-center mb-3">Password</h4>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="passwro" required>
        </div>
        <div class="mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder=" confirm your Password" required>
        </div>
        <div class="d-grid">
          <button class="btn btn-primary">Login</button>
        </div>
        </form>