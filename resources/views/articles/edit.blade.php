@extends('layouts.app')

@section('title', 'Edit Artikel')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Artikel</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Artikel</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Konten <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                          id="content" name="content" rows="8" required>{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" 
                       id="author" name="author" value="{{ old('author', $article->author) }}" required>
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                @if($article->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Current Image" width="150" style="border-radius:8px;">
                        <br>
                        <small class="text-muted">Gambar saat ini</small>
                    </div>
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                       id="image" name="image" accept="image/*">
                <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update
                </button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection