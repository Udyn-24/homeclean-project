@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center p-5">
                    <h1 class="text-primary fw-bold mb-4">🏢 Tentang HomeClean</h1>
                    <p class="lead text-muted mb-3">Kami adalah penyedia jasa kebersihan #1 yang terpercaya.</p>
                    <p class="mb-4">Didirikan tahun 2026, kami berkomitmen membuat rumah Anda bersih berkilau.</p>
                    <a href="{{ url('/') }}" class="btn btn-outline-primary">Kembali ke Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection