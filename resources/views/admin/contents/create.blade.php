@extends('layouts.app')

@section('title', 'Tambah Konten Baru')

@section('content')
<div class="container my-5">
    <h1>Tambah Konten Baru</h1>

    <form action="{{ route('admin.contents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select class="form-control" id="type" name="type" required>
                <option value="majalah" {{ old('type') == 'majalah' ? 'selected' : '' }}>Majalah</option>
                <option value="puisi" {{ old('type') == 'puisi' ? 'selected' : '' }}>Puisi</option>
                <option value="editorial" {{ old('type') == 'editorial' ? 'selected' : '' }}>Editorial</option>
                <option value="berita" {{ old('type') == 'berita' ? 'selected' : '' }}>Berita</option>
                <option value="agenda" {{ old('type') == 'agenda' ? 'selected' : '' }}>Agenda</option>
                <option value="cerita_seru" {{ old('type') == 'cerita_seru' ? 'selected' : '' }}>"Cerita Seru"</option>
                <option value="puisi_cilik" {{ old('type') == 'puisi_cilik' ? 'selected' : '' }}>"Puisi Cilik"</option>
                <option value="baca_yuk" {{ old('type') == 'baca_yuk' ? 'selected' : '' }}>"Baca Yuk!"</option>
                <option value="kata_baru" {{ old('type') == 'kata_baru' ? 'selected' : '' }}>"Kata Baru"</option>
                <option value="angka_ajaib" {{ old('type') == 'angka_ajaib' ? 'selected' : '' }}>"Angka Ajaib"</option>
                <option value="bermain_hitung" {{ old('type') == 'bermain_hitung' ? 'selected' : '' }}>"Bermain Hitung"</option>
                <option value="cerita_matematika" {{ old('type') == 'cerita_matematika' ? 'selected' : '' }}>"Cerita Matematika"</option>
                <option value="tips_hitung_cepat" {{ old('type') == 'tips_hitung_cepat' ? 'selected' : '' }}>"Tips Hitung Cepat"</option>
                <option value="karya_kita" {{ old('type') == 'karya_kita' ? 'selected' : '' }}>"Karya Kita"</option>
                <option value="bintang_minggu_ini" {{ old('type') == 'bintang_minggu_ini' ? 'selected' : '' }}>"Bintang Minggu Ini"</option>
                <option value="foto_kegiatan" {{ old('type') == 'foto_kegiatan' ? 'selected' : '' }}>"Foto Kegiatan"</option>
                <option value="teka_teki_seru" {{ old('type') == 'teka_teki_seru' ? 'selected' : '' }}>"Teka-teki Seru"</option>
                <option value="komik_edukasi" {{ old('type') == 'komik_edukasi' ? 'selected' : '' }}>"Komik Edukasi"</option>
                <option value="fun_facts" {{ old('type') == 'fun_facts' ? 'selected' : '' }}>"Fun Facts"</option>
            </select>
            @error('type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="is_menu_feature" name="is_menu_feature" {{ old('is_menu_feature') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_menu_feature">
                Tampilkan di Menu
            </label>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File (Opsional)</label>
            <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.txt">
            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Gambar Sampul (Opsional)</label>
            <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
            @error('cover_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.contents.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
