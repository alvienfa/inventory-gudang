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
          Tabel Barang Keluar
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Tables</li>
          <li class="active"><a href="<?= base_url('admin/tabel_barangkeluar') ?>">Tabel Barang Keluar</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">

            <!-- /.box -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i> Stok Barang Masuk</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <?php if ($this->session->flashdata('msg_berhasil')) { ?>
                  <div class="alert alert-success alert-dismissible" style="width:100%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
                  </div>
                <?php } ?>

                <a href="<?= base_url('admin/scan_barang_keluar') ?>" style="margin-bottom:10px;" type="button" class="btn btn-primary" name="tambah_data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data Keluar</a>
                <a href="<?= base_url('report/barangKeluarManual') ?>" style="margin-bottom:10px;" type="button" class="btn btn-danger" name="laporan_data"><i class="fa fa-file-text" aria-hidden="true"></i> Invoice Manual</a>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Lokasi</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Surat Jalan</th>
                        <!-- <th></th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php if (is_array($list_data)) { ?>
                          <?php $no = 1; ?>
                          <?php foreach ($list_data as $dd) : ?>
                            <td><?= $no ?></td>
                            <td><?= $dd->id_transaksi ?></td>
                            <td><?= $dd->tanggal_masuk ?></td>
                            <td><?= $dd->tanggal_keluar ?></td>
                            <td><?= $dd->kota ?></td>
                            <td><?= strtoupper($dd->kode_barang) ?></td>
                            <td><?= $dd->nama_barang ?></td>
                            <td><span class="text-bold"> <?= $dd->jumlah ?> </span>(<?= $dd->satuan ?>)</td>
                            <td style="vertical-align:middle">
                              <?php switch ($dd->status):
                                case '0':
                                  echo '<span class="label label-warning text-uppercase">belum</span>';
                                  break;
                                case '1':
                                  echo '<span class="label label-success text-uppercase">sudah</span>';
                                  break;
                                case '2':
                                  echo '<span class="label label-primary text-uppercase">diperbaiki</span>';
                                  break;
                                case '3':
                                  echo '<span class="label label-danger text-uppercase">rusak</span>';
                                  break;
                              endswitch;
                              ?>
                            </td>
                            <td><a type="button" class="btn btn-danger btn-report" href="<?= base_url('report/barangKeluar/' . $dd->id) ?>" name="btn_report" style="margin:auto;"><i class="fa fa-file-text" aria-hidden="true"></i></a></td>
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  <?php } else { ?>
                    <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                  <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Lokasi</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Surat Jalan</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.col -->
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

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/web_admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>assets/web_admin/dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    jQuery(document).ready(function($) {
      $('.btn-delete').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
          title: 'Delete Data',
          text: 'Yakin Ingin Menghapus Data ?',
          html: true,
          confirmButtonColor: '#d9534f',
          showCancelButton: true,
        }, function() {
          window.location.href = getLink
        });
        return false;
      });
    });

    $(function() {
      $('#example1').DataTable();
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
    });
  </script>
</body>

</html>