@extends('layouts.public')

@section('title', 'Halaman Utama')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-gradient-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">Selamat Datang di SD N 2 Kalimendong</h1>
                <p class="lead mb-4">Platform digital untuk pendidikan dan kreativitas siswa. Temukan berbagai konten menarik dan informasi terbaru dari sekolah kami.</p>
                <a href="#features" class="btn btn-light btn-lg">Jelajahi Fitur</a>
            </div>
            <div class="col-lg-6">
                <img src="css/sd5.jpg" alt="School Image" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Profile Section -->
<section id="profile" class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h2 class="mb-4 text-center"><i class="bi bi-building text-primary me-2"></i>Profil Sekolah</h2>

<!-- Kata Pengantar -->
<div class="mb-4">
    <h4 class="text-primary mb-3">Kata Pengantar</h4>
    <p class="lead">
        Majalah Mingguan Digital SD N 2 Kalimendong

        Assalamu'alaikum Warahmatullahi Wabarakatuh,<br>
        Salam sejahtera untuk kita semua,<br><br>

        Dengan penuh rasa syukur kepada Allah SWT, kami dengan bangga mempersembahkan <em>Majalah Mingguan Digital [Nama Sekolah]</em> sebagai wadah komunikasi, informasi, dan inspirasi bagi seluruh keluarga besar sekolah kita.<br><br>
        Tujuan dan Manfaat<br>
        Majalah mingguan digital ini memiliki beberapa tujuan utama:<br>
        <ol>
        <li><strong>Transparansi Informasi</strong><br>
        Memberikan informasi terkini mengenai kegiatan sekolah, kebijakan pendidikan, dan program-program inovatif yang sedang berjalan.</li><br>
        <li><strong>Wadah Kreativitas Siswa</strong><br>
        Menyediakan platform bagi siswa untuk mengekspresikan bakat mereka dalam bidang jurnalistik, fotografi, desain, dan berbagai bentuk karya kreatif lainnya.</li><br>
        <li><strong>Dokumentasi Sejarah</strong><br>
        Merekam dan mendokumentasikan perjalanan sekolah, prestasi siswa, dan momen-momen bersejarah yang akan menjadi warisan berharga bagi generasi mendatang.</li><br>
        <li><strong>Penguatan Komunitas</strong><br>
        Mempererat hubungan antara sekolah, orang tua, alumni, dan masyarakat melalui sharing informasi dan pengalaman yang bermakna.</li><br>
        <li><strong>Edukasi Digital</strong><br>
        Mengajarkan literasi digital kepada siswa melalui keterlibatan langsung dalam proses produksi konten digital yang berkualitas.</li>
        </ol><br>
        Komitmen Kami<br>
        Sebagai kepala sekolah, saya berkomitmen untuk mendukung penuh pengembangan majalah ini. Kami akan memastikan bahwa setiap edisi menghadirkan konten yang:<br><br>
        - <em>Berkualitas dan Mendidik</em>: Setiap artikel dan konten telah melalui proses kurasi yang ketat untuk memastikan nilai edukatif dan keakuratan informasi.<br>
        - <em>Inspiratif dan Motivatif</em>: Menampilkan cerita-cerita sukses, profil tokoh inspiratif, dan pencapaian yang dapat memotivasi seluruh komunitas sekolah.<br>
        - <em>Relevan dan Kontekstual</em>: Menyajikan informasi yang sesuai dengan kebutuhan dan perkembangan zaman, serta relevan dengan kehidupan siswa dan keluarga.<br>
        - <em>Interaktif dan Engaging</em>: Memanfaatkan teknologi digital untuk menciptakan pengalaman membaca yang menarik dan interaktif.<br><br>
        Ajakan Berpartisipasi<br>
        Kesuksesan majalah ini tidak hanya bergantung pada tim redaksi, tetapi juga pada partisipasi aktif seluruh keluarga besar sekolah. Kami mengundang:<br><br>
        - <em>Siswa</em>: Untuk berkontribusi melalui tulisan, foto, karya seni, dan ide-ide kreatif<br>
        - <em>Guru dan Staff</em>: Untuk berbagi pengalaman, metodologi pembelajaran, dan inovasi pendidikan<br>
        - <em>Orang Tua</em>: Untuk memberikan masukan, saran, dan dukungan moral<br>
        - <em>Alumni</em>: Untuk berbagi pengalaman dan pencapaian sebagai inspirasi<br>
        - <em>Masyarakat</em>: Untuk memberikan feedback konstruktif dan dukungan<br><br>
        Harapan dan Doa<br>
        Kami berharap majalah digital ini dapat menjadi:<br>
        - Sumber informasi terpercaya bagi komunitas sekolah<br>
        - Wadah pembelajaran dan pengembangan talent siswa<br>
        - Media yang memperkuat nilai-nilai karakter dan akademik<br>
        - Platform yang mendorong inovasi dan kreativitas<br>
        - Dokumentasi perjalanan sekolah yang berharga<br><br>
        Semoga dengan rahmat Allah SWT, majalah mingguan digital ini dapat memberikan manfaat yang besar bagi kemajuan pendidikan di sekolah kita dan menjadi bagian penting dalam membentuk generasi yang cerdas, berkarakter, dan siap menghadapi tantangan masa depan.<br><br>
        Penutup<br>
        Terima kasih kepada seluruh tim redaksi, guru pembimbing, dan semua pihak yang telah bekerja keras mewujudkan majalah digital ini. Mari kita dukung bersama dan jadikan publikasi ini sebagai kebanggaan sekolah kita.<br><br>
        Selamat membaca, semoga bermanfaat!<br><br>
    

        Tri Suryati S.Pd.SD<br>
        Kepala Sekolah SD N 2 Kalimendong  <br>
        1 Oktober 2025<br><br>

        "Pendidikan adalah senjata paling ampuh yang dapat Anda gunakan untuk mengubah dunia" - Nelson Mandela
    </p>
