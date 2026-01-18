@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Form Pemesanan Layanan</h4>
                </div>
                
                <div class="card-body">
                    <!-- Informasi Layanan -->
                    <div class="alert alert-info">
                        <h5>Layanan yang dipilih:</h5>
                        <p><strong>{{ $service->name }}</strong> - Rp {{ number_format($service->price_per_hour, 0, ',', '.') }} per jam</p>
                        <p>{{ $service->description }}</p>
                    </div>

                    <!-- Form Pemesanan -->
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        
                        <!-- Hidden input untuk service_id -->
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        
                        <h5 class="mb-3">Data Diri Pelanggan</h5>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="customer_name" class="form-label">Nama Lengkap *</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" 
                                       value="{{ old('customer_name') }}" required>
                                @error('customer_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="customer_email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email" 
                                       value="{{ old('customer_email') }}" required>
                                @error('customer_email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="customer_phone" class="form-label">Nomor Telepon *</label>
                                <input type="tel" class="form-control" id="customer_phone" name="customer_phone" 
                                       value="{{ old('customer_phone') }}" required>
                                @error('customer_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="booking_date" class="form-label">Tanggal Booking *</label>
                                <input type="date" class="form-control" id="booking_date" name="booking_date" 
                                       min="{{ date('Y-m-d') }}" value="{{ old('booking_date') }}" required>
                                @error('booking_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="customer_address" class="form-label">Alamat Lengkap *</label>
                            <textarea class="form-control" id="customer_address" name="customer_address" 
                                      rows="3" required>{{ old('customer_address') }}</textarea>
                            @error('customer_address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="booking_time" class="form-label">Waktu Booking *</label>
                                <select class="form-select" id="booking_time" name="booking_time" required>
                                    <option value="">Pilih Waktu</option>
                                    <option value="08:00-10:00" {{ old('booking_time') == '08:00-10:00' ? 'selected' : '' }}>08:00 - 10:00</option>
                                    <option value="10:00-12:00" {{ old('booking_time') == '10:00-12:00' ? 'selected' : '' }}>10:00 - 12:00</option>
                                    <option value="13:00-15:00" {{ old('booking_time') == '13:00-15:00' ? 'selected' : '' }}>13:00 - 15:00</option>
                                    <option value="15:00-17:00" {{ old('booking_time') == '15:00-17:00' ? 'selected' : '' }}>15:00 - 17:00</option>
                                </select>
                                @error('booking_time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="duration" class="form-label">Durasi (jam) *</label>
                                <select class="form-select" id="duration" name="duration" required>
                                    <option value="1" {{ old('duration') == '1' ? 'selected' : '' }}>1 Jam</option>
                                    <option value="2" {{ old('duration') == '2' ? 'selected' : '' }}>2 Jam</option>
                                    <option value="3" {{ old('duration') == '3' ? 'selected' : '' }} selected>3 Jam</option>
                                    <option value="4" {{ old('duration') == '4' ? 'selected' : '' }}>4 Jam</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan Tambahan (opsional)</label>
                            <textarea class="form-control" id="notes" name="notes" rows="2">{{ old('notes') }}</textarea>
                        </div>
                        
                        <div class="alert alert-warning">
                            <h6>Ringkasan Biaya:</h6>
                            <p>Layanan: {{ $service->name }}</p>
                            <p>Harga per jam: Rp {{ number_format($service->price_per_hour, 0, ',', '.') }}</p>
                            <p>Durasi: <span id="durationDisplay">3</span> jam</p>
                            <p><strong>Total: Rp <span id="totalPrice">{{ number_format($service->price_per_hour * 3, 0, ',', '.') }}</span></strong></p>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary me-md-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Konfirmasi Pemesanan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Update total harga saat durasi berubah
    document.getElementById('duration').addEventListener('change', function() {
        const pricePerHour = {{ $service->price_per_hour }};
        const duration = this.value;
        const total = pricePerHour * duration;
        
        document.getElementById('durationDisplay').textContent = duration;
        document.getElementById('totalPrice').textContent = total.toLocaleString('id-ID');
    });
</script>
@endsection