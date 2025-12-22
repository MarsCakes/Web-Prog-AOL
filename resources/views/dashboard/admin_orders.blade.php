@extends('layout.layout')
@section('title','Admin - Orders - GREEN')
@section('content')
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h4 fw-bold text-success mb-0">Semua Order</h1>
      <a href="{{ route('admin') }}" class="btn btn-outline-success">← Kembali ke Admin Panel</a>
    </div>
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Kode</th><th>Pelanggan</th><th>Kategori</th><th>Jadwal</th><th>Status</th><th>Driver</th><th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $o)
            <tr>
              <td class="fw-bold">{{ $o->tracking_code }}</td>
              <td>{{ $o->customer_name }}<div class="small text-muted">{{ $o->customer_phone }}</div></td>
              <td>{{ $o->category->name ?? '-' }}</td>
              <td>{{ $o->scheduled_at->format('d M Y H:i') }}</td>
              <td><span class="badge bg-success">{{ strtoupper($o->status) }}</span></td>
              <td>{{ $o->driver->name ?? '-' }}</td>
              <td>
                <a href="{{ route('admin.orders.show',$o) }}" class="btn btn-sm btn-outline-success">Kelola</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $orders->links() }}
  </div>
</section>
@endsection
