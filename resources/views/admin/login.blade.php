<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background: linear-gradient(to right, #e0eafc, #cfdef3);
    }
    .card {
      border: none;
      border-radius: 15px;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #0d6efd;
    }
    .btn-primary {
      width: 100%;
      border-radius: 30px;
      font-weight: bold;
    }
    .signup-link a {
      text-decoration: none;
      font-weight: 500;
      color: #0d6efd;
    }
    .signup-link a:hover {
      text-decoration: underline;
    }
    .form-label {
      font-weight: 500;
    }
    .card-title {
      font-weight: 600;
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="card shadow-lg p-4" style="width: 100%; max-width: 420px;">
    
    @if (session('success'))
      <div class="alert alert-success text-center mb-3">
        {{ session('success') }}
      </div>
    @elseif (session('error'))  
      <div class="alert alert-danger text-center mb-3">
        {{ session('error') }}
      </div>  
    @endif

    <h3 class="card-title text-center mb-4">Admin Login</h3>

    <form action="{{ route('admin.login.submit') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
        @error('password')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary mt-2">Login</button>

      <div class="text-center signup-link pt-4">
        <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
      </div>
    </form>
  </div>
</body>
</html>
