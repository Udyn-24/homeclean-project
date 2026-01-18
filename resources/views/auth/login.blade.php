@extends('layouts.app')

@section('title', 'Masuk ke HomeClean')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Login Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Logo & Header -->
                    <div class="text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center mb-4">
                            <i class="fas fa-broom fa-3x text-primary me-3"></i>
                            <h1 class="h3 fw-bold text-dark mb-0">HomeClean</h1>
                        </div>
                        <h2 class="h4 fw-bold text-dark mb-2">Masuk ke Akun Anda</h2>
                        <p class="text-muted">Masukkan email dan password untuk mengakses dashboard</p>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                                       placeholder="nama@email.com" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary text-decoration-none small">
                                    Lupa Password?
                                </a>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" type="password" 
                                       class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                       name="password" placeholder="••••••••" required autocomplete="current-password">
                                <button class="btn btn-outline-secondary border-start-0" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                                <i class="fas fa-sign-in-alt me-2"></i>Masuk
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="position-relative my-4">
                            <hr class="border-light">
                            <div class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                atau
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-muted mb-0">Belum punya akun?</p>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary mt-2 px-4">
                                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
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

            <!-- Security Notice -->
            <div class="text-center mt-4">
                <p class="small text-muted">
                    <i class="fas fa-shield-alt me-1"></i>
                    Data Anda aman bersama kami. Kami tidak akan membagikan informasi pribadi Anda.
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles for Login Page */
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
    
    #togglePassword {
        border-left: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }
    
    #togglePassword:hover {
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
    
    @media (max-width: 576px) {
        .card-body {
            padding: 1.5rem !important;
        }
        
        .h3 {
            font-size: 1.5rem;
        }
        
        .h4 {
            font-size: 1.25rem;
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
    
    // Add focus effect to inputs
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('focus', function() {
            this.closest('.input-group').classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.closest('.input-group').classList.remove('focused');
        });
    });
</script>
@endsection