@extends('layout.layout')
@section('title','Pesanan Saya - GREEN')
@section('content')
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h4 fw-bold text-success mb-0">Pesanan Saya</h1>
      <a href="{{ route('dashboard') }}" class="btn btn-outline-success">← Kembali ke Dashboard</a>
    </div>
    <div class="mb-3">
      <a href="{{ route('order.create') }}" class="btn btn-success">Buat Pesanan</a>
      <a href="{{ route('track.index') }}" class="btn btn-outline-success">Lacak Pesanan</a>
    </div>
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Kode</th><th>Tanggal</th><th>Kategori</th><th>Status</th><th>ETA</th><th></th>
          </tr>
        </thead>
        <tbody>
        @forelse($orders as $o)
          <tr>
            <td class="fw-bold">{{ $o->tracking_code }}</td>
            <td>{{ $o->scheduled_at->format('d M Y H:i') }}</td>
            <td>{{ $o->category->name ?? '-' }}</td>
            <td><span class="badge bg-success">{{ strtoupper($o->status) }}</span></td>
            <td>{{ $o->eta? $o->eta->format('d M Y H:i'):'-' }}</td>
            <td><a class="btn btn-sm btn-outline-success" href="{{ route('dashboard.orders.show',$o) }}">Detail</a></td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-muted">Belum ada pesanan</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
    {{ $orders->links() }}
  </div>
</section>
@endsection
