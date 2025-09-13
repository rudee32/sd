<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuFeatureController extends Controller
{
    public function index()
    {
        $menuFeatures = Content::where('is_menu_feature', true)
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(10);

        return view('admin.menu_features.index', compact('menuFeatures'));
    }

    public function create()
    {
        return view('admin.menu_features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:magazine,poetry,editorial,news,agenda,cerita_seru,puisi_cilik,baca_yuk,kata_baru,angka_ajaib,bermain_hitung,cerita_matematika,tips_hitung_cepat,karya_kita,bintang_minggu_ini,foto_kegiatan,teka_teki_seru,komik_edukasi,fun_facts',
            'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'type']);
        $data['is_menu_feature'] = true;
        $data['user_id'] = auth()->id();

        if (\Schema::hasColumn('contents', 'published_at')) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('contents', 'public');
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Content::create($data);

        return redirect()->route('admin.menu_features.index')
                         ->with('success', 'Menu feature berhasil ditambahkan!');
    }

    public function edit(Content $content)
    {
        if (!$content->is_menu_feature) {
            abort(404);
        }
        return view('admin.menu_features.edit', compact('content'));
    }

    public function update(Request $request, Content $content)
    {
        if (!$content->is_menu_feature) {
            abort(404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:magazine,poetry,editorial,news,agenda,cerita_seru,puisi_cilik,baca_yuk,kata_baru,angka_ajaib,bermain_hitung,cerita_matematika,tips_hitung_cepat,karya_kita,bintang_minggu_ini,foto_kegiatan,teka_teki_seru,komik_edukasi,fun_facts',
            'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'type']);

        if ($request->hasFile('file')) {
            if ($content->file_path) {
                Storage::disk('public')->delete($content->file_path);
            }
            $data['file_path'] = $request->file('file')->store('contents', 'public');
        }

        if ($request->hasFile('cover_image')) {
            if ($content->cover_image) {
                Storage::disk('public')->delete($content->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $content->update($data);

        return redirect()->route('admin.menu_features.index')
                         ->with('success', 'Menu feature berhasil diperbarui!');
    }

    public function destroy(Content $content)
    {
        if (!$content->is_menu_feature) {
            abort(404);
        }

        if ($content->file_path) {
            Storage::disk('public')->delete($content->file_path);
        }
        if ($content->cover_image) {
            Storage::disk('public')->delete($content->cover_image);
        }

        $content->delete();

        return redirect()->route('admin.menu_features.index')
                         ->with('success', 'Menu feature berhasil dihapus!');
    }
}
