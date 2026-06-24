@extends('layouts.frontend')

@section('title', 'Galeri - OSELLA')

@section('content')
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Galeri <span class="highlight">Kami</span></h1>
            <p class="section-subtitle">Dokumentasi produk dan kegiatan OSELLA</p>
        </div>
        
        <div class="row g-3">
            @forelse($galleries as $gallery)
                <div class="col-md-3 col-6">
                    <div class="card card-hover">
                        <a href="{{ route('public.gallery.detail', $gallery->id) }}" class="text-decoration-none">
                            <img src="{{ asset('storage/' . $gallery->image) }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="card-img-top" 
                                 style="height:200px; object-fit:cover;">
                            <div class="card-body p-2 text-center">
                                <small class="text-muted">{{ Str::limit($gallery->title, 30) }}</small>
                                <div><span class="badge bg-primary mt-1">{{ $gallery->category }}</span></div>
                                <div class="mt-2">
                                    <span class="btn-arrow" style="font-size:12px;">
                                        Lihat Detail <i class="bi bi-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-images display-1 text-muted"></i>
                    <h4 class="mt-3">Belum ada galeri</h4>
                    <p class="text-muted">Silakan tambahkan galeri melalui admin panel</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary-custom mt-3">
                        <i class="bi bi-plus-circle me-2"></i>Kelola Galeri
                    </a>
                </div>
            @endforelse
        </div>
        
        <div class="mt-4">
            {{ $galleries->links() }}
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .highlight {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .card-hover {
        transition: all 0.4s ease;
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }
    .card-hover a {
        color: inherit;
    }
    .btn-arrow {
        color: #667eea;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-arrow:hover {
        color: #764ba2;
        letter-spacing: 1px;
    }
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
</style>
@endpush    