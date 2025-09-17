<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/user-landing') }}">
            <img src="{{ asset('css/logo.jpg') }}" alt="Logo" style="height: 30px; width: auto; margin-right: 8px;">
            <span class="fw-bold text-primary">PELITA KALIMENDONG</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto flex-nowrap overflow-auto" style="scroll-behavior: smooth;">
                @auth
                    @if(Auth::user()->role === 'admin')
                        <!-- Admin Navigation -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="adminContentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-file-text"></i> Konten
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="adminContentDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.contents.index') }}"><i class="bi bi-list me-2"></i>Semua Konten</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.contents.create') }}"><i class="bi bi-plus-circle me-2"></i>Tambah Konten</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('admin.menu_features.index') }}"><i class="bi bi-star me-2"></i>Menu Feature</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="adminUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-people"></i> Pengguna
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="adminUserDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.visitors.index') }}"><i class="bi bi-eye me-2"></i>Pengunjung</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.index') }}"><i class="bi bi-person-circle me-2"></i>Manajemen User</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/comments*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
                                <i class="bi bi-chat-dots me-1"></i>Komentar
                            </a>
                        </li>
                    @else
                        <!-- Regular User Navigation -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/user-landing') }}">
                                <i class="bi bi-house-door me-1"></i>Beranda
                            </a>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="literasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-book"></i> Literasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="literasiDropdown">
                                <li><a class="dropdown-item" href="{{ route('literasi-corner') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Literasi</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.cerita-seru') }}"><i class="bi bi-book-half me-2"></i>Cerita Seru</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.puisi-cilik') }}"><i class="bi bi-heart me-2"></i>Puisi Cilik</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.baca-yuk') }}"><i class="bi bi-eye me-2"></i>Baca Yuk!</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.kata-baru') }}"><i class="bi bi-chat-quote me-2"></i>Kata Baru</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.olahraga') }}"><i class="bi bi-basket3 me-2"></i>Olahraga</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.ekstrakulikuler') }}"><i class="bi bi-people me-2"></i>Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.keagamaan') }}"><i class="bi bi-journal-text me-2"></i>Keagamaan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="numerasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-calculator"></i> Numerasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="numerasiDropdown">
                                <li><a class="dropdown-item" href="{{ route('numerasi-zone') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Numerasi</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('numerasi.angka-ajaib') }}"><i class="bi bi-magic me-2"></i>Angka Ajaib</a></li>
                                <li><a class="dropdown-item" href="{{ route('numerasi.bermain-hitung') }}"><i class="bi bi-dice-6 me-2"></i>Bermain Hitung</a></li>
                                <li><a class="dropdown-item" href="{{ route('numerasi.cerita-matematika') }}"><i class="bi bi-book me-2"></i>Cerita Matematika</a></li>
                                <li><a class="dropdown-item" href="{{ route('numerasi.tips-hitung-cepat') }}"><i class="bi bi-lightbulb me-2"></i>Tips Hitung Cepat</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="kreativitasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-palette"></i> Kreativitas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="kreativitasDropdown">
                                <li><a class="dropdown-item" href="{{ route('kreativitas-siswa') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Kreativitas</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('kreativitas.karya-kita') }}"><i class="bi bi-star me-2"></i>Karya Kita</a></li>
                                <li><a class="dropdown-item" href="{{ route('kreativitas.bintang-minggu-ini') }}"><i class="bi bi-award me-2"></i>Bintang Minggu Ini</a></li>
                                <li><a class="dropdown-item" href="{{ route('kreativitas.foto-kegiatan') }}"><i class="bi bi-camera me-2"></i>Foto Kegiatan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="edutainmentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-joystick"></i> Edutainment
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="edutainmentDropdown">
                                <li><a class="dropdown-item" href="{{ route('edutainment') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Edutainment</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('edutainment.teka-teki-seru') }}"><i class="bi bi-question-circle me-2"></i>Teka-teki Seru</a></li>
                                <li><a class="dropdown-item" href="{{ route('edutainment.komik-edukasi') }}"><i class="bi bi-image me-2"></i>Komik Edukasi</a></li>
                                <li><a class="dropdown-item" href="{{ route('edutainment.fun-facts') }}"><i class="bi bi-lightning me-2"></i>Fun Facts</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="mediaInfoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-collection"></i> Lainnya
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="mediaInfoDropdown">
                                <li><h6 class="dropdown-header text-primary"><i class="bi bi-collection"></i> Media</h6></li>
                                <li><a class="dropdown-item" href="{{ route('magazines.index') }}"><i class="bi bi-journal-bookmark me-2"></i>Majalah</a></li>
                                <li><a class="dropdown-item" href="{{ route('poems.index') }}"><i class="bi bi-heart me-2"></i>Puisi</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><h6 class="dropdown-header text-info"><i class="bi bi-info-circle"></i> Informasi</h6></li>
                                <li><a class="dropdown-item" href="{{ route('editorial') }}"><i class="bi bi-newspaper me-2"></i>Editorial</a></li>
                                <li><a class="dropdown-item" href="{{ route('berita') }}"><i class="bi bi-megaphone me-2"></i>Berita</a></li>
                                <li><a class="dropdown-item" href="{{ route('agenda') }}"><i class="bi bi-calendar-event me-2"></i>Agenda</a></li>
                            </ul>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link {{ Request::is('upload/create') ? 'active' : '' }}" href="{{ route('upload.create') }}">
                                <i class="bi bi-cloud-upload"></i> Upload
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link {{ Request::is('upload/my-uploads') ? 'active' : '' }}" href="{{ route('upload.my-uploads') }}">
                                <i class="bi bi-folder"></i> Upload Saya
                            </a>
                        </li>
                    @endif
                    @else
                        <!-- Guest Navigation -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                                <i class="bi bi-house-door me-1"></i>Beranda
                            </a>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="literasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-book"></i> Literasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="literasiDropdown">
                                <li><a class="dropdown-item" href="{{ route('literasi-corner') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Literasi</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.cerita-seru') }}"><i class="bi bi-book-half me-2"></i>Cerita Seru</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.puisi-cilik') }}"><i class="bi bi-heart me-2"></i>Puisi Cilik</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.baca-yuk') }}"><i class="bi bi-eye me-2"></i>Baca Yuk!</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.kata-baru') }}"><i class="bi bi-chat-quote me-2"></i>Kata Baru</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.olahraga') }}"><i class="bi bi-basket3 me-2"></i>Olahraga</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.ekstrakulikuler') }}"><i class="bi bi-people me-2"></i>Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="{{ route('literasi.keagamaan') }}"><i class="bi bi-journal-text me-2"></i>Keagamaan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="numerasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-calculator"></i> Numerasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="numerasiDropdown">
                                <li><a class="dropdown-item" href="{{ route('numerasi-zone') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Numerasi</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('numerasi.angka-ajaib') }}"><i class="bi bi-magic me-2"></i>Angka Ajaib</a></li>
                                <li><a class="dropdown-item" href="{{ route('numerasi.bermain-hitung') }}"><i class="bi bi-dice-6 me-2"></i>Bermain Hitung</a></li>
                                <li><a class="dropdown-item" href="{{ route('numerasi.cerita-matematika') }}"><i class="bi bi-book me-2"></i>Cerita Matematika</a></li>
                                <li><a class="dropdown-item" href="{{ route('numerasi.tips-hitung-cepat') }}"><i class="bi bi-lightbulb me-2"></i>Tips Hitung Cepat</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="kreativitasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-palette"></i> Kreativitas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="kreativitasDropdown">
                                <li><a class="dropdown-item" href="{{ route('kreativitas-siswa') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Kreativitas</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('kreativitas.karya-kita') }}"><i class="bi bi-star me-2"></i>Karya Kita</a></li>
                                <li><a class="dropdown-item" href="{{ route('kreativitas.bintang-minggu-ini') }}"><i class="bi bi-award me-2"></i>Bintang Minggu Ini</a></li>
                                <li><a class="dropdown-item" href="{{ route('kreativitas.foto-kegiatan') }}"><i class="bi bi-camera me-2"></i>Foto Kegiatan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="edutainmentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-joystick"></i> Edutainment
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="edutainmentDropdown">
                                <li><a class="dropdown-item" href="{{ route('edutainment') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Edutainment</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('edutainment.teka-teki-seru') }}"><i class="bi bi-question-circle me-2"></i>Teka-teki Seru</a></li>
                                <li><a class="dropdown-item" href="{{ route('edutainment.komik-edukasi') }}"><i class="bi bi-image me-2"></i>Komik Edukasi</a></li>
                                <li><a class="dropdown-item" href="{{ route('edutainment.fun-facts') }}"><i class="bi bi-lightning me-2"></i>Fun Facts</a></li>
                            </ul>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if(Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-speedometer2"></i> Dashboard Admin
                                    </a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
