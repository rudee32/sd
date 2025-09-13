@extends('layouts.public')

@section('title', 'Numerasi Zone')

@section('content')
<!-- Modern Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-8 mx-auto text-center">
                <div class="fade-in">
                    <h1 class="display-3 fw-bold text-white mb-4">
                        <i class="bi bi-calculator me-3 text-warning"></i>
                        Numerasi Zone
                    </h1>
                    <p class="lead text-white-75 fs-4 mb-5">
                        Jelajahi dunia matematika yang menyenangkan dan interaktif untuk mengembangkan kemampuan berhitung
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
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('numerasi.angka-ajaib') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-lg h-100 content-card">
                        <div class="card-body p-4 text-center">
                            <div class="bg-danger bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-magic text-white" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Angka Ajaib</h5>
                            <p class="text-muted mb-0">Temukan keajaiban angka dan pola matematika yang menarik</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('numerasi.bermain-hitung') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-lg h-100 content-card">
                        <div class="card-body p-4 text-center">
                            <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-dice-6 text-white" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Bermain Hitung</h5>
                            <p class="text-muted mb-0">Game matematika seru untuk melatih kemampuan berhitung</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('numerasi.cerita-matematika') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-lg h-100 content-card">
                        <div class="card-body p-4 text-center">
                            <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-book text-white" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Cerita Matematika</h5>
                            <p class="text-muted mb-0">Kisah-kisah menarik yang mengajarkan konsep matematika</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('numerasi.tips-hitung-cepat') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-lg h-100 content-card">
                        <div class="card-body p-4 text-center">
                            <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-lightning text-white" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Tips Hitung Cepat</h5>
                            <p class="text-muted mb-0">Trik dan tips untuk menghitung dengan cepat dan akurat</p>
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
                        <i class="bi bi-collection me-2 text-danger"></i>
                        Konten Matematika Terbaru
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
                                        <span class="badge bg-danger bg-gradient px-3 py-2 rounded-pill">
                                            <i class="bi bi-calculator me-1"></i>{{ $content->comments->count() }}
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
                                    <a href="{{ route('content.show', $content->id) }}" class="btn btn-danger btn-sm">
                                        <i class="bi bi-arrow-right me-1"></i>Baca
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
                    <i class="bi bi-calculator display-1 text-muted mb-3"></i>
                    <h4 class="text-muted mb-3">Belum Ada Konten Matematika</h4>
                    <p class="text-muted mb-0">Konten matematika akan segera hadir. Silakan kembali lagi nanti.</p>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
