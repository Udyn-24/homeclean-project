@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Order History</h2>
    
    @if($orders->isEmpty())
        <div class="alert alert-info">
            You haven't made any orders yet.
            <a href="{{ route('landing') }}">Browse our services</a>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Worker</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $order->service->name }}</td>
                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($order->worker)
                                        {{ $order->worker->name }}
                                    @else
                                        <span class="text-muted">Not assigned</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $badgeClass = [
                                            'pending' => 'warning',
                                            'confirmed' => 'info',
                                            'completed' => 'success',
                                            'cancelled' => 'danger'
                                        ][$order->status];
                                    @endphp
                                    <span class="badge bg-{{ $badgeClass }}">{{ ucfirst($order->status) }}</span>
                                </td>
                                <td>Rp {{ number_format($order->service->price_per_hour * $order->service->duration_hours, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('user.history.show', $order->id) }}" 
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($order->status == 'completed' && !$order->rating)
                                    <button type="button" 
                                            class="btn btn-sm btn-warning" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#reviewModal{{ $order->id }}">
                                        <i class="fas fa-star"></i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            
                            <!-- Review Modal -->
                            <div class="modal fade" id="reviewModal{{ $order->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('user.history.review', $order->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Rate Service</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Rating</label>
                                                    <div class="rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                        <input type="radio" 
                                                               id="star{{ $i }}_{{ $order->id }}" 
                                                               name="rating" 
                                                               value="{{ $i }}"
                                                               {{ $i == 5 ? 'checked' : '' }}>
                                                        <label for="star{{ $i }}_{{ $order->id }}">★</label>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Comment (Optional)</label>
                                                    <textarea name="comment" 
                                                              class="form-control" 
                                                              rows="3"
                                                              placeholder="Share your experience..."></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
}
.rating input {
    display: none;
}
.rating label {
    cursor: pointer;
    font-size: 2rem;
    color: #ddd;
    transition: color 0.3s;
}
.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: #ffc107;
}
</style>
@endsection