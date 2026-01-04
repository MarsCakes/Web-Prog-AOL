@extends('layout.layout')
@section('title','Lacak Pesanan - GREEN')
@section('content')
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3 fw-bold text-success mb-0">Lacak Pesanan</h1>
      @auth
        <a href="{{ route('dashboard') }}" class="btn btn-outline-success">← Kembali ke Dashboard</a>
      @endauth
    </div>

    <form method="POST" action="{{ route('track.search') }}" class="row g-3 mb-4">
      @csrf
      <div class="col-md-6 col-lg-4">
        <label class="form-label">Masukkan Kode Tracking</label>
        <input type="text" name="code" value="{{ old('code', $code) }}" class="form-control" placeholder="Misal: ABCD1234" required>
      </div>
      <div class="col-md-6 col-lg-3 d-flex align-items-end">
        <button class="btn btn-success" style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;">Lacak</button>
      </div>
    </form>

    @if($order)
      <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between flex-wrap">
            <div>
              <div class="text-muted small">Kode</div>
              <div class="fw-bold">{{ $order->tracking_code }}</div>
            </div>
            <div>
              <div class="text-muted small">Status</div>
              <div class="badge bg-success">{{ strtoupper($order->status) }}</div>
            </div>
            <div>
              <div class="text-muted small">ETA</div>
              <div class="fw-bold">{{ $order->eta? $order->eta->format('d M Y H:i') : '-' }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-8">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="fw-bold text-success">Detail Pesanan</h5>
              <p class="mb-1"><span class="text-muted small">Nama:</span> <strong>{{ $order->customer_name }}</strong></p>
              <p class="mb-1"><span class="text-muted small">HP:</span> <strong>{{ $order->customer_phone }}</strong></p>
              <p class="mb-1"><span class="text-muted small">Alamat:</span> <strong>{{ $order->address }}</strong></p>
              <p class="mb-1"><span class="text-muted small">Jadwal:</span> <strong>{{ $order->scheduled_at->format('d M Y H:i') }}</strong></p>
              <p class="mb-1"><span class="text-muted small">Kategori:</span> <strong>{{ $order->category->name }}</strong></p>
              <p class="mb-3"><span class="text-muted small">Estimasi:</span> <strong>Rp {{ number_format($order->estimated_price,0,',','.') }}</strong></p>

              <div class="progress" style="height: 10px;">
                @php
                  $stages = ['pending','assigned','otw','picked','done'];
                  $idx = array_search($order->status, $stages);
                  $pct = $idx === false ? 0 : ($idx/(count($stages)-1))*100;
                @endphp
                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $pct }}%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
              <h6 class="fw-bold text-success">Petugas</h6>
              @if($order->driver)
                <p class="mb-1">Nama: <strong>{{ $order->driver->name }}</strong></p>
                <p class="mb-0">Kontak: <strong>{{ $order->driver->phone ?? '-' }}</strong></p>
              @else
                <p class="text-muted mb-0">Belum ditugaskan</p>
              @endif
            </div>
          </div>
          @if($order->photo_path)
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h6 class="fw-bold text-success">Foto</h6>
              <img src="{{ Storage::url($order->photo_path) }}" class="img-fluid rounded" alt="Foto barang"/>
            </div>
          </div>
          @endif
        </div>
      </div>

      <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
          <h6 class="fw-bold text-success">Riwayat Status</h6>
          <ul class="list-unstyled mb-0">
            @forelse($order->updates as $u)
              <li class="mb-2">
                <span class="badge bg-success">{{ strtoupper($u->status) }}</span>
                <span class="text-muted small">{{ $u->created_at->format('d M Y H:i') }}</span>
                @if($u->note)
                  <span class="ms-2">{{ $u->note }}</span>
                @endif
              </li>
            @empty
              <li class="text-muted">Belum ada riwayat.</li>
            @endforelse
          </ul>
        </div>
      </div>
    @elseif($code)
      <div class="alert alert-warning">Kode tidak ditemukan.</div>
    @endif
  </div>
</section>
@endsection
