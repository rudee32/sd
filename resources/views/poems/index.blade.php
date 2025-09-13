<!-- resources/views/poems/index.blade.php -->
@extends('layouts.public')

@section('title', 'Puisi - PELITA KALIMENDONG')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Puisi</h1>
    @if($poems->count() > 0)
        <div class="row">
            @foreach($poems as $poem)
                <div class="col-md-4 mb-4">
                    <div class="card content-card h-100">
                        @if($poem->cover_image)
                            <img src="{{ asset('storage/' . $poem->cover_image) }}"
                                 class="card-img-top" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $poem->title }}</h5>
                            <p class="card-text">{{ Str::limit($poem->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-chat-dots"></i> {{ is_object($poem) && isset($poem->comments) ? $poem->comments->count() : 0 }} komentar
                            </small>
                            <a href="{{ is_object($poem) && isset($poem->id) ? route('content.show', $poem->id) : '#' }}"
                               class="btn btn-success btn-sm">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $poems->links() }}
    @else
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Belum ada puisi yang tersedia.
        </div>
    @endif
</div>
@endsection
