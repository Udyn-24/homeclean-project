@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Breadcrumb Navigation -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#services">Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $service->name }}</li>
                </ol>
            </nav>

            <div class="card shadow-lg border-0">
                <div class="row g-0">
                    <!-- Service Image -->
                    <div class="col-md-6">
                        <div class="bg-light d-flex align-items-center justify-content-center p-5" style="min-height: 400px;">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="{{ $service->name }}" 
                                     class="img-fluid rounded-3" 
                                     style="max-height: 350px; object-fit: cover;">
                            @else
                                <div class="text-center">
                                    @php
                                        $icons = [
                                            1 => 'fas fa-broom',
                                            2 => 'fas fa-shower',
                                            3 => 'fas fa-crown',
                                            4 => 'fas fa-tshirt',
                                            5 => 'fas fa-toilet',
                                            6 => 'fas fa-utensils',
                                            7 => 'fas fa-couch',
                                            8 => 'fas fa-truck-moving',
                                            9 => 'fas fa-tools'
                                        ];
                                        $icon = $icons[$service->id] ?? 'fas fa-home';
                                    @endphp
                                    <i class="{{ $icon }} fa-8x text-primary mb-3"></i>
                                    <p class="text-muted">No image available</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Service Details -->
                    <div class="col-md-6">
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-primary mb-2">Service Detail</span>
                                    <h1 class="fw-bold text-primary">{{ $service->name }}</h1>
                                </div>
                                <div class="text-end">
                                    <h3 class="fw-bold text-success">
                                        Rp {{ number_format($service->price_per_hour, 0, ',', '.') }}
                                    </h3>
                                    <small class="text-muted">per hour</small>
                                </div>
                            </div>

                            <p class="lead mb-4">{{ $service->description }}</p>

                            <hr class="my-4">

                            <!-- Service Details Grid -->
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle p-2 me-3">
                                            <i class="fas fa-clock text-white"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Duration Estimate</p>
                                            <p class="mb-0 text-muted">{{ $service->duration_hours }} Hours</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle p-2 me-3">
                                            <i class="fas fa-tag text-white"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Category</p>
                                            <p class="mb-0 text-muted">
                                                @if($service->category)
                                                    {{ $service->category->name }}
                                                @else
                                                    Cleaning
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Button -->
                            <div class="d-grid gap-3">
                                @auth
                                    @if(auth()->user()->role === 'customer')
                                        <a href="{{ route('order.create', $service->id) }}" 
                                           class="btn btn-primary btn-lg py-3">
                                            <i class="fas fa-calendar-check me-2"></i> Book This Service
                                        </a>
                                    @else
                                        <button class="btn btn-primary btn-lg py-3" disabled>
                                            <i class="fas fa-info-circle me-2"></i> Login as Customer to Book
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('order.create', $service->id) }}" 
                                       class="btn btn-primary btn-lg py-3">
                                        <i class="fas fa-calendar-check me-2"></i> Book This Service
                                    </a>
                                    <p class="text-center text-muted small">
                                        Or <a href="{{ route('login') }}" class="text-decoration-none">login</a> if you have an account
                                    </p>
                                @endauth
                                
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i> Back to Services
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- What's Included Section -->
            <div class="card shadow border-0 mt-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">📋 What's Included</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Professional cleaning equipment
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Certified cleaning products
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Trained and vetted cleaners
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Satisfaction guarantee
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Free re-cleaning if unsatisfied
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Insurance coverage
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Services -->
            @php
                $relatedServices = \App\Models\Service::where('id', '!=', $service->id)
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
            @endphp
            
            @if($relatedServices->count() > 0)
                <div class="mt-5">
                    <h3 class="fw-bold mb-4">✨ Related Services</h3>
                    <div class="row">
                        @foreach($relatedServices as $related)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body text-center p-4">
                                    @php
                                        $relatedIcons = [
                                            1 => 'fas fa-broom',
                                            2 => 'fas fa-shower',
                                            3 => 'fas fa-crown',
                                            4 => 'fas fa-tshirt',
                                            5 => 'fas fa-toilet',
                                            6 => 'fas fa-utensils',
                                            7 => 'fas fa-couch',
                                            8 => 'fas fa-truck-moving',
                                            9 => 'fas fa-tools'
                                        ];
                                        $relatedIcon = $relatedIcons[$related->id] ?? 'fas fa-home';
                                    @endphp
                                    <i class="{{ $relatedIcon }} fa-3x text-primary mb-3"></i>
                                    <h5 class="fw-bold">{{ $related->name }}</h5>
                                    <p class="text-muted small">{{ Str::limit($related->description, 60) }}</p>
                                    <a href="{{ route('service.show', $related->id) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection