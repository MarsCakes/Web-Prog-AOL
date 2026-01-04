@extends('layout.layout')

@section('title', 'Tambah Kategori Harga')

@section('content')
<section class="py-5">
  <div class="container">
    <h1 class="h3 fw-bold text-success mb-5">Tambah Kategori Harga Baru</h1>

    <div class="row">
      <div class="col-lg-6">
        <form action="{{ route('admin.pricing.store') }}" method="POST" class="card border-0 shadow-sm p-4">
          @csrf

          <div class="mb-3">
            <label class="form-label fw-bold">Nama Kategori *</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
              placeholder="Contoh: Sampah Plastik" value="{{ old('name') }}">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Unit *</label>
            <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" 
              placeholder="Contoh: kg" value="{{ old('unit') }}">
            @error('unit')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Harga (Rp) *</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
              placeholder="Contoh: 5000" value="{{ old('price') }}" min="0">
            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
              rows="3" placeholder="Deskripsi kategori (opsional)">{{ old('description') }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success btn-lg">Simpan Kategori</button>
            <a href="{{ route('admin.pricing') }}" class="btn btn-outline-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
