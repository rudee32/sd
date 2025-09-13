@extends('layouts.public')

@section('title', 'Komik Edukasi - Edutainment')

@section('content')
<div class="container my-5">
    <h1 class="mb-4"><i class="bi bi-book-half"></i> Komik Edukasi</h1>
    <p class="text-muted mb-4">Komik yang mengedukasi dan menghibur. Nikmati berbagai komik menarik yang memberikan edukasi dan hiburan sekaligus.</p>

    @if($contents->count() > 0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($contents as $content)
                <div class="col">
                    <div class="card content-card h-100">
                        @if($content->cover_image)
                            <img src="{{ asset('storage/' . $content->cover_image) }}" class="card-img-top" alt="{{ $content->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <p class="card-text">{{ Str::limit($content->description, 150) }}</p>
                            <a href="{{ route('content.show', $content->id) }}" class="btn btn-primary btn-sm">Baca Komik</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $content->created_at->format('d M Y') }} | {{ $content->comments->count() }} Komentar
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $contents->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-book-half text-muted" style="font-size: 4rem;"></i>
            <h3 class="mt-3 text-muted">Belum ada komik edukasi tersedia</h3>
            <p class="text-muted">Komik edukasi akan segera ditambahkan.</p>
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('edutainment') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Edutainment
        </a>
    </div>
</div>
@endsection
