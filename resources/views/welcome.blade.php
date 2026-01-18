<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><!-- Bootstrap 5 CSS --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap Icons --><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"><!-- Font Awesome --><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'HomeClean') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
                    HomeClean
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active fw-bold text-primary' : '' }}" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Layanan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($services as $service)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('service.show', $service->id) }}">
                                            {{ $service->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item fw-bold text-primary" href="#">Lihat Semua Layanan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('promo') }}">Promo</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/home') }}" class="btn btn-primary text-white btn-sm px-4 rounded-pill">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm px-4 me-2 rounded-pill">Masuk</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm px-4 rounded-pill">Daftar</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <header class="bg-light py-5 mt-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold">Solusi Kebersihan <span class="text-primary">Terpercaya</span></h1>
                        <p class="lead text-muted mb-4">
                            Kami membersihkan rumah Anda dengan profesional, sehingga Anda bisa fokus pada hal yang lebih penting.
                        </p>
                        <a href="#services" class="btn btn-primary btn-lg px-4">Pesan Sekarang</a>
                    </div>
                    <div class="col-lg-6 text-center">
                    </div>
                </div>
            </div>
        </header>

        <section class="py-5 bg-white">
            <div class="container">
                <div class="text-center mb-5">
                    <h3 class="fw-bold">Kenapa HomeClean?</h3>
                    <p class="text-muted mb-4">Layanan sepenuhnya dijamin dengan garansi kepuasan pelanggan.</p>
                    
                    <div class="d-flex justify-content-center gap-3 gap-md-5 flex-wrap">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2 fs-5"></i>
                            <span class="fw-medium">Jaminan Keamanan Barang</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2 fs-5"></i>
                            <span class="fw-medium">Petugas Profesional</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-success me-2 fs-5"></i>
                            <span class="fw-medium">Peralatan Lengkap</span>
                        </div>
                    </div>
                </div>

                <hr class="my-5 opacity-10">

                <div class="text-center mb-5">
                    <h3 class="fw-bold">Pesan tanpa ribet dalam 3 menit</h3>
                </div>

                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="position-relative p-4 bg-light rounded-4 h-100">
                            <div class="position-absolute top-0 start-50 translate-middle badge rounded-circle bg-primary fs-5" style="width: 40px; height: 40px; line-height: 30px;">1</div>
                            <div class="mt-3 mb-3">
                                <i class="bi bi-cursor-fill text-primary display-4"></i>
                            </div>
                            <h5 class="fw-bold">Pilih Layanan</h5>
                            <p class="text-muted small">Pilih paket kebersihan yang Anda butuhkan melalui website atau aplikasi.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="position-relative p-4 bg-light rounded-4 h-100">
                            <div class="position-absolute top-0 start-50 translate-middle badge rounded-circle bg-primary fs-5" style="width: 40px; height: 40px; line-height: 30px;">2</div>
                            <div class="mt-3 mb-3">
                                <i class="bi bi-calendar-check-fill text-primary display-4"></i>
                            </div>
                            <h5 class="fw-bold">Tentukan Jadwal</h5>
                            <p class="text-muted small">Atur waktu kedatangan cleaner sesuai kenyamanan Anda, bayar dengan mudah.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="position-relative p-4 bg-light rounded-4 h-100">
                            <div class="position-absolute top-0 start-50 translate-middle badge rounded-circle bg-primary fs-5" style="width: 40px; height: 40px; line-height: 30px;">3</div>
                            <div class="mt-3 mb-3">
                                <i class="bi bi-house-heart-fill text-primary display-4"></i>
                            </div>
                            <h5 class="fw-bold">Nikmati Hasilnya</h5>
                            <p class="text-muted small">Cleaner kami bekerja, Anda tinggal duduk santai menikmati rumah bersih.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Layanan Populer</h2>
                    <p class="text-muted">Pilihan layanan kebersihan terfavorit pelanggan kami</p>
                </div>

                <div class="row">
                    @if($services->count() > 0)
                        @foreach($services->take(6) as $service)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                        @if($service->image)
                                            <img src="{{ asset('storage/'.$service->image) }}" 
                                                alt="{{ $service->name }}"
                                                class="img-fluid h-100" style="object-fit: cover;">
                                        @else
                                            <i class="fas fa-{{ $service->id == 1 ? 'broom' : ($service->id == 4 ? 'tshirt' : 'home') }} fa-4x text-primary"></i>
                                        @endif
                                    </div>
                                    
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                                        <p class="card-text text-muted small">
                                            {{ Str::limit($service->description, 80) }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="badge bg-primary fs-6">
                                                Rp {{ number_format($service->price_per_hour, 0, ',', '.') }}
                                            </span>
                                            <small class="text-muted">
                                                {{ $service->duration_hours }} Jam
                                            </small>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer bg-white border-0 pb-3">
                                        {{-- PERBAIKAN DI SINI: Mengubah route ke 'service.show' --}}
                                        <a href="{{ route('service.show', $service->id) }}" class="btn btn-outline-primary w-100">Pesan Sekarang</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <div class="alert alert-warning">Data layanan belum tersedia.</div>
                        </div>
                    @endif
                </div>
                
                <div class="text-center mt-4">
                    <button class="btn btn-link text-decoration-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        Lihat Layanan Lainnya di Menu Atas <i class="bi bi-arrow-up"></i>
                    </button>
                </div>
            </div>
        </section>

        <footer class="bg-dark text-white py-4 mt-auto">
            <div class="container text-center">
                <p class="mb-0">&copy; {{ date('Y') }} HomeClean Project.</p>
            </div>
        </footer>
    </div>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script></body>
</html>
