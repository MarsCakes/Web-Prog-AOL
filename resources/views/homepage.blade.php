@extends('layout.layout')
@section('title', 'Homepage')
@section('content')
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container-fluid">
            <h1 class="display-5 fw-bold">
                WELCOME TO GREENMART
            </h1>
            <p class="lead col-lg-8 mx-auto">
                Kami adalah perusahaan yang bertujuan untuk membantu mendorong masyarakat ke masa depan yang lebih hijau.
            </p>
            <p>
                <a href="#" class="btn btn-primary">
                    Pesan penjemputan
                </a>
            </p>
        </div>
    </div>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>
                    Keunggulan kami
                </h2>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <h3>
                    Cepat
                </h3>
                <p>
                    Semua order dikirimkan dengan cepat.
                </p>
            </div>
            <div class="col-md-4">
                <h3>
                    Eco-friendly
                </h3>
                <p>
                    Kami menjual sampah recyclable yang Eco-friendly.
                </p>
            </div>
            <div class="col-md-4">
                <h3>
                    Harga jelas
                </h3>
                <p>
                    Harga kami tertera dengan jelas tanpa hidden fees.
                </p>
            </div>
        </div>
    </div>
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container-fluid">
            <h1 class="display-5 fw-bold">
                AYO MULAI SEKARANG!
            </h1>
        </div>
    </div>
    <div class="container">
        <h2 class="pb-2 border-bottom text-center">
            Cara Penggunaan
        </h2>
        <li>
            <h5>
                Step 1: Membuat akun GREENMART dan log in
            </h5>
            <h5>
                Step 2: Tekan tombol pesan penjemputan
            </h5>
            <h5>
                Step 3: Mengisi form pemesanan dengan informasi yang tepat
            </h5>
            <h5>
                Step 4: Tekan tombol submit untuk melakukan pemesanan
            </h5>
        </li>
    </div>
    <div class="container">
        <h2 class="pb-2 border-bottom text-center">
            Testimoni
        </h2>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card border-0 shadow-sm h-100">
                    <!-- <img src="{{ asset('img/WhatsApp Image 2025-09-16 at 21.46.56_2c253f08.jpg') }}" alt="team_member-1"
                                            class="card-img-top" /> -->
                    <div class="card-body text-center">
                        <h2 class="card-title">
                            Budi
                        </h2>
                        <p class="card-text">
                            Saya menggunakan GREENMART untuk bisnis saya
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h2 class="card-title">
                            Joni
                        </h2>
                        <p class="card-text">
                            Saya sering menjual recyclables di GREENMART.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h2 class="card-title">
                            Jodi
                        </h2>
                        <p class="card-text">
                            GREENMART sangat berguna untuk mencari bahan-bahan recyclable dengan mudah dan murah
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection