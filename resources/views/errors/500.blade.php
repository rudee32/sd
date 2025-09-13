@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
<div class="container text-center py-5">
    <h1 class="display-1 text-danger">500</h1>
    <h2>Oops! Terjadi kesalahan pada server.</h2>
    <p>Maaf, ada masalah saat memproses permintaan Anda. Silakan coba lagi nanti.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>
@endsection
