<style>
    #qr-canvas {
       border-radius: 0.5rem;
    }
</style>
<div class="col-lg-4 col-md-4 col-12 col-sm-12">
    <div id="qr-content" class="content">
        <div class="test"></div>
        <div id="qr-wrapper">
            <div class="posisi">
                <a href="#" id="btn-scan-qr"></a>
            </div>
            <div>
                <canvas id="qr-canvas" style="width: 100%;height:100%"> </canvas>
            </div>
            <div class="text-center" id="qr-result">
                <form method="post" action="process/submit_qrcode.php" enctype="multipart/form-data">
                    <input class="form-control" id="outputData" type="hidden" name="data_qrcode" placeholder="Insert QR text" value="" required>
                </form>
            </div>
        </div>
    </div>
</div>