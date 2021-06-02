<body class="hold-transition skin-blue">
    <div class="wrapper">
        <div class="content-wrapper" style="background:black;height:100vh">
            <section id="qr-content" class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div id="qr-wrapper">
                            <div class="posisi">
                                <a href="#" id="btn-scan-qr"></a>
                            </div>
                            <div>
                                <canvas hidden="" id="qr-canvas" style="width: 100%;height:100%"></canvas>
                            </div>
                            <div class="text-center" id="qr-result">
                                <form method="post" action="process/submit_qrcode.php" enctype="multipart/form-data">
                                    <label>
                                        <input 
                                        class="form-control" 
                                        id="outputData" 
                                        type="hidden" 
                                        name="data_qrcode" 
                                        placeholder="Insert QR text" 
                                        value="" required>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </form>
        </div>
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
                window.location.href = '<?= base_url('barang/') ?>' + res;
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
</body>