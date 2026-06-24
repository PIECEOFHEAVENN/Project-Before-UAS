@extends('layouts.frontend')

@section('title', 'Berita - OSELLA')

@section('content')
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Berita <span class="highlight">Terbaru</span></h1>
            <p class="section-subtitle">Informasi terbaru dari OSELLA</p>
        </div>
        
        <div class="row g-4">
            @forelse($articles as $article)
                <div class="col-md-4">
                    <div class="card card-hover">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                                <i class="bi bi-newspaper display-3 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $article->created_at->format('d M Y') }}</small>
                            <h5 class="card-title mt-2">{{ Str::limit($article->title, 50) }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($article->content, 100) }}</p>
                            <a href="{{ route('public.article.detail', $article->id) }}" class="btn-arrow">
                                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-newspaper display-1 text-muted"></i>
                    <h4 class="mt-3">Belum ada berita</h4>
                    <p class="text-muted">Silakan tambahkan berita melalui admin panel</p>
                </div>
            @endforelse
        </div>
        
        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .highlight {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
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
</style>
@endpush