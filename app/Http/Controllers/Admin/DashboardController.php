<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Visitor;
use App\Models\Comment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $contentCounts = [
                'Berita' => Content::where('type', 'berita')->count(),
                'Pengumuman' => Content::where('type', 'pengumuman')->count(),
                'Galeri' => Content::where('type', 'galeri')->count(),
                'Majalah' => Content::where('type', 'majalah')->count(),
            ];

            $data = [
                'totalContents' => Content::count(),
                'totalComments' => Comment::count(),
                'todayVisitors' => Visitor::whereDate('created_at', Carbon::today())->count(),
                'totalVisitors' => Visitor::count(),
                'latestContents' => Content::latest()->take(5)->get(),
                'latestComments' => Comment::with('content')->latest()->take(5)->get(),
                'contentCounts' => $contentCounts,
            ];

            return view('admin.dashboard', $data);
        } catch (\Exception $e) {
            \Log::error('Error loading admin dashboard: ' . $e->getMessage());
            abort(500, 'Terjadi kesalahan saat memuat dashboard admin.');
        }
    }
}
