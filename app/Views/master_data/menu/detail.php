<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Record <?= $title ?></h4>
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
                <table id="myTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">#</th>
                            <th>Nama Menu</th>
                            <?php if ($gmenu->allow_edit == true || $gmenu->allow_delete == true) : ?>
                            <th width="10%">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($menus as $key => $menu):
                            if ($menu->urutan == "#") { continue; }
                        ?>
                        <tr class="text-center">
                            <td><?= $i++ ?></td>
                            <td><?= $menu->nama_menu ?></td>
                            <?php if ($gmenu->allow_edit == true || $gmenu->allow_delete == true) : ?>
                            <td>
                                <?php if ($gmenu->allow_edit == true) : ?>
                                <a href="<?= base_url() . "/menu/edit/" . $menu->id ?>" class="btn btn-sm btn-primary"><i class="las la-pen font-18"></i></a>
                                <?php
                                    endif;
                                    if ($gmenu->allow_delete == true) :
                                ?>
                                <form class="d-inline-block" action="<?= base_url() ?>/menu/<?= $menu->id ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="las la-trash-alt font-18"></i></button>
                                </form>
                                <?php endif; ?>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>