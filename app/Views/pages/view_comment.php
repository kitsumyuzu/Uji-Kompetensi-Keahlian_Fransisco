<div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="row">
                                    <div class="col-4">
                                        <h3 class="font-weight-bold">Comment Section</h3>
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
                            <div class="col-md-2">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" id="image_preview" src="<?php echo base_url('assets/src/stored_images/'.($data_foto['lokasi_file'] ? $data_foto['lokasi_file'] : 'no-image.jpg')) ?>" style="height: 250px; object-fit:cover;" alt="image">
                                    <div class="card-body">
                                        <h5 id="dynamicTitle" class="card-title"><?php echo $data_foto['judul_foto'] ?></h5>
                                        <p id="dynamicDescription" class="card-text" style="font-size:12px;"><?php echo $data_foto['deskripsi_foto'] ?></p>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-10 d-flex align-items-stretch">
                                <div class="card" style="width: 100rem;">
                                    <div class="card-body">
                                        <?php foreach($data_komen as $data) {

                                            if ($data['_komentarfoto'] == $data_foto['id_foto']) {
                                            
                                        ?>

                                            <div class="row mb-2 ml-2 d-flex align-items-center">
                                                <img class="rounded-circle mr-2" src="<?php echo base_url('assets/src/stored_profile/'.($data['_profile'] ? $data['_profile'] : 'default-profile.png')) ?>" alt="avatar" style="width: 30px; height: 30px;">
                                                <p><?php echo $data['username'] ?> : <?php echo $data['isi_komentar'] ?></p>
                                            </div>

                                        <?php

                                                }

                                            }
                                            
                                        ?>

                                        <form action="/Content/create_comment/" method="post">
                                            <input type="hidden" name="id" value="<?php echo $data_foto['id_foto'] ?>">
                                            <div class="form-group mt-3">
                                                <div class="row">
                                                    <textarea class="form-control col-md-11 ml-4" name="comment" rows="1"></textarea>
                                                    <button class="btn btn-info ml-3"><i class="mdi mdi-send"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

