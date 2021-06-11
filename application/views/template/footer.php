<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
  </div>
  <div class="footer-right">
    2.3.0
  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://demo.getstisla.com/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="https://demo.getstisla.com/assets/modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/chart.js/dist/Chart.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="https://demo.getstisla.com/assets/modules/summernote/dist/summernote-bs4.js"></script>
<script src="https://demo.getstisla.com/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url('assets/stisla/script.js') ?>"></script>
<script src="<?= base_url('assets/stisla/custom.js') ?>"></script>

<!-- Page Specific JS File -->
<script src="https://demo.getstisla.com/assets/js/page/index-0.js"></script>
<script src="<?= base_url('assets/stisla/bootstrap-modal.js') ?>"></script>
<script src="<?php echo base_url() ?>assets/js/qr-packed.js"></script>
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
<script>
  document.querySelectorAll(".btnKembalikan").forEach(btn => {
    btn.addEventListener("click", (e) => {
      $("#kembali").append("<input type='hidden' name='id' value='" + e.target.dataset.id + "'>")
      $("#kembali").append("<input type='hidden' name='id_lokasi' value='" + e.target.dataset.id_lokasi + "'>")
      $("#kembali").append("<input type='hidden' name='total' value='" + e.target.dataset.jumlah + "'>")
      document.querySelector("[name='stok']").value = e.target.dataset.stok
    })
  })
</script>
</body>

</html>