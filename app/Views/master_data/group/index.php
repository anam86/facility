<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <h4 class="card-title">Record <?= $title ?></h4>
                    </div>
                    <div class="col text-right">
                        <?php if ($gmenu->allow_create == true) : ?>
                        <a href="<?= base_url() . "/group/create" ?>" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i>Tambah</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->include('template/session') ?>
                <table id="myTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">#</th>
                            <th>Nama Group</th>
                            <?php if ($gmenu->allow_edit == true || $gmenu->allow_delete == true) : ?>
                            <th width="10%">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($group as $key => $value):
                            if ($value->id == 1) { continue; }
                        ?>
                        <tr class="text-center">
                            <td><?= $i++ ?></td>
                            <td><?= $value->nama_group ?></td>
                            <?php if ($gmenu->allow_edit == true || $gmenu->allow_delete == true) : ?>
                            <td>
                                <?php if ($gmenu->allow_edit == true) : ?>
                                <a href="<?= base_url() . "/group/edit/" . $value->id ?>"><i class="las la-pen text-info font-18"></i></a>
                                <?php
                                    endif;
                                    if ($gmenu->allow_delete == true) :
                                ?>
                                <form class="d-inline" action="<?= base_url() ?>/group/<?= $value->id ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="border-0 bg-white" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="las la-trash-alt text-danger font-18"></i></button>
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