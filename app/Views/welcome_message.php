<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basuki Admin - Platform Manajemen Terdepan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/landing.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Basuki</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Harga</a></li>
                </ul>
                <div class="d-flex">
                    <a href="/login" class="btn btn-outline-primary me-2">Login</a>
                    <a href="/register" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h1 class="display-4">Platform Manajemen Terdepan untuk Bisnis Anda</h1>
                    <p class="lead my-4">Kelola semua data mitra, pantau aktivitas, dan tingkatkan efisiensi operasional dengan satu dasbor yang intuitif dan kuat.</p>
                    <div class="hero-buttons">
                        <a href="/register" class="btn btn-primary btn-lg">Mulai Gratis</a>
                        <a href="#features" class="btn btn-link text-dark">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Custom SVG Illustration -->
                    <svg class="hero-svg" viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#dbeafe;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#bfdbfe;stop-opacity:1" />
                            </linearGradient>
                            <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#1d4ed8;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <rect x="50" y="50" width="400" height="300" rx="20" fill="url(#grad1)" />
                        <rect x="70" y="80" width="150" height="20" rx="5" fill="#ffffff" />
                        <rect x="70" y="120" width="100" height="10" rx="3" fill="#93c5fd" />
                        <rect x="70" y="140" width="120" height="10" rx="3" fill="#93c5fd" />
                        <rect x="250" y="80" width="180" height="120" rx="10" fill="#ffffff" />
                        <path d="M265 120 l30 20 l40 -30 l50 40" stroke="url(#grad2)" stroke-width="4" fill="none" stroke-linecap="round"/>
                        <circle cx="295" cy="140" r="5" fill="#3b82f6"/>
                        <circle cx="335" cy="110" r="5" fill="#3b82f6"/>
                        <rect x="70" y="180" width="150" height="50" rx="10" fill="#ffffff" />
                        <rect x="70" y="250" width="150" height="50" rx="10" fill="#ffffff" />
                        <rect x="250" y="220" width="180" height="80" rx="10" fill="url(#grad2)" />
                        <rect x="265" y="240" width="80" height="10" rx="3" fill="#dbeafe" />
                        <rect x="265" y="260" width="50" height="10" rx="3" fill="#93c5fd" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-5">
                    <div class="icon-box"><i class="bi bi-grid-1x2-fill"></i></div>
                    <h3>Dasbor Intuitif</h3>
                    <p>Lihat semua data penting dalam satu tampilan yang mudah dipahami dan dinavigasi.</p>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="icon-box"><i class="bi bi-people-fill"></i></div>
                    <h3>Manajemen Mitra</h3>
                    <p>Kelola data mitra, pantau kinerja, dan jalin hubungan yang lebih baik dengan mudah.</p>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="icon-box"><i class="bi bi-bar-chart-line-fill"></i></div>
                    <h3>Laporan Analitik</h3>
                    <p>Dapatkan wawasan berharga dari data Anda dengan laporan dan analitik yang kuat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5>Basuki</h5>
                    <p>Platform manajemen terdepan untuk membantu bisnis Anda tumbuh lebih cepat dan efisien.</p>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1">
                    <h5>Produk</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Fitur</a></li>
                        <li><a href="#">Harga</a></li>
                        <li><a href="#">Integrasi</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h5>Perusahaan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <p class="text-center text-muted">&copy; <?= date('Y') ?> Basuki. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
