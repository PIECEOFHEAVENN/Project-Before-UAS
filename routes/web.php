<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;


// ========== FRONTEND / PUBLIC ROUTES ==========
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Public Articles
Route::get('/berita', [HomeController::class, 'articles'])->name('public.articles');
Route::get('/berita/{id}', [HomeController::class, 'articleDetail'])->name('public.article.detail');

// Public Products
Route::get('/produk', [HomeController::class, 'products'])->name('public.products');
Route::get('/produk/{id}', [HomeController::class, 'productDetail'])->name('public.product.detail');

// Public Galleries
Route::get('/galeri', [HomeController::class, 'galleries'])->name('public.galleries');
Route::get('/galeri/{id}', [HomeController::class, 'galleryDetail'])->name('public.gallery.detail');

// ========== AUTHENTICATION ROUTES ==========
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// ========== ADMIN PANEL ROUTES (BUTUH LOGIN) ==========
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Articles CRUD
    Route::resource('articles', ArticleController::class);

    // Products CRUD
    Route::resource('products', ProductController::class);

    // Galleries CRUD
    Route::resource('galleries', GalleryController::class);

    // Reports PDF
    Route::get('/report/articles', [ReportController::class, 'articlesPdf'])->name('report.articles');
    Route::get('/report/products', [ReportController::class, 'productsPdf'])->name('report.products');
    Route::get('/report/galleries', [ReportController::class, 'galleriesPdf'])->name('report.galleries');
});