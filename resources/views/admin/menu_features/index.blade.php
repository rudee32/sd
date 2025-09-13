@extends('layouts.app')

@section('title', 'Menu Features')

@section('content')
<div class="container my-5">
    <h1>Menu Features</h1>
    <a href="{{ route('admin.menu_features.create') }}" class="btn btn-primary mb-3">Tambah Menu Feature</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($menuFeatures->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tipe</th>
                    <th>Ditampilkan di Menu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuFeatures as $feature)
                    <tr>
                        <td>{{ $feature->title }}</td>
                        <td>{{ $feature->type }}</td>
                        <td>{{ $feature->is_menu_feature ? 'Ya' : 'Tidak' }}</td>
                        <td>
                            <a href="{{ route('admin.menu_features.edit', $feature->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.menu_features.destroy', $feature->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $menuFeatures->links() }}
    @else
        <p>Tidak ada menu features untuk ditampilkan.</p>
    @endif
</div>
@endsection
