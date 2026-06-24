@extends('layouts.frontend')

@section('title', 'Kontak OSELLA')

@section('content')
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Hubungi <span class="highlight">OSELLA</span></h1>
            <p class="section-subtitle">Kami siap membantu Anda</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-geo-alt fs-2 text-primary"></i>
                        </div>
                        <h5>Alamat Kantor Pusat</h5>
                        <p class="text-muted">PT Cipta Kreasisandang Mandiri<br>Gg. Jangkung, RT.2/RW.2, Pejagalan, Kecamatan Penjaringan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14450</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-telephone fs-2 text-success"></i>
                        </div>
                        <h5>Telepon</h5>
                        <p class="text-muted">+62 21 1234 5678</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-envelope fs-2 text-info"></i>
                        </div>
                        <h5>Email</h5>
                        <p class="text-muted">info@osella.com</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="mb-4"><i class="bi bi-send me-2 text-primary"></i>Kirim Pesan</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Subjek">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Pesan"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary-custom w-100">
                                        <i class="bi bi-send me-2"></i>Kirim Pesan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .btn-primary-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
    }
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        color: white;
    }
</style>
@endpush