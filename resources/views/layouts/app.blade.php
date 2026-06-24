<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Company Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    @stack('styles')
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #667eea;
            --secondary-color: #764ba2;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
            overflow-x: hidden;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #2c3e50 0%, #1a252f 100%);
            z-index: 1000;
            padding: 0;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #4a6a8a;
            border-radius: 10px;
        }
        
        .sidebar-brand {
            padding: 1.5rem 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-brand .brand-icon {
            font-size: 2.5rem;
            color: white;
            display: block;
            margin-bottom: 5px;
        }
        
        .sidebar-brand h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 0;
        }
        
        .sidebar-brand small {
            color: rgba(255,255,255,0.6);
            font-size: 12px;
        }
        
        .sidebar .user-info {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            color: white;
        }
        
        .sidebar .user-info .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }
        
        .sidebar .user-info .user-name {
            font-weight: 600;
            font-size: 14px;
        }
        
        .sidebar .user-info .user-email {
            font-size: 12px;
            color: rgba(255,255,255,0.6);
        }
        
        .sidebar .nav {
            padding: 1rem 0;
        }
        
        .sidebar .nav-item {
            margin: 2px 10px;
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 10px 15px;
            border-radius: 10px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
        }
        
        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .sidebar .nav-link.active {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        .sidebar .nav-link i {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }
        
        .sidebar .nav-link .badge {
            margin-left: auto;
        }
        
        .sidebar .nav-link.logout-btn {
            color: #e74c3c;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 10px;
            padding-top: 15px;
        }
        
        .sidebar .nav-link.logout-btn:hover {
            background: rgba(231, 76, 60, 0.2);
            color: #e74c3c;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            padding: 20px 30px;
            transition: margin-left 0.3s ease;
        }
        
        .main-content .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .main-content .page-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0;
        }
        
        .main-content .page-header .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }
        
        /* Toggle Sidebar Button */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 999;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 20px;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 70px 15px 20px;
            }
            
            .sidebar-toggle {
                display: block;
            }
        }
        
        /* Cards */
        .card {
            border-radius: 15px;
            border: none;
            transition: all 0.3s;
        }
        
        .card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
        }
        
        /* Tables */
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            color: #495057;
        }
        
        .table td {
            vertical-align: middle;
        }
        
        /* Buttons */
        .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background: #5a6fd6;
            border-color: #5a6fd6;
        }
        
        /* Alerts */
        .alert {
            border-radius: 12px;
            border: none;
        }
        
        /* Images */
        .img-thumbnail {
            border-radius: 10px;
            border: none;
            padding: 5px;
        }
        
        /* Modals */
        .modal-content {
            border-radius: 15px;
            border: none;
        }
        
        .modal-header {
            border-bottom: none;
            padding: 1.5rem 1.5rem 0;
        }
        
        .modal-footer {
            border-top: none;
            padding: 0 1.5rem 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar Toggle Button (Mobile) -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>
    
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <img src="{{ asset('images/logo.jpg') }}" 
            alt="Osella" 
            style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 10px; border-radius: 50%;">
        <h5>Osella</h5>
    </div>
        
        <div class="user-info">
            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
            <div class="user-email">{{ Auth::user()->email ?? 'admin@company.com' }}</div>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">
                    <i class="bi bi-newspaper"></i> Artikel
                    <span class="badge bg-primary rounded-pill">{{ \App\Models\Article::count() }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                    <i class="bi bi-box"></i> Produk
                    <span class="badge bg-success rounded-pill">{{ \App\Models\Product::count() }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('galleries.*') ? 'active' : '' }}" href="{{ route('galleries.index') }}">
                    <i class="bi bi-images"></i> Galeri
                    <span class="badge bg-warning rounded-pill">{{ \App\Models\Gallery::count() }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#reportModal">
                    <i class="bi bi-file-pdf text-danger"></i> Laporan PDF
                </a>
            </li>
            <li class="nav-item mt-2">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link logout-btn btn btn-link w-100 text-start">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    
    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <div class="page-header">
            <h1>@yield('title', 'Dashboard')</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>
        </div>
        
        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <!-- Report Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-file-pdf text-danger me-2"></i>Cetak Laporan PDF
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Pilih jenis laporan yang ingin dicetak:</p>
                    <div class="list-group">
                        <a href="{{ route('report.articles') }}" class="list-group-item list-group-item-action d-flex align-items-center" target="_blank">
                            <i class="bi bi-newspaper me-3 fs-4"></i>
                            <div>
                                <h6 class="mb-0">Laporan Artikel</h6>
                                <small class="text-muted">Semua data artikel</small>
                            </div>
                            <i class="bi bi-chevron-right ms-auto"></i>
                        </a>
                        <a href="{{ route('report.products') }}" class="list-group-item list-group-item-action d-flex align-items-center" target="_blank">
                            <i class="bi bi-box me-3 fs-4"></i>
                            <div>
                                <h6 class="mb-0">Laporan Produk</h6>
                                <small class="text-muted">Semua data produk</small>
                            </div>
                            <i class="bi bi-chevron-right ms-auto"></i>
                        </a>
                        <a href="{{ route('report.galleries') }}" class="list-group-item list-group-item-action d-flex align-items-center" target="_blank">
                            <i class="bi bi-images me-3 fs-4"></i>
                            <div>
                                <h6 class="mb-0">Laporan Galeri</h6>
                                <small class="text-muted">Semua data galeri</small>
                            </div>
                            <i class="bi bi-chevron-right ms-auto"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
        
        // Close sidebar on outside click (mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
        
        // Auto dismiss alerts
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(function(alert) {
                    const closeBtn = alert.querySelector('.btn-close');
                    if (closeBtn) {
                        closeBtn.click();
                    }
                });
            }, 5000);
        });
    </script>
    @stack('scripts')
</body>
</html>