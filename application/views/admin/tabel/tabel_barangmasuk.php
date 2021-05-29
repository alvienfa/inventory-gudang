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
          Tabel Stok Barang
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Tables</li>
          <li class="active"><a href="<?= base_url('admin/tabel_barangmasuk') ?>">Tabel Barang Masuk</li>
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

                <a href="<?= base_url('admin/form_barangmasuk') ?>" style="margin-bottom:10px;" type="button" class="btn btn-primary" name="tambah_data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data Masuk</a>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No </th>
                        <th>ID_Transaksi</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Keterangan Barang</th>
                        <th>Foto Barang</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>Gudang</th>
                        <th>QR Code</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <!-- <th>Keluarkan</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php if (is_array($list_data)) { ?>
                          <?php $no = 1; ?>
                          <?php foreach ($list_data as $dd) : ?>
                            <td><?= $no ?></td>
                            <td><?= $dd->id_transaksi ?></td>
                            <td><?= $dd->tanggal ?></td>
                            <td><?= strtoupper($dd->kode_barang) ?></td>
                            <td><?= $dd->nama_barang ?></td>
                            <td><?= $dd->keterangan ?></td>
                            <td>
                              <img style="width: 100px;" src="<?php echo base_url() . 'assets/upload/gambar/' . $dd->gambar; ?>">
                            </td>
                            <td><?= $dd->satuan ?></td>
                            <td><?= $dd->jumlah ?></td>
                            <td><?= $dd->nama_gudang ?></td>
                            <td><a download href="<?php echo base_url() . 'assets/qrcode/images/' . $dd->qr_code; ?>">
                                <img style="width: 100px;" src="<?php echo base_url() . 'assets/qrcode/images/' . $dd->qr_code; ?>">
                              </a>
                            </td>
                            <td><a type="button" class="btn btn-info" href="<?= base_url('admin/update_barang/') . $dd->id ?>" name="btn_update" style="margin:auto;"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td><a type="button" class="btn btn-danger btn-delete" href="<?= base_url('admin/delete_barang/' . $dd->id) ?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            <!-- <td><a type="button" class="btn btn-success btn-barangkeluar"  href="<?= base_url('admin/scan_barang_keluar/' . $dd->id_transaksi) ?>" name="btn_barangkeluar" style="margin:auto;"><i class="fa fa-sign-out" aria-hidden="true"></i></a></td> -->
                      </tr>
                      <?php $no++; ?>
                    <?php endforeach; ?>
                  <?php } else { ?>
                    <td align="center" colspan="11" center="center"><strong style="color:gray">Data Kosong</strong></td>
                  <?php } ?>
                    </tbody>

                  </table>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
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
      <strong>Copyright &copy; 2021</strong>

    </footer>

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>/assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>/assets/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>/assets/web_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/assets/web_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>/assets/web_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>/assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/assets/web_admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>/assets/web_admin/dist/js/demo.js"></script>
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
      $('#example1').DataTable()
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