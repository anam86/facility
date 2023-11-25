<?php if (session()->getFlashData('success')) { ?>
    <div class="alert alert-success border-0" role="alert" align="center">
        <?= session()->getFlashData('success'); ?>
    </div>
<?php } else if (session()->getFlashData('error')) { ?>
    <div class="alert alert-danger border-0" role="alert" align="center">
        <?= session()->getFlashData('error'); ?>
    </div>
<?php } ?>