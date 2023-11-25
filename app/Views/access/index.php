<?= $this->extend('template/template') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php $c = 1; ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col d-flex justify-content-between align-items-center">
                        <h4 class="card-title">List</h4>
                        <div>
                            <button type="reset" class="btn btn-sm btn-secondary" form="accessForm">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary" form="accessForm">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->include('template/session') ?>
                <form action="<?= base_url() ?>/access/update" method="post" id="accessForm">
                    <?= csrf_field() ?>
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($groups as $key => $group) : if($group->nama_group == "Superadmin") {continue;} ?>
                        <div class="card border mb-1 shadow-none">
                            <div class="card-header <?= ($key == 1) ? "custom-accordion" : "" ?> rounded-0" id="heading-<?= $key ?>">
                                <a class="<?= ($key == 1) ? "" : "collapsed " ?>text-dark" data-toggle="collapse" data-target="#collapse-<?= $key ?>" aria-expanded="<?= ($key == 1) ? "true" : "false" ?>" aria-controls="collapse-<?= $key ?>" style="cursor: pointer;">
                                    <?= $group->nama_group ?>
                                </a>
                            </div>
                            <div id="collapse-<?= $key ?>" class="collapse<?= ($key == 1) ? " show" : "" ?>" aria-labelledby="heading-<?= $key ?>" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <tr>
                                            <th width="30%">Menu Name</th>
                                            <th width="10%">View</th>
                                            <th width="10%">Create</th>
                                            <th width="10%">Edit</th>
                                            <th width="10%">Delete</th>
                                            <th width="10%">Import</th>
                                            <th width="10%">Export</th>
                                            <th width="10%">Full Access</th>
                                        </tr>
                                        <?php foreach ($menus as $i => $menu) : ?>
                                        <input type="hidden" name="data[<?= $c ?>][id_group]" value="<?= $group->id ?>">
                                        <input type="hidden" name="data[<?= $c ?>][id_menu]" value="<?= $menu->id ?>">
                                        <?php if ($menu->urutan == "#") : ?>
                                        <tr><th class="bg-light" colspan="8"><?= $menu->nama_menu ?></th></tr>
                                        <?php endif ?>
                                        <tr>
                                            <td><?= $menu->nama_menu ?></td>
                                            <?php foreach ($gmenus as $n => $gmenu) : ?>
                                            <?php if ($gmenu->id_group != $group->id or $gmenu->id_menu != $menu->id) { continue; } ?>
                                            <td><input type="checkbox" class="akses-<?= $c ?>" name="data[<?= $c ?>][allow_view]" value="1" <?= $gmenu->allow_view == 1 ? "checked" : "" ?> onclick="someAccess(this.checked,<?= $c ?>);"></td>
                                            <?php if ($menu->nama_url == "#") : ?>
                                            <td><input type="checkbox" disabled></td>
                                            <td><input type="checkbox" disabled></td>
                                            <td><input type="checkbox" disabled></td>
                                            <td><input type="checkbox" disabled></td>
                                            <td><input type="checkbox" disabled></td>
                                            <td><input type="checkbox" disabled></td>
                                            <?php else : ?>
                                            <td><input type="checkbox" class="akses-<?= $c ?>" name="data[<?= $c ?>][allow_create]" value="1" <?= $gmenu->allow_create == 1 ? "checked" : "" ?> onclick="someAccess(this.checked,<?= $c ?>);"></td>
                                            <td><input type="checkbox" class="akses-<?= $c ?>" name="data[<?= $c ?>][allow_edit]" value="1" <?= $gmenu->allow_edit == 1 ? "checked" : "" ?> onclick="someAccess(this.checked,<?= $c ?>);"></td>
                                            <td><input type="checkbox" class="akses-<?= $c ?>" name="data[<?= $c ?>][allow_delete]" value="1" <?= $gmenu->allow_delete == 1 ? "checked" : "" ?> onclick="someAccess(this.checked,<?= $c ?>);"></td>
                                            <td><input type="checkbox" class="akses-<?= $c ?>" name="data[<?= $c ?>][allow_import]" value="1" <?= $gmenu->allow_import == 1 ? "checked" : "" ?> onclick="someAccess(this.checked,<?= $c ?>);"></td>
                                            <td><input type="checkbox" class="akses-<?= $c ?>" name="data[<?= $c ?>][allow_export]" value="1" <?= $gmenu->allow_export == 1 ? "checked" : "" ?> onclick="someAccess(this.checked,<?= $c ?>);"></td>
                                            <td><input type="checkbox" id="fAcc-<?= $c ?>" onclick="fullAccess(this.checked,<?= $c ?>);"></td>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php $c++ ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    let c = <?= json_encode($c) ?>;
    for (let i = 1; i <= c; i++) {
        if (cekAkses(i) == 6) {
            $("#fAcc-" + i).prop("checked",true)
        }
    }
    function someAccess(x,y) {
        if (x == true) {
            if (cekAkses(y) == 6) {
                $("#fAcc-" + y).prop("checked",true)
            }
        } else {
            $("#fAcc-" + y).prop("checked",false)
        }
    }
    function fullAccess(x,y) {
        if (x == true) {
            $(".akses-" + y).prop("checked",true)
        } else {
            $(".akses-" + y).prop("checked",false)
        }
    }
    function cekAkses(x) {
        let i = 0
        $(".akses-" + x).each(function() {
            if ($(this).prop("checked") == true) { i++ }
        })
        return i
    }
</script>
<?= $this->endSection() ?>