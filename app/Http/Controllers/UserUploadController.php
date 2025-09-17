<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserUploadController extends Controller
{
    public function create()
    {
        return view('upload.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:majalah,poetry,editorial,news,agenda,cerita_seru,puisi_cilik,baca_yuk,kata_baru,angka_ajaib,bermain_hitung,cerita_matematika,tips_hitung_cepat,karya_kita,bintang_minggu_ini,foto_kegiatan,teka_teki_seru,komik_edukasi,fun_facts,olahraga,ekstrakulikuler,magazine',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'uploader_name' => 'required|string|max:255',
            'uploader_email' => 'required|email|max:255',
        ];

        $request->validate($rules);

        $filePath = null;
        $coverImagePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
        }

        Content::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'file_path' => $filePath,
            'cover_image' => $coverImagePath,
            'user_id' => Auth::id(), // Can be null for anonymous uploads
            'uploader_name' => $request->uploader_name,
            'uploader_email' => $request->uploader_email,
            'status' => 'pending',
        ]);

        return redirect()->route('home')->with('success', 'Konten berhasil diupload dan menunggu verifikasi admin.');
    }

    public function myUploads(Request $request)
    {
        $contents = collect();

        if (Auth::check()) {
            // For authenticated users
            $contents = Content::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        } elseif ($request->has('email')) {
            // For anonymous users - find by email
            $contents = Content::where('uploader_email', $request->email)->orderBy('created_at', 'desc')->get();
        }

        return view('upload.my-uploads', compact('contents'));
    }
}
