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
                    <div class="col-12 col-md">
                        <h3 class="card-title">Mitra List</h3>
                    </div>
                    <div class="col-12 col-md-auto mt-3 mt-md-0">
                        <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                                <i class="bi bi-file-earmark-spreadsheet"></i> Import Excel
                            </button>

                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-download"></i> Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= site_url('/admin/mitra/export_pdf') ?>"><i class="bi bi-file-pdf text-danger"></i> PDF</a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('/admin/mitra/export_docx') ?>"><i class="bi bi-file-word text-primary"></i> Word (DOCX)</a></li>
                                </ul>
                            </div>

                            <a href="<?= site_url('admin/mitra/new') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add New</a>
                        </div>
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
                                            <p class="fw-bold mb-1"><?= esc($item['name'] ?? '-') ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0"><?= esc($item['jobs'] ?? '-') ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0"><?= esc($item['address'] ?? '-') ?></p>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0"><?= esc($item['phone'] ?? '-') ?></p>
                                        </td>
                                        <td><?= esc(date('d M Y', strtotime($item['created_at']))) ?></td>
                                        <td class="text-end">
                                            <a href="<?= site_url('admin/mitra/' . $item['id']) ?>" class="btn btn-light btn-sm"><i class="bi bi-pencil-square"></i></a>
                                            <form action="<?= site_url('admin/mitra/' . $item['id']) ?>" method="post" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-light btn-sm text-danger" onclick="return confirm('Are you sure?');"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4">No data.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data Mitra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('admin/mitra/proses_import') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="alert alert-info small">
                        <i class="bi bi-info-circle"></i> Pastikan format file Excel (.xls/.xlsx) sesuai:
                        <br><strong>Kolom A:</strong> Nama | <strong>Kolom B:</strong> Pekerjaan
                        <br><strong>Kolom C:</strong> Alamat | <strong>Kolom D:</strong> No. HP
                    </div>
                    <div class="mb-3">
                        <label for="file_excel" class="form-label">Pilih File Excel</label>
                        <input class="form-control" type="file" id="file_excel" name="file_excel" accept=".xls,.xlsx" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>