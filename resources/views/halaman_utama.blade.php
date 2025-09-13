@extends('layouts.public')

@section('title', 'Halaman Utama')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-gradient-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">Selamat Datang di SD N 2 Kalimendong</h1>
                <p class="lead mb-4">Platform digital untuk pendidikan dan kreativitas siswa. Temukan berbagai konten menarik dan informasi terbaru dari sekolah kami.</p>
                <a href="#features" class="btn btn-light btn-lg">Jelajahi Fitur</a>
            </div>
            <div class="col-lg-6">
                <img src="css/sd5.jpg" alt="School Image" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary">Fitur Utama</h2>
                <p class="lead text-muted">Jelajahi berbagai konten dan informasi yang kami sediakan</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-newspaper display-4 text-primary"></i>
                        </div>
                        <h4 class="card-title fw-bold">Editorial</h4>
                        <p class="card-text text-muted">Baca berbagai editorial terbaru dari sekolah kami yang menginspirasi dan mendidik.</p>
                        <a href="{{ route('editorial') }}" class="btn btn-primary btn-lg mt-3">Kunjungi Editorial</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-megaphone display-4 text-success"></i>
                        </div>
                        <h4 class="card-title fw-bold">Berita</h4>
                        <p class="card-text text-muted">Dapatkan informasi berita terbaru dan penting dari kegiatan sekolah.</p>
                        <a href="{{ route('berita') }}" class="btn btn-success btn-lg mt-3">Kunjungi Berita</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-calendar-event display-4 text-warning"></i>
                        </div>
                        <h4 class="card-title fw-bold">Agenda</h4>
                        <p class="card-text text-muted">Lihat agenda kegiatan dan acara mendatang yang akan diadakan di sekolah.</p>
                        <a href="{{ route('agenda') }}" class="btn btn-warning btn-lg mt-3">Kunjungi Agenda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(auth()->check())
<!-- School Profile Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h2 class="mb-4 text-center"><i class="bi bi-building text-primary me-2"></i>Profil Sekolah</h2>
                        <p class="lead text-center mb-4">SD Negeri Contoh adalah sekolah dasar yang berkomitmen untuk memberikan pendidikan terbaik bagi generasi muda. Kami berfokus pada pengembangan karakter, akademik, dan kreativitas siswa.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-primary">Visi</h4>
                                <p>Menjadi sekolah dasar unggulan yang menghasilkan lulusan berkarakter, cerdas, dan kreatif.</p>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-primary">Misi</h4>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-check-circle text-success me-2"></i>Menyelenggarakan pendidikan yang berkualitas dan merata.</li>
                                    <li><i class="bi bi-check-circle text-success me-2"></i>Mengembangkan potensi siswa secara optimal.</li>
                                    <li><i class="bi bi-check-circle text-success me-2"></i>Mendorong kreativitas dan inovasi dalam pembelajaran.</li>
                                    <li><i class="bi bi-check-circle text-success me-2"></i>Membangun lingkungan sekolah yang kondusif dan menyenangkan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@push('styles')
<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.feature-icon {
    transition: transform 0.3s ease;
}

.hover-card:hover .feature-icon {
    transform: scale(1.1);
}
</style>
@endpush
