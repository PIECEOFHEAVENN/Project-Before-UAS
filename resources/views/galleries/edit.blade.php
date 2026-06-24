@extends('layouts.app')

@section('title', 'Edit Galeri')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}">Galeri</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Galeri</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" 
                       id="category" name="category" value="{{ old('category', $gallery->category) }}" required>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                
                {{-- Tampilkan gambar saat ini --}}
                @if($gallery->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                             alt="{{ $gallery->title }}" 
                             style="max-height: 200px; border-radius: 8px; border: 2px solid #e9ecef;">
                        <br>
                        <small class="text-muted">Gambar saat ini</small>
                    </div>
                @endif
                
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                       id="image" name="image" accept="image/*">
                <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update
                </button>
                <a href="{{ route('galleries.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
                <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-info text-white">
                    <i class="bi bi-eye me-1"></i> Lihat Detail
                </a>
            </div>
        </form>
    </div>
</div>
@endsection