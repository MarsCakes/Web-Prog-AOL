@extends('layout.layout')
@section('title', 'Kelola Order - GREEN')
@section('content')
  <section class="py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 fw-bold text-success mb-0">Kelola Order</h1>
        <a href="{{ route('admin') }}" class="btn btn-outline-success">← Kembali ke Admin Panel</a>
      </div>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="row g-4">
        <div class="col-md-8">
          <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
              <div class="d-flex justify-content-between mb-3">
                <div>
                  <div class="text-muted small">Kode</div>
                  <div class="fw-bold">{{ $order->tracking_code }}</div>
                </div>
                <div>
                  <div class="text-muted small">Status</div><span
                    class="badge bg-success">{{ strtoupper($order->status) }}</span>
                </div>
              </div>
              <p class="mb-1"><span class="text-muted small">Nama:</span> <strong>{{ $order->customer_name }}</strong></p>
              <p class="mb-1"><span class="text-muted small">HP:</span> <strong>{{ $order->customer_phone }}</strong></p>
              <p class="mb-1"><span class="text-muted small">Alamat:</span> <strong>{{ $order->address }}</strong></p>
              <p class="mb-1"><span class="text-muted small">Jadwal:</span>
                <strong>{{ $order->scheduled_at->format('d M Y H:i') }}</strong></p>
              <p class="mb-3"><span class="text-muted small">Kategori:</span>
                <strong>{{ $order->category->name }}</strong></p>
              @if($order->photo_path)
                <img src="{{ Storage::url($order->photo_path) }}" class="img-fluid rounded mb-2">
                
              @endif
            </div>
          </div>

          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h6 class="fw-bold text-success">Riwayat Status</h6>
              <ul class="list-unstyled mb-0">
                @foreach($order->updates as $u)
                  <li class="mb-2">
                    <span class="badge bg-success">{{ strtoupper($u->status) }}</span>
                    <span class="text-muted small">{{ $u->created_at->format('d M Y H:i') }}</span>
                    @if($u->note)
                      <span class="ms-2">{{ $u->note }}</span>
                    @endif
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
              <h6 class="fw-bold text-success">Assign Driver</h6>
              <form method="POST" action="{{ route('admin.orders.assign', $order) }}" class="d-flex gap-2">
                @csrf
                <select name="driver_id" class="form-select">
                  @foreach($drivers as $d)
                    <option value="{{ $d->id }}" @selected($order->assigned_driver_id == $d->id)>{{ $d->name }}</option>
                  @endforeach
                </select>
                <button class="btn btn-success">Assign</button>
              </form>
            </div>
          </div>
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h6 class="fw-bold text-success">Update Status</h6>
              <form method="POST" action="{{ route('admin.orders.status', $order) }}" class="row g-2">
                @csrf
                <div class="col-12">
                  <select name="status" class="form-select">
                    @foreach(['pending', 'assigned', 'otw', 'picked', 'done', 'cancelled'] as $s)
                      <option value="{{ $s }}" @selected($order->status == $s)>{{ strtoupper($s) }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12">
                  <input type="datetime-local" name="eta" value="{{ $order->eta ? $order->eta->format('Y-m-d\\TH:i') : '' }}"
                    class="form-control" placeholder="ETA (opsional)">
                </div>
                <div class="col-12">
                  <input type="text" name="note" class="form-control" placeholder="Catatan (opsional)">
                </div>
                <div class="col-12 d-grid">
                  <button class="btn btn-outline-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection