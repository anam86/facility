<div class="left-sidenav">
    
    <div class="brand">
        <a href="<?= base_url('/') ?>" class="logo">
            <span>
                <img src="<?= base_url() ?>/dastone/dastone-1/default/assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
            <span>
                <img src="<?= base_url() ?>/dastone/dastone-1/default/assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                <img src="<?= base_url() ?>/dastone/dastone-1/default/assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main Menu</li>
            <li>
                <a href="<?= base_url('/') ?>"><i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
            </li>
            <?php
                use App\Models\GroupMenuModel;
                $menu = new GroupMenuModel();

                $hMenu = $menu->getAllMenu("#");
                if ($hMenu[0]->allow_view) { echo '<hr class="hr-dashed hr-menu">'; } else { ""; }
                
                foreach ($hMenu as $key => $value):
                if ($value->allow_view != 1) { continue; }
            ?>
            <li <?php if (isset($active) == True) { echo 'class="mm-active"'; } ?>>
                <?php
                    if ($value->nama_url == "#"):
                    $sMenu = $menu->getAllMenu($value->kategori);
                ?>
                <a href="<?= $value->nama_url ?>"><i data-feather="<?= $value->ikon ?>" class="align-self-center menu-icon"></i><span><?= $value->nama_menu ?></span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level <?php if (isset($active) == True) { echo "mm-show"; } ?>" aria-expanded="false">
                <?php foreach ($sMenu as $i => $val): ?>
                    <?php if ($val->allow_view != 1) { continue; } ?>
                    <?php if (isset($subtitle) == True && isset($active) == True && $val->nama_url == "/" . strtolower($title)): ?>
                    <li class="nav-item <?= $active ?>"><a class="nav-link <?= $active ?>" href="<?= base_url() . $val->nama_url ?>"><i class="<?= $val->ikon ?>"></i><?= $val->nama_menu ?></a></li> 
                    <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url() . $val->nama_url ?>"><i class="<?= $val->ikon ?>"></i><?= $val->nama_menu ?></a></li> 
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <a href="<?= base_url() . $value->nama_url ?>"><i data-feather="<?= $value->ikon ?>" class="align-self-center menu-icon"></i><span><?= $value->nama_menu ?></span></a>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>