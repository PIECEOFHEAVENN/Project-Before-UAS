<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'total_articles' => Article::count(),
                'total_products' => Product::count(),
                'total_galleries' => Gallery::count(),
                'company_profile' => CompanyProfile::first(),
            ];

            return view('dashboard', $data);
        } catch (\Exception $e) {
            // Jika error, tampilkan error
            return view('dashboard', [
                'total_articles' => 0,
                'total_products' => 0,
                'total_galleries' => 0,
                'company_profile' => null,
                'error' => $e->getMessage()
            ]);
        }
    }
}