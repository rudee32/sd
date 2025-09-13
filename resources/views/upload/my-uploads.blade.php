@extends('layouts.public')

@section('title', 'Upload Saya - PELITA KALIMENDONG')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            <i class="bi bi-folder"></i> Upload Saya
        </h1>
        <a href="{{ route('upload.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Upload Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @auth
    @else
        @if(!$contents->count() && !request('email'))
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-envelope display-4 text-primary mb-3"></i>
                        <h4>Masukkan Email Anda</h4>
                        <p class="text-muted">Untuk melihat upload Anda, masukkan email yang digunakan saat upload</p>
                        <form method="GET" action="{{ route('upload.my-uploads') }}">
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i> Cari Upload Saya
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endauth

    @if($contents->count() > 0)
        <div class="row">
            @foreach($contents as $content)
                <div class="col-md-6 mb-4">
                    <div class="card content-card h-100">
                        @if($content->cover_image)
                            <img src="{{ asset('storage/' . $content->cover_image) }}"
                                 class="card-img-top" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <p class="card-text">{{ Str::limit($content->description, 100) }}</p>

                            <div class="mb-2">
                                <span class="badge
                                    @if($content->status == 'approved') bg-success
                                    @elseif($content->status == 'rejected') bg-danger
                                    @else bg-warning text-dark
                                    @endif">
                                    @if($content->status == 'approved')
                                        <i class="bi bi-check-circle"></i> Disetujui
                                    @elseif($content->status == 'rejected')
                                        <i class="bi bi-x-circle"></i> Ditolak
                                    @else
                                        <i class="bi bi-clock"></i> Menunggu Verifikasi
                                    @endif
                                </span>
                                <small class="text-muted ms-2">
                                    <i class="bi bi-tag"></i> {{ ucfirst($content->type) }}
                                </small>
                            </div>

                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $content->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-folder-x display-1 text-muted"></i>
            <h3 class="mt-3">Belum ada upload</h3>
            <p class="text-muted">Anda belum mengupload konten apapun.</p>
            <a href="{{ route('upload.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Upload Konten Pertama
            </a>
        </div>
    @endif
</div>
@endsection
