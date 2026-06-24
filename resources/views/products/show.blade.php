@extends('layouts.app')

@section('title', 'Detail Produk')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0"><i class="bi bi-box me-2"></i>Detail Produk</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="img-fluid rounded" 
                         style="max-height: 300px; object-fit: contain;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height:300px;">
                        <i class="bi bi-box display-1 text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h2>{{ $product->name }}</h2>
                <span class="badge bg-primary mb-3">{{ $product->category }}</span>
                
                <div class="row mt-3">
                    <div class="col-md-6">
                        <p><strong>Harga:</strong></p>
                        <h3 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Ditambahkan:</strong></p>
                        <p>{{ $product->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
                
                <div class="mt-3">
                    <h6><strong>Deskripsi:</strong></h6>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>
                
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-white">
                        <i class="bi bi-pencil me-1"></i> Edit
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection