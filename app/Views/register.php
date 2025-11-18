<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Basuki Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-left">
        <h1>Bergabunglah dengan Kami.</h1>
        <p>Buat akun baru untuk mulai mengelola bisnis Anda dengan lebih efisien.</p>
    </div>
    <div class="auth-right">
        <div class="auth-form">
            <h2>Register</h2>
            <p class="text-muted">Isi form di bawah untuk membuat akun baru.</p>

            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0">
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/register" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Buat Akun</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="text-muted">Sudah punya akun? <a href="/login" class="auth-link">Login di sini</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
