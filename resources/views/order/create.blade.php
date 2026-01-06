@extends('layout.layout')

@section('title','Pesan Penjemputan - GREEN')

@section('content')
<section class="py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold text-success mb-0">Pesan Penjemputan</h1>
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-outline-success">
                    ← Kembali ke Dashboard
                </a>
            @endauth
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            id="orderForm"
            method="POST"
            action="{{ route('order.store') }}"
            enctype="multipart/form-data"
            class="row g-3"
        >
            @csrf

            <div class="col-md-6">
                <label class="form-label fw-bold">Nama</label>
                <input
                    type="text"
                    name="customer_name"
                    class="form-control"
                    value="{{ old('customer_name', auth()->user()->name ?? '') }}"
                    required
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">No HP</label>
                <input
                    type="tel"
                    name="customer_phone"
                    class="form-control"
                    value="{{ old('customer_phone', auth()->user()->phone ?? '') }}"
                    required
                >
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Alamat Lengkap</label>
                <textarea
                    name="address"
                    rows="3"
                    class="form-control"
                    required
                >{{ old('address') }}</textarea>
                <div class="form-text">
                    Opsional: tambahkan titik koordinat di bawah jika tersedia.
                </div>
            </div>

            <div class="col-md-3">
                <label class="form-label">Latitude</label>
                <input
                    type="number"
                    step="any"
                    name="lat"
                    class="form-control"
                    value="{{ old('lat') }}"
                >
            </div>

            <div class="col-md-3">
                <label class="form-label">Longitude</label>
                <input
                    type="number"
                    step="any"
                    name="lng"
                    class="form-control"
                    value="{{ old('lng') }}"
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Kategori Sampah Barang</label>
                <select name="pricing_category_id" class="form-select" required>
                    <option value="" disabled selected>Pilih kategori</option>
                    @foreach ($categories as $cat)
                        <option
                            value="{{ $cat->id }}"
                            @selected(old('pricing_category_id') == $cat->id)
                        >
                            {{ $cat->name }}
                            ({{ $cat->unit }})
                            - Rp {{ number_format($cat->price,0,',','.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Upload Foto Barang</label>
                <input
                    type="file"
                    name="photo"
                    accept="image/*"
                    class="form-control"
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Tanggal dan Waktu</label>
                <input
                    type="datetime-local"
                    name="scheduled_at"
                    class="form-control"
                    value="{{ old('scheduled_at') }}"
                    required
                >
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Metode Layanan</label>
                <select name="service_method" class="form-select" required>
                    <option value="free" @selected(old('service_method') === 'free')>
                        Gratis
                    </option>
                    <option value="paid" @selected(old('service_method') === 'paid')>
                        Berbayar
                    </option>
                </select>
            </div>

            <div class="col-12">
                <div class="p-3 bg-light rounded border d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small">Harga Estimasi</div>
                        <div class="h5 mb-0">
                            <span id="estPrice">Rp 0</span>
                        </div>
                    </div>

                    <button
                        id="submitBtn"
                        type="submit"
                        class="btn btn-success"
                        style="background: linear-gradient(135deg, #228B22, #1c751c); border: none;"
                    >
                        <span class="btn-text">Submit Order</span>
                    </button>
                </div>
            </div>

        </form>
    </div>
</section>

<script>
(function () {
    const select = document.querySelector('select[name="pricing_category_id"]');
    const est = document.getElementById('estPrice');
    const btn = document.getElementById('submitBtn');
    const form = document.getElementById('orderForm');

    const prices = {
        @foreach ($categories as $cat)
            {{ $cat->id }}: {{ (int) $cat->price }},
        @endforeach
    };

    function fmt(n) {
        return new Intl.NumberFormat('id-ID').format(n || 0);
    }

    if (select) {
        select.addEventListener('change', () => {
            est.textContent = 'Rp ' + fmt(prices[select.value] || 0);
        });
    }

    if (form && btn) {
        form.addEventListener('submit', () => {
            btn.disabled = true;
            btn.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>Mengirim...';
        });
    }
})();
</script>
@endsection
