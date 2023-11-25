<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login | Facility </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>/dastone/dastone-1/default/assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?= base_url() ?>/dastone/dastone-1/default/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/dastone/dastone-1/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/dastone/dastone-1/default/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="account-body accountbg">
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="#" class="logo logo-admin">
                                            <img src="<?= base_url() ?>/dastone/dastone-1/default/assets/images/logo-sm-dark.png" height="50" alt="logo" class="auth-logo mt-1">
                                        </a>
                                        <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Manajemen Facility</h4>   
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active px-3 pt-3">
                                            <?= $this->include('template/session') ?>
                                            <form class="form-horizontal auth-form" action="<?= base_url() ?>/auth/temp_login" method="POST">
                                                <?= csrf_field() ?>
                                                <div class="form-group mb-2">
                                                    <label for="username">Username</label>
                                                    <div class="input-group">                                                                                         
                                                        <input type="text" class="form-control" name="username" id="username" required autofocus>
                                                    </div>                                    
                                                </div>
                    
                                                <div class="form-group mb-2">
                                                    <label for="userpassword">Password</label>                                            
                                                    <div class="input-group">                                  
                                                        <input type="password" class="form-control" name="password" id="userpassword" required>
                                                    </div>                               
                                                </div>
                    
                                                <div class="form-group mt-3 row">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                    </div>
                                                </div>

                                                <?php
                                                    /* '<div class="form-group row">
                                                        <div class="col-12 text-center">
                                                            <a href="<?= base_url() ?>/auth/lupa_password" class="text-muted font-13"><i class="dripicons-lock"></i> Lupa password?</a>
                                                        </div>
                                                    </div>' */
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">Facility © 2022</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- jQuery  -->
        <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/waves.js"></script>
        <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/feather.min.js"></script>
        <script src="<?= base_url() ?>/dastone/dastone-1/default/assets/js/simplebar.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.alert').fadeOut(3000)
            })
        </script>
    </body>
</html>