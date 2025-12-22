@extends('layout.layout')

@section('title', 'Login - GREEN')

@section('content')
<section class="py-5 hero-forest d-flex align-items-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 card-raise">
          <div class="card-body p-4">
            <h1 class="h4 fw-bold text-center mb-4 text-success">Login</h1>
            <p class="text-center text-muted mb-4">Masuk ke akun GREEN Anda untuk melanjutkan</p>
            
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
              @csrf
              <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                  Ingat saya
                </label>
              </div>

              <div class="d-grid">
                <button type="submit" id="loginBtn" class="btn btn-success btn-lg" style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;">Login</button>
              </div>
            </form>

            <hr class="my-4">
            <p class="text-center text-muted">Belum punya akun? <a href="{{ route('register') }}" class="link-success fw-bold">Register di sini</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  (function(){
    const form = document.getElementById('loginForm');
    const btn = document.getElementById('loginBtn');
    if(form && btn){
      form.addEventListener('submit', function(){
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';
      });
    }
  })();
</script>
@endsection
