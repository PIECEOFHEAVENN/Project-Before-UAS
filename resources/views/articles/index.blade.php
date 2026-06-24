@extends('layouts.app')

@section('title', 'Daftar Artikel')
@section('breadcrumb')
    <li class="breadcrumb-item active">Artikel</li>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-newspaper me-2"></i>Daftar Artikel</h5>
            <a href="{{ route('articles.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Artikel
            </a>
        </div>
    </div>
    <div class="card-body">
        @if($articles->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $index => $article)
                            <tr>
                                <td>{{ $articles->firstItem() + $index }}</td>
                                <td>
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" width="50" height="50" style="object-fit:cover; border-radius:8px;">
                                    @else
                                        <div class="bg-light d-inline-flex align-items-center justify-content-center" style="width:50px;height:50px;border-radius:8px;">
                                            <i class="bi bi-image text-muted fs-3"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ Str::limit($article->title, 40) }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($article->content, 50) }}</small>
                                </td>
                                <td>{{ $article->author }}</td>
                                <td>{{ $article->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning text-white">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $article->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $article->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus artikel <strong>"{{ $article->title }}"</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $articles->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-newspaper fs-1 text-muted"></i>
                <h5 class="mt-3">Belum ada artikel</h5>
                <p class="text-muted">Klik tombol "Tambah Artikel" untuk membuat artikel baru</p>
                <a href="{{ route('articles.create') }}" class="btn btn-primary">Tambah Artikel</a>
            </div>
        @endif
    </div>
</div>
@endsection