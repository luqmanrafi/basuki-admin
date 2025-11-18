<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h4>Welcome to the Dashboard</h4>
    </div>
    <div class="card-body">
        <p>This is the admin dashboard.</p>
    </div>
</div>
<?= $this->endSection() ?>