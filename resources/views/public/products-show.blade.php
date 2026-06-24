@extends('layouts.frontend')

@section('title', $product->name . ' - OSELLA')

@section('content')
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('public.products') }}">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($product->name, 30) }}</li>
            </ol>
        </nav>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="card-img-top" 
                             style="max-height: 500px; object-fit: cover; border-radius: 16px;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height:400px; border-radius: 16px;">
                            <i class="bi bi-box display-1 text-muted"></i>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <span class="badge bg-primary mb-3">{{ $product->category }}</span>
                        <h1 class="display-6 fw-bold mb-3">{{ $product->name }}</h1>
                        <h3 class="text-primary mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                        
                        <div class="mb-4">
                            <h5 class="fw-bold">Deskripsi Produk</h5>
                            <p class="text-muted">{{ $product->description }}</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold">Informasi Tambahan</h5>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-tag me-2 text-primary"></i>Kategori: {{ $product->category }}</li>
                                <li><i class="bi bi-calendar me-2 text-primary"></i>Ditambahkan: {{ $product->created_at->format('d M Y') }}</li>
                            </ul>
                        </div>

                        <div class="d-flex gap-3">
                            <a href="{{ route('public.products') }}" class="btn btn-outline-custom">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                            <button class="btn btn-primary-custom">
                                <i class="bi bi-cart-plus me-2"></i>Pesan Sekarang
                            </button>
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