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

</body>