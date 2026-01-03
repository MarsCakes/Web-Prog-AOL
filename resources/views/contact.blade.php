@extends('layout.layout')

@section('title', 'Kontak - GREEN')

@push('head')
  <meta name="description" content="Hubungi GREEN via WhatsApp, email, atau kunjungi alamat kantor. Kirim pesan via form kontak dan lihat peta lokasi.">
  <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #228B22 0%, #1c751c 100%);">
  <div class="container">
    <h1 class="display-6 fw-bold text-white mb-2">Hubungi Kami</h1>
    <p class="text-white opacity-90 mb-0">Ada pertanyaan atau saran? Kami siap membantu dan merespons dengan cepat.</p>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <div class="row g-4 mb-5">
      <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm card-raise border-0">
          <div class="card-body p-4">
            <div class="p-3 rounded-circle mx-auto mb-3" style="background: linear-gradient(135deg, #228B22, #1c751c); width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            </div>
            <h3 class="h6 fw-bold">WhatsApp</h3>
            <p class="text-muted small mb-3">{{ $contact['whatsapp'] }}</p>
            <a class="btn btn-sm btn-success" href="https://wa.me/{{ preg_replace('/[^0-9]/','', $contact['whatsapp']) }}" target="_blank">Chat Sekarang</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm card-raise border-0">
          <div class="card-body p-4">
            <div class="p-3 rounded-circle mx-auto mb-3" style="background: linear-gradient(135deg, #228B22, #1c751c); width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
            </div>
            <h3 class="h6 fw-bold">Email</h3>
            <p class="text-muted small mb-3">{{ $contact['email'] }}</p>
            <a class="btn btn-sm btn-success" href="mailto:{{ $contact['email'] }}">Kirim Email</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm card-raise border-0">
          <div class="card-body p-4">
            <div class="p-3 rounded-circle mx-auto mb-3" style="background: linear-gradient(135deg, #228B22, #1c751c); width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </div>
            <h3 class="h6 fw-bold">Kantor</h3>
            <p class="text-muted small mb-3">{{ $contact['address'] }}</p>
            <a class="btn btn-sm btn-success" href="#map">Lihat Peta</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm card-raise border-0" style="border-top: 4px solid #228B22;">
          <div class="card-body p-4">
            <div class="p-3 rounded-circle mx-auto mb-3" style="background: linear-gradient(135deg, #228B22, #1c751c); width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            </div>
            <h3 class="h6 fw-bold">Response Time</h3>
            <p class="text-muted small mb-3">Respons dalam 24 jam</p>
            <span class="badge bg-success">Online</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-lg-6">
        <div class="card shadow-sm border-0 card-raise">
          <div class="card-body p-4">
            <h2 class="h5 fw-bold text-success mb-4">📍 Lokasi Kami</h2>
            <div id="map" class="ratio ratio-16x9" style="border-radius: 8px; overflow: hidden;">
              <iframe src="{{ $contact['mapsEmbed'] }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card shadow-sm border-0 card-raise">
          <div class="card-body p-4">
            <h2 class="h5 fw-bold text-success mb-4">✉️ Kirim Pesan</h2>
            <form method="POST" action="{{ route('contact.submit') }}">
              @csrf
              <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required style="border-color: #228B22;">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required style="border-color: #228B22;">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">No. HP/WA (opsional)</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" style="border-color: #228B22;">
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Subjek</label>
                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required style="border-color: #228B22;">
                @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Pesan</label>
                <textarea name="message" rows="4" class="form-control @error('message') is-invalid @enderror" required style="border-color: #228B22;">{{ old('message') }}</textarea>
                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg" style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;">Kirim Pesan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
