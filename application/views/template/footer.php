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
<script src="https://demo.getstisla.com/assets/modules/tooltip.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets/stisla/js/stisla.js') ?>"></script>

<!-- JS Libraies -->
<script src="https://demo.getstisla.com/assets/modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/chart.js/dist/Chart.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="https://demo.getstisla.com/assets/modules/summernote/dist/summernote-bs4.js"></script>
<script src="https://demo.getstisla.com/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Daterange -->
<script src="https://demo.getstisla.com/assets/modules/cleave-js/dist/cleave.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="https://demo.getstisla.com/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://demo.getstisla.com/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/select2/dist/js/select2.full.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<!-- Page Specific JS File -->
<script src="https://demo.getstisla.com/assets/js/page/index-0.js"></script>
<script src="<?= base_url('assets/stisla/bootstrap-modal.js') ?>"></script>
<script src="<?= base_url('assets/stisla/js/forms-advanced-forms.js') ?>"></script>
<script src="<?= base_url() ?>assets/js/qr-packed.js"></script>

<!-- Template JS File -->
<script src="<?= base_url('assets/stisla/script.js') ?>"></script>
<script src="<?= base_url('assets/stisla/custom.js') ?>"></script>
<!-- QR CODE JS -->
<script>
  var baseUrl = "<?= base_url()?>";
</script>
<script src="<?= base_url('assets/js/qrcode.js')?>">
  
</script>
<script>
  document.querySelectorAll(".btnKembalikan").forEach(btn => {
    btn.addEventListener("click", (e) => {
      $("#kembali").append("<input type='hidden' name='id' value='" + e.target.dataset.id + "'>")
      $("#kembali").append("<input type='hidden' name='id_lokasi' value='" + e.target.dataset.id_lokasi + "'>")
      $("#kembali").append("<input type='hidden' name='total' value='" + e.target.dataset.jumlah + "'>")
      document.querySelector(".jumlah").value = e.target.dataset.stok
    })
  })
</script>
</body>

</html>