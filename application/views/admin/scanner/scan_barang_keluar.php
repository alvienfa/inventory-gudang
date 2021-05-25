<style>
    #qr-canvas {
        margin: auto;
        width: 100%;
        max-width: 100%;

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
                <section class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="container">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Barang Kembali</h3>
                                    </div>
                                    
                                    <div class="container">
                                        <form action="<?= base_url('admin/proses_data_kembali') ?>" role="form" method="post">
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
                                                            <?php foreach ($list_data as $d) { ?>
                                                                <input type="hidden" name="id" readonly value="<?= $d->id ?>">
                                                                <div class="form-group">
                                                                    <label for="id_transaksi">ID Transaksi</label>
                                                                    <input type="text" name="id_transaksi" class="form-control" readonly="readonly" value="<?= $d->id_transaksi ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="tanggal_keluar">Tanggal Kembali</label>
                                                                    <input type="text" name="tanggal_kembali" class="form-control form_datetime" required="" value="<?= date('Y-m-d') ?>" placeholder="Klik Disini">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lokasi">Lokasi</label>
                                                                    <input type="text" name="lokasi" class="form-control" value="<?= $d->lokasi ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kode_barang">Kode Barang / Barcode</label>
                                                                    <input type="text" name="kode_barang" class="form-control" readonly="readonly" id="kode_barang" value="<?= $d->kode_barang ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_Barang" style="width:73%;">Nama Barang</label>
                                                                    <input type="text" name="nama_barang" readonly="readonly" class="form-control" id="nama_Barang" value="<?= $d->nama_barang ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="satuan">Satuan</label>
                                                                    <select class="form-control" name="satuan">
                                                                        <?php foreach ($list_satuan as $s) { ?>
                                                                            <?php if ($d->satuan == $s->nama_satuan) { ?>
                                                                                <option value="<?= $d->satuan ?>" selected=""><?= $d->satuan ?></option>
                                                                            <?php } else { ?>
                                                                                <option value="<?= $s->kode_satuan ?>"><?= $s->nama_satuan ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlah">Jumlah</label>
                                                                    <input type="number" name="jumlah" class="form-control" id="jumlah" max="<?= $d->jumlah ?>" value="<?= $d->jumlah ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status">Keterangan</label>
                                                                    <input type="text" name="status" class="form-control" id="status">
                                                                </div>
                                                                <div class="form-group">
                                                                    <a type="button" class="btn btn-warning" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; <?= date('Y') ?></strong>

        </footer>

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
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
                window.location.href = '<?= base_url('admin/scan_list_barang/') ?>' + res;
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