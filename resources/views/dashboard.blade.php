@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
{{-- TAMPILKAN ERROR JIKA ADA --}}
@if(isset($error))
    <div class="alert alert-danger">
        <h5>⚠️ Error:</h5>
        <p>{{ $error }}</p>
    </div>
@endif

<div class="row">
    <!-- Statistik Cards -->
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Artikel</h6>
                        <h2 class="mb-0">{{ $total_articles ?? 0 }}</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                        <i class="bi bi-newspaper text-primary fs-2"></i>
                    </div>
                </div>
                <a href="{{ route('articles.index') }}" class="text-decoration-none mt-2 d-inline-block">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Produk</h6>
                        <h2 class="mb-0">{{ $total_products ?? 0 }}</h2>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                        <i class="bi bi-box text-success fs-2"></i>
                    </div>
                </div>
                <a href="{{ route('products.index') }}" class="text-decoration-none mt-2 d-inline-block">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Galeri</h6>
                        <h2 class="mb-0">{{ $total_galleries ?? 0 }}</h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle">
                        <i class="bi bi-images text-warning fs-2"></i>
                    </div>
                </div>
                <a href="{{ route('galleries.index') }}" class="text-decoration-none mt-2 d-inline-block">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-3">
    <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <a href="{{ route('articles.create') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="bi bi-plus-circle fs-4 d-block"></i>
                            <small>Tambah Artikel</small>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('products.create') }}" class="btn btn-outline-success w-100 py-3">
                            <i class="bi bi-plus-circle fs-4 d-block"></i>
                            <small>Tambah Produk</small>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('galleries.create') }}" class="btn btn-outline-warning w-100 py-3">
                            <i class="bi bi-plus-circle fs-4 d-block"></i>
                            <small>Tambah Galeri</small>
                        </a>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-outline-danger w-100 py-3" data-bs-toggle="modal" data-bs-target="#reportModal">
                            <i class="bi bi-file-pdf fs-4 d-block"></i>
                            <small>Cetak PDF</small>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0"><i class="bi bi-clock-history text-primary me-2"></i>Statistik Sistem</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td><i class="bi bi-newspaper text-primary me-2"></i>Artikel</td>
                                <td class="text-end fw-bold">{{ $total_articles ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-box text-success me-2"></i>Produk</td>
                                <td class="text-end fw-bold">{{ $total_products ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-images text-warning me-2"></i>Galeri</td>
                                <td class="text-end fw-bold">{{ $total_galleries ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-building text-info me-2"></i>Profil</td>
                                <td class="text-end fw-bold">
                                    {{ isset($company_profile) ? 'Tersedia' : 'Belum' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection