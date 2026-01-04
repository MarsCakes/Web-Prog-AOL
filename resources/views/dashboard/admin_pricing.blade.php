@extends('layout.layout')

@section('title', 'Kelola Harga - Admin')

@section('content')
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3 fw-bold text-success mb-0">Kelola Kategori Harga</h1>
      <div class="d-flex gap-2">
        <a href="{{ route('admin') }}" class="btn btn-outline-success">← Kembali</a>
        <a href="{{ route('admin.pricing.create') }}" class="btn btn-success">+ Tambah Kategori</a>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if($categories->count() > 0)
      <div class="table-responsive">
        <table class="table align-middle border">
          <thead class="table-light">
            <tr>
              <th>Nama Kategori</th>
              <th>Unit</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $cat)
              <tr>
                <td><strong>{{ $cat->name }}</strong></td>
                <td><span class="badge bg-light text-dark">{{ $cat->unit }}</span></td>
                <td><strong class="text-success">Rp {{ number_format($cat->price, 0, ',', '.') }}</strong></td>
                <td class="text-muted">{{ Str::limit($cat->description, 50) }}</td>
                <td>
                  <a href="{{ route('admin.pricing.edit', $cat) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                  <form action="{{ route('admin.pricing.destroy', $cat) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div class="alert alert-info">
        <p class="mb-0">Belum ada kategori. <a href="{{ route('admin.pricing.create') }}" class="alert-link">Buat kategori pertama</a></p>
      </div>
    @endif
  </div>
</section>
@endsection
