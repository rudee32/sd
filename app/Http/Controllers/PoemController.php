<?php

namespace App\Http\Controllers;

use App\Models\Content;

class PoemController extends Controller
{
    public function index()
    {
        try {
            $hasStatus = \Schema::hasColumn('contents', 'status');
            $hasPublishedAt = \Schema::hasColumn('contents', 'published_at');

            $query = Content::where('type', 'poetry');

            if ($hasStatus) {
                $query->where('status', 'approved');
            } elseif ($hasPublishedAt) {
                $query->whereNotNull('published_at');
            }

            $poems = $query->latest()->get();
            return view('poems.index', compact('poems'));
        } catch (\Exception $e) {
            \Log::error('Error fetching poems: ' . $e->getMessage());
            abort(500, 'Terjadi kesalahan saat memuat puisi.');
        }
    }
}
