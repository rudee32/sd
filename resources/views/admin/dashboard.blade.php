@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="admin-dashboard">
    <!-- Enhanced Header -->
    <div class="dashboard-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard Admin
                    </h1>
                    <p class="mb-0 text-muted">Overview statistik website</p>
                </div>
                <div class="col-lg-6 text-end">
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <a href="{{ route('admin.contents.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle me-2"></i>Upload Konten
                        </a>
                        <!-- Removed Upload Keagamaan button completely as per user request -->
                        <div class="current-time">
                            <span id="current-time" class="h4"></span>
                            <small class="text-muted d-block">{{ now()->format('l, d F Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-start border-primary border-4 shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs text-primary text-uppercase mb-1">Total Konten</div>
                            <div class="h5 mb-0 font-weight-bold">{{ $totalContents }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-file-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tambahkan card statistik lainnya disini -->
    </div>

    <!-- Charts Section -->
    <div class="row mb-4">
        <!-- Bar Chart -->
        <div class="col-xl-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Website</h6>
                </div>
                <div class="card-body">
                    <div style="height: 300px;">
                        <canvas id="mainChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pie Chart -->
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Distribusi Konten</h6>
                </div>
                <div class="card-body">
                    <div style="height: 300px;">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content & Comments -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Konten Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                @forelse($latestContents as $content)
                                    <tr>
                                        <td>{{ $content->title }}</td>
                                        <td class="text-end">{{ $content->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Belum ada konten</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Komentar Terbaru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                @forelse($latestComments as $comment)
                                    <tr>
                                        <td>
                                            <strong>{{ $comment->name }}</strong>
                                            <small class="d-block text-muted">pada {{ $comment->content->title }}</small>
                                        </td>
                                        <td class="text-end">{{ $comment->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Belum ada komentar</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.current-time {
    font-size: 1.25rem;
    font-weight: 500;
}
.border-4 {
    border-width: 4px !important;
}
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-5px);
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contentData = @json($contentCounts);
    const labels = Object.keys(contentData);
    const values = Object.values(contentData);
    
    // Bar Chart
    const mainChart = new Chart(document.getElementById('mainChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Konten',
                data: values,
                backgroundColor: [
                    'rgba(78, 115, 223, 0.8)',
                    'rgba(54, 185, 204, 0.8)',
                    'rgba(28, 200, 138, 0.8)',
                    'rgba(246, 194, 62, 0.8)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Pie Chart
    const pieChart = new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: [
                    'rgba(78, 115, 223, 0.8)',
                    'rgba(54, 185, 204, 0.8)',
                    'rgba(28, 200, 138, 0.8)',
                    'rgba(246, 194, 62, 0.8)'
                ]
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endpush
