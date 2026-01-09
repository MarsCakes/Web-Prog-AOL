@extends('layout.layout')

@section('title', $article->title . ' - GREEN')

@push('head')
  <meta name="description" content="{{ $article->excerpt }}">
  <link rel="canonical" href="{{ url()->current() }}">
  <meta property="og:title" content="{{ $article->title }} - GREEN">
  <meta property="og:description" content="{{ $article->excerpt }}">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
  <section class="py-5 hero-forest">
    <div class="container">
      <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="link-success" href="{{ route('artikel.index') }}">Artikel</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
        </ol>
      </nav>
      <h1 class="display-6 fw-bold text-success mb-3">{{ $article->title }}</h1>
      <div class="d-flex align-items-center gap-3 text-muted">
        <span class="badge bg-success">{{ $article->tag }}</span>
        <small>{{ $article->read_time }}</small>
      </div>
    </div>
  </section>

  <section class="py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
          <img src="{{ $article->image }}" class="img-fluid rounded shadow-sm mb-4" alt="{{ $article->title }}"
            onerror="this.src='https://via.placeholder.com/1200x675?text=Artikel';">
          <p class="fs-5 text-muted">{{ $article->body }}</p>
          <hr>
          <div class="d-flex justify-content-between">
            <a href="{{ route('artikel.index') }}" class="btn btn-outline-success">Kembali ke daftar</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection