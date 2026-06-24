@extends('layouts.app')

@section('title', $article->title)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Artikel</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="mb-3">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" 
                     class="img-fluid rounded" style="max-height:400px; width:100%; object-fit:cover;">
            @endif
        </div>
        
        <h2 class="mb-2">{{ $article->title }}</h2>
        <div class="d-flex gap-3 mb-3">
            <span class="badge bg-primary"><i class="bi bi-person me-1"></i>{{ $article->author }}</span>
            <span class="badge bg-secondary"><i class="bi bi-clock me-1"></i>{{ $article->created_at->format('d/m/Y H:i') }}</span>
        </div>
        
        <div class="content">
            {!! nl2br($article->content) !!}
        </div>
        
        <hr>
        <div class="d-flex gap-2">
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning text-white">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection