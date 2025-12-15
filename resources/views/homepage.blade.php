@extends('layout.layout')
@section('title', 'Homepage')
@section('content')
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container-fluid">
            <h1 class="display-5 fw-bold">
                WELCOME TO GREEN
            </h1>
            <p class="lead col-lg-8 mx-auto">
                We are a company that aims to help society reach a greener future by selling recyclable trash.
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
@endsection