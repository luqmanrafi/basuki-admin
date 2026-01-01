<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection("title", true) ?: "Admin Dashboard" ?> | Basuki</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bs-font-family: 'Poppins', sans-serif;
            --bs-primary: #00aaff;
            --bs-primary-rgb: 0, 170, 255;
        }

        body {
            font-size: .9rem;
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: #fff;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 48px;
                /* Height of the mobile navbar */
                width: 240px;
                height: calc(100vh - 48px);
                overflow-y: auto;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }
        }



        .sidebar-sticky {
            padding-top: 1rem;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
            padding: .75rem 1.5rem;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            margin-right: 1rem;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
            color: #888;
            transition: color 0.2s ease;
        }

        .sidebar .nav-link:hover i,
        .sidebar .nav-link.active i {
            color: var(--bs-primary);
        }

        .sidebar .nav-link.active {
            color: var(--bs-primary);
            background-color: rgba(var(--bs-primary-rgb), 0.05);
            border-left: 3px solid var(--bs-primary);
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
            padding: .5rem 1.5rem;
            margin-top: 1rem;
            color: #999;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.2rem;
            padding: 1.25rem 1.5rem;
            color: #333;
        }

        .navbar-light {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
        }

        main {
            padding-top: 2rem;
        }
    </style>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow d-md-none">
        <button class="navbar-toggler d-md-none collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">BASUKI</a>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky">
                    <a class="navbar-brand d-flex align-items-center" href="/admin/dashboard">
                        <i class="bi bi-hexagon-half me-2 text-primary"></i> BASUKI
                    </a>
                    <div class="sidebar-sticky">
                        <?php
                        $current_path = trim(service('request')->getUri()->getPath(), '/');
                        ?>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link <?= ($current_path == 'admin/dashboard') ? 'active' : '' ?>" aria-current="page" href="<?= site_url('admin/dashboard') ?>">
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= (str_starts_with($current_path, 'admin/mitra')) ? 'active' : '' ?>" href="<?= site_url('admin/mitra') ?>">
                                    <i class="bi bi-people-fill"></i>
                                    Mitra
                                </a>
                            </li>
                        </ul>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Account</span>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('logout') ?>">
                                    <i class="bi bi-box-arrow-left"></i>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                    <h1 class="h2 fw-light"><?= $this->renderSection("page_title") ?></h1>
                    <div class="btn-toolbar mb-2 mb-md-0">

                    </div>
                </div>

                <?= $this->renderSection("content") ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>