<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Basuki Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-left">
        <h1>Selamat Datang Kembali.</h1>
        <p>Masuk untuk mengakses dasbor Anda dan mulai mengelola data dengan mudah.</p>
    </div>
    <div class="auth-right">
        <div class="auth-form">
            <h2>Login</h2>
            <p class="text-muted">Silakan masukkan kredensial Anda.</p>

            <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger mb-3"><?= esc(session('error')) ?></div>
            <?php endif; ?>
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success mb-3"><?= esc(session('success')) ?></div>
            <?php endif; ?>

            <form action="/login" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="login" class="form-label">Email atau Username</label>
                    <input type="text" class="form-control" id="login" name="login" value="<?= old('login') ?>" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="text-muted">Belum punya akun? <a href="/register" class="auth-link">Register di sini</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
