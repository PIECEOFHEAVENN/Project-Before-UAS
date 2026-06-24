<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'OSELLA - Fashion Retail Lokal Indonesia')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: #667eea !important;
        }
        
        .navbar-brand span {
            color: #764ba2;
        }
        
        .nav-link {
            font-weight: 500;
            color: #4a5568 !important;
            transition: all 0.3s;
            padding: 8px 16px !important;
            border-radius: 8px;
        }
        
        .nav-link:hover {
            color: #667eea !important;
            background: rgba(102, 126, 234, 0.08);
        }
        
        .nav-link.active {
            color: #667eea !important;
            background: rgba(102, 126, 234, 0.1);
        }
        
        .btn-admin {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white !important;
            border-radius: 50px;
            padding: 8px 20px !important;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            color: white !important;
        }
        
        .footer {
            background: #1a202c;
            color: #a0aec0;
            padding: 60px 0 30px;
        }
        
        .footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .footer a {
            color: #a0aec0;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer a:hover {
            color: #667eea;
        }
        
        .footer .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: all 0.3s;
            color: white;
        }
        
        .footer .social-links a:hover {
            background: #667eea;
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 20px;
            margin-top: 30px;
        }
        
        .highlight {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero-section {
            padding: 120px 0 80px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.08) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .hero-section h1 {
            font-weight: 800;
            font-size: 3.5rem;
            color: #1a202c;
        }
        
        .hero-section p {
            font-size: 1.2rem;
            color: #4a5568;
            max-width: 500px;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            color: white;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
            color: white;
        }
        
        .btn-outline-custom {
            border: 2px solid #667eea;
            color: #667eea;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-outline-custom:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
        }
        
        .section-title {
            font-weight: 800;
            font-size: 2.5rem;
            color: #1a202c;
            margin-bottom: 10px;
        }
        
        .section-subtitle {
            color: #718096;
            font-size: 1.1rem;
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
        }
        
        .btn-arrow:hover {
            color: #764ba2;
            letter-spacing: 1px;
        }
        
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.2rem;
            }
            
            .hero-section {
                padding: 80px 0 50px;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{-- LOGO DI HEADER --}}
            <img src="{{ asset('images/logo.jpg') }}" 
                alt="OSELLA" 
                style="height: 40px; width: auto; margin-right: 10px;">
            <span style="font-weight: 800; font-size: 1.3rem; color: #667eea;">OSELLA</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.articles') ? 'active' : '' }}" href="{{ route('public.articles') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.products') ? 'active' : '' }}" href="{{ route('public.products') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.galleries') ? 'active' : '' }}" href="{{ route('public.galleries') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="nav-link btn-admin" href="{{ route('dashboard') }}">
                        <i class="bi bi-shield-lock-fill me-1"></i> Admin Panel
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
@yield('content')

<!-- <div class="col-md-4">
    <h5>Link Cepat</h5>
    <div class="d-flex flex-column gap-2">
        <a href="{{ route('home') }}"><i class="bi bi-chevron-right me-1"></i>Beranda</a>
        <a href="{{ route('about') }}"><i class="bi bi-chevron-right me-1"></i>Tentang</a>
        <a href="{{ route('public.articles') }}"><i class="bi bi-chevron-right me-1"></i>Berita</a>
        <a href="{{ route('public.products') }}"><i class="bi bi-chevron-right me-1"></i>Produk</a>
        <a href="{{ route('public.galleries') }}"><i class="bi bi-chevron-right me-1"></i>Galeri</a>
        <a href="{{ route('contact') }}"><i class="bi bi-chevron-right me-1"></i>Kontak</a>
    </div>
</div> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>