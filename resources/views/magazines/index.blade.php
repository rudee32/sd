<!-- resources/views/magazines/index.blade.php -->
@extends('layouts.public')

@section('title', 'Majalah - PELITA KALIMENDONG')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Majalah</h1>
    @if($magazines->count() > 0)
        <div class="row">
            @foreach($magazines as $magazine)
                <div class="col-md-4 mb-4">
                    <div class="card content-card h-100">
                        @if($magazine->cover_image)
                            <img src="{{ asset('storage/' . $magazine->cover_image) }}" 
                                 class="card-img-top" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $magazine->title }}</h5>
                            <p class="card-text">{{ Str::limit($magazine->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-chat-dots"></i> {{ $magazine->comments->count() }} komentar
                                </small>
                                @if(is_object($magazine) && isset($magazine->id))
                                    <a href="{{ route('content.show', $magazine->id) }}"
                                       class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                                @else
                                    <span class="text-muted">Invalid data</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Belum ada majalah yang tersedia.
        </div>
    @endif
</div>
@endsection
