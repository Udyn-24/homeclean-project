<!DOCTYPE html>
<html lang="id">
<head>
    <title>Pesan Layanan - HomeClean</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-white py-3">
                        <h4 class="mb-0 fw-bold text-primary">Form Pemesanan</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <div class="alert alert-info d-flex align-items-center">
                            <i class="bi bi-info-circle-fill me-2 fs-4"></i>
                            <div>
                                Anda memesan: <strong>{{ $service->name }}</strong><br>
                                Harga: Rp {{ number_format($service->price_per_hour, 0, ',', '.') }} / jam
                            </div>
                        </div>

                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">

                            <h5 class="mt-4 mb-3">Data Diri (Tanpa Login)</h5>
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="customer_name" class="form-control" placeholder="Contoh: Budi Santoso" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor WhatsApp / HP</label>
                                    <input type="text" name="customer_phone" class="form-control" placeholder="0812xxxx" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email (Opsional)</label>
                                    <input type="email" name="customer_email" class="form-control" placeholder="budi@email.com">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Alamat Lengkap (Lokasi Pembersihan)</label>
                                <textarea name="customer_address" class="form-control" rows="3" placeholder="Nama Jalan, Nomor Rumah, Patokan..." required></textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold">Kirim Pesanan Sekarang</button>
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary">Batal</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>