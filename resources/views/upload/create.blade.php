@extends('layouts.public')

@section('title', 'Upload Konten - PELITA KALIMENDONG')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">
                        <i class="bi bi-cloud-upload"></i> Upload Konten Baru
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Kategori Konten <span class="text-danger">*</span></label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Pilih Kategori</option>

                                <!-- Media & Informasi -->
                                <optgroup label="📖 Media & Informasi">
                                    <option value="magazine" {{ old('type') == 'magazine' ? 'selected' : '' }}>📚 Majalah</option>
                                    <option value="poetry" {{ old('type') == 'poetry' ? 'selected' : '' }}>💝 Puisi</option>
                                    <option value="editorial" {{ old('type') == 'editorial' ? 'selected' : '' }}>📰 Editorial</option>
                                    <option value="news" {{ old('type') == 'news' ? 'selected' : '' }}>📢 Berita</option>
                                    <option value="agenda" {{ old('type') == 'agenda' ? 'selected' : '' }}>📅 Agenda</option>
                                </optgroup>

                                <!-- Literasi Corner -->
                                <optgroup label="📚 Literasi Corner">
                                    <option value="cerita_seru" {{ old('type') == 'cerita_seru' ? 'selected' : '' }}>📖 Cerita Seru</option>
                                    <option value="puisi_cilik" {{ old('type') == 'puisi_cilik' ? 'selected' : '' }}>💕 Puisi Cilik</option>
                                    <option value="baca_yuk" {{ old('type') == 'baca_yuk' ? 'selected' : '' }}>👀 Baca Yuk!</option>
                                    <option value="kata_baru" {{ old('type') == 'kata_baru' ? 'selected' : '' }}>💬 Kata Baru</option>
                                    <option value="olahraga" {{ old('type') == 'olahraga' ? 'selected' : '' }}>🏀 Olahraga</option>
                                    <option value="ekstrakulikuler" {{ old('type') == 'ekstrakulikuler' ? 'selected' : '' }}>👥 Ekstrakulikuler</option>
                                </optgroup>

                                <!-- Numerasi Zone -->
                                <optgroup label="🔢 Numerasi Zone">
                                    <option value="angka_ajaib" {{ old('type') == 'angka_ajaib' ? 'selected' : '' }}>✨ Angka Ajaib</option>
                                    <option value="bermain_hitung" {{ old('type') == 'bermain_hitung' ? 'selected' : '' }}>🎲 Bermain Hitung</option>
                                    <option value="cerita_matematika" {{ old('type') == 'cerita_matematika' ? 'selected' : '' }}>📚 Cerita Matematika</option>
                                    <option value="tips_hitung_cepat" {{ old('type') == 'tips_hitung_cepat' ? 'selected' : '' }}>💡 Tips Hitung Cepat</option>
                                </optgroup>

                                <!-- Kreativitas Siswa -->
                                <optgroup label="🎨 Kreativitas Siswa">
                                    <option value="karya_kita" {{ old('type') == 'karya_kita' ? 'selected' : '' }}>⭐ Karya Kita</option>
                                    <option value="bintang_minggu_ini" {{ old('type') == 'bintang_minggu_ini' ? 'selected' : '' }}>🏆 Bintang Minggu Ini</option>
                                    <option value="foto_kegiatan" {{ old('type') == 'foto_kegiatan' ? 'selected' : '' }}>📸 Foto Kegiatan</option>
                                </optgroup>

                                <!-- Edutainment -->
                                <optgroup label="🎮 Edutainment">
                                    <option value="teka_teki_seru" {{ old('type') == 'teka_teki_seru' ? 'selected' : '' }}>❓ Teka-teki Seru</option>
                                    <option value="komik_edukasi" {{ old('type') == 'komik_edukasi' ? 'selected' : '' }}>📗 Komik Edukasi</option>
                                    <option value="fun_facts" {{ old('type') == 'fun_facts' ? 'selected' : '' }}>⚡ Fun Facts</option>
                                </optgroup>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" id="file-upload-group">
                            <label for="file" class="form-label">File Konten <span class="text-danger" id="file-required-indicator">*</span></label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                   id="file" name="file" accept=".pdf,.doc,.docx" required>
                            <div class="form-text">Format yang didukung: PDF, DOC, DOCX. Maksimal 10MB.</div>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Gambar Sampul</label>
                            <input type="file" class="form-control @error('cover_image') is-invalid @enderror"
                                   id="cover_image" name="cover_image" accept="image/*">
                            <div class="form-text">Format yang didukung: JPG, PNG, GIF. Maksimal 2MB.</div>
                            @error('cover_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="uploader_name" class="form-label">Nama Pengupload <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('uploader_name') is-invalid @enderror"
                                   id="uploader_name" name="uploader_name" value="{{ old('uploader_name') }}" required>
                            @error('uploader_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="uploader_email" class="form-label">Email Pengupload <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('uploader_email') is-invalid @enderror"
                                   id="uploader_email" name="uploader_email" value="{{ old('uploader_email') }}" required>
                            <div class="form-text">Email akan digunakan untuk tracking upload Anda.</div>
                            @error('uploader_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i>
                            Konten yang diupload akan ditinjau oleh admin sebelum dipublikasikan.
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload"></i> Upload Konten
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeSelect = document.getElementById('type');
        const fileInput = document.getElementById('file');
        const fileRequiredIndicator = document.getElementById('file-required-indicator');

        function toggleFileRequired() {
            const selectedType = typeSelect.value;
            // Types that don't require files (activity-based content)
            const noFileRequired = ['olahraga', 'ekstrakulikuler'];

            if (noFileRequired.includes(selectedType)) {
                fileInput.removeAttribute('required');
                fileRequiredIndicator.style.display = 'none';
            } else {
                fileInput.setAttribute('required', 'required');
                fileRequiredIndicator.style.display = 'inline';
            }
        }

        typeSelect.addEventListener('change', toggleFileRequired);
        toggleFileRequired(); // Initial call on page load
    });
</script>
@endsection
