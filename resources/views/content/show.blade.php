@extends('layouts.public')

@section('title', $content->title)

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <article>
                <h1 class="mb-3">{{ $content->title }}</h1>
                @if($content->cover_image)
                    <img src="{{ asset('storage/' . $content->cover_image) }}" class="img-fluid mb-3" alt="{{ $content->title }}">
                @endif
                <p class="text-muted">Oleh: {{ $content->user ? $content->user->name : ($content->uploader_name ?? 'N/A') }} | Tanggal:
                    @if($content->published_at)
                        @if($content->published_at instanceof \Carbon\Carbon)
                            {{ $content->published_at->format('d M Y') }}
                        @else
                            {{ \Carbon\Carbon::parse($content->published_at)->format('d M Y') }}
                        @endif
                    @else
                        @if($content->created_at instanceof \Carbon\Carbon)
                            {{ $content->created_at->format('d M Y') }}
                        @else
                            {{ \Carbon\Carbon::parse($content->created_at)->format('d M Y') }}
                        @endif
                    @endif
                </p>
                <div class="content-body">
                    {!! nl2br(e($content->description)) !!}
                </div>
                @if($content->file_path)
                    <div class="mt-3">
                        <a href="{{ asset('storage/' . $content->file_path) }}" class="btn btn-success" target="_blank">Unduh File</a>
                    </div>
                @endif
            </article>

            <!-- Comments Section -->
            <div class="mt-5">
                <h3>Komentar ({{ $content->comments->count() }})</h3>
                @foreach($content->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="card-title">{{ $comment->name }}</h6>
                            <p class="card-text">{{ $comment->comment }}</p>
                            <small class="text-muted">
                                @if($comment->created_at instanceof \Carbon\Carbon)
                                    {{ $comment->created_at->format('d M Y H:i') }}
                                @else
                                    {{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y H:i') }}
                                @endif
                            </small>
                        </div>
                    </div>
                @endforeach

                <!-- Add Comment Form -->
                <div class="card">
                    <div class="card-body">
                        <h5>Tambah Komentar</h5>
                        <form action="{{ route('content.comment', $content->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Komentar</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Sidebar -->
            <div class="card">
                <div class="card-body">
                    <h5>Majalah Terbaru</h5>
                    @foreach(\App\Models\Content::where('type', 'magazine')->latest()->take(5) as $magazine)
                        <div class="mb-2">
                            @if(is_object($magazine) && isset($magazine->id) && isset($magazine->title))
                                <a href="{{ route('content.show', $magazine->id) }}">{{ $magazine->title }}</a>
                            @else
                                <span>Invalid magazine data</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
