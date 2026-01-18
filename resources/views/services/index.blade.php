@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary mb-3">
            <i class="fas fa-concierge-bell me-2"></i>Semua Layanan
        </h1>
        <p class="lead text-muted">Pilih layanan kebersihan yang sesuai dengan kebutuhan Anda</p>
    </div>

    <!-- Services Grid -->
    <div class="row g-4">
        @foreach($services as $service)
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0">
                <div class="card-body p-4">
                    <!-- Service Header -->
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h4 class="card-title fw-bold text-primary mb-1">{{ $service->name }}</h4>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-success me-2">
                                    <i class="fas fa-money-bill-wave me-1"></i>Rp {{ number_format($service->price_per_hour, 0, ',', '.') }}/jam
                                </span>
                                <span class="badge bg-info">
                                    <i class="fas fa-clock me-1"></i>{{ $service->duration_hours }} jam
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Service Description -->
                    <p class="card-text text-muted mb-4">{{ $service->description }}</p>

                    <!-- Total Price -->
                    <div class="mb-4">
                        <div class="alert alert-light border">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold">Total untuk {{ $service->duration_hours }} jam:</span>
                                <span class="h5 text-primary fw-bold mb-0">
                                    Rp {{ number_format($service->price_per_hour * $service->duration_hours, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <a href="{{ route('order.create', $service->id) }}" class="btn btn-primary">
                            <i class="fas fa-calendar-plus me-2"></i>Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .service-card {
        transition: transform 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .service-card:hover {
        transform: translateY(-5px);
    }
    
    .service-card .card-body {
        display: flex;
        flex-direction: column;
    }
    
    .service-card .card-text {
        flex-grow: 1;
    }
</style>
@endsection