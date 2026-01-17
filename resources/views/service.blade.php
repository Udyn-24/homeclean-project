<!DOCTYPE html>
<html lang="id">
<head>
    <title>Detail Layanan - HomeClean</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container py-5 mt-5">
        <div class="card shadow border-0">
            <div class="row g-0">
                <div class="col-md-6 bg-secondary d-flex align-items-center justify-content-center text-white">
                    <h2 class="display-1"><i class="bi bi-image"></i></h2>
                </div>
                <div class="col-md-6">
                    <div class="card-body p-5">
                        @if($service)
                            <h5 class="text-uppercase text-muted ls-1">Detail Layanan</h5>
                            <h1 class="fw-bold text-primary mb-3">{{ $service->name }}</h1>
                            <h3 class="fw-bold mb-4">Rp {{ number_format($service->price_per_hour, 0, ',', '.') }} <small class="fs-6 text-muted">/ jam</small></h3>
                            <p class="card-text fs-5">{{ $service->description }}</p>
                            
                            <hr class="my-4">
                            
                            <div class="d-flex mb-4">
                                <div class="me-4">
                                    <span class="fw-bold d-block">Durasi Estimasi</span>
                                    <span class="text-muted"><i class="bi bi-clock"></i> {{ $service->duration_hours }} Jam</span>
                                </div>
                                <div>
                                    <span class="fw-bold d-block">Kategori</span>
                                    <span class="text-muted"><i class="bi bi-tag"></i> Cleaning</span>
                                </div>
                            </div>

                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100 rounded-pill">Pesan Layanan Ini</a>
                        @else
                            <h1 class="text-danger">Layanan Tidak Ditemukan</h1>
                        @endif
                        
                        <div class="mt-4 text-center">
                            <a href="{{ url('/') }}" class="text-decoration-none text-muted">Kembali ke Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
