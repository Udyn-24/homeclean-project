@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Layanan: {{ $service->name }}</h2>
    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label>Nama Layanan</label>
                    <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $service->description }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Harga per Jam (Rp)</label>
                        <input type="number" name="price_per_hour" class="form-control" value="{{ $service->price_per_hour }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Durasi (Jam)</label>
                        <input type="number" name="duration_hours" class="form-control" value="{{ $service->duration_hours }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Ganti Gambar (Kosongkan jika tidak ingin ganti)</label>
                    <input type="file" name="image" class="form-control">
                    @if($service->image)
                        <div class="mt-2">
                            <small>Gambar saat ini:</small><br>
                            <img src="{{ asset('storage/' . $service->image) }}" width="100">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('services.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection