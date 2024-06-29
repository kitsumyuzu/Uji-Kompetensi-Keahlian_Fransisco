<div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="row">
                                    <div class="col-4">
                                        <h3 class="font-weight-bold">User Data</h3>
                                    </div>
                                    <div class="col-8">
                                        <div class="justify-content-end d-flex">
                                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                                <button class="btn btn-sm btn-light bg-white" type="button">
                                                    <i class="icon-globe"></i> <?php $date = new DateTime('now', new DateTimeZone('Asia/Jakarta')) ?> <?php echo  $date -> format('Y-m-d'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- start: daftar anak selesai bermain -->
                                <div class="col-md-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="justify-content-end d-flex mb-2">
                                                <a href="/User/create_user/"><i class="fas fa-user-plus"></i> <small>Tambahkan user baru</small></a>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>#</th>
                                                            <th>Profile</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1; foreach($data_user as $data) { ?>
                                                            <tr align="center">
                                                                <td><?php echo $no++ ?></td>
                                                                <td><img src="<?php echo base_url('assets/src/stored_profile/'.($data['_profile'] ? $data['_profile'] : 'default-profile.png')) ?>" alt="avatar" style="object-fit: cover;"></td>
                                                                <td><?php echo $data['username'] ?></td>
                                                                <td><?php echo $data['email'] ?></td>
                                                                <td>
                                                                    <a href="<?= base_url('/User/edit_user/'.$data['id_user']) ?>">
                                                                        <button class="btn btn-link btn-sm"><i class="mdi mdi-account-edit" style="color: #ffc100"></i></button>
                                                                    </a>
                                                                    <a href="<?= base_url('/User/delete_user/'. $data['id_user']) ?>">
                                                                        <button class="btn btn-link btn-sm"><i class="mdi mdi-delete-sweep" style="color: #ff0000"></i></button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end: daftar anak selesai bermain -->
                        </div>
