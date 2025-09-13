<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function index()
    {
        try {
            $contents = Content::latest()->paginate(15);
            return view('admin.contents.index', compact('contents'));
        } catch (\Exception $e) {
            \Log::error('Error loading contents: ' . $e->getMessage());
            abort(500, 'Terjadi kesalahan saat memuat daftar konten.');
        }
    }

    public function create()
    {
        try {
            return view('admin.contents.create');
        } catch (\Exception $e) {
            \Log::error('Error loading create content form: ' . $e->getMessage());
            abort(500, 'Terjadi kesalahan saat memuat form tambah konten.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'type' => 'required|string',
                'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240', // 10MB max
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
                'is_menu_feature' => 'nullable|boolean',
            ]);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'is_menu_feature' => $request->has('is_menu_feature'),
                'user_id' => Auth::id(),
                'status' => 'published',
                'published_at' => now(),
            ];

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('contents/files', $fileName, 'public');
                $data['file_path'] = $filePath;
            }

            // Handle cover image upload
            if ($request->hasFile('cover_image')) {
                $image = $request->file('cover_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('contents/images', $imageName, 'public');
                $data['cover_image'] = $imagePath;
            }

            Content::create($data);

            return redirect()->route('admin.contents.index')
                ->with('success', 'Konten berhasil ditambahkan!');
        } catch (\Exception $e) {
            \Log::error('Error storing content: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan konten.');
        }
    }

    public function approve(Content $content)
    {
        try {
            $content->update([
                'status' => 'approved',
                'published_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Konten berhasil disetujui dan dipublikasikan!');
        } catch (\Exception $e) {
            \Log::error('Error approving content: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyetujui konten.');
        }
    }

    public function reject(Content $content)
    {
        try {
            $content->update(['status' => 'rejected']);

            return redirect()->back()->with('success', 'Konten berhasil ditolak!');
        } catch (\Exception $e) {
            \Log::error('Error rejecting content: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menolak konten.');
        }
    }

    // Remove olahraga and ekstrakulikuler methods as per user request
    // public function olahraga()
    // {
    //     $contents = Content::where('type', 'olahraga')->get();
    //     return view('admin.contents.index', compact('contents'));
    // }

    // public function ekstrakulikuler()
    // {
    //     $contents = Content::where('type', 'ekstrakulikuler')->get();
    //     return view('admin.contents.index', compact('contents'));
    // }
}
