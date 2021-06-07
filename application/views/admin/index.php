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
          Dashboard
          <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <section class="content" style="min-height:150px">
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <?php if (!empty($stokBarangMasuk)) { ?>
                  <?php foreach ($stokBarangMasuk as $d) { ?>
                    <h3><?= $d->jumlah ?></h3>
                  <?php } ?>
                <?php } else { ?>
                  <h3>0</h3>
                <?php } ?>
                <p>Stok Barang Gudang</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/tabel_barangmasuk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <?php if (!empty($stokBarangKeluar)) { ?>
                  <?php foreach ($stokBarangKeluar as $d) { ?>
                    <h3><?= $d->jumlah ?></h3>
                  <?php } ?>
                <?php } else { ?>
                  <h3>0</h3>
                <?php } ?>
                <p>Stok Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/tabel_barangkeluar') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>Invoice</h3>

                <p>Cetak Invoice</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/tabel_barangkeluar') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
      </section>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; <?= date('Y') ?></strong>
    </footer>

    <div class="control-sidebar-bg"></div>
  </div>