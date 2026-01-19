@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ isset($service) ? 'Edit Layanan' : 'Tambah Layanan Baru' }}</h1>
        <a href="{{ route('admin.services') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($service) ? route('admin.services.update', $service->id) : route('admin.services.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf
                @if(isset($service))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Layanan *</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $service->name ?? '') }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price_per_hour" class="form-label">Harga per Jam (Rp) *</label>
                            <input type="number" 
                                   class="form-control @error('price_per_hour') is-invalid @enderror" 
                                   id="price_per_hour" 
                                   name="price_per_hour" 
                                   value="{{ old('price_per_hour', $service->price_per_hour ?? '') }}" 
                                   required min="0">
                            @error('price_per_hour')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="duration_hours" class="form-label">Durasi (jam) *</label>
                            <input type="number" 
                                   class="form-control @error('duration_hours') is-invalid @enderror" 
                                   id="duration_hours" 
                                   name="duration_hours" 
                                   value="{{ old('duration_hours', $service->duration_hours ?? '') }}" 
                                   required min="1">
                            @error('duration_hours')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Layanan</label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                            @if(isset($service) && $service->image)
                                <div class="mt-2">
                                    <p>Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                         alt="{{ $service->name }}" 
                                         style="max-width: 200px; max-height: 150px;">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Layanan *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="8" 
                                      required>{{ old('description', $service->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>
                        {{ isset($service) ? 'Update Layanan' : 'Simpan Layanan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection