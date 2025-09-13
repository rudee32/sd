@extends('layouts.app')

@section('title', 'Kelola Konten')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Kelola Konten</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($contents->isEmpty())
        <p>Tidak ada konten yang tersedia.</p>
    @else
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Tanggal Publikasi</th>
                    <th>Uploader</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>{{ ucfirst($content->type) }}</td>
                    <td>
                        @if($content->status == 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif($content->status == 'pending')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif($content->status == 'rejected')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-secondary">Tidak Diketahui</span>
                        @endif
                    </td>
                    <td>{{ $content->published_at ? $content->published_at->format('d M Y') : '-' }}</td>
                    <td>{{ $content->uploader_name ?? 'Admin' }}</td>
                    <td>
                        <a href="{{ route('admin.contents.show', $content->id) }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="{{ route('admin.contents.edit', $content->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        @if($content->status == 'pending')
                            <form action="{{ route('admin.contents.approve', $content->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Setujui konten ini?')">Setujui</button>
                            </form>
                            <form action="{{ route('admin.contents.reject', $content->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Tolak konten ini?')">Tolak</button>
                            </form>
                        @endif

                        <form action="{{ route('admin.contents.destroy', $content->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus konten ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contents->links() }}
    @endif
</div>
@endsection
