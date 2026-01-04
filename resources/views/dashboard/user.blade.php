@extends('layout.layout')

@section('title', 'User Dashboard - GREEN')

@section('content')
<section class="py-5">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <h1 class="h3 fw-bold text-success mb-2">Dashboard Saya</h1>
        <p class="text-muted">Selamat datang, {{ Auth::user()->name }}! 👋</p>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-5">
      <div class="col-md-3">
        <div class="card border-0 shadow-sm card-raise">
          <div class="card-body text-center">
            <p class="text-muted small mb-2">Total Pesanan</p>
            <h3 class="fw-bold text-success">{{ Auth::user()->orders()->count() }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm card-raise">
          <div class="card-body text-center">
            <p class="text-muted small mb-2">Sedang Diproses</p>
            <h3 class="fw-bold text-success">{{ Auth::user()->orders()->whereIn('status', ['pending','assigned','otw','picked'])->count() }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm card-raise">
          <div class="card-body text-center">
            <p class="text-muted small mb-2">Selesai</p>
            <h3 class="fw-bold text-success">{{ Auth::user()->orders()->where('status','done')->count() }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm card-raise">
          <div class="card-body text-center">
            <p class="text-muted small mb-2">Email</p>
            <div class="text-muted small">
              <p class="mb-0">{{ Auth::user()->email }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-3 mb-5">
      <div class="col-md-4">
        <a href="{{ route('order.create') }}" class="card border-0 shadow-sm card-raise text-decoration-none text-white text-center py-4 h-100" style="background: linear-gradient(135deg, #228B22, #1c751c);">
          <div class="card-body">
            <div style="font-size: 40px; margin-bottom: 10px;">📦</div>
            <h5 class="fw-bold">Buat Pesanan Baru</h5>
            <p class="small">Pesan penjemputan sekarang</p>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="{{ route('track.index') }}" class="card border-0 shadow-sm card-raise text-decoration-none text-white text-center py-4 h-100" style="background: linear-gradient(135deg, #34a853, #2d8f47);">
          <div class="card-body">
            <div style="font-size: 40px; margin-bottom: 10px;">🔍</div>
            <h5 class="fw-bold">Lacak Pesanan</h5>
            <p class="small">Lihat status pesanan Anda</p>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="{{ route('dashboard.orders') }}" class="card border-0 shadow-sm card-raise text-decoration-none text-white text-center py-4 h-100" style="background: linear-gradient(135deg, #0f9d58, #0d8348);">
          <div class="card-body">
            <div style="font-size: 40px; margin-bottom: 10px;">📋</div>
            <h5 class="fw-bold">Riwayat Pesanan</h5>
            <p class="small">Lihat semua pesanan Anda</p>
          </div>
        </a>
      </div>
    </div>

    <!-- Recent Orders -->
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title fw-bold text-success mb-3">Pesanan Terbaru</h5>
            @php $orders = Auth::user()->orders()->latest()->take(5)->get(); @endphp
            @if($orders->count() > 0)
              <div class="table-responsive">
                <table class="table align-middle mb-0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Tanggal</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                      <tr>
                        <td class="fw-bold">{{ $order->tracking_code }}</td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                        <td>{{ $order->category->name ?? '-' }}</td>
                        <td><span class="badge bg-success">{{ strtoupper($order->status) }}</span></td>
                        <td>
                          <a href="{{ route('dashboard.orders.show', $order) }}" class="btn btn-sm btn-outline-success">Lihat</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="alert alert-info mb-0">
                Belum ada pesanan. <a href="{{ route('order.create') }}" class="alert-link">Buat pesanan sekarang</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
