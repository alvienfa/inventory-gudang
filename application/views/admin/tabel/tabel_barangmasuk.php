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
                    <strong>Success!</strong><br> <?= $this->session->flashdata('msg_berhasil'); ?>
                  </div>
                <?php } ?>

                <a href="<?= base_url('admin/form_barangmasuk') ?>" style="margin-bottom:10px;" type="button" class="btn btn-primary" name="tambah_data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data Masuk</a>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No </th>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Tipe Barang</th>
                        <th>Jumlah</th>
                        <th>Gudang</th>
                        <th>Foto</th>
                        <th>QR</th>
                        <th>Update</th>
                        <th>Hide</th>
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
                            <td style="white-space: nowrap;"><small><?= $dd->id_transaksi ?></small></td>
                            <td style="white-space: nowrap;"><small><?= $dd->tanggal ?></small></td>
                            <td><small class="text-bold"><?= strtoupper($dd->nama_barang) ?></small><br><small>#<?= strtoupper($dd->kode_barang) ?></small></td>
                            <td><small><?= $dd->nama_kategori ?></small></td>
                            <td class="text-bold"><span class="font-weight-bold text-small <?= ($dd->jumlah >= $dd->min_jumlah? 'text-primary'  :  'text-danger')?>"><?= $dd->jumlah ." ". $dd->satuan ?> </span></td>
                            <td><small><?= $dd->nama_gudang ?></small></td>
                            <td>
                              <a href="javascript:void(0)" type="button" 
                              class="show-modal" 
                            
                              data-toggle="modal" 
                              data-target="#modal-default">
                                <img data-image="<?= $dd->gambar?>"   class="img-thumbnail" style="width: 50px;" src="<?= base_url() . 'assets/upload/gambar/' . $dd->gambar; ?>">
                              </a>
                            </td>
                            <td><a download href="<?php echo base_url() . 'assets/qrcode/images/' . $dd->qr_code; ?>">
                                <img class="img-thumbnail" style="width: 50px;" src="<?php echo base_url() . 'assets/qrcode/images/' . $dd->qr_code; ?>">
                              </a>
                            </td>
                            <td><a type="button" class="btn btn-info" href="<?= base_url('admin/update_barang/') . $dd->id ?>" name="btn_update" style="margin:auto;"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td>
                              <a class="btn btn-success" href="<?= base_url('admin/soft_delete_barang/') . $dd->id?>"><i class="fa fa-eye"></i></a>
                            </td>
                            <td>
                              <form class="form-delete" role="form" 
                              action="<?= base_url('admin/delete_barang') ?>" 
                              method="POST">
                              <input type="hidden" name="id" value="<?= $dd->id ?>">
                                <input type="hidden" name="id_kategori" value="<?= $this->input->get('id_kategori')?>">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                              </form>
                              </a>
                            </td>
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
        <div class="modal fade" id="modal-default">
          <div style="width: fit-content;" class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
              <div class="modal-body">
                <img width="400" class="img-fluid" id="modal-foto" src="" alt="foto-barang">
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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

      $('.form-delete').on('submit', function() {
        const getLink = $(this).attr('action')
        const body = $(this).serializeArray()
        swal({
          title: 'Delete Data',
          text: 'Yakin Ingin Menghapus Data ?',
          html: true,
          confirmButtonColor: '#d9534f',
          showCancelButton: true,
        }, function() {
          $.ajax({
            url: getLink,
            type: 'post',
            dataType: 'json',
            data: body,
            success: function(data) {
              console.log('success')
              console.log(body)
              window.location.href = getLink
            },
            error: function(err){
              console.log("Error",err.statusText)
            }
          })
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

  <script>
    const btnShow = document.querySelectorAll(".show-modal")
    btnShow.forEach(item => {
      item.addEventListener('click', (e) => {
        console.log(e.target.dataset.image)
        $("#modal-defaul").modal('show')
        $("#modal-foto").attr('src', '<?= base_url("assets/upload/gambar/")?>' +  e.target.dataset.image);
      })
    })
  </script>
</body>

</html>