@extends('layouts.frontend')

@section('title', 'Tentang OSELLA')

@section('content')
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="section-title">Tentang <span class="highlight">OSELLA</span></h1>
                <p class="section-subtitle mb-4">Fashion Retail Lokal Indonesia Since 1987</p>
                <div class="mt-4">
                    <p><strong>Osella</strong> adalah perusahaan retail fashion lokal Indonesia yang berdiri sejak tahun <strong>1987</strong> di bawah <strong>PT Cipta Kreasisandang Mandiri</strong>. Perusahaan ini bergerak dalam industri pakaian kasual untuk pria, wanita, dan anak-anak dengan mengusung konsep modern, nyaman, dan mengikuti tren gaya hidup masyarakat Indonesia.</p>
                    
                    <p class="mt-3">Dalam menjalankan bisnisnya, Osella memiliki proses operasional mulai dari pengembangan produk, pengadaan dan produksi, pengelolaan inventory, distribusi ke berbagai toko dan department store, hingga penjualan kepada pelanggan. Dengan pengalaman lebih dari 30 tahun, Osella telah berkembang menjadi salah satu brand fashion lokal yang memiliki jaringan penjualan yang luas di Indonesia.</p>
                    
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-calendar text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Berdiri</h6>
                                    <small>1987</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-building text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0">Perusahaan</h6>
                                    <small>PT Cipta Kreasisandang Mandiri</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                {{-- LOGO DI TENTANG --}}
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


<!-- Visi Misi -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Visi & <span class="highlight">Misi</span></h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-eye fs-2 text-primary"></i>
                        </div>
                        <h4>Visi</h4>
                        <p class="text-muted">Menjadi brand fashion lokal terkemuka di Indonesia yang dikenal dengan kualitas, kenyamanan, dan desain yang mengikuti tren gaya hidup masyarakat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-bullseye fs-2 text-success"></i>
                        </div>
                        <h4>Misi</h4>
                        <ul class="text-start text-muted">
                            <li>Menyediakan produk fashion kasual berkualitas untuk pria, wanita, dan anak-anak</li>
                            <li>Mengembangkan produk yang modern, nyaman, dan sesuai tren</li>
                            <li>Memberikan pengalaman berbelanja terbaik bagi pelanggan</li>
                            <li>Memperluas jaringan distribusi ke seluruh Indonesia</li>
                            <li>Menjaga kepuasan pelanggan dengan produk dan layanan terbaik</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Proses Operasional -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Proses <span class="highlight">Operasional</span></h2>
        <p class="text-center text-muted mb-5">OSELLA memiliki proses operasional yang terintegrasi mulai dari hulu hingga hilir</p>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-pencil-square fs-2 text-primary"></i>
                        </div>
                        <h5>Pengembangan Produk</h5>
                        <p class="text-muted small">Mengembangkan produk fashion sesuai dengan tren dan kebutuhan pasar</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-gear fs-2 text-success"></i>
                        </div>
                        <h5>Pengadaan & Produksi</h5>
                        <p class="text-muted small">Pengadaan bahan baku dan proses produksi dengan standar kualitas tinggi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-box-seam fs-2 text-warning"></i>
                        </div>
                        <h5>Pengelolaan Inventory</h5>
                        <p class="text-muted small">Mengelola stok produk secara efisien dan terintegrasi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-truck fs-2 text-info"></i>
                        </div>
                        <h5>Distribusi</h5>
                        <p class="text-muted small">Distribusi produk ke berbagai toko dan department store di Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-danger bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-shop fs-2 text-danger"></i>
                        </div>
                        <h5>Penjualan</h5>
                        <p class="text-muted small">Penjualan produk kepada pelanggan melalui berbagai kanal</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-secondary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-people fs-2 text-secondary"></i>
                        </div>
                        <h5>Layanan Pelanggan</h5>
                        <p class="text-muted small">Memberikan layanan terbaik untuk kepuasan pelanggan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alamat -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Lokasi <span class="highlight">Kami</span></h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white p-4 rounded-4 shadow-sm">
                    <h5><i class="bi bi-geo-alt text-primary me-2"></i>Alamat Kantor Pusat</h5>
                    <p class="mb-3">PT Cipta Kreasisandang Mandiri<br>Gg. Jangkung, RT.2/RW.2, Pejagalan, Kecamatan Penjaringan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14450</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection