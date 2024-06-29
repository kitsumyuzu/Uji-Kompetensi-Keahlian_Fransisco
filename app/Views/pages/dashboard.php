<div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="row">
                                    <div class="col-4">
                                        <h3 class="font-weight-bold">Welcome <?php echo ucwords(session() -> username) ?></h3>
                                        <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
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

                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mb-3">
                                    <a href="" style="text-decoration: none;" data-toggle="modal" data-target="#create_album_modals">
                                        <p>Create Folder</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <?php foreach($data_album as $data) { ?>

                                <div class="col-md-2 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="<?= base_url('/Content/view_album/'.$data['id_album']) ?>" class="card-title" id="folder"><i class="mdi mdi-folder mr-2"></i><?php echo $data['nama_album'] ?></a>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>

                        <hr style="width:100%;text-align:left;margin-left:0">

                        <div class="row">

                            <?php foreach ($data_foto as $data) { ?>

                                <div class="col-md-2 mt-3 d-flex align-items-stretch justify-content-center">
                                    <div class="card" style="width: 18rem;">
                                        <!-- Card content -->
                                        <div class="card-title d-flex align-items-center justify-content-between">
                                            <!-- User info -->
                                            <div class="ml-3 mt-3 d-flex align-items-center">
                                                <!-- User profile image and username -->
                                                <img class="rounded-circle mr-2" src="<?php echo base_url('assets/src/stored_profile/' . ($data['_profile'] ? $data['_profile'] : 'default-profile.png')) ?>" alt="avatar" style="width: 30px; height: 30px;">
                                                <p class="username-upload mb-0"><?php echo $data['username'] ?></p>
                                            </div>

                                            <!-- Dropdown for post actions -->
                                            <?php if ($data['user_foto'] == session()->get('id')) { ?>
                                                <div class="mr-3 mt-2 dropdown">
                                                    <a class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="<?= base_url('/Content/update_image/' . $data['id_foto']) ?>">Edit post</a>
                                                        <?php if (session()->get('level') == '1' || $data['user_foto'] == session()->get('id')) { ?>
                                                            <a class="dropdown-item" href="<?= base_url('/Content/action_delete_image/' . $data['id_foto']) ?>">Delete post</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!-- Card image -->
                                        <img class="card-img-top" src="<?php echo base_url('assets/src/stored_images/' . ($data['lokasi_file'] ? $data['lokasi_file'] : 'no-image.jpg')) ?>" style="height: 250px; object-fit: cover;" alt="Images">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo ($data['judul_foto'] ? $data['judul_foto'] : 'no title') ?></h5>
                                            <div class="container logo mt-3 d-flex justify-content-end">
                                                <i class="btn-like <?= ($data['isLiked'] ? 'mdi mdi-heart' : 'mdi mdi-heart-outline') ?>" id="like-btn-<?= $data['id_foto']; ?>" data-foto-id="<?= $data['id_foto']; ?>" data-user-id="<?= session()->get('id'); ?>"></i>
                                                <p class="like-count ml-1" id="like-count-<?= $data['id_foto']; ?>"><?= $data['likeCount'] ?></p>
                                                <a href="<?= base_url('/Content/view_comment/' . $data['id_foto']) ?>">
                                                    <i class="btn-comment mdi mdi-comment-outline ml-3"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php } ?>

                        </div>

                        <!-- Start: Modals -->

                            <div class="modal" tabindex="-1" role="dialog" id="create_album_modals">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambahkan Album</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                        <form action="<?= base_url('/Content/create_album/?') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_album" placeholder="nama album">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" type="text" name="deskripsi_album" placeholder="Deskripsi" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- END: Modals -->

                        <style>

                            * #folder {
                                cursor: pointer;
                                text-decoration: none;
                            }

                            * #folder:hover {
                                color: #248afd;
                            }

                        </style>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var usernameElements = document.querySelectorAll('.username-upload');

                                usernameElements.forEach(function(usernameElement) {
                                    var username = usernameElement.textContent.trim();
                                    var maxLength = 18;
                                    if (username.length > maxLength) {
                                        var truncatedUsername = username.substring(0, maxLength) + '...';
                                        usernameElement.textContent = truncatedUsername;
                                    }
                                });
                            });
                        </script>

                        <!-- Ajax -->

                        <script src="<?= base_url('assets/template') ?>/js/jquery.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                function handleLike(fotoID, userID) {
                                    $.ajax({
                                        url: '<?= base_url('Content/toggleLike') ?>',
                                        type: 'POST',
                                        data: { fotoID: fotoID, userID: userID },
                                        success: function(response) {
                                            var likeBtn = $('#like-btn-' + fotoID);
                                            if (response.liked) {
                                                likeBtn.addClass('mdi-heart').removeClass('mdi-heart-outline');
                                            } else {
                                                likeBtn.addClass('mdi-heart-outline').removeClass('mdi-heart');
                                            }
                                            // Update like count
                                            $('#like-count-' + fotoID).text(response.likeCount);
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Error toggling like:', error);
                                        }
                                    });
                                }

                                $('.btn-like').click(function() {
                                    var fotoID = $(this).data('foto-id');
                                    var userID = $(this).data('user-id');
                                    handleLike(fotoID, userID);
                                });
                            });
                        </script>