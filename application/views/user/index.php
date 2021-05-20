
<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/js/scan.css">
<br><br><br>
    <div class="container text-center" style="margin: 2em auto;">
      <div class="jumbotron">
        <h3 class="display-1">Scan Di Bawah</h3>
        <p>
                            <a href="#" id="btn-scan-qr">
                                
                                <br><img src="<?php echo base_url('assets/js/scan-me.png')?>" width="100" alt="User Image">
                            </a>
                        </p>
                        <canvas hidden="" id="qr-canvas">
                           
                        </canvas>
                        
                        <br>
                        <div class="text-center" id="qr-result">
                            <form method="post" action="process/submit_qrcode.php" enctype="multipart/form-data">
                                <p>
                                    <label>
                                        Data:
                                        <input class="form-control" id="outputData" type="text" name="data_qrcode" placeholder="Insert QR text" value="" required>
                                    </label>
                                </p>
                                
                                <p>
                                    <button class="btn btn-small btn-theme03">SUBMIT</button>
                                </p>
                                <br>
                                
                            </form>
                        </div>
        
    </div>
    
  </div>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/js/qrCodeScanner.js">
