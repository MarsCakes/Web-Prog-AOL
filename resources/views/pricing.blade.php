@extends('layout.layout')

@section('title', 'Harga Layanan - GREEN')

@push('head')
  <meta name="description" content="Harga layanan penjemputan sampah: kategori, barang free pickup, barang berbiaya, dan hitungan biaya per kilometer.">
  <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #228B22 0%, #1c751c 100%);">
  <div class="container">
    <h1 class="display-6 fw-bold text-white mb-2">Harga Layanan</h1>
    <p class="text-white opacity-90 mb-0">Lihat kategori, ketentuan free pickup, barang berbiaya, dan hitung estimasi biaya per kilometer.</p>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4 mb-5">
      @foreach($categories as $c)
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm card-raise border-0">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <div class="p-3 rounded-circle" style="background: linear-gradient(135deg, #228B22, #1c751c);">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M21 15V7a2 2 0 0 1 2-2h2v14h-2a2 2 0 0 1-2-2z"></path><path d="M3 15V7a2 2 0 0 1 2-2h2v14H5a2 2 0 0 1-2-2z"></path><path d="M9 5h6v14H9z"></path></svg>
              </div>
              <h3 class="h6 mb-0 ms-3 fw-bold">{{ $c->name }}</h3>
            </div>
            <p class="text-muted small mb-3">{{ $c->description }}</p>
            <div class="d-flex align-items-baseline justify-content-between">
              <span class="text-success fw-bold" style="font-size: 1.75rem;">Rp {{ number_format($c->price, 0, ',', '.') }}</span>
              <span class="badge bg-light text-success">per {{ $c->unit }}</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="row g-4">
      <div class="col-lg-6">
        <div class="card h-100 shadow-sm border-0 card-raise" style="border-left: 5px solid #228B22;">
          <div class="card-body">
            <h2 class="h5 fw-bold text-success mb-3">✨ Barang Free Pickup</h2>
            <ul class="list-group list-group-flush">
              @foreach($freePickup as $i)
                <li class="list-group-item border-0 ps-0 py-2">
                  <span class="badge bg-success me-2">✓</span> {{ $i }}
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card h-100 shadow-sm border-0 card-raise" style="border-left: 5px solid #ff6b6b;">
          <div class="card-body">
            <h2 class="h5 fw-bold text-danger mb-3">💰 Barang Berbiaya</h2>
            <ul class="list-group list-group-flush">
              @foreach($paidPickup as $i)
                <li class="list-group-item border-0 ps-0 py-2">
                  <span class="badge bg-danger me-2">!</span> {{ $i }}
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5" style="background: linear-gradient(135deg, #e9f6e9 0%, #f0f8f0 100%);">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="card h-100 shadow-sm border-0 card-raise">
          <div class="card-body p-4">
            <h2 class="h5 fw-bold text-success mb-4">📍 Estimasi Biaya Per Kilometer</h2>
            <p class="text-muted mb-4">Perkirakan biaya tambahan berdasarkan jarak tempuh dari lokasi Anda.</p>
            <div class="row g-3">
              <div class="col-12">
                <label class="form-label fw-bold">Jarak (km)</label>
                <input type="number" min="0" step="0.1" id="distance" class="form-control" placeholder="misal 3.5" style="border-color: #228B22;">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold">Biaya per km (Rp)</label>
                <input type="number" min="0" id="perKm" class="form-control" value="{{ $perKm }}" style="border-color: #228B22;">
              </div>
              <div class="col-12">
                <button class="btn btn-success w-100" id="calcBtn" style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;">Hitung Estimasi</button>
              </div>
              <div class="col-12">
                <div class="alert alert-success d-none" id="result" role="alert"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card h-100 shadow-sm border-0 card-raise" style="background: linear-gradient(135deg, #228B22 0%, #1c751c 100%);">
          <div class="card-body p-4 text-white">
            <h2 class="h5 fw-bold mb-4">💡 Cara Menghitung</h2>
            <ol class="list-group list-group-flush bg-transparent">
              <li class="list-group-item bg-transparent border-0 text-white d-flex align-items-start pb-3">
                <span class="badge bg-white text-success me-3 mt-1">1</span>
                <span>Masukkan jarak dari lokasi Anda ke kantor kami</span>
              </li>
              <li class="list-group-item bg-transparent border-0 text-white d-flex align-items-start pb-3">
                <span class="badge bg-white text-success me-3 mt-1">2</span>
                <span>Sistem otomatis menghitung biaya berdasarkan jarak</span>
              </li>
              <li class="list-group-item bg-transparent border-0 text-white d-flex align-items-start">
                <span class="badge bg-white text-success me-3 mt-1">3</span>
                <span>Biaya ini adalah estimasi; biaya final tergantung volume sampah</span>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    const btn = document.getElementById('calcBtn');
    const distance = document.getElementById('distance');
    const perKm = document.getElementById('perKm');
    const result = document.getElementById('result');
    btn?.addEventListener('click', function(e){
      e.preventDefault();
      const d = parseFloat(distance.value || '0');
      const pk = parseFloat(perKm.value || '0');
      if (isNaN(d) || isNaN(pk)) return;
      const total = Math.max(0, d) * Math.max(0, pk);
      result.classList.remove('d-none');
      result.textContent = `💰 Perkiraan biaya jarak: Rp ${total.toLocaleString('id-ID')}`;
    });
  });
</script>
@endsection
