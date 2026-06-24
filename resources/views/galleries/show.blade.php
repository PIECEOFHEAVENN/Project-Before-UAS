@extends('layouts.app')

@section('title', 'Detail Galeri')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}">Galeri</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0"><i class="bi bi-images me-2"></i>Detail Galeri</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-center">
                @if($gallery->image)
                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                         alt="{{ $gallery->title }}" 
                         class="img-fluid rounded" 
                         style="max-height: 400px; object-fit: contain;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height:400px;">
                        <i class="bi bi-image display-1 text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <h2>{{ $gallery->title }}</h2>
                <span class="badge bg-primary mb-3">{{ $gallery->category }}</span>
                
                <div class="mt-3">
                    <p><strong>Ditambahkan:</strong></p>
                    <p>{{ $gallery->created_at->format('d M Y H:i') }}</p>
                </div>
                
                @if($gallery->description)
                    <div class="mt-3">
                        <h6><strong>Deskripsi:</strong></h6>
                        <p class="text-muted">{{ $gallery->description }}</p>
                    </div>
                @endif
                
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning text-white">
                        <i class="bi bi-pencil me-1"></i> Edit
                    </a>
                    <a href="{{ route('galleries.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection