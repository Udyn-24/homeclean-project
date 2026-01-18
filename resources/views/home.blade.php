@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center hero-content">
                    <h1 class="display-4 fw-bold mb-4">Solusi Kebersihan Terpercaya</h1>
                    <p class="lead fs-4 mb-5 opacity-90">Kami membersihkan rumah Anda dengan profesional, sehingga Anda bisa fokus pada hal yang lebih penting.</p>
                    
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                        <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg px-5 py-3">
                            <i class="fas fa-calendar-check me-2"></i>Pesan Sekarang
                        </a>
                        <a href="#why-homeclean" class="btn btn-light btn-lg px-5 py-3">
                            <i class="fas fa-play-circle me-2"></i>Lihat Video
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="mt-5 pt-3">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle text-success fs-4 me-2"></i>
                                    <span>4.9/5 Rating</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-users text-primary fs-4 me-2"></i>
                                    <span>10.000+ Pelanggan</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-shield-alt text-warning fs-4 me-2"></i>
                                    <span>100% Terjamin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why HomeClean Section -->
    <section id="why-homeclean" class="py-5 bg-light">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Kenapa HomeClean?</h2>
                    <p class="lead text-muted">Kami memberikan solusi kebersihan terbaik dengan berbagai keunggulan</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper mb-4">
                                <i class="fas fa-user-shield fa-3x text-primary"></i>
                            </div>
                            <h4 class="card-title mb-3">Profesional & Terlatih</h4>
                            <p class="card-text text-muted">Petugas kami sudah melalui pelatihan dan berpengalaman di bidang kebersihan rumah tangga.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper mb-4">
                                <i class="fas fa-shield-alt fa-3x text-success"></i>
                            </div>
                            <h4 class="card-title mb-3">Terjamin & Aman</h4>
                            <p class="card-text text-muted">Kami memberikan garansi kepuasan dan jaminan keamanan untuk properti Anda.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center p-4">
                            <div class="icon-wrapper mb-4">
                                <i class="fas fa-clock fa-3x text-warning"></i>
                            </div>
                            <h4 class="card-title mb-3">Tepat Waktu</h4>
                            <p class="card-text text-muted">Kami menghargai waktu Anda dengan kedatangan tepat waktu dan penyelesaian cepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Services Section -->
    <section id="layanan-populer" class="py-5">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Layanan Populer</h2>
                    <p class="lead text-muted">Pilihan layanan kebersihan terfavorit pelanggan kami</p>
                </div>
            </div>

            @if(isset($popularServices) && $popularServices->count() > 0)
            <div class="row">
                @foreach($popularServices as $service)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title text-primary">{{ $service->name }}</h5>
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-star me-1"></i>Populer
                                </span>
                            </div>
                            <p class="card-text text-muted mb-4">{{ Str::limit($service->description, 120) }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="badge bg-success p-2">
                                        <i class="fas fa-money-bill-wave me-1"></i>Rp {{ number_format($service->price_per_hour, 0, ',', '.') }}/jam
                                    </span>
                                    <span class="badge bg-info ms-2 p-2">
                                        <i class="fas fa-clock me-1"></i>{{ $service->duration_hours }} jam
                                    </span>
                                </div>
                            </div>
                            <div class="d-grid">
                                <a href="{{ route('order.create', $service->id) }}" class="btn btn-primary">
                                    <i class="fas fa-calendar-plus me-2"></i>Booking Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-5">
                <a href="{{ route('services.index') }}" class="btn btn-outline-primary btn-lg px-5">
                    <i class="fas fa-list me-2"></i>Lihat Semua Layanan
                </a>
            </div>
            @else
            <div class="alert alert-warning text-center">
                <i class="fas fa-exclamation-triangle me-2"></i>Data layanan belum tersedia.
            </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">Siap Membersihkan Rumah Anda?</h2>
                    <p class="lead mb-4">Bergabunglah dengan ribuan pelanggan puas yang telah mempercayakan kebersihan rumah mereka pada kami.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('services.index') }}" class="btn btn-light btn-lg px-4">
                            <i class="fas fa-phone-alt me-2"></i>Hubungi Kami
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .icon-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(37, 99, 235, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
    
    .card {
        transition: transform 0.3s;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection