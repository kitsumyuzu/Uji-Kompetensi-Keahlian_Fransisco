<div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="row">
                                    <div class="col-4">
                                        <h3 class="font-weight-bold">History Logs</h3>
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

                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>#</th>
                                                            <th>Tanggal</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1; foreach($data_history as $data) { ?>
                                                            <tr align="center">
                                                                <td><?php echo $no++ ?></td>
                                                                <td><?php echo $data['_tanggal'] ?></td>
                                                                <td><?php echo $data['username'] ?> - <?php echo ucwords($data['_detail']) ?></td>
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
