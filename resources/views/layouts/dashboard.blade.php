@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Statistik Cards -->
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card card-stats border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Artikel</h6>
                        <h2 class="stat-number mb-0">{{ $total_articles ?? 0 }}</h2>
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
        <div class="card card-stats border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Produk</h6>
                        <h2 class="stat-number mb-0">{{ $total_products ?? 0 }}</h2>
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
        <div class="card card-stats border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Galeri</h6>
                        <h2 class="stat-number mb-0">{{ $total_galleries ?? 0 }}</h2>
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

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card card-stats border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Profil Perusahaan</h6>
                        <h2 class="stat-number mb-0">
                            {{ isset($company_profile) ? '✓' : '✗' }}
                        </h2>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded-circle">
                        <i class="bi bi-building text-info fs-2"></i>
                    </div>
                </div>
                <a href="{{ route('company-profile.index') }}" class="text-decoration-none mt-2 d-inline-block">
                    {{ isset($company_profile) ? 'Lihat Profil' : 'Buat Profil' }} <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions & Recent Data -->
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

<!-- Informasi User -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                        <i class="bi bi-person-circle text-primary fs-3"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Selamat datang, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>!</h6>
                        <small class="text-muted">
                            <i class="bi bi-clock me-1"></i>
                            Login terakhir: {{ session('login_time') ?? now()->format('d/m/Y H:i:s') }}
                        </small>
                    </div>
                    <div class="ms-auto">
                        <span class="badge bg-success">
                            <i class="bi bi-check-circle me-1"></i>Online
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-stats {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .card-stats:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
    }
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
    }
    .card-stats .card-body {
        padding: 1.5rem;
    }
    .card-stats .bg-primary.bg-opacity-10 {
        background-color: rgba(102, 126, 234, 0.1) !important;
    }
    .card-stats .bg-success.bg-opacity-10 {
        background-color: rgba(40, 167, 69, 0.1) !important;
    }
    .card-stats .bg-warning.bg-opacity-10 {
        background-color: rgba(255, 193, 7, 0.1) !important;
    }
    .card-stats .bg-info.bg-opacity-10 {
        background-color: rgba(23, 162, 184, 0.1) !important;
    }
    .btn-outline-primary:hover {
        background-color: #667eea;
        color: white;
    }
    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }
    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: white;
    }
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
</style>
@endpush