<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection("title", true) ?: "Basuki Admin" ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --bs-body-font-family: 'Poppins', sans-serif;
            --bs-body-bg: #101418;
            --bs-primary: #00aaff;
            --bs-primary-rgb: 0, 170, 255;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--bs-body-bg);
        }

        main {
            flex: 1;
        }

        .navbar-glass {
            background-color: rgba(22, 28, 34, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-primary {
            --bs-btn-bg: var(--bs-primary);
            --bs-btn-border-color: var(--bs-primary);
            --bs-btn-hover-bg: #0077b3;
            --bs-btn-hover-border-color: #0077b3;
        }
        
        .footer {
            background-color: rgba(10, 12, 14, 0.5);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-glass sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= site_url('/') ?>">
            <i class="bi bi-hexagon-half me-2"></i>
            BASUKI
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="nav-link" href="<?= site_url('login') ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary rounded-pill px-3" href="<?= site_url('register') ?>">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <?= $this->renderSection("content") ?>
</main>

<footer class="footer mt-auto py-4">
    <div class="container text-center">
        <span class="text-body-secondary">© 2025 Basuki, Inc. Modern solutions for modern problems.</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
