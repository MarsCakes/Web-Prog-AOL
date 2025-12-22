<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @stack('head')
    <style>
        :root {
            --forest: #228B22; /* Forest Green */
            --forest-700: #1c751c;
            --forest-600: #1f7e1f;
            --forest-100: #e9f6e9;
        }
        .bg-success { background-color: var(--forest) !important; }
        .text-success { color: var(--forest) !important; }
        .btn-success { background-color: var(--forest); border-color: var(--forest); }
        .btn-success:hover { background-color: var(--forest-700); border-color: var(--forest-700); }
        .btn-outline-success { color: var(--forest); border-color: var(--forest); }
        .btn-outline-success:hover { color: #fff; background-color: var(--forest); border-color: var(--forest); }
        .link-success { color: var(--forest); }
        .link-success:hover { color: var(--forest-600); }
        .badge-success { background-color: var(--forest); }
        .hero-forest { background: linear-gradient(180deg, var(--forest-100), #fff); }
        .card.card-raise { transition: transform .2s ease, box-shadow .2s ease; }
        .card.card-raise:hover { transform: translateY(-2px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
        .section-title { position: relative; padding-bottom: .5rem; margin-bottom: 1rem; }
        .section-title::after { content: ""; width: 64px; height: 3px; background: var(--forest); position: absolute; left: 0; bottom: 0; border-radius: 3px; }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top shadow-sm">
        <div class="container px-3">
            <a class="navbar-brand text-light" href="{{ route('route.homepage') }}">GREEN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page"
                            href="{{ route('route.homepage') }}">Home</a>
                  </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('order.create') }}">Pesan</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('mitra.show') }}">Mitra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('artikel.index') }}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('pricing.index') }}">Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('contact.index') }}">Kontak</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                @auth
                  <div class="d-flex gap-2 align-items-center">
                    <span class="text-light me-2">Hi, {{ auth()->user()->name }}</span>
                    @if(auth()->user()->role === 'admin')
                      <a href="{{ route('admin') }}" class="btn btn-light btn-sm">Admin Panel</a>
                    @else
                      <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                      @csrf
                      <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                  </div>
                @else
                  <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light btn-sm">Register</a>
                  </div>
                @endauth
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="bg-dark text-light py-4 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mb-3">
            <h6 class="fw-bold">GREEN</h6>
            <p class="small text-muted">Solusi penjemputan sampah ramah lingkungan untuk kehidupan berkelanjutan.</p>
          </div>
          <div class="col-md-3 mb-3">
            <h6 class="fw-bold">Menu</h6>
            <ul class="list-unstyled small">
              <li><a href="{{ route('route.homepage') }}" class="text-light text-decoration-none">Home</a></li>
              <li><a href="{{ route('mitra.show') }}" class="text-light text-decoration-none">Mitra</a></li>
              <li><a href="{{ route('artikel.index') }}" class="text-light text-decoration-none">Artikel</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-3">
            <h6 class="fw-bold">Layanan</h6>
            <ul class="list-unstyled small">
              <li><a href="{{ route('pricing.index') }}" class="text-light text-decoration-none">Harga</a></li>
              <li><a href="{{ route('contact.index') }}" class="text-light text-decoration-none">Kontak</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-3">
            <h6 class="fw-bold">Hubungi Kami</h6>
            <p class="small text-muted">Email: hello@green.local</p>
            <p class="small text-muted">WA: +62 812-1234-5678</p>
          </div>
        </div>
        <hr class="bg-secondary">
        <div class="text-center small text-muted">
          &copy; {{ date('Y') }} GREEN. Semua hak dilindungi.
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
</body>

</html>