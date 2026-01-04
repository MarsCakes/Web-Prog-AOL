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
      --forest: #228B22;
      /* Forest Green */
      --forest-700: #1c751c;
      --forest-600: #1f7e1f;
      --forest-100: #e9f6e9;
    }

    .bg-success {
      background-color: var(--forest) !important;
    }

    .text-success {
      color: var(--forest) !important;
    }

    .btn-success {
      background-color: var(--forest);
      border-color: var(--forest);
    }

    .btn-success:hover {
      background-color: var(--forest-700);
      border-color: var(--forest-700);
    }

    .btn-outline-success {
      color: var(--forest);
      border-color: var(--forest);
    }

    .btn-outline-success:hover {
      color: #fff;
      background-color: var(--forest);
      border-color: var(--forest);
    }

    .link-success {
      color: var(--forest);
    }

    .link-success:hover {
      color: var(--forest-600);
    }

    .badge-success {
      background-color: var(--forest);
    }

    .hero-forest {
      background: linear-gradient(180deg, var(--forest-100), #fff);
    }

    .card.card-raise {
      transition: transform .2s ease, box-shadow .2s ease;
    }

    .card.card-raise:hover {
      transform: translateY(-2px);
      box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
    }

    .section-title {
      position: relative;
      padding-bottom: .5rem;
      margin-bottom: 1rem;
    }

    .section-title::after {
      content: "";
      width: 64px;
      height: 3px;
      background: var(--forest);
      position: absolute;
      left: 0;
      bottom: 0;
      border-radius: 3px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="{{ route('route.homepage') }}">GREENMART</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="{{ route('route.homepage') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Order</a>
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
        <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form> -->
      </div>
    </div>
  </nav>
  <main>
    @yield('content')
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>