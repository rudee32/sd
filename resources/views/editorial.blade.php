@extends('layouts.public')

@section('title', 'Editorial')

@section('content')
<!-- Modern Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-8 mx-auto text-center">
                <div class="fade-in">
                    <h1 class="display-3 fw-bold text-white mb-4">
                        <i class="bi bi-newspaper me-3 text-warning"></i>
                        Editorial
                    </h1>
                    <p class="lead text-white-75 fs-4 mb-5">
                        Pandangan dan opini dari tim redaksi tentang pendidikan dan perkembangan sekolah
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-5">
    <div class="container">
        @if($contents->count())
            <div class="row g-4">
                @foreach($contents as $content)
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-lg h-100 content-card">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold text-dark mb-3">{{ $content->title }}</h5>
                                <p class="card-text text-muted mb-4">{{ Str::limit($content->body, 150) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>
                                        {{ $content->created_at->format('d M Y') }}
                                    </small>
                                    <a href="{{ route('content.show', $content->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-arrow-right me-1"></i>Baca Selengkapnya
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
                    <i class="bi bi-newspaper display-1 text-muted mb-3"></i>
                    <h4 class="text-muted mb-3">Belum Ada Editorial</h4>
                    <p class="text-muted mb-0">Konten editorial akan segera hadir. Silakan kembali lagi nanti.</p>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
