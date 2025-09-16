@extends('layouts.app')

@section('title', 'Beranda - SUARA PEGUNUNGAN')

@section('content')
<div class="container-fluid p-0">
    <!-- Hero Section with Navbar -->
@include('partials.navbar')

<!-- Hero Content -->
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold mb-4">
                Selamat Datang di <span class="text-warning">SUARA PEGUNUNGAN</span>
            </h1>
            <h2 class="h4 mb-4">SD N 2 Kalimendong</h2>
            <p class="lead mb-4">
                Portal digital untuk pendidikan literasi dan numerasi yang menyenangkan dan interaktif
            </p>
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('halaman-utama') }}" class="btn btn-light btn-lg px-4 py-3 fw-bold">
                    <i class="bi bi-compass me-2"></i>Jelajahi
                </a>
                <a href="{{ route('upload.create') }}" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold">
                    <i class="bi bi-cloud-upload me-2"></i>Upload Konten
                </a>
            </div>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="text-center">
                <img src="{{ asset('css/sd1.jpg') }}" class="img-fluid rounded shadow" alt="SD Pelita Kalimendong" style="max-height: 300px;">
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-4">Fitur Unggulan</h2>
                <p class="lead text-muted">Temukan berbagai konten edukasi yang menarik dan interaktif</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary bg-gradient rounded-circle p-4 d-inline-block mb-3">
                                <i class="bi bi-book text-white fs-1"></i>
                            </div>
                            <h5 class="card-title fw-bold">Literasi Corner</h5>
                            <p class="card-text text-muted">Koleksi cerita seru, puisi cilik, dan bahan bacaan edukatif</p>
                            <a href="{{ route('literasi-corner') }}" class="btn btn-primary rounded-pill">
                                <i class="bi bi-arrow-right me-2"></i>Jelajahi
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-success bg-gradient rounded-circle p-4 d-inline-block mb-3">
                                <i class="bi bi-calculator text-white fs-1"></i>
                            </div>
                            <h5 class="card-title fw-bold">Numerasi Zone</h5>
                            <p class="card-text text-muted">Permainan matematika dan tips hitung cepat yang menyenangkan</p>
                            <a href="{{ route('numerasi-zone') }}" class="btn btn-success rounded-pill">
                                <i class="bi bi-arrow-right me-2"></i>Jelajahi
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-warning bg-gradient rounded-circle p-4 d-inline-block mb-3">
                                <i class="bi bi-palette text-white fs-1"></i>
                            </div>
                            <h5 class="card-title fw-bold">Kreativitas Siswa</h5>
                            <p class="card-text text-muted">Galeri karya siswa dan showcase kreativitas anak-anak</p>
                            <a href="{{ route('kreativitas-siswa') }}" class="btn btn-warning rounded-pill">
                                <i class="bi bi-arrow-right me-2"></i>Jelajahi
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-info bg-gradient rounded-circle p-4 d-inline-block mb-3">
                                <i class="bi bi-joystick text-white fs-1"></i>
                            </div>
                            <h5 class="card-title fw-bold">Edutainment</h5>
                            <p class="card-text text-muted">Teka-teki seru dan komik edukasi yang menghibur</p>
                            <a href="{{ route('edutainment') }}" class="btn btn-info rounded-pill">
                                <i class="bi bi-arrow-right me-2"></i>Jelajahi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="p-4">
                        <div class="bg-primary bg-gradient rounded-circle p-4 d-inline-block mb-3">
                            <i class="bi bi-book text-white fs-2"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-primary mb-2">500+</h3>
                        <p class="text-muted fs-5">Konten Edukatif</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="p-4">
                        <div class="bg-success bg-gradient rounded-circle p-4 d-inline-block mb-3">
                            <i class="bi bi-people text-white fs-2"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-success mb-2">200+</h3>
                        <p class="text-muted fs-5">Siswa Aktif</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="p-4">
                        <div class="bg-warning bg-gradient rounded-circle p-4 d-inline-block mb-3">
                            <i class="bi bi-star text-white fs-2"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-warning mb-2">50+</h3>
                        <p class="text-muted fs-5">Karya Terbaik</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="p-4">
                        <div class="bg-info bg-gradient rounded-circle p-4 d-inline-block mb-3">
                            <i class="bi bi-trophy text-white fs-2"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-info mb-2">25+</h3>
                        <p class="text-muted fs-5">Penghargaan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5 bg-gradient-secondary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4">Bergabunglah dengan Komunitas Kami!</h2>
                    <p class="lead fs-4 mb-4">
                        Bagikan karya Anda, dapatkan inspirasi, dan jadilah bagian dari perjalanan edukasi yang menyenangkan.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('upload.create') }}" class="btn btn-light btn-lg px-5 py-3 fw-bold">
                            <i class="bi bi-cloud-upload-fill me-2"></i>Mulai Upload
                        </a>
                        <a href="{{ route('halaman-utama') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                            <i class="bi bi-compass me-2"></i>Eksplorasi
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="text-center">
                        <div class="bg-white bg-opacity-10 rounded-4 p-4">
                            <i class="bi bi-rocket fs-1 mb-3"></i>
                            <h4 class="fw-bold mb-3">Siap untuk Belajar?</h4>
                            <p>Mari mulai perjalanan edukasi yang menyenangkan bersama!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.bg-gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
.bg-gradient-secondary { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }

@media (max-width: 768px) {
    .display-4 { font-size: 2.5rem; }
    .display-5 { font-size: 2rem; }
}
</style>
@endsection
