<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?= $title . ' | Facility' ?></title>
    <meta name="<?= csrf_header() ?>" content="<?= csrf_hash() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Aplikasi Facility" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/dastone/dastone-1/default/assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="<?= base_url() ?>/dastone/dastone-1/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/dastone/dastone-1/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url() ?>/dastone/dastone-1/default/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/dastone/dastone-1/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/dastone/dastone-1/default/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/dastone/dastone-1/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/dastone/dastone-1/default/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <?= $this->renderSection('css') ?>
    <style>
        
    </style>
</head>
<body>
    <?= $this->include('template/side-menu') ?>
    <div class="page-wrapper">
        <?= $this->include('template/header') ?>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title"><?= $title ?></h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Facility</a></li>
                                        <?php if (isset($subtitle) == False): ?>
                                        <li class="breadcrumb-item active"><?= $title ?></li>
                                        <?php else: ?>
                                        <li class="breadcrumb-item"><a href="<?= base_url('/' . strtolower($title)) ?>"><?= $title ?></a></li>
                                        <li class="breadcrumb-item active"><?= $subtitle ?></li>
                                        <?php endif ?>
                                    </ol>
                                </div>
                                <div class="col-auto align-self-center">
                                    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                        <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                                        <span class="" id="Select_date">Jan 11</span>
                                        <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                                    </a>
                                    <!-- <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i data-feather="download" class="align-self-center icon-xs"></i>
                                    </a> -->
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->renderSection('content') ?>
            </div>
            <?= $this->include('template/footer'); ?>
        </div>
    </div>
    <!-- jQuery  -->
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/metismenu.min.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/waves.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/feather.min.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/moment.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/plugins/apex-charts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/pages/jquery.analytics_dashboard.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/jquery.core.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/app.js"></script>

    <!-- Required datatable js -->
    <script src="<?= base_url() ?>/dastone/dastone-1/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/dastone/dastone-1/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom Script -->
    <?= $this->renderSection('js') ?>
    <script>
        $(document).ready(function() {
            $('.alert').fadeOut(3000)
            $('#myTable').dataTable();
        })

        function submit() {
            let myForm = $("#myForm");
                myForm.serialize();
                myForm.submit();
        }
    </script>
</body>
</html>