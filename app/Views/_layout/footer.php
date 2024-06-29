<footer class="footer">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2023 <a href="https://www.instagram.com/kitsuzu.store" target="_blank">Kitsuzu Store</a> All Rights Reserved.</span>
                            </div>
                        </footer> 
                        <!-- partial -->
                    </div>

                </div>

            </div>

        <!-- plugins:js -->
            <script src="<?= base_url('assets/template') ?>/vendors/js/vendor.bundle.base.js"></script>
            <script src="<?= base_url('assets/template') ?>/vendors/chart.js/Chart.min.js"></script>
            <script src="<?= base_url('assets/template') ?>/vendors/datatables.net/jquery.dataTables.js"></script>
            <script src="<?= base_url('assets/template') ?>/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
            <script src="<?= base_url('assets/template') ?>/js/dataTables.select.min.js"></script>
        <!-- endinject -->

        <!-- inject:js -->
            <script src="<?= base_url('assets/template') ?>/js/off-canvas.js"></script>
            <script src="<?= base_url('assets/template') ?>/js/hoverable-collapse.js"></script>
            <script src="<?= base_url('assets/template') ?>/js/template.js"></script>
            <script src="<?= base_url('assets/template') ?>/js/settings.js"></script>
            <script src="<?= base_url('assets/template') ?>/js/todolist.js"></script>
        <!-- endinject -->

    </body>

    <style>
        *::-webkit-file-upload-button {
            display: none;
        }
        ::-webkit-scrollbar {
            width: 8px;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 20px;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 20px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
            border-radius: 20px;
        }

        /* Button : Like & Comment styling */

        * .btn-like {
            color:black;
            font-size: 20px;
        }

        * .btn-like:hover {
            color:red;
        }

        .btn-like:hover::before {
            content: "\F2D1";
        }

        * .btn-comment {
            color:black;
            font-size: 20px;
        }

        * .btn-comment:hover {
            color:aquamarine;
        }
        
        .btn-comment:hover::before {
            content: "\F17A";
        }

    </style>

</html>