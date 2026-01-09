@extends('layout.layout')

@section('title', 'Tambah Artikel - GREEN')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold text-success mb-4">Tambah Artikel</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data"
                class="card p-4 shadow-sm mb-4">
                @csrf

                <h5 class="fw-bold text-success mb-3">Tambah Artikel</h5>

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Artikel</label>
                    <textarea name="body" class="form-control" rows="6" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Artikel</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tag</label>
                        <input type="text" name="tag" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Read Time</label>
                        <input type="text" name="read_time" class="form-control" placeholder="5 menit">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Publish At</label>
                    <input type="datetime-local" name="published_at" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Artikel
                </button>
            </form>

        </div>
    </section>
@endsection