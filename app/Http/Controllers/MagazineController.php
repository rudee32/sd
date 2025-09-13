<?php

namespace App\Http\Controllers;

use App\Models\Content;

class MagazineController extends Controller
{
    public function index()
    {
        try {
            $hasStatus = \Schema::hasColumn('contents', 'status');
            $hasPublishedAt = \Schema::hasColumn('contents', 'published_at');

            $query = Content::where('type', 'magazine');

            if ($hasStatus) {
                $query->where('status', 'approved');
            } elseif ($hasPublishedAt) {
                $query->whereNotNull('published_at');
            }

            $magazines = $query->latest()->get();
            return view('magazines.index', compact('magazines'));
        } catch (\Exception $e) {
            \Log::error('Error fetching magazines: ' . $e->getMessage());
            abort(500, 'Terjadi kesalahan saat memuat majalah.');
        }
    }
}
