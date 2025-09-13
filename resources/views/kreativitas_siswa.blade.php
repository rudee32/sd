@extends('layouts.public')

@section('title', 'Kreativitas Siswa')

@section('content')
<!-- Modern Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-8 mx-auto text-center">
                <div class="fade-in">
                    <h1 class="display-3 fw-bold text-white mb-4">
                        <i class="bi bi-palette me-3 text-warning"></i>
                        Kreativitas Siswa
                    </h1>
                    <p class="lead text-white-75 fs-4 mb-5">
                        Pamerkan bakat dan kreativitas siswa-siswi dalam berbagai karya seni dan kegiatan menarik
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-5">
    <div class="container">
        <!-- Navigation Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('kreativitas.karya-kita') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-lg h-100 content-card">
                        <div class="card-body p-4 text-center">
                            <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-star text-white" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Karya Kita</h5>
                            <p class="text-muted mb-0">Koleksi karya seni dan kreativitas terbaik dari siswa-siswi</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('kreativitas.bintang-minggu-ini') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-lg h-100 content-card">
                        <div class="card-body p-4 text-center">
                            <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-award text-white" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Bintang Minggu Ini</h5>
                            <p class="text-muted mb-0">Siswa berprestasi yang menjadi inspirasi bagi teman-temannya</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('kreativitas.foto-kegiatan') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-lg h-100 content-card">
                        <div class="card-body p-4 text-center">
                            <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-camera text-white" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Foto Kegiatan</h5>
                            <p class="text-muted mb-0">Dokumentasi momen-momen berharga dari berbagai kegiatan sekolah</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Content Display -->
        @if($contents->count() > 0)
            <div class="row g-4">
                <div class="col-12">
                    <h3 class="fw-bold text-dark mb-4">
                        <i class="bi bi-collection me-2 text-primary"></i>
                        Karya Kreatif Terbaru
                    </h3>
                </div>
                @foreach($contents as $content)
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-lg h-100 content-card">
                            @if($content->cover_image)
                                <div class="position-relative overflow-hidden" style="height: 200px;">
                                    <img src="{{ asset('storage/' . $content->cover_image) }}" 
                                         class="card-img-top w-100 h-100" 
                                         style="object-fit: cover;" 
                                         alt="{{ $content->title }}">
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-primary bg-gradient px-3 py-2 rounded-pill">
                                            <i class="bi bi-palette me-1"></i>{{ $content->comments->count() }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold text-dark mb-3">{{ $content->title }}</h5>
                                <p class="card-text text-muted mb-4">{{ Str::limit($content->description, 120) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>
                                        {{ $content->created_at->format('d M Y') }}
                                    </small>
                                    <a href="{{ route('content.show', $content->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-arrow-right me-1"></i>Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5 text-center">
                {{ $contents->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div class="bg-light rounded-4 p-5">
                    <i class="bi bi-palette display-1 text-muted mb-3"></i>
                    <h4 class="text-muted mb-3">Belum Ada Karya Kreatif</h4>
                    <p class="text-muted mb-0">Karya kreatif siswa akan segera dipamerkan. Silakan kembali lagi nanti.</p>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
