<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <h4 class="card-title"><?= $subtitle . ' ' . $title ?></h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->include('template/session') ?>
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url() ?>/group/update/<?= $group->id ?>" method="POST" id="myForm">
                            <input type="text" class="form-control <?= ($validation->hasError('nama_group')) ? 'is-invalid' : ''; ?>" name="nama_group" id="nama_group" placeholder="Nama Group" value="<?= old('nama_group', $group->nama_group); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_group'); ?> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-primary btn-sm" onclick="submit();">Submit</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>