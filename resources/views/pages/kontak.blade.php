@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary mb-3">
                    <i class="fas fa-phone-alt me-2"></i>Hubungi Kami
                </h1>
                <p class="lead text-muted">Kami siap membantu Anda dengan layanan kebersihan terbaik</p>
            </div>

            <div class="row g-5">
                <!-- Contact Info -->
                <div class="col-md-5">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Informasi Kontak</h4>
                            
                            <div class="d-flex align-items-start mb-4">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Alamat Kantor</h6>
                                    <p class="text-muted mb-0">Jl. Kebersihan No. 123<br>Jakarta Selatan, 12540</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-phone fa-2x text-success"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Telepon</h6>
                                    <p class="text-muted mb-0">(021) 1234-5678</p>
                                    <p class="text-muted mb-0">(021) 8765-4321</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-envelope fa-2x text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Email</h6>
                                    <p class="text-muted mb-0">info@homeclean.com</p>
                                    <p class="text-muted mb-0">cs@homeclean.com</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-clock fa-2x text-info"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Jam Operasional</h6>
                                    <p class="text-muted mb-0">Senin - Jumat: 08:00 - 20:00</p>
                                    <p class="text-muted mb-0">Sabtu - Minggu: 09:00 - 17:00</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h6 class="fw-bold mb-3">Ikuti Kami</h6>
                            <div class="d-flex gap-3">
                                <a href="#" class="social-icon facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-icon instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-icon twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-md-7">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Kirim Pesan</h4>
                            <form id="contactForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">No. Telepon *</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subject" class="form-label">Subjek *</label>
                                        <select class="form-select" id="subject" required>
                                            <option value="">Pilih Subjek</option>
                                            <option value="booking">Pertanyaan Booking</option>
                                            <option value="service">Pertanyaan Layanan</option>
                                            <option value="promo">Pertanyaan Promo</option>
                                            <option value="complaint">Keluhan</option>
                                            <option value="other">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="message" class="form-label">Pesan *</label>
                                        <textarea class="form-control" id="message" rows="5" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="newsletter">
                                            <label class="form-check-label" for="newsletter">
                                                Saya ingin menerima informasi promo dan update dari HomeClean
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg px-4">
                                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="card border-0 shadow-lg mt-5">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Lokasi Kantor</h4>
                    <div class="map-placeholder bg-light rounded p-5 text-center">
                        <i class="fas fa-map fa-4x text-muted mb-3"></i>
                        <h5 class="text-muted">Peta Lokasi</h5>
                        <p class="text-muted mb-0">Jl. Kebersihan No. 123, Jakarta Selatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .contact-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background: rgba(13, 110, 253, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: transform 0.3s;
    }
    
    .social-icon:hover {
        transform: translateY(-3px);
    }
    
    .social-icon.facebook { background: #3b5998; }
    .social-icon.instagram { background: #e4405f; }
    .social-icon.twitter { background: #1da1f2; }
    .social-icon.whatsapp { background: #25d366; }
    
    .map-placeholder {
        height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Terima kasih! Pesan Anda telah dikirim. Kami akan menghubungi Anda dalam 1x24 jam.');
        this.reset();
    });
</script>
@endsection