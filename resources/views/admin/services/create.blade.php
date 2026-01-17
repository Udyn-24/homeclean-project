@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Layanan Baru</h2>
    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nama Layanan</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Harga per Jam (Rp)</label>
                        <input type="number" name="price_per_hour" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Durasi (Jam)</label>
                        <input type="number" name="duration_hours" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Gambar</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('services.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection