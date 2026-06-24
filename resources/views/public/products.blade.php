@extends('layouts.frontend')

@section('title', 'Produk - OSELLA')

@section('content')
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Produk <span class="highlight">Kami</span></h1>
            <p class="section-subtitle">Koleksi fashion berkualitas dari OSELLA untuk pria, wanita, dan anak-anak</p>
        </div>
        
        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-md-4 col-lg-3">
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
                            <p class="card-text text-muted small">{{ Str::limit($product->description, 60) }}</p>
                            <h5 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                            
                            {{-- TAMBAHKAN LINK DETAIL --}}
                            <a href="{{ route('public.product.detail', $product->id) }}" class="btn-arrow mt-2 d-inline-block">
                                Lihat Detail <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-box display-1 text-muted"></i>
                    <h4 class="mt-3">Belum ada produk</h4>
                    <p class="text-muted">Silakan tambahkan produk melalui admin panel</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary-custom mt-3">
                        <i class="bi bi-plus-circle me-2"></i>Kelola Produk
                    </a>
                </div>
            @endforelse
        </div>
        
        <div class="mt-4">
            {{ $products->links() }}
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
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }
    .card-hover .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    .btn-arrow {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
        font-size: 14px;
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