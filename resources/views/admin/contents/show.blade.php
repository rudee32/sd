@extends('layouts.app')

@section('title', 'Detail Konten')

@section('content')
<div class="container my-5">
    <h1>Detail Konten</h1>
    <div class="card">
        <div class="card-body">
            <h3>{{ $content->title }}</h3>
            <p><strong>Jenis Karya:</strong> {{ ucfirst($content->type) }}</p>
            <p><strong>Deskripsi:</strong></p>
            <p>{{ $content->description }}</p>
            @if($content->cover_image)
                <p><strong>Gambar Sampul:</strong></p>
                <img src="{{ asset('storage/' . $content->cover_image) }}" alt="Cover Image" class="img-fluid mb-3" style="max-width: 300px;">
            @endif
            @if($content->file_path)
                <p><strong>File Karya:</strong> <a href="{{ asset('storage/' . $content->file_path) }}" target="_blank">Download</a></p>
            @endif
            <p><strong>Penulis:</strong> {{ $content->user->name ?? 'N/A' }}</p>
            <p><strong>Tanggal Terbit:</strong>
                @php
                    use Carbon\Carbon;
                    $publishedAt = $content->published_at;
                    $createdAt = $content->created_at;
                    $publishedDate = null;
                    if ($publishedAt instanceof Carbon) {
                        $publishedDate = $publishedAt->format('d M Y');
                    } elseif (is_string($publishedAt)) {
                        try {
                            $publishedDate = Carbon::parse($publishedAt)->format('d M Y');
                        } catch (\Exception $e) {
                            $publishedDate = 'Invalid date';
                        }
                    } elseif ($createdAt instanceof Carbon) {
                        $publishedDate = $createdAt->format('d M Y');
                    } elseif (is_string($createdAt)) {
                        try {
                            $publishedDate = Carbon::parse($createdAt)->format('d M Y');
                        } catch (\Exception $e) {
                            $publishedDate = 'Invalid date';
                        }
                    }
                @endphp
                {{ $publishedDate ?? 'N/A' }}
            </p>
            <a href="{{ route('admin.contents.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Konten</a>
        </div>
    </div>
</div>
@endsection
