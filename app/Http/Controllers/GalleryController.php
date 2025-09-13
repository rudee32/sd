<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $query = Content::whereIn('type', ['foto_kegiatan', 'karya_kita', 'bintang_minggu_ini'])
            ->with('comments');

        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }

        $contents = $query->latest()->paginate(12);

        return view('galeri', compact('contents'));
    }
}
