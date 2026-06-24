@extends('layouts.frontend')

@section('title', $article->title)

@section('content')
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('public.articles') }}">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($article->title, 30) }}</li>
            </ol>
        </nav>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" 
                             alt="{{ $article->title }}" 
                             class="card-img-top" 
                             style="max-height: 400px; object-fit: cover;">
                    @endif
                    <div class="card-body p-4">
                        <h1 class="display-6 fw-bold mb-3">{{ $article->title }}</h1>
                        <div class="d-flex gap-3 mb-4">
                            <span class="badge bg-primary"><i class="bi bi-person me-1"></i>{{ $article->author }}</span>
                            <span class="badge bg-secondary"><i class="bi bi-clock me-1"></i>{{ $article->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <div class="content">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                        <hr>
                        <a href="{{ route('public.articles') }}" class="btn btn-outline-custom">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .btn-outline-custom {
        border: 2px solid #667eea;
        color: #667eea;
        padding: 10px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .btn-outline-custom:hover {
        background: #667eea;
        color: white;
    }
</style>
@endpush