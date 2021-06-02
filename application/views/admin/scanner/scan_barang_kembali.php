<style>
    #qr-canvas {
        margin: auto;
        width: 100%;
        max-width: 100%;
    }

    .posisi {
        display: flex;
        margin: auto;
    }

    .icon-qr {
        width: 200px
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?= $views['header'] ?>
        <!-- Left side column. contains the logo and sidebar -->

        <?= $views['sidebar_menu'] ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background:black">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 class="text-white">
                    Scan Barang Kembali
                </h1>
            </section>

            <!-- Main content -->
            <section id="qr-content" class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                            <div id="qr-wrapper">
                                <div class="posisi">
                                    <a href="#" id="btn-scan-qr">
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
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer text-white" style="background:black">
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
    <script src="<?php echo base_url() ?>assets/js/qr-packed.js"  ></script>
    <script>
        const qrcodes = window.qrcode;

        const video = document.createElement("video");
        const canvasElement = document.getElementById("qr-canvas");
        const canvas = canvasElement.getContext("2d");

        const qrResult = document.getElementById("qr-result");
        const outputData = document.getElementById("outputData");
        const btnScanQR = document.getElementById("btn-scan-qr");

        let scanning = false;
        window.onload = function() {
            document.getElementById("btn-scan-qr").click();
        };

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