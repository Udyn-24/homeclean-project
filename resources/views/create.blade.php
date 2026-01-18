@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-white py-4">
                    <h2 class="mb-0 fw-bold text-primary">📝 Booking Form</h2>
                </div>
                <div class="card-body p-4">
                    
                    <!-- Service Info -->
                    <div class="alert alert-info d-flex align-items-center">
                        <i class="fas fa-info-circle fa-2x me-3"></i>
                        <div>
                            <strong>You're booking:</strong> {{ $service->name }}<br>
                            <strong>Price:</strong> Rp {{ number_format($service->price_per_hour, 0, ',', '.') }} per hour<br>
                            <strong>Duration:</strong> {{ $service->duration_hours }} hours
                        </div>
                    </div>

                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">

                        <h5 class="mt-4 mb-3">👤 Customer Information</h5>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" 
                                   name="customer_name" 
                                   class="form-control form-control-lg" 
                                   placeholder="Example: Budi Santoso" 
                                   required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input type="text" 
                                       name="customer_phone" 
                                       class="form-control form-control-lg" 
                                       placeholder="0812xxxx" 
                                       required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email (Optional)</label>
                                <input type="email" 
                                       name="customer_email" 
                                       class="form-control form-control-lg" 
                                       placeholder="budi@email.com">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Cleaning Address</label>
                            <textarea name="customer_address" 
                                      class="form-control form-control-lg" 
                                      rows="3" 
                                      placeholder="Street name, house number, landmarks..." 
                                      required></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold py-3">
                                <i class="fas fa-paper-plane me-2"></i> Submit Booking
                            </button>
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection