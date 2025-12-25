@extends('layout.layout')

@section('title', 'Daftar Mitra - GREEN')

@push('head')
  <meta name="description"
    content="Daftar sebagai mitra/driver GREEN. Baca penjelasan sistem kemitraan, manfaat jadi mitra, serta syarat & ketentuan.">
  <link rel="canonical" href="{{ url()->current() }}">
  <meta property="og:title" content="Daftar Mitra - GREEN">
  <meta property="og:description" content="Jadwal fleksibel, dukungan tim, dan tarif transparan untuk mitra.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
  <section class="py-5" style="background: linear-gradient(135deg, #228B22 0%, #1c751c 100%);">
    <div class="container">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="row align-items-center g-4">
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold text-white mb-3">Jadi Mitra/Driver GREEN</h1>
          <p class="lead text-white opacity-90 mb-4">Gabung sebagai mitra penjemputan sampah, bantu lingkungan sekaligus
            menambah penghasilan. Jadwal fleksibel, dukungan tim, dan tarif transparan.</p>
          <div class="d-flex flex-column gap-2">
            <div class="d-flex align-items-center">
              <span class="badge bg-white text-success me-2" style="font-size: 1rem;">✓</span>
              <span class="text-white">Sistem kemitraan adil & transparan</span>
            </div>
            <div class="d-flex align-items-center">
              <span class="badge bg-white text-success me-2" style="font-size: 1rem;">✓</span>
              <span class="text-white">Pelatihan singkat pengelolaan sampah</span>
            </div>
            <div class="d-flex align-items-center">
              <span class="badge bg-white text-success me-2" style="font-size: 1rem;">✓</span>
              <span class="text-white">Order stabil dari pengguna sekitar</span>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card shadow-lg border-0 card-raise">
            <div class="card-body p-4">
              <h2 class="h4 mb-4 fw-bold text-success">Form Pendaftaran</h2>
              <form method="POST" action="{{ route('mitra.submit') }}">
                @csrf
                <div class="mb-3">
                  <label class="form-label fw-bold">Nama Lengkap</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required>
                  @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">No. HP/WA</label>
                  <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone') }}" required>
                  @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">Email (opsional)</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}">
                  @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Kota/Kabupaten</label>
                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                      value="{{ old('city') }}" required>
                    @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Kendaraan (opsional)</label>
                    <select name="vehicle" class="form-select">
                      <option value="">Pilih kendaraan</option>
                      <option value="Motor" {{ old('vehicle') == 'Motor' ? 'selected' : '' }}>Motor</option>
                      <option value="Mobil Pick-up" {{ old('vehicle') == 'Mobil Pick-up' ? 'selected' : '' }}>Mobil Pick-up
                      </option>
                      <option value="Truk Kecil" {{ old('vehicle') == 'Truk Kecil' ? 'selected' : '' }}>Truk Kecil</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 mt-3">
                  <label class="form-label fw-bold">Catatan (opsional)</label>
                  <textarea name="notes" rows="3" class="form-control">{{ old('notes') }}</textarea>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox" name="agree"
                    id="agree" {{ old('agree') ? 'checked' : '' }} required>
                  <label class="form-check-label fw-bold" for="agree">
                    Saya setuju dengan <a href="{{ route('syaratdanketentuan') }}" class="link-success">Syarat &
                      Ketentuan</a>
                  </label>
                  @error('agree')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-success btn-lg"
                    style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;">Daftar Sekarang</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="h3 fw-bold text-center mb-5">Mengapa Bergabung dengan GREEN?</h2>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm card-raise border-0">
            <div class="card-body p-4">
              <div class="p-4 rounded-3 mx-auto mb-3"
                style="background: linear-gradient(135deg, #e9f6e9, #d4f1d4); width: fit-content;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#228B22" stroke-width="2">
                  <path
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z">
                  </path>
                </svg>
              </div>
              <h3 class="h6 fw-bold">Pendapatan Tambahan</h3>
              <p class="text-muted small">Dapatkan penghasilan tambahan dari setiap order penjemputan sampah yang
                berhasil.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm card-raise border-0">
            <div class="card-body p-4">
              <div class="p-4 rounded-3 mx-auto mb-3"
                style="background: linear-gradient(135deg, #e9f6e9, #d4f1d4); width: fit-content;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#228B22" stroke-width="2">
                  <path
                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-9h-3a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-3m-2 0V3a2 2 0 0 0-2 2v2h0m0 0H7m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4z">
                  </path>
                </svg>
              </div>
              <h3 class="h6 fw-bold">Dukungan Operasional</h3>
              <p class="text-muted small">Kami memberikan pelatihan lengkap dan dukungan CS untuk kesuksesan bisnis Anda.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm card-raise border-0">
            <div class="card-body p-4">
              <div class="p-4 rounded-3 mx-auto mb-3"
                style="background: linear-gradient(135deg, #e9f6e9, #d4f1d4); width: fit-content;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#228B22" stroke-width="2">
                  <path
                    d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7.1c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z">
                  </path>
                </svg>
              </div>
              <h3 class="h6 fw-bold">Kontribusi Lingkungan</h3>
              <p class="text-muted small">Jadilah bagian dari gerakan ekonomi sirkular yang ramah lingkungan dan
                berkelanjutan.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm card-raise border-0">
            <div class="card-body p-4">
              <div class="p-4 rounded-3 mx-auto mb-3"
                style="background: linear-gradient(135deg, #e9f6e9, #d4f1d4); width: fit-content;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#228B22" stroke-width="2">
                  <circle cx="12" cy="12" r="1"></circle>
                  <circle cx="19" cy="12" r="1"></circle>
                  <circle cx="5" cy="12" r="1"></circle>
                </svg>
              </div>
              <h3 class="h6 fw-bold">Jadwal Fleksibel</h3>
              <p class="text-muted small">Atur jadwal kerja Anda sendiri sesuai ketersediaan dan kenyamanan pribadi Anda.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm card-raise border-0">
            <div class="card-body p-4">
              <div class="p-4 rounded-3 mx-auto mb-3"
                style="background: linear-gradient(135deg, #e9f6e9, #d4f1d4); width: fit-content;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#228B22" stroke-width="2">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                  <circle cx="12" cy="10" r="3"></circle>
                </svg>
              </div>
              <h3 class="h6 fw-bold">Area Terdekat</h3>
              <p class="text-muted small">Penugasan order berdasarkan lokasi terdekat Anda untuk efisiensi maksimal.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm card-raise border-0">
            <div class="card-body p-4">
              <div class="p-4 rounded-3 mx-auto mb-3"
                style="background: linear-gradient(135deg, #e9f6e9, #d4f1d4); width: fit-content;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#228B22" stroke-width="2">
                  <path d="M9 12l2 2 4-4m7 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <h3 class="h6 fw-bold">Transparansi Penuh</h3>
              <p class="text-muted small">Tarif jelas, insentif transparan, dan laporan penghasilan real-time untuk Anda.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5" style="background: linear-gradient(135deg, #f0f8f0 0%, #e9f6e9 100%);">
    <div class="container">
      <h2 class="h3 fw-bold text-center mb-5">Sistem Kemitraan GREEN</h2>
      <div class="row g-4 align-items-center">
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm card-raise mb-4">
            <div class="card-body p-4">
              <h3 class="h5 fw-bold text-success mb-3">📋 Penjelasan Sistem</h3>
              <ol class="list-group list-group-flush bg-transparent">
                <li class="list-group-item bg-transparent border-0 d-flex gap-3 pb-3">
                  <span class="badge bg-success rounded-pill flex-shrink-0 mt-1">1</span>
                  <span><strong>Registrasi:</strong> Isi form lengkap dengan data diri dan kendaraan Anda.</span>
                </li>
                <li class="list-group-item bg-transparent border-0 d-flex gap-3 pb-3">
                  <span class="badge bg-success rounded-pill flex-shrink-0 mt-1">2</span>
                  <span><strong>Verifikasi:</strong> Tim kami akan memverifikasi dokumen dalam 2-3 hari kerja.</span>
                </li>
                <li class="list-group-item bg-transparent border-0 d-flex gap-3 pb-3">
                  <span class="badge bg-success rounded-pill flex-shrink-0 mt-1">3</span>
                  <span><strong>Pelatihan:</strong> Ikuti sesi pelatihan singkat (2-3 jam) tentang prosedur
                    operasional.</span>
                </li>
                <li class="list-group-item bg-transparent border-0 d-flex gap-3">
                  <span class="badge bg-success rounded-pill flex-shrink-0 mt-1">4</span>
                  <span><strong>Mulai Kerja:</strong> Terima order melalui aplikasi dan mulai hasilkan income.</span>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm card-raise">
            <div class="card-body p-4">
              <h3 class="h5 fw-bold text-success mb-3">✅ Syarat & Ketentuan</h3>
              <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent border-0 d-flex gap-2 py-2">
                  <span class="text-success fw-bold">✓</span>
                  <span>Minimal 18 tahun dengan KTP Indonesia aktif</span>
                </li>
                <li class="list-group-item bg-transparent border-0 d-flex gap-2 py-2">
                  <span class="text-success fw-bold">✓</span>
                  <span>Memiliki SIM (untuk pengemudi; opsional untuk pejalan kaki)</span>
                </li>
                <li class="list-group-item bg-transparent border-0 d-flex gap-2 py-2">
                  <span class="text-success fw-bold">✓</span>
                  <span>Kendaraan laik jalan dengan asuransi valid (jika ada)</span>
                </li>
                <li class="list-group-item bg-transparent border-0 d-flex gap-2 py-2">
                  <span class="text-success fw-bold">✓</span>
                  <span>Komitmen terhadap keselamatan kerja dan kebersihan</span>
                </li>
                <li class="list-group-item bg-transparent border-0 d-flex gap-2 py-2">
                  <span class="text-success fw-bold">✓</span>
                  <span>Memiliki rekening bank aktif atas nama sendiri</span>
                </li>
                <li class="list-group-item bg-transparent border-0 d-flex gap-2 py-2">
                  <span class="text-success fw-bold">✓</span>
                  <span>Bersedia menjalani background check sederhana</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection