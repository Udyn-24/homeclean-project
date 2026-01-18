@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary mb-3">
                    <i class="fas fa-tag me-2"></i>Promo & Penawaran Spesial
                </h1>
                <p class="lead text-muted">Nikmati berbagai penawaran menarik untuk layanan kebersihan rumah Anda</p>
            </div>

            <!-- Promo Cards -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-header bg-danger text-white py-3">
                            <h4 class="mb-0"><i class="fas fa-fire me-2"></i>Promo Spesial Bulan Ini</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-danger text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-percentage fa-2x"></i>
                                </div>
                                <div>
                                    <h3 class="text-danger fw-bold mb-0">20% OFF</h3>
                                    <p class="text-muted mb-0">Untuk Layanan Deep Cleaning</p>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Bersihkan seluruh rumah</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Termasuk kamar mandi & dapur</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Gratis pewangi ruangan</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Garansi kepuasan 100%</li>
                            </ul>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Berlaku hingga:</strong> 30 Juni 2026
                            </div>
                            <a href="{{ route('order.create', 2) }}" class="btn btn-danger btn-lg w-100">
                                <i class="fas fa-calendar-plus me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-header bg-warning text-dark py-3">
                            <h4 class="mb-0"><i class="fas fa-gift me-2"></i>Paket Hemat Keluarga</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning text-dark rounded-circle p-3 me-3">
                                    <i class="fas fa-home fa-2x"></i>
                                </div>
                                <div>
                                    <h3 class="text-warning fw-bold mb-0">Paket 3x</h3>
                                    <p class="text-muted mb-0">Dapatkan diskon tambahan</p>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Pesan 3x layanan sekaligus</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Diskon 15% dari total harga</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Jadwal fleksibel</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Prioritas booking</li>
                            </ul>
                            <div class="alert alert-success">
                                <i class="fas fa-crown me-2"></i>
                                <strong>Bonus:</strong> Gratis 1x jasa cuci karpet
                            </div>
                            <a href="{{ route('kontak') }}" class="btn btn-warning btn-lg w-100">
                                <i class="fas fa-phone-alt me-2"></i>Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More Promo -->
            <div class="row g-4 mt-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body text-center p-4">
                            <div class="icon-promo mb-3">
                                <i class="fas fa-user-friends fa-3x text-primary"></i>
                            </div>
                            <h5>Referral Program</h5>
                            <p class="text-muted">Dapatkan Rp 50.000 untuk setiap teman yang berlangganan</p>
                            <span class="badge bg-info">Tidak Terbatas</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body text-center p-4">
                            <div class="icon-promo mb-3">
                                <i class="fas fa-calendar-alt fa-3x text-success"></i>
                            </div>
                            <h5>Booking Mingguan</h5>
                            <p class="text-muted">Diskon 10% untuk layanan rutin mingguan</p>
                            <span class="badge bg-success">Berlaku</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body text-center p-4">
                            <div class="icon-promo mb-3">
                                <i class="fas fa-star fa-3x text-warning"></i>
                            </div>
                            <h5>Member VIP</h5>
                            <p class="text-muted">Nikmati berbagai keuntungan eksklusif</p>
                            <span class="badge bg-warning">Premium</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .icon-promo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(13, 110, 253, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
</style>
@endsection