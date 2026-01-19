@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Admin Dashboard</h1>
    
    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>{{ $stats['totalServices'] }}</h3>
                        <p class="mb-0">Total Layanan</p>
                    </div>
                    <i class="fas fa-concierge-bell fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>{{ $stats['totalOrders'] }}</h3>
                        <p class="mb-0">Total Pesanan</p>
                    </div>
                    <i class="fas fa-shopping-cart fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>{{ $stats['totalUsers'] }}</h3>
                        <p class="mb-0">Total Pengguna</p>
                    </div>
                    <i class="fas fa-users fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card info">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3>Rp {{ number_format($stats['revenue'], 0, ',', '.') }}</h3>
                        <p class="mb-0">Total Pendapatan</p>
                    </div>
                    <i class="fas fa-money-bill-wave fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pesanan Terbaru</h5>
            <a href="{{ route('admin.orders') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Invoice</th>
                            <th>Layanan</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->invoice_code }}</td>
                            <td>{{ $order->service->name ?? '-' }}</td>
                            <td>{{ $order->customer_name ?? ($order->user->name ?? '-') }}</td>
                            <td>{{ $order->booking_date->format('d/m/Y') }}</td>
                            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'secondary') }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Layanan Baru</h5>
                    <p class="card-text">Tambahkan layanan cleaning baru ke katalog.</p>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Layanan
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kelola Pesanan</h5>
                    <p class="card-text">Lihat dan kelola semua pesanan pelanggan.</p>
                    <a href="{{ route('admin.orders') }}" class="btn btn-success">
                        <i class="fas fa-shopping-cart me-2"></i>Kelola Pesanan
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statistik Website</h5>
                    <p class="card-text">Lihat analitik dan statistik website.</p>
                    <a href="#" class="btn btn-info">
                        <i class="fas fa-chart-bar me-2"></i>Lihat Statistik
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection