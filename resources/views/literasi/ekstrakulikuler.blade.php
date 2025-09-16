@extends('layouts.public')

@section('title', 'Ekstrakulikuler - Literasi Corner')

@section('content')
<div class="container my-5">
    <h1 class="mb-4"><i class="bi bi-people"></i> Ekstrakulikuler</h1>

    <a href="{{ route('literasi-corner') }}" class="btn btn-secondary btn-sm mb-3">Kembali ke Literasi Corner</a>

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
                            <a href="{{ route('content.show', $content->id) }}" class="btn btn-warning btn-sm">Baca Selengkapnya</a>
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
        <p>Tidak ada konten ekstrakulikuler untuk ditampilkan.</p>
    @endif
</div>
@endsection
