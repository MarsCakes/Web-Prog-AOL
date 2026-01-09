@extends('layout.layout')

@section('title', 'Admin Panel - GREEN')

@section('content')
<section class="py-5">
  <div class="container">
    <h1 class="h3 fw-bold text-success mb-5">Admin Panel</h1>

    <!-- Dashboard Stats -->
    <div class="row g-3 mb-5">
      <div class="col-md-3">
        <div class="card border-0 shadow-sm card-raise">
          <div class="card-body text-center">
            <p class="text-muted small mb-2">Total Pengguna</p>
            <h3 class="fw-bold text-success">{{ \App\Models\User::count() }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm card-raise">
          <div class="card-body text-center">
            <p class="text-muted small mb-2">Total Pesanan</p>
            <h3 class="fw-bold text-success">{{ \App\Models\Order::count() }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm card-raise">
          <div class="card-body text-center">
            <p class="text-muted small mb-2">Selesai Hari Ini</p>
            <h3 class="fw-bold text-success">{{ \App\Models\Order::where('status','done')->whereDate('updated_at',today())->count() }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-0 shadow-sm card-raise">
          <div class="card-body text-center">
            <p class="text-muted small mb-2">Kategori</p>
            <h3 class="fw-bold text-success">{{ \App\Models\PricingCategory::count() }}</h3>
          </div>
        </div>
      </div>
    </div>
    
    <li class="nav-item">
  <a href="{{ route('mitra.index') }}" class="nav-link">
    Mitra List
  </a>
</li>


    <!-- Admin Menu -->
    <div class="row g-3 mb-5">
      <div class="col-md-4">
        <a href="{{ route('admin.orders') }}" class="card border-0 shadow-sm card-raise text-decoration-none text-white text-center py-4 h-100" style="background: linear-gradient(135deg, #228B22, #1c751c);">
          <div class="card-body">
            <div style="font-size: 48px; margin-bottom: 10px;">📦</div>
            <h5 class="fw-bold">Kelola Pesanan</h5>
            <p class="small">Lihat & assign pesanan</p>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="{{ route('admin.pricing') }}" class="card border-0 shadow-sm card-raise text-decoration-none text-white text-center py-4 h-100" style="background: linear-gradient(135deg, #0f9d58, #0d8348);">
          <div class="card-body">
            <div style="font-size: 48px; margin-bottom: 10px;">💰</div>
            <h5 class="fw-bold">Atur Harga</h5>
            <p class="small">Kelola kategori & harga</p>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="#" class="card border-0 shadow-sm card-raise text-decoration-none text-white text-center py-4 h-100" style="background: linear-gradient(135deg, #999, #777);">
          <div class="card-body">
            <div style="font-size: 48px; margin-bottom: 10px;">👥</div>
            <h5 class="fw-bold">Kelola Pengguna</h5>
            <p class="small">(Coming Soon)</p>
          </div>
        </a>
      </div>
    </div>

    <!-- Recent Orders Summary -->
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <h5 class="fw-bold text-success mb-3">Pesanan Terbaru</h5>
        @php $orders = \App\Models\Order::with(['category','user','driver'])->latest()->take(10)->get(); @endphp
        @if($orders->count() > 0)
          <div class="table-responsive">
            <table class="table align-middle mb-0">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Pelanggan</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Driver</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $o)
                  <tr>
                    <td class="fw-bold">{{ $o->tracking_code }}</td>
                    <td>{{ $o->customer_name }}<br/><span class="small text-muted">{{ $o->customer_phone }}</span></td>
                    <td>{{ $o->category->name ?? '-' }}</td>
                    <td><span class="badge bg-success">{{ strtoupper($o->status) }}</span></td>
                    <td>{{ $o->driver->name ?? '-' }}</td>
                    <td><a href="{{ route('admin.orders.show',$o) }}" class="btn btn-sm btn-outline-success">Kelola</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="text-muted mb-0">Belum ada pesanan.</p>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection
