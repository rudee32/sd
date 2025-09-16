@extends('layouts.app')

@section('title', 'Edit Konten')

@section('content')
<div class="container my-5">
    <h1>Edit Konten</h1>

    <form action="{{ route('admin.contents.update', $content) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $content->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $content->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select class="form-control" id="type" name="type" required>
                <option value="majalah" {{ old('type', $content->type) == 'majalah' ? 'selected' : '' }}>Majalah</option>
                <option value="puisi" {{ old('type', $content->type) == 'puisi' ? 'selected' : '' }}>Puisi</option>
                <option value="editorial" {{ old('type', $content->type) == 'editorial' ? 'selected' : '' }}>Editorial</option>
                <option value="berita" {{ old('type', $content->type) == 'berita' ? 'selected' : '' }}>Berita</option>
                <option value="agenda" {{ old('type', $content->type) == 'agenda' ? 'selected' : '' }}>Agenda</option>
                <option value="cerita_seru" {{ old('type', $content->type) == 'cerita_seru' ? 'selected' : '' }}>"Cerita Seru"</option>
                <option value="puisi_cilik" {{ old('type', $content->type) == 'puisi_cilik' ? 'selected' : '' }}>"Puisi Cilik"</option>
                <option value="baca_yuk" {{ old('type', $content->type) == 'baca_yuk' ? 'selected' : '' }}>"Baca Yuk!"</option>
                <option value="kata_baru" {{ old('type', $content->type) == 'kata_baru' ? 'selected' : '' }}>"Kata Baru"</option>
                <option value="keagamaan" {{ old('type', $content->type) == 'keagamaan' ? 'selected' : '' }}>"Keagamaan"</option>
                <option value="angka_ajaib" {{ old('type', $content->type) == 'angka_ajaib' ? 'selected' : '' }}>"Angka Ajaib"</option>
                <option value="bermain_hitung" {{ old('type', $content->type) == 'bermain_hitung' ? 'selected' : '' }}>"Bermain Hitung"</option>
                <option value="cerita_matematika" {{ old('type', $content->type) == 'cerita_matematika' ? 'selected' : '' }}>"Cerita Matematika"</option>
                <option value="tips_hitung_cepat" {{ old('type', $content->type) == 'tips_hitung_cepat' ? 'selected' : '' }}>"Tips Hitung Cepat"</option>
                <option value="karya_kita" {{ old('type', $content->type) == 'karya_kita' ? 'selected' : '' }}>"Karya Kita"</option>
                <option value="bintang_minggu_ini" {{ old('type', $content->type) == 'bintang_minggu_ini' ? 'selected' : '' }}>"Bintang Minggu Ini"</option>
                <option value="foto_kegiatan" {{ old('type', $content->type) == 'foto_kegiatan' ? 'selected' : '' }}>"Foto Kegiatan"</option>
                <option value="teka_teki_seru" {{ old('type', $content->type) == 'teka_teki_seru' ? 'selected' : '' }}>"Teka-teki Seru"</option>
                <option value="komik_edukasi" {{ old('type', $content->type) == 'komik_edukasi' ? 'selected' : '' }}>"Komik Edukasi"</option>
                <option value="fun_facts" {{ old('type', $content->type) == 'fun_facts' ? 'selected' : '' }}>"Fun Facts"</option>
            </select>
            @error('type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="is_menu_feature" name="is_menu_feature" {{ old('is_menu_feature', $content->is_menu_feature) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_menu_feature">
                Tampilkan di Menu
            </label>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File (Opsional)</label>
            @if($content->file_path)
                <div class="mb-2">
                    <small class="text-muted">File saat ini: {{ basename($content->file_path) }}</small>
                </div>
            @endif
            <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.txt">
            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Gambar Sampul (Opsional)</label>
            @if($content->cover_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $content->cover_image) }}" alt="Current cover" style="max-width: 200px; max-height: 200px;">
                    <br>
                    <small class="text-muted">Gambar saat ini</small>
                </div>
            @endif
            <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
            @error('cover_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('admin.contents.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
