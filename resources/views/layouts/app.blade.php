<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeClean - @yield('title', 'Layanan Kebersihan Profesional')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ==========================================
           RESET & BASE STYLES
           ========================================== */
        *:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #dbeafe;
            --secondary-color: #6b7280;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-color: #f9fafb;
            --dark-color: #1f2937;
        }
        
        /* ==========================================
           BUTTON STYLES - MINIMALIST & PROFESSIONAL
           ========================================== */
        .btn {
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            padding: 0.5rem 1.5rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: white !important;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
            transform: translateY(-1px);
        }
        
        .btn-outline-primary {
            background-color: transparent !important;
            border-color: var(--primary-color) !important;
            color: var(--primary-color) !important;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: white !important;
            transform: translateY(-1px);
        }
        
        .btn-lg {
            padding: 0.75rem 2rem !important;
            font-size: 1.1rem !important;
        }
        
        /* Remove all gradients */
        .btn-primary,
        .btn-secondary,
        .btn-success,
        .btn-danger,
        .btn-warning,
        .btn-info {
            background-image: none !important;
        }
        
        /* ==========================================
           NAVBAR STYLES
           ========================================== */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            background: white !important;
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--dark-color) !important;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            color: #555 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s;
            margin: 0 2px;
        }
        
        .navbar-nav .nav-link:hover {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color) !important;
        }
        
        /* Dropdown Styles */
        .dropdown-menu {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            padding: 8px 0;
            margin-top: 8px !important;
        }
        
        .dropdown-item {
            padding: 10px 15px;
            border-radius: 6px;
            margin: 2px 8px;
            font-size: 0.95rem;
        }
        
        .dropdown-item:hover {
            background: var(--light-color);
        }
        
        /* ==========================================
           HERO SECTION STYLES
           ========================================== */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('https://ops.antitekor.com/storage/blogs-images/FfNzIrhdvFF4SOBXEUvnTPV2A4Jo0qTNWnXFaiKm.webp') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            color: white;
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .hero-content h1 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero-content .lead {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto 2rem;
        }
        
        /* ==========================================
           CARD & COMPONENT STYLES
           ========================================== */
        .card {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            transition: transform 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-4px);
        }
        
        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
            border-radius: 4px;
        }
        
        /* ==========================================
           RESPONSIVE STYLES
           ========================================== */
        @media (max-width: 991.98px) {
            .navbar-nav.mx-auto {
                text-align: center;
                padding: 1rem 0;
            }
            
            .navbar-nav .nav-link {
                margin: 5px 0;
                display: block;
            }
            
            .dropdown-menu {
                border: none;
                box-shadow: none;
                text-align: center;
            }
            
            .hero-section {
                min-height: 80vh;
                background-attachment: scroll;
            }
            
            .hero-section .btn {
                display: block;
                width: 100%;
                margin-bottom: 1rem;
            }
        }
        
        /* ==========================================
           FOOTER STYLES
           ========================================== */
        footer {
            background: var(--dark-color);
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        footer a.text-white:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-broom me-2"></i>HomeClean
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    
                    <!-- Layanan Dropdown - Hanya 3 Item -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu">
                            @php
                                $popularServices = \App\Models\Service::orderBy('price_per_hour', 'desc')->take(3)->get();
                            @endphp
                            
                            @foreach($popularServices as $service)
                            <li>
                                <a class="dropdown-item d-flex justify-content-between" 
                                   href="{{ route('order.create', $service->id) }}">
                                    <span>{{ $service->name }}</span>
                                    <span class="text-primary fw-bold">
                                        Rp {{ number_format($service->price_per_hour, 0, ',', '.') }}
                                    </span>
                                </a>
                            </li>
                            @endforeach
                            
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-center fw-bold text-primary" 
                                   href="{{ route('services.index') }}">
                                    <i class="fas fa-arrow-right me-2"></i>Semua Layanan
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('promo') }}">Promo</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                </ul>
                
                <!-- Auth Buttons -->
                <ul class="navbar-nav">
                    @if(auth()->check())
                        @if(auth()->check() && auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-cog me-1"></i>Admin Panel
                                </a>
                            </li>
                        @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-2"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-history me-2"></i>Riwayat</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i>Masuk
                        </a>
                        <a class="btn btn-primary" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">
                        <i class="fas fa-broom me-2"></i>HomeClean
                    </h5>
                    <p>Layanan kebersihan rumah profesional dengan harga terjangkau dan hasil maksimal.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Kontak</h5>
                    <p><i class="fas fa-phone me-2"></i> (021) 1234-5678</p>
                    <p><i class="fas fa-envelope me-2"></i> info@homeclean.com</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Ikuti Kami</h5>
                    <div>
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-whatsapp fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p class="mb-0">© 2026 HomeClean Project. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fix for dropdown hover (optional)
        document.querySelectorAll('.nav-item.dropdown').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.querySelector('.dropdown-toggle').click();
            });
            
            item.addEventListener('mouseleave', function() {
                setTimeout(() => {
                    if (!this.matches(':hover')) {
                        this.querySelector('.dropdown-toggle').click();
                    }
                }, 100);
            });
        });
        
        // Prevent form resubmission on page refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>