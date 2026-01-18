@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h1 class="text-primary fw-bold mb-4 text-center">📞 Hubungi Kami</h1>
                    <p class="lead text-muted mb-4 text-center">Butuh bantuan? Tim kami siap membantu 24/7.</p>
                    
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">WhatsApp</h5>
                                    <p class="mb-0 text-muted">0812-3456-7890</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Email</h5>
                                    <p class="mb-0 text-muted">help@homeclean.com</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Alamat</h5>
                                    <p class="mb-0 text-muted">Jl. Bersih Selalu No. 99, Bandung</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="{{ url('/') }}" class="btn btn-outline-primary">Kembali ke Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection