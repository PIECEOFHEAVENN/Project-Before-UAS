@extends('layouts.app')

@section('title', 'Daftar Galeri')
@section('breadcrumb')
    <li class="breadcrumb-item active">Galeri</li>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-images me-2"></i>Daftar Galeri</h5>
            <a href="{{ route('galleries.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Galeri
            </a>
        </div>
    </div>
    <div class="card-body">
        @if($galleries->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $index => $gallery)
                            <tr>
                                <td>{{ $galleries->firstItem() + $index }}</td>
                                <td>
                                    @if($gallery->image)
                                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" width="50" height="50" style="object-fit:cover; border-radius:8px;">
                                    @else
                                        <div class="bg-light d-inline-flex align-items-center justify-content-center" style="width:50px;height:50px;border-radius:8px;">
                                            <i class="bi bi-image text-muted fs-3"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ Str::limit($gallery->title, 40) }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($gallery->description ?? '-', 50) }}</small>
                                </td>
                                <td><span class="badge bg-info">{{ $gallery->category }}</span></td>
                                <td>{{ $gallery->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning text-white">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $gallery->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $gallery->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus galeri <strong>"{{ $gallery->title }}"</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST">
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
                {{ $galleries->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-images fs-1 text-muted"></i>
                <h5 class="mt-3">Belum ada galeri</h5>
                <p class="text-muted">Klik tombol "Tambah Galeri" untuk menambahkan gambar</p>
                <a href="{{ route('galleries.create') }}" class="btn btn-primary">Tambah Galeri</a>
            </div>
        @endif
    </div>
</div>
@endsection