@extends('layout.layout')

@section('title', 'Artikel & Edukasi - GREEN')

@push('head')
  <meta name="description"
    content="Artikel pemilahan sampah, tips daur ulang, dan manfaat recycle. Edukasi lingkungan yang ringkas dan mudah dipraktikkan.">
  <link rel="canonical" href="{{ url()->current() }}">
  <meta property="og:title" content="Artikel & Edukasi - GREEN">
  <meta property="og:description" content="Artikel pemilahan sampah, tips daur ulang, dan manfaat recycle.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
  <section class="py-5 hero-forest">
    <div class="container">
      <div class="row align-items-center g-4 mb-2">
        <div class="col-lg-8">
          <h1 class="display-6 fw-bold text-success">Artikel & Edukasi Lingkungan</h1>
          <p class="text-muted mb-0">Pelajari pemilahan sampah, tips daur ulang, dan manfaat ekonomi sirkular. Mulai dari
            langkah kecil untuk dampak besar.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      @auth
        @if(auth()->user()->role === 'admin')
      <div class="mb-4">
          <a href="{{ route('artikel.create') }}" class="btn btn-success">
            + Tambah Artikel
          </a>
        </div>
        @endif
      @endauth
      <div class="row g-4">
        @foreach($articles as $a)
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm card-raise">
              <div class="ratio ratio-16x9">
                <img
                  src="{{ $a->image
                        ? Storage::disk('r2')->url($a->image)
                        : 'https://via.placeholder.com/600x338?text=Artikel' }}"
                  class="card-img-top object-fit-cover"
                  alt="{{ $a->title }}">
              </div>
              <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="badge bg-success">{{ $a->tag }}</span>
                  <small class="text-muted">{{ $a->read_time }}</small>
                </div>
                <h3 class="h5 section-title">{{ $a->title }}</h3>
                <p class="text-muted flex-grow-1">{{ $a->excerpt }}</p>
                <a href="{{ route('artikel.show', $a) }}" class="stretched-link link-success">
                    Baca selengkapnya
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection