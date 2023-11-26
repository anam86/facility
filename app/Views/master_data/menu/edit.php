<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col d-flex align-items-center justify-content-between">
                        <h4 class="card-title"><?= $subtitle . ' ' . $title ?></h4>
                        <div>
                            <a href="<?= base_url() . '/' . current_url(true)->getSegment(2) ?>">
                                <button type="button" class="btn btn-sm btn-primary">Back</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->include('template/session') ?>
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url() ?>/menu/update/<?= $menu->id ?>" method="POST" id="myForm">
                            <?= csrf_field() ?>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_menu')) ? 'is-invalid' : ''; ?>" name="nama_menu" id="nama_menu" placeholder="Nama Group" value="<?= old('nama_menu', $menu->nama_menu); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_menu'); ?> 
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