<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Edit Mitra<?= $this->endSection() ?>

<?= $this->section('page_title') ?>Edit Mitra<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="<?= site_url('admin/mitra/update/' . $mitra['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $mitra['name'] ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="jobs" class="form-label">Job</label>
                        <input type="text" class="form-control" id="jobs" name="jobs" value="<?= old('jobs', $mitra['jobs'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"><?= old('address', $mitra['address'] ?? '') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= old('phone', $mitra['phone'] ?? '') ?>">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Mitra</button>
                        <a href="<?= site_url('admin/mitra') ?>" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
