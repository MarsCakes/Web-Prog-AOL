@extends('layout.layout')
@section('title','Detail Pesanan - GREEN')
@section('content')
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h4 fw-bold text-success mb-0">Detail Pesanan</h1>
      <a href="{{ route('dashboard') }}" class="btn btn-outline-success">← Kembali ke Dashboard</a>
    </div>
    <div class="row g-4">
      <div class="col-md-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
              <div><div class="text-muted small">Kode</div><div class="fw-bold">{{ $order->tracking_code }}</div></div>
              <div><div class="text-muted small">Status</div><span class="badge bg-success">{{ strtoupper($order->status) }}</span></div>
            </div>
            <p class="mb-1"><span class="text-muted small">Nama:</span> <strong>{{ $order->customer_name }}</strong></p>
            <p class="mb-1"><span class="text-muted small">HP:</span> <strong>{{ $order->customer_phone }}</strong></p>
            <p class="mb-1"><span class="text-muted small">Alamat:</span> <strong>{{ $order->address }}</strong></p>
            <p class="mb-1"><span class="text-muted small">Jadwal:</span> <strong>{{ $order->scheduled_at->format('d M Y H:i') }}</strong></p>
            <p class="mb-1"><span class="text-muted small">Kategori:</span> <strong>{{ $order->category->name }}</strong></p>
            <p class="mb-3"><span class="text-muted small">Estimasi:</span> <strong>Rp {{ number_format($order->estimated_price,0,',','.') }}</strong></p>
            <div class="progress" style="height: 10px;">
              @php $stages = ['pending','assigned','otw','picked','done']; $idx = array_search($order->status, $stages); $pct = $idx===false?0:($idx/(count($stages)-1))*100; @endphp
              <div class="progress-bar bg-success" role="progressbar" style="width: {{ $pct }}%"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        @if($order->photo_path)
        <div class="card border-0 shadow-sm mb-3"><div class="card-body"><img src="{{ Storage::url($order->photo_path) }}" class="img-fluid rounded"></div></div>
        @endif
        <div class="card border-0 shadow-sm"><div class="card-body">
          <h6 class="fw-bold text-success">Petugas</h6>
          @if($order->driver)
            <p class="mb-1">{{ $order->driver->name }}</p>
            <p class="mb-0 text-muted small">{{ $order->driver->phone ?? '-' }}</p>
          @else
            <p class="text-muted mb-0">Belum ditugaskan</p>
          @endif
        </div></div>
      </div>
    </div>
  </div>
</section>
@endsection
