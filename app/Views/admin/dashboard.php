<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Dashboard Overview
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-6 col-md-6 col-lg-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Mitra</div>
            <div class="card-body">
                <h5 class="card-title display-6"><?= $totalMitra ?></h5>
                <p class="card-text">Mitra terdaftar</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Total Users</div>
            <div class="card-body">
                <h5 class="card-title display-6"><?= $totalUsers ?></h5>
                <p class="card-text">System Administrators</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Monthly Growth (Mitra bergabung)</h5>
            </div>
            <div class="card-body">
                <canvas id="mitraGrowthChart" height="130"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Mitra Terbaru</h5>
            </div>
            <div class="list-group list-group-flush">
                <?php if (!empty($recentMitra)): ?>
                    <?php foreach ($recentMitra as $mitra): ?>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1"><?= esc($mitra['name']) ?></h6>
                                <small class="text-muted"><?= date('d M', strtotime($mitra['created_at'])) ?></small>
                            </div>
                            <p class="mb-1 small text-muted"><?= esc($mitra['jobs'] ?? '-') ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="list-group-item text-center text-muted">No data available</div>
                <?php endif; ?>
            </div>
            <div class="card-footer bg-white text-center">
                <a href="<?= site_url('admin/mitra') ?>" class="text-decoration-none">View All Mitra</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('mitraGrowthChart').getContext('2d');
    const chartLabels = <?= $chartLabels ?>;
    const chartData = <?= $chartData ?>;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'New Mitra',
                data: chartData,
                backgroundColor: 'rgba(0, 170, 255, 0.2)',
                borderColor: 'rgba(0, 170, 255, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>