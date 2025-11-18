<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Mitra Dashboard<?= $this->endSection() ?>

<?= $this->section('page_title') ?>Mitra Management<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 pt-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="card-title">Mitra List</h3>
                    </div>
                    <div class="col text-end">
                        <a href="<?= site_url('admin/mitra/new') ?>" class="btn btn-primary">Add New Mitra</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Job</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Joined Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mitra) && is_array($mitra)) : ?>
                                <?php foreach ($mitra as $item) : ?>
                                    <tr>
                                        <td>
                                            <p class="fw-bold mb-1"><?= !empty($item['name']) ? esc($item['name']) : '-' ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0"><?= !empty($item['jobs']) ? esc($item['jobs']) : '-' ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0"><?= !empty($item['address']) ? esc($item['address']) : '-' ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0"><?= !empty($item['phone']) ? esc($item['phone']) : '-' ?></p>
                                        </td>
                                        <td><?= esc(date('d M Y', strtotime($item['created_at']))) ?></td>
                                        <td class="text-end">
                                            <a href="<?= site_url('admin/mitra/' . $item['id']) ?>" class="btn btn-light btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                            <form action="<?= site_url('admin/mitra/' . $item['id']) ?>" method="post" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-light btn-sm text-danger" onclick="return confirm('Are you sure you want to delete this mitra?');"><i class="bi bi-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4">No mitra data found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
