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
          Update Data Barang Masuk
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">Data Barang Masuk</li>
        </ol>
      </section>

      <?php if (validation_errors()) { ?>
        <div class="alert alert-warning alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Warning!</strong><br> <?= validation_errors(); ?>
        </div>
      <?php } ?>

      <?php if ($this->session->flashdata('msg_gagal')) { ?>
        <div class="alert alert-danger alert-dismissible" style="width:91%">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Danger!</strong><br> <?php echo $this->session->flashdata('msg_gagal'); ?>
        </div>
      <?php } ?>

      <form action="<?= base_url('admin/proses_databarang_masuk_update/' . $list_data->id) ?>" role="form" method="post" enctype="multipart/form-data">
        <section class="content">
          <div class="row">
            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Barang Keluar</h3>
                </div>

                <div class="container-fluid">
                  <div class="box-body" id='barang_scan'>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="id_transaksi">ID Transaksi</label>
                          <input type="text" name="id_transaksi" readonly class="form-control" value="WG-<?= date("Y"); ?><?= random_string('numeric', 8); ?>">
                        </div>
                        <div class="form-group">
                          <label for="kode_barang">Kode Barang / Barcode</label>
                          <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?= $list_data->kode_barang ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="nama_Barang" style="width:73%;">Nama Barang</label>
                          <input type="text" name="nama_barang" class="form-control" id="nama_Barang" value="<?= $list_data->nama_barang ?>">
                        </div>
                        <div class="form-group">
                          <label for="jumlah">Jumlah</label>
                          <input type="phone" name="jumlah" class="form-control" id="jumlah" value="<?= $list_data->jumlah ?> ">
                        </div>
                        <div class="form-group" style="display:block;">
                          <label for="id_kategori" style="width:73%;">Pilih Kategori</label>
                          <select class="form-control" name="id_kategori" style="width:100%;margin-right: 18px;">
                            
                            <?php foreach ($list_kategori as $k) : ?>
                            <?php if($k->id == $list_data->id_kategori) : ?>
                            <option selected value="<?=$k->id ?>"> <?=$k->nama_kategori ?></option>
                            <?php else : ?>
                            <option value="<?=$k->id ?>"> <?=$k->nama_kategori ?></option>
                            <?php endif; ?>
                            <?php endforeach ?>
                            
                            <?php if ($list_data->id_kategori == 1) { ?>
                              <option value="1" selected="">Demo / Entertaint</option>
                              <option value="2">Inventory</option>
                              <option value="3">Persediaan</option>
                            <?php } elseif ($list_data->id_kategori == 2) { ?>
                              <option value="1">Demo / Entertaint</option>
                              <option value="2" selected="">Inventory</option>
                              <option value="3">Persediaan</option>

                            <?php } elseif ($list_data->id_kategori == 3) { ?>
                              <option value="1">Demo / Entertaint</option>
                              <option value="2">Inventory</option>
                              <option value="3" selected="">Persediaan</option>

                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <img src="<?= base_url('assets/upload/gambar/' . $list_data->gambar) ?>" id="frame" alt="preview" width="200px" height="200px" onerror="" />
                        </div>
                        <div class="form-group">
                          <label for="gambar">Foto Barang</label>
                          <input type="hidden" name="old_gambar" value="<?= $list_data->gambar ?>">
                          <input accept="image/*" type="file" name="gambar" class="form-control" id="gambar" onchange="preview()">
                        </div>
                        <div class="form-group">
                          <label for="status">Keterangan</label>
                          <input type="text" name="keterangan" class="form-control" id="status" value="<?= $list_data->keterangan ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <a type="button" class="btn btn-danger" onclick="history.back(-1)" name="btn_kembali">Cancel</a>
                    <a type="button" class="btn btn-info" href="<?= base_url('admin/tabel_barangmasuk') ?>" name="btn_listbarang"><i class="fa fa-table" aria-hidden="true"></i> Lihat List Barang</a>
                    <button type="reset" class="btn btn-warning" name="btn_reset"><i class="fa fa-eraser" aria-hidden="true"></i> Reset</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </form>
      <!-- /.content -->
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
  <script>
    function preview() {
      const frame = document.querySelector('#frame');
      frame.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>
</body>

</html>