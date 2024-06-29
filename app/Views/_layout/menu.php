<div class="container-scroller">
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="/Home/"><img src="<?= base_url('assets/src/icon') ?>/logo-brand-collapse.png" alt="logo"></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown"><img src="<?php echo base_url('assets/src/stored_profile/'.($data_setting['_profile'] ? $data_setting['_profile'] : 'default-profile.png')) ?>" alt="profile"/></a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <!-- <a class="dropdown-item">
                                    <i class="ti-settings text-primary"></i>Settings
                                </a> -->
                                <a href="<?= base_url('/Home/auth_logout') ?>" class="dropdown-item">
                                    <i class="ti-power-off text-primary"></i>Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid page-body-wrapper">

                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <!-- Start: Menu -->
                        <ul class="nav">

                            <li class="nav-item">
                                <a class="nav-link" href="/home/dashboard/?">
                                    <i class="mdi mdi-home menu-icon"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/Content/">
                                    <i class="mdi mdi-image menu-icon"></i>
                                    <span class="menu-title">Upload Image</span>
                                </a>
                            </li>

                        <hr>

                            <?php if (in_array(session() -> get('level'), [1])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/User/">
                                        <i class="mdi mdi-account-key menu-icon"></i>
                                        <span class="menu-title">User</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/Home/history">
                                        <i class="mdi mdi-clock menu-icon"></i>
                                        <span class="menu-title">History</span>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                    <!-- End: Menu -->
                </nav>