<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Basuki Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header">
            Basuki
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/admin/dashboard">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/mitra">
                    <i class="bi bi-people-fill"></i> Mitra
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/users">
                    <i class="bi bi-person-fill"></i> Users
                </a>
            </li>
            <li class="nav-item mt-auto mb-3">
                <a class="nav-link" href="/logout">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">

            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <h2>Selamat Datang di Dasbor Anda</h2>
                <p>Pilih menu dari sidebar untuk memulai.</p>
            </div>

            <div class="text-center p-5">
                <img src="https://raw.githubusercontent.com/CodeIgniter/website/develop/public/assets/images/ci-logo-big.png" alt="CodeIgniter Logo" style="max-width: 200px; opacity: 0.5;">
                <h3 class="mt-4 text-muted">Gunakan navigasi di sebelah kiri untuk mengelola data Anda.</h3>
            </div>

        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