</div>

                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-primary">Visi</h5>
                                <p>Di era digital yang terus berkembang pesat ini, kebutuhan akan informasi yang cepat, akurat, dan mudah diakses menjadi semakin penting. Sebagai lembaga pendidikan yang berkomitmen pada kemajuan dan inovasi, kami menyadari pentingnya membangun ekosistem komunikasi yang efektif antara sekolah, siswa, orang tua, dan masyarakat.Majalah digital ini hadir sebagai jembatan komunikasi yang menghubungkan berbagai elemen dalam komunitas sekolah kita. Melalui platform ini, kami berharap dapat menciptakan ruang dialog yang konstruktif, berbagi prestasi dan pencapaian, serta menyebarkan nilai-nilai positif yang menjadi fondasi pendidikan di sekolah kita.</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-primary">Misi</h5>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-check-circle text-success me-2"></i>Menyelenggarakan pendidikan yang berkualitas dan merata.</li>
                                    <li><i class="bi bi-check-circle text-success me-2"></i>Mengembangkan potensi siswa secara optimal.</li>
                                    <li><i class="bi bi-check-circle text-success me-2"></i>Mendorong kreativitas dan inovasi dalam pembelajaran.</li>
                                    <li><i class="bi bi-check-circle text-success me-2"></i>Membangun lingkungan sekolah yang kondusif dan menyenangkan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tim Redaksi Section -->
<section id="tim-redaksi" class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary">Tim Redaksi</h2>
                <p class="lead text-muted">Kenali tim di balik majalah digital ini</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm text-center team-card">
                    <div class="card-img-container">
                        <img src="css/tri_suryati.png" class="card-img-top rounded-circle" alt="Tri suryati" style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Tri Suryati S.Pd.SD</h5>
                        <p class="card-text text-muted">Penanggung jawab</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm text-center team-card">
                    <div class="card-img-container">
                        <img src="css/triyunitasari.png" class="card-img-top rounded-circle" alt="Triyunitasari" style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Triyunitasari,S.Pd.</h5>
                        <p class="card-text text-muted">Pimpinan redaksi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm text-center team-card">
                    <div class="card-img-container">
                        <img src="css/dwi_yulianto.png" class="card-img-top rounded-circle" alt="Dwi Yulianto" style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Dwi Yulianto,S.Pd.</h5>
                        <p class="card-text text-muted">Artistik</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm text-center team-card">
                    <div class="card-img-container">
                        <img src="css/lilis_sundari.png" class="card-img-top rounded-circle" alt="Lilis sundari" style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Lilis sundari,S.Pd.SD</h5>
                        <p class="card-text text-muted">Cover/ ilustrator</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm text-center team-card">
                    <div class="card-img-container">
                        <img src="css/utami_pagastuti.png" class="card-img-top rounded-circle" alt="utami pagastuti" style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Sari Utami Pagastuti,S.Pd</h5>
                        <p class="card-text text-muted">Layout / artistik</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold text-primary">Fitur Utama</h2>
                <p class="lead text-muted">Jelajahi berbagai konten dan informasi yang kami sediakan</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-newspaper display-4 text-primary"></i>
                        </div>
                        <h4 class="card-title fw-bold">Editorial</h4>
                        <p class="card-text text-muted">Baca berbagai editorial terbaru dari sekolah kami yang menginspirasi dan mendidik.</p>
                        <a href="{{ route('editorial') }}" class="btn btn-primary btn-lg mt-3">Kunjungi Editorial</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-megaphone display-4 text-success"></i>
                        </div>
                        <h4 class="card-title fw-bold">Berita</h4>
                        <p class="card-text text-muted">Dapatkan informasi berita terbaru dan penting dari kegiatan sekolah.</p>
                        <a href="{{ route('berita') }}" class="btn btn-success btn-lg mt-3">Kunjungi Berita</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-calendar-event display-4 text-warning"></i>
                        </div>
                        <h4 class="card-title fw-bold">Agenda</h4>
                        <p class="card-text text-muted">Lihat agenda kegiatan dan acara mendatang yang akan diadakan di sekolah.</p>
                        <a href="{{ route('agenda') }}" class="btn btn-warning btn-lg mt-3">Kunjungi Agenda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('styles')
<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.feature-icon {
    transition: transform 0.3s ease;
}

.hover-card:hover .feature-icon {
    transform: scale(1.1);
}

.team-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.team-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.card-img-container {
    padding: 20px 0;
}
</style>
@endpush
