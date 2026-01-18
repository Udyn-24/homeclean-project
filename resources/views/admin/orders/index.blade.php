@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Management</h1>
    </div>

    <!-- Filter Tabs -->
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link {{ !request('status') ? 'active' : '' }}" 
               href="{{ route('admin.orders.index') }}">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request('status') == 'pending' ? 'active' : '' }}" 
               href="?status=pending">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request('status') == 'confirmed' ? 'active' : '' }}" 
               href="?status=confirmed">Confirmed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request('status') == 'completed' ? 'active' : '' }}" 
               href="?status=completed">Completed</a>
        </li>
    </ul>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Worker</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->service->name }}</td>
                            <td>
                                @if($order->worker)
                                    {{ $order->worker->name }}
                                @else
                                    <form action="{{ route('admin.orders.assign', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        <select name="worker_id" class="form-select form-select-sm" onchange="this.form.submit()">
                                            <option value="">Assign Worker</option>
                                            @foreach($workers as $worker)
                                            <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="d-inline">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td>Rp {{ number_format($order->service->price_per_hour * $order->service->duration_hours, 0, ',', '.') }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.orders.export', $order->id) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this order?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection