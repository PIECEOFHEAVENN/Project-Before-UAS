<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // DATA PERUSAHAAN STATIS (PATEN) - OSELLA
    private function getCompanyData()
    {
        return [
            'company_name' => 'OSELLA',
            'tagline' => 'Fashion Retail Lokal Indonesia',
            'description' => 'Osella adalah perusahaan retail fashion lokal Indonesia yang berdiri sejak tahun 1987 di bawah PT Cipta Kreasisandang Mandiri. Perusahaan ini bergerak dalam industri pakaian kasual untuk pria, wanita, dan anak-anak dengan mengusung konsep modern, nyaman, dan mengikuti tren gaya hidup masyarakat Indonesia.

Dalam menjalankan bisnisnya, Osella memiliki proses operasional mulai dari pengembangan produk, pengadaan dan produksi, pengelolaan inventory, distribusi ke berbagai toko dan department store, hingga penjualan kepada pelanggan. Dengan pengalaman lebih dari 30 tahun, Osella telah berkembang menjadi salah satu brand fashion lokal yang memiliki jaringan penjualan yang luas di Indonesia.',
            'address' => 'Jl. Raya Kebayoran Lama No. 12, Jakarta Selatan, Indonesia',
            'phone' => '+62 21 1234 5678',
            'email' => 'info@osella.com',
            'logo' => 'images/logo-osella.png',
            'established' => '1987',
            'company' => 'PT Cipta Kreasisandang Mandiri',
            'social' => [
                'facebook' => 'https://facebook.com/osella',
                'instagram' => 'https://instagram.com/osella',
                'twitter' => 'https://twitter.com/osella',
                'youtube' => 'https://youtube.com/osella'
            ]
        ];
    }

    public function index()
    {
        $data = [
            'company' => $this->getCompanyData(),
            'articles' => Article::latest()->take(3)->get(),
            'products' => Product::latest()->take(6)->get(),
            'galleries' => Gallery::latest()->take(8)->get(),
        ];

        return view('home', $data);
    }

    public function about()
    {
        $company = $this->getCompanyData();
        return view('about', compact('company'));
    }

    public function contact()
    {
        $company = $this->getCompanyData();
        return view('contact', compact('company'));
    }

    public function articles()
    {
        $articles = Article::latest()->paginate(9);
        return view('public.articles', compact('articles'));
    }

    public function articleDetail($id)
    {
        $article = Article::findOrFail($id);
        return view('public.article-detail', compact('article'));
    }

    public function products()
    {
        $products = Product::latest()->paginate(12);
        return view('public.products', compact('products'));
    }

    public function galleries()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('public.galleries', compact('galleries'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('public.products-show', compact('product'));
    }


    public function galleryDetail($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('public.galleries-show', compact('gallery'));
    }
}