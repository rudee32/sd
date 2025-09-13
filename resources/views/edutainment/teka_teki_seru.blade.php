@extends('layouts.public')

@section('title', 'Teka-teki Seru - Edutainment')

@section('content')
<!-- Modern Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-8 mx-auto text-center">
                <div class="fade-in">
                    <h1 class="display-3 fw-bold text-white mb-4">
                        <i class="bi bi-question-circle me-3 text-warning"></i>
                        Teka-teki Seru
                    </h1>
                    <p class="lead text-white-75 fs-4 mb-5">
                        Tantangan teka-teki yang mengasah otak dan kreativitas untuk mengembangkan logika berpikir
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-5">
    <div class="container">

        @if($contents->count() > 0)
            <div class="row g-4">
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
                                        <span class="badge bg-success bg-gradient px-3 py-2 rounded-pill">
                                            <i class="bi bi-question-circle me-1"></i>{{ $content->comments->count() }}
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
                                    <a href="{{ route('content.show', $content->id) }}" class="btn btn-success btn-sm">
                                        <i class="bi bi-arrow-right me-1"></i>Coba
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
                    <i class="bi bi-question-circle display-1 text-muted mb-3"></i>
                    <h4 class="text-muted mb-3">Belum Ada Teka-teki</h4>
                    <p class="text-muted mb-0">Teka-teki seru akan segera ditambahkan. Silakan kembali lagi nanti.</p>
                </div>
            </div>
        @endif

        <div class="mt-5 text-center">
            <a href="{{ route('edutainment') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Edutainment
            </a>
        </div>
    </div>
</section>
@endsection
