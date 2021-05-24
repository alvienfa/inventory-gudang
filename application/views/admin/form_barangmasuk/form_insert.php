<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?= $views['header'] ?>
    <!-- Left side column. contains the logo and sidebar -->

    <?= $views['sidebar_menu']?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Input Data Barang Masuk
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">Data Barang Masuk</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="container">
              <!-- general form elements -->
              <div class="box box-primary" style="width:94%;">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Data Barang Masuk</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="container">
                  <form action="<?= base_url('admin/proses_databarang_masuk_insert') ?>" role="form" method="post" enctype="multipart/form-data">

                    <?php if ($this->session->flashdata('msg_berhasil')) { ?>
                      <div class="alert alert-success alert-dismissible" style="width:91%">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
                      </div>
                    <?php } ?>

                    <?php if (validation_errors()) { ?>
                      <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong><br> <?= validation_errors(); ?>
                      </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('msg_gagal')){ ?>
                      <div class="alert alert-danger alert-dismissible" style="width:91%">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Danger!</strong><br> <?php echo $this->session->flashdata('msg_gagal'); ?>
                      </div>
                    <?php } ?>

                    <div class="box-body">
                      <div class="form-group">
                        <label for="id_transaksi" style="margin-left:220px;display:inline;">ID Transaksi</label>
                        <input type="text" name="id_transaksi" style="margin-left:37px;width:20%;display:inline;" class="form-control" readonly="readonly" value="WG-<?= date("Y"); ?><?= random_string('numeric', 8); ?>">
                      </div>
                      <div class="form-group">
                        <label for="tanggal" style="margin-left:220px;display:inline;">Tanggal</label>
                        <input type="date" name="tanggal" style="margin-left:66px;width:20%;display:inline;" class="form-control" placeholder="Klik Disini">
                      </div>
                      
                <div class="form-group" style="margin-bottom:40px;">
                  <label for="keterangan" style="margin-left:220px;display:inline;">Keterangan</label>
                  <select class="form-control" name="keterangan" style="margin-left:75px;width:20%;display:inline;">
                    <option value="">-- Pilih --</option>
                    <option value="Stok Gudang Pak Sandy">Stok Gudang Pak Sandy</option>
                    <option value="Stok Gudang Rizqi Semesta">Stok Gudang Rizqi Semesta</option>
                    <option value="Stok Gudang Inventaris">Stok Gudang Inventaris</option>
                    
                  </select>
                </div>

                      <div class="form-group" style="display:inline-block;">
                        <label for="kode_barang" style="width:87%;margin-left: 12px;">Kode Barang / Barcode</label>
                        <input type="text" name="kode_barang" style="width: 90%;margin-right: 67px;margin-left: 11px;" class="form-control" id="kode_barang" placeholder="Kode Barang">
                      </div>
                      <div class="form-group" style="display:inline-block;">
                        <label for="nama_Barang" style="width:73%;">Nama Barang</label>
                        <input type="text" name="nama_barang" style="width:90%;margin-right: 67px;" class="form-control" id="nama_Barang" placeholder="Nama Barang">
                      </div>
                      <div class="form-group" style="display:inline-block;">
                        <label for="satuan" style="width:73%;">Satuan</label>
                        <select class="form-control" name="satuan" style="width:110%;margin-right: 18px;">
                          <option value="" selected="">-- Pilih --</option>
                          <?php foreach ($list_satuan as $s) { ?>
                            <option value="<?= $s->kode_satuan ?>"><?= $s->nama_satuan ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group" style="display:inline-block;">
                        <label for="jumlah" style="width:73%;margin-left:33px;">Jumlah</label>
                        <input type="number" name="jumlah" style="width:41%;margin-left:34px;margin-right:-60px;" class="form-control" id="jumlah">
                      </div>
                      <div class="form-group" style="display:inline-block;">
                        <label for="gambar" style="width:53%;">Foto Barang</label>
                        <input type="file" name="gambar" style="width:70%;margin-right:65px;" class="form-control" id="gambar">
                      </div>
                      <div class="form-group" style="display:inline-block;">
                        <button type="reset" class="btn btn-basic" name="btn_reset" style="width:95px;margin-left:8px;"><i class="fa fa-eraser" aria-hidden="true"></i> Reset</button>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer" style="width:93%;">
                        <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        <a type="button" class="btn btn-info" style="width:14%;margin-right:29%" href="<?= base_url('admin/tabel_barangmasuk') ?>" name="btn_listbarang"><i class="fa fa-table" aria-hidden="true"></i> Lihat List Barang</a>
                        <button type="submit" style="width:20%" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
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
</body>

</html>