<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Gallery;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    // Report Articles
    public function articlesPdf()
    {
        $articles = Article::all();
        $pdf = Pdf::loadView('reports.articles', compact('articles'));
        return $pdf->download('laporan-artikel.pdf');
    }

    // Report Products
    public function productsPdf()
    {
        $products = Product::all();
        $pdf = Pdf::loadView('reports.products', compact('products'));
        return $pdf->download('laporan-produk.pdf');
    }

    // Report Galleries
    public function galleriesPdf()
    {
        $galleries = Gallery::all();
        $pdf = Pdf::loadView('reports.galleries', compact('galleries'));
        return $pdf->download('laporan-galeri.pdf');
    }
}