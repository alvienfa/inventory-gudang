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
                    Scan QR Data Barang Kembali
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Data Barang Keluar</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Barang Kembali</h3>
                                </div>
                               
                                <div class="container-fluid">
                                    <form action="<?= base_url('admin/submit_barang_kembali') ?>" role="form" method="post">
                                        <?php if (validation_errors()) { ?>
                                            <div class="alert alert-warning alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="container-fluid">
                                            <div class="box-body" id='barang_scan'>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="id" readonly value="<?= $list_data->id ?>">
                                                        <div class="form-group">
                                                            <div align="center">
                                                            <img style="width: 300px;" class="img-fluid" src="<?= base_url('assets/upload/gambar/') . $gambar_barang->gambar?>" alt="<?= $gambar_barang->gambar?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_transaksi">ID Transaksi</label>
                                                            <input type="text" name="id_transaksi" class="form-control" readonly="readonly" value="<?= $list_data->id_transaksi ?>">
                                                        </div>
                                                        <?= $this->load->view('components/forms/form_lokasi_edit', $alamat, TRUE) ?>
                                                        <div class="form-group">
                                                            <label for="kode_barang">Kode Barang / Barcode</label>
                                                            <input type="text" name="kode_barang" class="form-control" readonly="readonly" id="kode_barang" value="<?= $list_data->kode_barang ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama_Barang" style="width:73%;">Nama Barang</label>
                                                            <input type="text" name="nama_barang" readonly class="form-control" id="nama_Barang" value="<?= $list_data->nama_barang ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jumlah">Jumlah (<?= $list_data->satuan ?>)</label>
                                                            <input type="number" name="jumlah" class="form-control" id="jumlah" max="<?= $list_data->jumlah ?>" value="<?= $list_data->jumlah ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                            <select name="status" class="form-control">
                                                                <option value="0">Belum</option>
                                                                <option value="1">Success</option>
                                                                <option value="2">Diperbaiki</option>
                                                                <option value="3">Rusak</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Keterangan / Catatan</label>
                                                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                                                        </div>
                                                        <div class="form-group">
                                                            <a type="button" class="btn btn-danger" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-close" aria-hidden="true"></i>CANCEL</a>
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> SUBMIT</button>&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; <?= date('Y') ?></strong>

        </footer>

        <!-- Control Sidebar -->
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