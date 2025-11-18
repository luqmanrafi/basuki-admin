<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Welcome to Basuki Admin<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .hero-section {
        background: radial-gradient(ellipse at bottom, #002244, #101418);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="hero-section text-center text-white">
    <div class="container col-lg-6 mx-auto">
        <h1 class="display-4 fw-bold">Basuki Admin</h1>
        <p class="lead my-4">Silakan login atau register untuk melanjutkan ke dashboard.</p>
        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="<?= site_url('login') ?>" class="btn btn-primary btn-lg rounded-pill px-4 gap-3">Login</a>
            <a href="<?= site_url('register') ?>" class="btn btn-outline-light btn-lg rounded-pill px-4">Register</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
