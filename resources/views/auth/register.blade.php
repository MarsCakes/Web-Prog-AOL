@extends('layout.layout')

@section('title', 'Register - GREEN')

@section('content')
<section class="py-5 hero-forest d-flex align-items-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 card-raise">
          <div class="card-body p-4">
            <h1 class="h4 fw-bold text-center mb-4 text-success">Daftar Akun</h1>
            <p class="text-center text-muted mb-4">Buat akun baru untuk memulai perjalanan GREEN Anda</p>
            
            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold">Nomor Telepon</label>
                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox" name="agree" id="agree">
                <label class="form-check-label" for="agree">
                  Saya setuju dengan <a href="{{ route('syaratdanketentuan') }}" class="link-success">syarat dan ketentuan</a>
                </label>
                @error('agree')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg" style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;">Daftar</button>
              </div>
            </form>

            <hr class="my-4">
            <p class="text-center text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="link-success fw-bold">Login di sini</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
