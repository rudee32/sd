@extends('layouts.app')

@section('title', 'Kelola Pengunjung')

@section('content')
<div class="container my-5">
    <h1>Kelola Pengunjung</h1>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengunjung Hari Ini</h5>
                    <h2 class="text-info">{{ $todayVisitors }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Pengunjung</h5>
                    <h2 class="text-warning">{{ $totalVisitors }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>IP Address</th>
                    <th>User Agent</th>
                    <th>Halaman Dikunjungi</th>
                    <th>Waktu Kunjungan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($visitors as $visitor)
                    <tr>
                        <td>{{ is_object($visitor) && isset($visitor->id) ? $visitor->id : 'N/A' }}</td>
                        <td>{{ is_object($visitor) && isset($visitor->ip_address) ? $visitor->ip_address : 'N/A' }}</td>
                        <td>{{ is_object($visitor) && isset($visitor->user_agent) ? $visitor->user_agent : 'N/A' }}</td>
                        <td>{{ is_object($visitor) && isset($visitor->page_visited) ? $visitor->page_visited : 'N/A' }}</td>
                        <td>
                            @if(is_object($visitor) && isset($visitor->visited_at))
                                @if($visitor->visited_at instanceof \Carbon\Carbon)
                                    {{ $visitor->visited_at->format('d M Y H:i:s') }}
                                @else
                                    {{ \Carbon\Carbon::parse($visitor->visited_at)->format('d M Y H:i:s') }}
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-info">Tidak ada data pengunjung.</div>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $visitors->links() }}
</div>
@endsection
