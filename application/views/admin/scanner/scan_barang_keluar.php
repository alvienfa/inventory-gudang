<style>
    #qr-canvas {
        margin: auto;
        width: 100%;
        max-width: 100%;
        align-items: center;

    }

    .posisi {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        /* margin-left: 350px;
            padding-left: 50px; */
    }

    .icon-qr {
        align-self: center;
        object-position: center;
        width: 200px
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?= $views['header'] ?>
        <!-- Left side column. contains the logo and sidebar -->

        <?= $views['sidebar_menu'] ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Tambah Data Barang Kembali
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Data Barang Keluar</li>
                </ol>
            </section>

            <!-- Main content -->
            <?php if (!$list_data) : ?>
                <section id="qr-content" class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container-fluid">
                                <div id="qr-wrapper">
                                    <div class="posisi">
                                        <a href="#" id="btn-scan-qr">
                                            <img class="icon-qr" src="<?= base_url() . "/assets/img/scan-me.png" ?>">
                                        </a>
                                    </div>
                                    <canvas hidden="" id="qr-canvas"></canvas>
                                    <div class="text-center" id="qr-result">
                                        <form method="post" action="process/submit_qrcode.php" enctype="multipart/form-data">
                                            <label>
                                                <input class="form-control" id="outputData" type="hidden" name="data_qrcode" placeholder="Insert QR text" value="" required>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php else : ?>
                <form action="<?= base_url('admin/proses_data_keluar') ?>" role="form" method="post">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Barang Keluar</h3>
                                    </div>
                                    <?php if (validation_errors()) { ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="container-fluid">
                                        <div class="box-body" id='barang_scan'>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="id_transaksi">ID Transaksi</label>
                                                        <input type="text" name="id_transaksi" class="form-control" readonly="readonly" value="<?= $list_data->id_transaksi ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal Masuk</label>
                                                        <input type="text" name="tanggal" class="form-control" readonly="readonly" value="<?= $list_data->tanggal ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal_keluar">Tanggal Keluar</label>
                                                        <input type="text" name="tanggal_keluar" class="form-control form_datetime" required="" placeholder="Klik Disini">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kode_barang">Kode Barang / Barcode</label>
                                                        <input type="text" name="kode_barang" class="form-control" readonly="readonly" id="kode_barang" value="<?= $list_data->kode_barang ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama_Barang" style="width:73%;">Nama Barang</label>
                                                        <input type="text" name="nama_barang" readonly="readonly" class="form-control" id="nama_Barang" value="<?= $list_data->nama_barang ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="satuan">Satuan</label>
                                                        <select class="form-control" name="satuan">
                                                            <?php foreach ($list_satuan as $s) { ?>
                                                                <?php if ($list_data->satuan == $s->nama_satuan) { ?>
                                                                    <option value="<?= $list_data->satuan ?>" selected=""><?= $list_data->satuan ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $s->kode_satuan ?>"><?= $s->nama_satuan ?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" name="jumlah" class="form-control" id="jumlah" max="<?= $list_data->jumlah ?>" value="<?= $list_data->jumlah ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">Keterangan</label>
                                                        <input type="text" name="keterangan" class="form-control" id="status">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><i class="fa fa-map-marker" aria-hidden="true"></i> Alamat Tujuan</h3>
                                    </div>
                                    <?php if (validation_errors()) { ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="container-fluid">
                                        <div class="box-body" id='barang_scan'>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?= $this->load->view('components/forms/form_lokasi', '', TRUE) ?>
                                                    <div class="form-group">
                                                        <a type="button" class="btn btn-danger" onclick="history.back(-1)" name="btn_kembali"> Cancel</a>
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            <?php endif; ?>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; <?= date('Y') ?></strong>

        </footer>

        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
    <script>
        const qrcodes = window.qrcode;

        const video = document.createElement("video");
        const canvasElement = document.getElementById("qr-canvas");
        const canvas = canvasElement.getContext("2d");

        const qrResult = document.getElementById("qr-result");
        const outputData = document.getElementById("outputData");
        const btnScanQR = document.getElementById("btn-scan-qr");

        let scanning = false;

        // Scan
        qrcodes.callback = res => {
            // If result is true, ...
            if (res) {
                outputData.value = res;
                res.replace("X", "-");
                document.getElementById("qr-content").style.display = 'none';
                window.location.href = '<?= base_url('admin/scan_barang_keluar/') ?>' + res;
                scanning = false;

                // Stop video
                video.srcObject.getTracks().forEach(track => {
                    track.stop();
                })

                qrResult.hidden = false; // Show result
                canvasElement.hidden = true; // Hide canvas
                btnScanQR.hidden = false; // Show scan button again
            }
        };

        // When scan button on click, ...
        btnScanQR.onclick = () => {
            navigator.mediaDevices
                .getUserMedia({
                    video: {
                        facingMode: "environment"
                    }
                })
                .then(function(stream) {
                    scanning = true;
                    qrResult.hidden = true;
                    btnScanQR.hidden = true;
                    canvasElement.hidden = false;
                    video.setAttribute("playsinline", true);

                    video.srcObject = stream;
                    video.play(); // Show video
                    tick(); // Set canvas
                    scan(); // Scan QRCode
                });
        };

        function tick() {
            canvasElement.height = video.videoHeight;
            canvasElement.width = video.videoWidth;
            canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

            scanning && requestAnimationFrame(tick);
        }

        function scan() {
            try {
                qrcode.decode();
            } catch (e) {
                setTimeout(scan, 300);
            }
        }
    </script>
    <!-- jQuery 3 -->

    <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/web_admin/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url() ?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/web_admin/dist/js/demo.js"></script>

    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayBtn: true,
            pickTime: false,
            minView: 2,
            maxView: 4,
        });
    </script>
</body>

</html>