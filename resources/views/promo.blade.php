@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center p-5">
                    <h1 class="text-primary fw-bold mb-4">🎉 Promo Spesial</h1>
                    <p class="lead text-muted mb-3">Halaman ini akan berisi daftar diskon dan penawaran menarik.</p>
                    <hr class="my-4">
                    <div class="alert alert-info">
                        <i class="fas fa-tools me-2"></i>
                        Coming Soon: Promo Ramadhan & Diskon Member Baru!
                    </div>
                    <a href="{{ url('/') }}" class="btn btn-outline-primary">Kembali ke Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection