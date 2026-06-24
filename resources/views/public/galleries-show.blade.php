@extends('layouts.frontend')

@section('title', $gallery->title . ' - OSELLA')

@section('content')
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('public.galleries') }}">Galeri</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($gallery->title, 30) }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    @if($gallery->image)
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                             alt="{{ $gallery->title }}" 
                             class="card-img-top" 
                             style="max-height: 600px; object-fit: cover; border-radius: 16px 16px 0 0;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height:400px;">
                            <i class="bi bi-image display-1 text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h1 class="display-6 fw-bold mb-2">{{ $gallery->title }}</h1>
                                <span class="badge bg-primary">{{ $gallery->category }}</span>
                            </div>
                            <small class="text-muted">
                                <i class="bi bi-clock me-1"></i>
                                {{ $gallery->created_at->format('d M Y') }}
                            </small>
                        </div>

                        @if($gallery->description)
                            <div class="mb-4">
                                <h5 class="fw-bold">Deskripsi</h5>
                                <p class="text-muted">{{ $gallery->description }}</p>
                            </div>
                        @endif

                        <div class="mb-4">
                            <h5 class="fw-bold">Informasi</h5>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-tag me-2 text-primary"></i>Kategori: {{ $gallery->category }}</li>
                                <li><i class="bi bi-calendar me-2 text-primary"></i>Ditambahkan: {{ $gallery->created_at->format('d M Y H:i') }}</li>
                            </ul>
                        </div>

                        <div class="d-flex gap-3">
                            <a href="{{ route('public.galleries') }}" class="btn btn-outline-custom">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Galeri
                            </a>
                            <a href="#" class="btn btn-primary-custom">
                                <i class="bi bi-download me-2"></i>Download Gambar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .btn-primary-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        color: white;
    }
    .btn-outline-custom {
        border: 2px solid #667eea;
        color: #667eea;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        background: transparent;
    }
    .btn-outline-custom:hover {
        background: #667eea;
        color: white;
    }
</style>
@endpush