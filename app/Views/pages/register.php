<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- Required meta tags -->

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Register</title>
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

                                <h4>New here?</h4>
                                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                                <form action="/User/auth_register/" class="pt-3" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" id="confirm-password" placeholder="Confirm Password" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="nama_lengkap" class="form-control form-control-lg" placeholder="Nama Lengkap" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="alamat" class="form-control form-control-lg" placeholder="Alamat" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="file" name="foto" class="form-control form-control-lg" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">Already have an account? <a href="/Home/" class="text-primary">Login</a></div>
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

        <style>
            *::-webkit-file-upload-button {
                display: none;
            }
        </style>

        <script>
            // Password validation

            document.addEventListener('DOMContentLoaded', function() {

                var password = document.getElementById('password');
                var confirm_password = document.getElementById('confirm_password');

                function validatePassword() {

                    if (password.value != confirm_password.value) {

                        confirm_password.setCustomValidity('Please make sure its the correct password');

                    } else {

                        confirm_password.setCustomValidity('');

                    }

                }

                password.addEventListener('change', validatePassword);
                confirm_password.addEventListener('keyup', validatePassword);

            });
        </script>

    </body>

</html>
