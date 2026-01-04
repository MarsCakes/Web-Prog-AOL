@extends('layout.layout')
@section('title', 'Beranda - GREEN')
@section('content')

  <!-- Hero Section -->
  <section class="hero-forest text-white py-5"
    style="background: linear-gradient(135deg, #228B22 0%, #1c751c 100%); min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h1 class="display-4 fw-bold mb-4">
            Daur Ulang Jadi Lebih Mudah dengan <span style="color: #90EE90;">GREEN</span>
          </h1>
          <p class="lead mb-4">
            Jual sampah daur ulang Anda dengan mudah. Pesan penjemputan gratis, dapatkan uang tunai langsung, dan bantu
            selamatkan bumi.
          </p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="{{ route('register') }}" class="btn btn-light btn-lg fw-bold px-5">
              Daftar Sekarang
            </a>
            <a href="{{ route('pricing.index') }}" class="btn btn-outline-light btn-lg fw-bold px-5">
              Lihat Harga
            </a>
          </div>
          <p class="text-light mt-4 small">
            ✓ Gratis ongkir • ✓ Proses cepat • ✓ Terpercaya
          </p>
        </div>
        <div class="col-lg-6">
          <img
            src="https://plus.unsplash.com/premium_photo-1681987448179-4a93b7975018?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cmVjeWNsZSUyMGxvZ298ZW58MHx8MHx8fDA%3D"
            alt="Recycling illustration" class="img-fluid rounded-3 shadow-lg"
            style="width: 100%; max-width: 720px; height: 420px; object-fit: cover;" loading="lazy" />
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="h2 fw-bold text-success mb-2">Mengapa Pilih GREEN?</h2>
        <p class="text-muted lead">Kami membuat daur ulang menjadi mudah, menguntungkan, dan berdampak positif</p>
        <div
          style="width: 80px; height: 4px; background: linear-gradient(135deg, #228B22, #90EE90); margin: 20px auto; border-radius: 2px;">
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise h-100">
            <div class="card-body text-center p-4">
              <div style="font-size: 48px; margin-bottom: 15px;">⚡</div>
              <h5 class="card-title fw-bold text-success">Cepat & Mudah</h5>
              <p class="card-text text-muted">
                Pesan penjemputan dalam 5 menit. Sopir kami siap datang ke rumah Anda.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise h-100">
            <div class="card-body text-center p-4">
              <div style="font-size: 48px; margin-bottom: 15px;">💰</div>
              <h5 class="card-title fw-bold text-success">Harga Transparan</h5>
              <p class="card-text text-muted">
                Harga jelas tanpa biaya tersembunyi. Pembayaran langsung setelah serah terima.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise h-100">
            <div class="card-body text-center p-4">
              <div style="font-size: 48px; margin-bottom: 15px;">🌍</div>
              <h5 class="card-title fw-bold text-success">Ramah Lingkungan</h5>
              <p class="card-text text-muted">
                Setiap penjualan membantu mengurangi limbah dan menyelamatkan planet kita.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise h-100">
            <div class="card-body text-center p-4">
              <div style="font-size: 48px; margin-bottom: 15px;">📍</div>
              <h5 class="card-title fw-bold text-success">Jangkauan Luas</h5>
              <p class="card-text text-muted">
                Melayani pengiriman ke seluruh kota. Mitra pengambilan tersedia 24/7.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise h-100">
            <div class="card-body text-center p-4">
              <div style="font-size: 48px; margin-bottom: 15px;">⭐</div>
              <h5 class="card-title fw-bold text-success">Terpercaya</h5>
              <p class="card-text text-muted">
                Ribuan pelanggan puas. Rating 4.9/5 dari review pengguna nyata.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise h-100">
            <div class="card-body text-center p-4">
              <div style="font-size: 48px; margin-bottom: 15px;">🎁</div>
              <h5 class="card-title fw-bold text-success">Program Loyalitas</h5>
              <p class="card-text text-muted">
                Kumpulkan poin setiap penjualan dan tukarkan dengan hadiah menarik.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="h2 fw-bold text-success mb-2">Bagaimana Cara Kerja GREEN?</h2>
        <p class="text-muted lead">4 langkah mudah untuk mulai menghasilkan uang dari sampah Anda</p>
        <div
          style="width: 80px; height: 4px; background: linear-gradient(135deg, #228B22, #90EE90); margin: 20px auto; border-radius: 2px;">
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="text-center">
            <div
              style="background: linear-gradient(135deg, #228B22, #1c751c); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; margin: 0 auto 20px;">
              1
            </div>
            <h5 class="fw-bold text-success">Daftar Akun</h5>
            <p class="text-muted small">
              Buat akun GREEN Anda dengan nama, email, dan nomor telepon.
            </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="text-center">
            <div
              style="background: linear-gradient(135deg, #228B22, #1c751c); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; margin: 0 auto 20px;">
              2
            </div>
            <h5 class="fw-bold text-success">Pesan Penjemputan</h5>
            <p class="text-muted small">
              Tentukan jenis dan jumlah sampah. Pilih waktu penjemputan yang cocok.
            </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="text-center">
            <div
              style="background: linear-gradient(135deg, #228B22, #1c751c); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; margin: 0 auto 20px;">
              3
            </div>
            <h5 class="fw-bold text-success">Sopir Datang</h5>
            <p class="text-muted small">
              Sopir kami akan datang dan mengambil sampah dari rumah Anda.
            </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="text-center">
            <div
              style="background: linear-gradient(135deg, #228B22, #1c751c); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: bold; margin: 0 auto 20px;">
              4
            </div>
            <h5 class="fw-bold text-success">Terima Pembayaran</h5>
            <p class="text-muted small">
              Dapatkan uang tunai langsung. Poin loyalitas ditambahkan otomatis.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="h2 fw-bold text-success mb-2">Jenis Sampah yang Kami Terima</h2>
        <p class="text-muted lead">Semua jenis sampah daur ulang dengan harga terbaik</p>
        <div
          style="width: 80px; height: 4px; background: linear-gradient(135deg, #228B22, #90EE90); margin: 20px auto; border-radius: 2px;">
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-2 text-center">
          <div style="font-size: 40px; margin-bottom: 10px;">📄</div>
          <h6 class="fw-bold">Kertas</h6>
          <p class="text-muted small">Rp 1.000/kg</p>
        </div>
        <div class="col-md-6 col-lg-2 text-center">
          <div style="font-size: 40px; margin-bottom: 10px;">🛍️</div>
          <h6 class="fw-bold">Plastik</h6>
          <p class="text-muted small">Rp 3.000/kg</p>
        </div>
        <div class="col-md-6 col-lg-2 text-center">
          <div style="font-size: 40px; margin-bottom: 10px;">🔴</div>
          <h6 class="fw-bold">Kaca</h6>
          <p class="text-muted small">Rp 2.000/kg</p>
        </div>
        <div class="col-md-6 col-lg-2 text-center">
          <div style="font-size: 40px; margin-bottom: 10px;">🔧</div>
          <h6 class="fw-bold">Logam</h6>
          <p class="text-muted small">Rp 5.000/kg</p>
        </div>
        <div class="col-md-6 col-lg-2 text-center">
          <div style="font-size: 40px; margin-bottom: 10px;">💻</div>
          <h6 class="fw-bold">Elektronik</h6>
          <p class="text-muted small">Estimasi</p>
        </div>
        <div class="col-md-6 col-lg-2 text-center">
          <div style="font-size: 40px; margin-bottom: 10px;">...</div>
          <h6 class="fw-bold">Lainnya</h6>
          <p class="text-muted small">Hubungi kami</p>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="{{ route('pricing.index') }}" class="btn btn-success btn-lg fw-bold"
          style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;">
          Lihat Harga Lengkap
        </a>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="h2 fw-bold text-success mb-2">Apa Kata Pelanggan Kami?</h2>
        <p class="text-muted lead">Ribuan pelanggan puas telah menggunakan GREEN</p>
        <div
          style="width: 80px; height: 4px; background: linear-gradient(135deg, #228B22, #90EE90); margin: 20px auto; border-radius: 2px;">
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise">
            <div class="card-body">
              <div style="color: #FFC107; font-size: 18px; margin-bottom: 10px;">⭐⭐⭐⭐⭐</div>
              <p class="card-text">
                "GREEN sangat membantu! Proses cepat, harga adil, dan sopirnya ramah. Saya sudah menjual sampah plastik
                saya dan dapat uang Rp 50.000!"
              </p>
              <p class="fw-bold text-success small">— Ibu Siti, Jakarta</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise">
            <div class="card-body">
              <div style="color: #FFC107; font-size: 18px; margin-bottom: 10px;">⭐⭐⭐⭐⭐</div>
              <p class="card-text">
                "Saya suka aplikasinya mudah digunakan. Dari pesan sampai pembayaran hanya 30 menit. Recommended untuk
                semua orang!"
              </p>
              <p class="fw-bold text-success small">— Pak Budi, Bandung</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise">
            <div class="card-body">
              <div style="color: #FFC107; font-size: 18px; margin-bottom: 10px;">⭐⭐⭐⭐⭐</div>
              <p class="card-text">
                "Tidak hanya untung, tapi juga bantu lingkungan. GREEN terbukti dapat mengurangi sampah rumah saya. Top
                deh!"
              </p>
              <p class="fw-bold text-success small">— Rina, Yogyakarta</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Partnership Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="h2 fw-bold text-success mb-4">Ingin Menjadi Mitra GREEN?</h2>
          <p class="lead text-muted mb-4">
            Bergabunglah sebagai sopir/mitra pengambilan dan dapatkan penghasilan tambahan yang menguntungkan.
          </p>
          <ul class="list-unstyled mb-4">
            <li class="mb-2 text-muted"><span class="text-success fw-bold">✓</span> Penghasilan fleksibel</li>
            <li class="mb-2 text-muted"><span class="text-success fw-bold">✓</span> Bonus performa bulanan</li>
            <li class="mb-2 text-muted"><span class="text-success fw-bold">✓</span> Asuransi keselamatan kerja</li>
            <li class="mb-2 text-muted"><span class="text-success fw-bold">✓</span> Support 24/7</li>
          </ul>
          <a href="{{ route('mitra.show') }}" class="btn btn-success btn-lg fw-bold"
            style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;">
            Daftar Menjadi Mitra
          </a>
        </div>
        <div class="col-lg-6">
          <img
            src="https://images.unsplash.com/photo-1669384537216-24740a56a2d5?q=80&w=2534&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="GREEN Partner" class="img-fluid rounded-3 shadow"
            style="width: 100%; max-width: 720px; height: 380px; object-fit: cover;" loading="lazy" />
        </div>
      </div>
    </div>
  </section>

  <!-- Blog/Education Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="h2 fw-bold text-success mb-2">Artikel & Edukasi</h2>
        <p class="text-muted lead">Pelajari pentingnya daur ulang dan tips ramah lingkungan</p>
        <div
          style="width: 80px; height: 4px; background: linear-gradient(135deg, #228B22, #90EE90); margin: 20px auto; border-radius: 2px;">
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise">
            <div
              style="background: #f0f0f0; height: 200px; border-radius: 0.375rem 0.375rem 0 0; display: flex; align-items: center; justify-content: center; font-size: 60px;">
              ♻️
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold text-success">Mengapa Daur Ulang Penting?</h5>
              <p class="card-text text-muted small mb-3">
                Pelajari bagaimana daur ulang membantu mengurangi limbah dan polusi lingkungan.
              </p>
              <a href="{{ route('artikel.index') }}" class="link-success text-decoration-none fw-bold">Baca selengkapnya
                →</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise">
            <div
              style="background: #f0f0f0; height: 200px; border-radius: 0.375rem 0.375rem 0 0; display: flex; align-items: center; justify-content: center; font-size: 60px;">
              🌍
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold text-success">Dampak Positif Lingkungan</h5>
              <p class="card-text text-muted small mb-3">
                Lihat statistik tentang bagaimana kontribusi Anda membantu planet kita.
              </p>
              <a href="{{ route('artikel.index') }}" class="link-success text-decoration-none fw-bold">Baca selengkapnya
                →</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card border-0 shadow-sm card-raise">
            <div
              style="background: #f0f0f0; height: 200px; border-radius: 0.375rem 0.375rem 0 0; display: flex; align-items: center; justify-content: center; font-size: 60px;">
              💡
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold text-success">Tips Daur Ulang di Rumah</h5>
              <p class="card-text text-muted small mb-3">
                Panduan praktis memilah sampah dan mempersiapkan untuk penjualan.
              </p>
              <a href="{{ route('artikel.index') }}" class="link-success text-decoration-none fw-bold">Baca selengkapnya
                →</a>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="{{ route('artikel.index') }}" class="btn btn-outline-success btn-lg fw-bold">
          Lihat Semua Artikel
        </a>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="py-5" style="background: linear-gradient(135deg, #228B22 0%, #1c751c 100%); color: white;">
    <div class="container text-center">
      <h2 class="h2 fw-bold mb-4">Siap Mulai Menghasilkan Uang?</h2>
      <p class="lead mb-4">
        Bergabunglah dengan ribuan pengguna yang telah mengubah sampah mereka menjadi uang.
      </p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="{{ route('register') }}" class="btn btn-light btn-lg fw-bold px-5">
          Daftar Gratis Sekarang
        </a>
        <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg fw-bold px-5">
          Hubungi Kami
        </a>
      </div>
    </div>
  </section>

@endsection