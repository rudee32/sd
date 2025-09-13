<!-- resources/views/layouts/public.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PELITA KALIMENDONG')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #8b5cf6;
            --accent-color: #06b6d4;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            scroll-behavior: smooth;
            line-height: 1.6;
            color: var(--gray-800);
        }

        /* Modern Typography */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            line-height: 1.2;
            color: var(--gray-900);
        }

        .display-1 { font-size: 4.5rem; font-weight: 800; }
        .display-2 { font-size: 3.75rem; font-weight: 800; }
        .display-3 { font-size: 3rem; font-weight: 700; }
        .display-4 { font-size: 2.25rem; font-weight: 700; }
        .display-5 { font-size: 1.875rem; font-weight: 700; }
        .display-6 { font-size: 1.5rem; font-weight: 700; }

        /* Modern Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 50%, var(--accent-color) 100%);
            color: white;
            padding: 120px 0 140px 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(255,255,255,0.1), transparent 70%);
            animation: float 8s ease-in-out infinite;
            z-index: 0;
        }

        .hero-section::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)"/><circle cx="800" cy="300" r="150" fill="url(%23a)"/><circle cx="400" cy="700" r="120" fill="url(%23a)"/><circle cx="900" cy="800" r="80" fill="url(%23a)"/></svg>');
            opacity: 0.3;
            z-index: 0;
        }

        @keyframes float {
            0%, 100% { transform: scale(1) rotate(0deg); opacity: 0.7; }
            50% { transform: scale(1.1) rotate(180deg); opacity: 0.4; }
        }

        .hero-section h1 {
            font-weight: 800;
            font-size: 4rem;
            letter-spacing: -0.025em;
            position: relative;
            z-index: 1;
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-section p {
            font-size: 1.375rem;
            margin-top: 20px;
            font-weight: 500;
            position: relative;
            z-index: 1;
            opacity: 0.95;
        }

        /* Modern Cards */
        .content-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 16px;
            border: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            background: white;
            overflow: hidden;
        }

        .content-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-2xl);
            border-color: var(--primary-color);
        }

        .card-title {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--gray-900);
            margin-bottom: 0.75rem;
        }

        .card-text {
            color: var(--gray-600);
            line-height: 1.6;
        }

        /* Modern Buttons */
        .btn {
            border-radius: 12px;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, var(--primary-dark) 0%, #3730a3 100%);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            box-shadow: var(--shadow-md);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
            box-shadow: var(--shadow-md);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        }

        /* Modern Footer */
        .footer {
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
            color: white;
            padding: 80px 0 40px 0;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
        }

        .footer h5 {
            font-weight: 800;
            margin-bottom: 20px;
            color: white;
        }

        .footer p {
            color: var(--gray-400);
            line-height: 1.6;
        }

        /* Modern Navbar */
        .navbar {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95) !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 0.75rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--secondary-color) !important;
            transform: scale(1.02);
        }

        .nav-link {
            font-weight: 500;
            color: var(--gray-700) !important;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 0.5rem; /* Increased horizontal margin for spacing */
            padding: 0.5rem 0.875rem !important;
            font-size: 0.95rem;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            background: rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }

        .nav-link.active {
            color: var(--primary-color) !important;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(147, 51, 234, 0.15));
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 2px;
            background: var(--primary-color);
            border-radius: 1px;
        }

        .nav-link i {
            margin-right: 0.5rem;
            font-size: 1rem;
        }

        /* Modern Dropdown */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.98);
            padding: 0.5rem 0;
            margin-top: 0.25rem;
            min-width: 220px; /* Increased min-width for better dropdown spacing */
            display: none;
            position: absolute;
            z-index: 1050;
            opacity: 0;
            transform: translateY(-5px);
            transition: all 0.2s ease;
        }

        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 0.625rem 1rem;
            margin: 0.125rem 0.5rem;
            transition: all 0.2s ease;
            font-weight: 500;
            color: var(--gray-700);
            text-decoration: none;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }

        .dropdown-item:hover {
            color: var(--primary-color);
            background: rgba(59, 130, 246, 0.1);
            transform: translateX(4px);
            text-decoration: none;
        }

        .dropdown-item i {
            margin-right: 0.625rem;
            font-size: 1rem;
            width: 16px;
            text-align: center;
        }

        .dropdown-header {
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.5rem 1rem 0.25rem;
            margin-bottom: 0.25rem;
            color: var(--primary-color);
        }

        .dropdown-divider {
            margin: 0.25rem 0.5rem;
            border-color: var(--gray-200);
            border-width: 1px;
        }

        .dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.375em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.25em solid;
            border-right: 0.25em solid transparent;
            border-bottom: 0;
            border-left: 0.25em solid transparent;
            transition: transform 0.2s ease;
        }

        .dropdown-toggle[aria-expanded="true"]::after {
            transform: rotate(180deg);
        }

        /* Mobile Menu Styling */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                border-radius: 12px;
                margin-top: 0.75rem;
                padding: 1rem;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }
            
            .nav-link {
                padding: 0.75rem 1rem;
                margin: 0.25rem 0;
                border-radius: 8px;
                font-size: 1rem;
                transition: all 0.2s ease;
            }

            .nav-link:hover {
                transform: translateX(4px);
                background: rgba(59, 130, 246, 0.1);
            }

            .dropdown-menu {
                position: static !important;
                transform: none !important;
                box-shadow: none;
                background: rgba(0, 0, 0, 0.02);
                border-radius: 8px;
                margin: 0.25rem 0;
                padding: 0.25rem 0;
            }

            .dropdown-item {
                padding: 0.625rem 1rem;
                margin: 0.125rem 0.5rem;
                border-radius: 6px;
                font-size: 0.9rem;
            }

            .navbar-toggler {
                border: none;
                padding: 0.375rem;
                border-radius: 6px;
                transition: all 0.2s ease;
            }

            .navbar-toggler:hover {
                background: rgba(59, 130, 246, 0.1);
                transform: scale(1.02);
            }

            .navbar-toggler:focus {
                box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            }
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section .lead {
                font-size: 1.1rem;
            }

            .content-card {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.95rem;
            }
        }

        /* Carousel Improvements */
        .carousel-control-prev, .carousel-control-next {
            width: 60px;
            height: 60px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
        }

        .carousel-control-prev:hover, .carousel-control-next:hover {
            background: rgba(0, 0, 0, 0.6);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 6px;
            transition: all 0.3s ease;
        }

        .carousel-indicators button.active {
            background: var(--primary-color);
            transform: scale(1.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0 100px 0;
            }
            
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .display-1 { font-size: 3rem; }
            .display-2 { font-size: 2.5rem; }
            .display-3 { font-size: 2rem; }
            
            .content-card {
                margin-bottom: 1.5rem;
            }
            
            .footer {
                padding: 60px 0 30px 0;
                text-align: center;
            }
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .slide-up {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        /* Loading States */
        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { left: -100%; }
            100% { left: 100%; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('css/logo.jpg') }}" alt="Logo" style="height: 30px; width: auto; margin-right: 8px;">
                <span class="fw-bold">PELITA KALIMENDONG</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door"></i> Beranda
                        </a>
                    </li>
                    
                    <!-- Literasi Corner -->
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
                        </ul>
                    </li>

                    <!-- Numerasi Zone -->
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

                    <!-- Kreativitas Siswa -->
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

                    <!-- Edutainment -->
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

                    <!-- Media & Informasi -->
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

                    <!-- Mobile Menu Items -->
                    <li class="nav-item dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle" href="#" id="mobileKontenDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-list"></i> Menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="mobileKontenDropdown">
                            <li><h6 class="dropdown-header text-primary"><i class="bi bi-collection"></i> Media</h6></li>
                            <li><a class="dropdown-item" href="{{ route('magazines.index') }}"><i class="bi bi-journal-bookmark me-2"></i>Majalah</a></li>
                            <li><a class="dropdown-item" href="{{ route('poems.index') }}"><i class="bi bi-heart me-2"></i>Puisi</a></li>

                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header text-warning"><i class="bi bi-book"></i> Literasi</h6></li>
                            <li><a class="dropdown-item" href="{{ route('literasi-corner') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Literasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('literasi.cerita-seru') }}"><i class="bi bi-book-half me-2"></i>Cerita Seru</a></li>
                            <li><a class="dropdown-item" href="{{ route('literasi.puisi-cilik') }}"><i class="bi bi-heart me-2"></i>Puisi Cilik</a></li>
                            <li><a class="dropdown-item" href="{{ route('literasi.baca-yuk') }}"><i class="bi bi-eye me-2"></i>Baca Yuk!</a></li>

                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header text-danger"><i class="bi bi-calculator"></i> Numerasi</h6></li>
                            <li><a class="dropdown-item" href="{{ route('numerasi-zone') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Numerasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('numerasi.angka-ajaib') }}"><i class="bi bi-magic me-2"></i>Angka Ajaib</a></li>
                            <li><a class="dropdown-item" href="{{ route('numerasi.bermain-hitung') }}"><i class="bi bi-dice-6 me-2"></i>Bermain Hitung</a></li>

                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header text-secondary"><i class="bi bi-palette"></i> Kreativitas</h6></li>
                            <li><a class="dropdown-item" href="{{ route('kreativitas-siswa') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Kreativitas</a></li>
                            <li><a class="dropdown-item" href="{{ route('kreativitas.karya-kita') }}"><i class="bi bi-star me-2"></i>Karya Kita</a></li>
                            <li><a class="dropdown-item" href="{{ route('kreativitas.bintang-minggu-ini') }}"><i class="bi bi-award me-2"></i>Bintang Minggu Ini</a></li>

                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header text-success"><i class="bi bi-joystick"></i> Edutainment</h6></li>
                            <li><a class="dropdown-item" href="{{ route('edutainment') }}"><i class="bi bi-grid-3x3-gap me-2"></i>Semua Edutainment</a></li>
                            <li><a class="dropdown-item" href="{{ route('edutainment.teka-teki-seru') }}"><i class="bi bi-question-circle me-2"></i>Teka-teki Seru</a></li>
                            <li><a class="dropdown-item" href="{{ route('edutainment.komik-edukasi') }}"><i class="bi bi-image me-2"></i>Komik Edukasi</a></li>

                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header text-info"><i class="bi bi-info-circle"></i> Informasi</h6></li>
                            <li><a class="dropdown-item" href="{{ route('editorial') }}"><i class="bi bi-newspaper me-2"></i>Editorial</a></li>
                            <li><a class="dropdown-item" href="{{ route('berita') }}"><i class="bi bi-megaphone me-2"></i>Berita</a></li>
                            <li><a class="dropdown-item" href="{{ route('agenda') }}"><i class="bi bi-calendar-event me-2"></i>Agenda</a></li>
                        </ul>
                    </li>

                    @auth
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link {{ request()->routeIs('upload.create') ? 'active' : '' }}" href="{{ route('upload.create') }}">
                                <i class="bi bi-cloud-upload"></i> Upload
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link {{ request()->routeIs('upload.my-uploads') ? 'active' : '' }}" href="{{ route('upload.my-uploads') }}">
                                <i class="bi bi-folder"></i> Upload Saya
                            </a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        <!-- Removed login admin link as per user request -->
                    @endguest
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-speedometer2"></i> Dashboard Admin
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>PELITA KALIMENDONG</h5>
                    <p>Portal digital untuk majalah dan puisi karya siswa sekolah dasar</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; {{ date('Y') }} PELITA KALIMENDONG. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');

            // Navbar scroll effect
            let lastScrollTop = 0;
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
                
                lastScrollTop = scrollTop;
            });

            // Enhanced dropdown functionality
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const dropdown = this.nextElementSibling;
                    const isOpen = dropdown.classList.contains('show');

                    // Close all other dropdowns
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        if (menu !== dropdown) {
                            menu.classList.remove('show');
                            menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                        }
                    });

                    // Toggle current dropdown
                    if (!isOpen) {
                        dropdown.classList.add('show');
                        this.setAttribute('aria-expanded', 'true');
                    } else {
                        dropdown.classList.remove('show');
                        this.setAttribute('aria-expanded', 'false');
                    }
                });

                // Hover effect for desktop
                if (window.innerWidth > 991) {
                    toggle.addEventListener('mouseenter', function() {
                        const dropdown = this.nextElementSibling;
                        // Close other dropdowns on hover
                        document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                            if (menu !== dropdown) {
                                menu.classList.remove('show');
                                menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                            }
                        });
                        dropdown.classList.add('show');
                        this.setAttribute('aria-expanded', 'true');
                    });

                    toggle.addEventListener('mouseleave', function() {
                        setTimeout(() => {
                            const dropdown = this.nextElementSibling;
                            if (!dropdown.matches(':hover')) {
                                dropdown.classList.remove('show');
                                this.setAttribute('aria-expanded', 'false');
                            }
                        }, 100);
                    });
                }
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown')) {
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        menu.classList.remove('show');
                    });
                    document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
                        toggle.setAttribute('aria-expanded', 'false');
                    });
                }
            });

            // Prevent navbar collapse from wrapping menu items
            const navbarNav = document.querySelector('.navbar-nav.me-auto');
            if (navbarNav) {
                navbarNav.style.flexWrap = 'nowrap';
                navbarNav.style.overflowX = 'auto';
                navbarNav.style.scrollBehavior = 'smooth';
            }

            // Mobile menu toggle
            if (navbarToggler && navbarCollapse) {
                navbarToggler.addEventListener('click', function() {
                    navbarCollapse.classList.toggle('show');
                    this.setAttribute('aria-expanded', navbarCollapse.classList.contains('show'));
                });
            }

            // Close mobile menu when clicking on links
            const mobileLinks = document.querySelectorAll('.navbar-collapse .nav-link, .navbar-collapse .dropdown-item');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        navbarCollapse.classList.remove('show');
                        if (navbarToggler) {
                            navbarToggler.setAttribute('aria-expanded', 'false');
                        }
                    }
                });
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add loading animation to buttons
            document.querySelectorAll('.btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (this.type === 'submit' || this.classList.contains('btn-primary')) {
                        this.classList.add('loading');
                        setTimeout(() => {
                            this.classList.remove('loading');
                        }, 2000);
                    }
                });
            });

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            document.querySelectorAll('.content-card, .hero-section, .card').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
