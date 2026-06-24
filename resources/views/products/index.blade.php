@extends('layouts.app')

@section('title', 'Daftar Produk')
@section('breadcrumb')
    <li class="breadcrumb-item active">Produk</li>
@endsection

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-box me-2"></i>Daftar Produk</h5>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Produk
            </a>
        </div>
    </div>
    <div class="card-body">
        @if($products->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                            <tr>
                                <td>{{ $products->firstItem() + $index }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50" height="50" style="object-fit:cover; border-radius:8px;">
                                    @else
                                        <div class="bg-light d-inline-flex align-items-center justify-content-center" style="width:50px;height:50px;border-radius:8px;">
                                            <i class="bi bi-box text-muted fs-3"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ Str::limit($product->name, 40) }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                </td>
                                <td><span class="badge bg-info">{{ $product->category }}</span></td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-white">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus produk <strong>"{{ $product->name }}"</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-box fs-1 text-muted"></i>
                <h5 class="mt-3">Belum ada produk</h5>
                <p class="text-muted">Klik tombol "Tambah Produk" untuk membuat produk baru</p>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>
        @endif
    </div>
</div>
@endsection