<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- Required meta tags -->

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Login</title>
            <link rel="icon" type="image/x-icon" href="<?= base_url('assets/src/icon') ?>/logo-brand-collapse.png">

        <!-- plugins:css -->

            <link rel="stylesheet" href="<?= base_url('assets/template') ?>/vendors/feather/feather.css">
            <link rel="stylesheet" href="<?= base_url('assets/template') ?>/vendors/ti-icons/css/themify-icons.css">
            <link rel="stylesheet" href="<?= base_url('assets/template') ?>/vendors/css/vendor.bundle.base.css">
            <link rel="stylesheet" href="<?= base_url('assets/template') ?>/css/vertical-layout-light/style.css">

    </head>

    <body>

        <div class="container-scroller">

            <div class="container-fluid page-body-wrapper full-page-wrapper">

                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                                <h4>Welcome!</h4>
                                <h6 class="font-weight-light">Sign in to continue.</h6>

                                <form action="<?= base_url('/Home/auth_login/?') ?>" class="pt-3" method="post">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username" focus required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                    </div>

                                    <div class="text-center mt-4 font-weight-light">Don't have an account? <a href="/User/view_register/" class="text-primary">Register</a></div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

        <script src="<?= base_url('assets/template') ?>/vendors/js/vendor.bundle.base.js"></script>
        <script src="<?= base_url('assets/template') ?>/js/off-canvas.js"></script>
        <script src="<?= base_url('assets/template') ?>/js/hoverable-collapse.js"></script>
        <script src="<?= base_url('assets/template') ?>/js/template.js"></script>
        <script src="<?= base_url('assets/template') ?>/js/settings.js"></script>
        <script src="<?= base_url('assets/template') ?>/js/todolist.js"></script>

    </body>

</html>
