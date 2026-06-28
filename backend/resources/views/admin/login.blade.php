<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login — Eventyx</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <style>
    body{ min-height:100vh; display:grid; place-items:center; background:linear-gradient(135deg,#047857,#0E1A14); font-family:'Segoe UI',system-ui,sans-serif; }
    .login{ width:100%; max-width:400px; background:#fff; border-radius:18px; padding:38px 34px; box-shadow:0 20px 60px rgba(0,0,0,.25); }
    .login .brand{ font-size:1.6rem; font-weight:800; text-align:center; margin-bottom:4px; }
    .login .brand i{ color:#E0A82E; }
    .btn-brand{ background:linear-gradient(135deg,#047857,#10B981); color:#fff; border:none; }
  </style>
</head>
<body>
  <form class="login" method="POST" action="{{ url('/admin/login') }}">
    @csrf
    <div class="brand"><i class="bi bi-stars"></i> Eventyx</div>
    <p class="text-center text-muted mb-4">Admin Panel Login</p>
    @if($errors->any())
      <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
    @endif
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" value="{{ old('email','admin@gmail.com') }}" class="form-control" required autofocus />
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" value="password" class="form-control" required />
    </div>
    <div class="form-check mb-3">
      <input type="checkbox" name="remember" class="form-check-input" id="remember" />
      <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <button class="btn btn-brand w-100 py-2"><i class="bi bi-box-arrow-in-right"></i> Sign In</button>
    <p class="text-center text-muted small mt-3 mb-0">Default: admin@gmail.com / password</p>
  </form>
</body>
</html>
