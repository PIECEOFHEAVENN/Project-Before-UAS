@extends('layouts.frontend')

@section('title', 'Beranda - OSELLA')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="mb-4">
                    Selamat Datang di<br>
                    <span class="highlight">OSELLA</span>
                    <span style="font-size: 1.8rem; display: block; color: #667eea; margin-top: 5px;">Fashion Retail Lokal Indonesia</span>
                </h1>
                <p class="mb-4">Osella adalah perusahaan retail fashion lokal Indonesia yang berdiri sejak tahun 1987</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('about') }}" class="btn btn-primary-custom">
                        <i class="bi bi-info-circle me-2"></i>Tentang Kami
                    </a>
                    <a href="{{ route('public.products') }}" class="btn btn-outline-custom">
                        <i class="bi bi-box me-2"></i>Lihat Produk
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <div class="bg-white rounded-4 p-5 shadow-sm d-inline-block">
                    <img src="{{ asset('images/logo.jpg') }}" 
                         alt="OSELLA" 
                         style="max-width: 300px; max-height: 300px; object-fit: contain;">
                    <h4 class="mt-3">OSELLA</h4>
                    <p class="text-muted">Since 1987</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Articles Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Berita <span class="highlight">Terbaru</span></h2>
            <p class="section-subtitle">Informasi dan berita terbaru dari OSELLA</p>
        </div>
        <div class="row g-4">
            @forelse($articles as $article)
                <div class="col-md-4">
                    <div class="card card-hover">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                                <i class="bi bi-newspaper display-3 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $article->created_at->format('d M Y') }}</small>
                            <h5 class="card-title mt-2">{{ Str::limit($article->title, 50) }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($article->content, 100) }}</p>
                            <a href="{{ route('public.article.detail', $article->id) }}" class="btn-arrow">
                                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-newspaper display-1 text-muted"></i>
                    <h4 class="mt-3">Belum ada berita</h4>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('public.articles') }}" class="btn btn-primary-custom">
                Lihat Semua Berita <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Produk <span class="highlight">Kami</span></h2>
            <p class="section-subtitle">Koleksi pakaian kasual untuk pria, wanita, dan anak-anak</p>
        </div>
        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-md-4 col-lg-4">
                    <div class="card card-hover">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                                <i class="bi bi-box display-3 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">{{ $product->category }}</span>
                            <h5 class="card-title">{{ Str::limit($product->name, 40) }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($product->description, 70) }}</p>
                            <h5 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-box display-1 text-muted"></i>
                    <h4 class="mt-3">Belum ada produk</h4>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('public.products') }}" class="btn btn-primary-custom">
                Lihat Semua Produk <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Galeri <span class="highlight">Kami</span></h2>
            <p class="section-subtitle">Dokumentasi produk dan kegiatan OSELLA</p>
        </div>
        <div class="row g-3">
            @forelse($galleries as $gallery)
                <div class="col-md-3 col-6">
                    <div class="card card-hover">
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                             alt="{{ $gallery->title }}" 
                             class="card-img-top" 
                             style="height:200px; object-fit:cover;">
                        <div class="card-body p-2 text-center">
                            <small class="text-muted">{{ Str::limit($gallery->title, 30) }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-images display-1 text-muted"></i>
                    <h4 class="mt-3">Belum ada galeri</h4>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('public.galleries') }}" class="btn btn-primary-custom">
                Lihat Semua Galeri <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container text-center text-white">
        <h2 class="display-5 fw-bold mb-3">Siap Berbelanja di OSELLA?</h2>
        <p class="mb-4 opacity-75">Temukan koleksi fashion terbaru dari OSELLA dengan konsep modern, nyaman, dan mengikuti tren gaya hidup</p>
        <a href="{{ route('public.products') }}" class="btn btn-light btn-lg rounded-pill px-5">
            <i class="bi bi-bag me-2"></i>Lihat Produk
        </a>
    </div>
</section>

@endsection