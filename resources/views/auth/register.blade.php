@extends('layouts.app')

@section('title', 'Daftar Akun HomeClean')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Register Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Logo & Header -->
                    <div class="text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center mb-4">
                            <i class="fas fa-broom fa-3x text-primary me-3"></i>
                            <h1 class="h3 fw-bold text-dark mb-0">HomeClean</h1>
                        </div>
                        <h2 class="h4 fw-bold text-dark mb-2">Buat Akun Baru</h2>
                        <p class="text-muted">Bergabung dengan ribuan pelanggan puas kami</p>
                    </div>

                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input id="name" type="text" 
                                       class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" 
                                       placeholder="Nama lengkap Anda" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" type="email" 
                                       class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" 
                                       placeholder="nama@email.com" required autocomplete="email">
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" type="password" 
                                       class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                       name="password" placeholder="Minimal 8 karakter" required autocomplete="new-password">
                                <button class="btn btn-outline-secondary border-start-0" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text small text-muted mt-1">
                                <i class="fas fa-info-circle me-1"></i>
                                Password harus minimal 8 karakter
                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password-confirm" type="password" 
                                       class="form-control border-start-0" 
                                       name="password_confirmation" 
                                       placeholder="Ketik ulang password" required autocomplete="new-password">
                                <button class="btn btn-outline-secondary border-start-0" type="button" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Terms Agreement -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                <label class="form-check-label small" for="terms">
                                    Saya setuju dengan 
                                    <a href="#" class="text-primary text-decoration-none">Syarat & Ketentuan</a> 
                                    dan 
                                    <a href="#" class="text-primary text-decoration-none">Kebijakan Privasi</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="position-relative my-4">
                            <hr class="border-light">
                            <div class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                Sudah memiliki akun?
                            </div>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary px-4">
                                <i class="fas fa-sign-in-alt me-2"></i>Masuk ke Akun
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Footer Links -->
                <div class="card-footer bg-light border-0 py-4">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="text-decoration-none text-muted me-3">
                            <i class="fas fa-home me-1"></i>Beranda
                        </a>
                        <a href="{{ route('kontak') }}" class="text-decoration-none text-muted me-3">
                            <i class="fas fa-phone me-1"></i>Bantuan
                        </a>
                        <a href="{{ route('promo') }}" class="text-decoration-none text-muted">
                            <i class="fas fa-tag me-1"></i>Promo
                        </a>
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="mt-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="text-center p-3 rounded bg-light">
                            <i class="fas fa-calendar-check text-primary fa-lg mb-2"></i>
                            <p class="small mb-0">Booking Mudah</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3 rounded bg-light">
                            <i class="fas fa-tag text-success fa-lg mb-2"></i>
                            <p class="small mb-0">Promo Eksklusif</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center p-3 rounded bg-light">
                            <i class="fas fa-history text-warning fa-lg mb-2"></i>
                            <p class="small mb-0">Riwayat Booking</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles for Register Page */
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    
    .card-body {
        background: #ffffff;
    }
    
    .input-group-text {
        border-right: 1px solid #dee2e6;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }
    
    .form-control {
        border-left: 1px solid #dee2e6;
        padding-left: 12px;
    }
    
    .form-control.border-start-0 {
        border-left: 0;
    }
    
    /* Fix for input focus outline */
    .input-group:focus-within .input-group-text {
        border-color: #2563eb;
        z-index: 3;
    }
    
    .input-group:focus-within .form-control {
        border-color: #2563eb;
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
        z-index: 3;
    }
    
    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
    }
    
    #togglePassword, #toggleConfirmPassword {
        border-left: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }
    
    #togglePassword:hover, #toggleConfirmPassword:hover {
        background-color: #e9ecef;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-body {
            padding: 2rem !important;
        }
        
        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }
    }
</style>

<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
    
    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password-confirm');
        const icon = this.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
    
    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password-confirm').value;
        const terms = document.getElementById('terms').checked;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Password dan konfirmasi password tidak cocok!');
            return false;
        }
        
        if (!terms) {
            e.preventDefault();
            alert('Anda harus menyetujui syarat dan ketentuan!');
            return false;
        }
    });
</script>
@endsection