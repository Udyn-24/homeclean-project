@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary mb-3">
                    <i class="fas fa-info-circle me-2"></i>Tentang HomeClean
                </h1>
                <p class="lead text-muted">Menjadi partner terpercaya dalam kebersihan rumah Anda sejak 2020</p>
            </div>

            <!-- Company Story -->
            <div class="card border-0 shadow-lg mb-5">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="fw-bold mb-4">Cerita Kami</h2>
                            <p class="text-muted mb-4">HomeClean didirikan dengan satu misi sederhana: membuat hidup Anda lebih mudah dengan menyediakan layanan kebersihan rumah yang profesional, terpercaya, dan terjangkau.</p>
                            <p class="text-muted mb-4">Dari awal yang sederhana dengan hanya 3 staf, kini kami telah melayani lebih dari 10.000 pelanggan di seluruh Indonesia dan terus berkembang dengan komitmen pada kualitas layanan.</p>
                            <div class="d-flex gap-3">
                                <div class="text-center">
                                    <h3 class="text-primary fw-bold">10K+</h3>
                                    <p class="text-muted mb-0">Pelanggan</p>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-success fw-bold">50+</h3>
                                    <p class="text-muted mb-0">Petugas</p>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-warning fw-bold">4.9</h3>
                                    <p class="text-muted mb-0">Rating</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-image rounded overflow-hidden shadow">
                                <div class="bg-light p-5 text-center">
                                    <i class="fas fa-home fa-6x text-primary opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Values -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-hand-sparkles fa-3x text-primary"></i>
                            </div>
                            <h5 class="fw-bold">Bersih Menyeluruh</h5>
                            <p class="text-muted">Kami membersihkan setiap sudut rumah dengan detail dan ketelitian tinggi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-user-shield fa-3x text-success"></i>
                            </div>
                            <h5 class="fw-bold">Terlatih & Profesional</h5>
                            <p class="text-muted">Semua petugas kami melalui pelatihan ketat dan pemeriksaan latar belakang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body text-center p-4">
                            <div class="value-icon mb-3">
                                <i class="fas fa-leaf fa-3x text-warning"></i>
                            </div>
                            <h5 class="fw-bold">Ramah Lingkungan</h5>
                            <p class="text-muted">Kami menggunakan produk pembersih yang aman untuk keluarga dan lingkungan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="text-center mb-4">
                <h2 class="fw-bold">Tim Kami</h2>
                <p class="text-muted">Bertemu dengan orang-orang yang membuat HomeClean istimewa</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body p-4">
                            <div class="team-avatar mb-3">
                                <i class="fas fa-user-circle fa-4x text-primary"></i>
                            </div>
                            <h6 class="fw-bold mb-1">Budi Santoso</h6>
                            <p class="text-muted small mb-3">Founder & CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body p-4">
                            <div class="team-avatar mb-3">
                                <i class="fas fa-user-circle fa-4x text-success"></i>
                            </div>
                            <h6 class="fw-bold mb-1">Siti Aisyah</h6>
                            <p class="text-muted small mb-3">Head of Operations</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body p-4">
                            <div class="team-avatar mb-3">
                                <i class="fas fa-user-circle fa-4x text-warning"></i>
                            </div>
                            <h6 class="fw-bold mb-1">Ahmad Fauzi</h6>
                            <p class="text-muted small mb-3">Quality Control Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow text-center">
                        <div class="card-body p-4">
                            <div class="team-avatar mb-3">
                                <i class="fas fa-user-circle fa-4x text-info"></i>
                            </div>
                            <h6 class="fw-bold mb-1">Maya Indah</h6>
                            <p class="text-muted small mb-3">Customer Service Head</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .value-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(13, 110, 253, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
    
    .team-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
    
    .about-image {
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection