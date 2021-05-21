<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php foreach ($avatar as $a) { ?>
                  <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="user-image" alt="User Image">
                <?php } ?>
                <span class="hidden-xs"><?= $this->session->userdata('name') ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php foreach ($avatar as $a) { ?>
                    <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="img-circle" alt="User Image">
                  <?php } ?>

                  <p>
                    <?= $this->session->userdata('name') ?> - Web Developer
                    <small>Last Login : <?= $this->session->userdata('last_login') ?></small>
                  </p>
                </li>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?= base_url('admin/profile') ?>" class="btn btn-default btn-flat"><i class="fa fa-cogs" aria-hidden="true"></i> Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?= base_url('admin/signout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
              </div>
            </li>
          </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <?php foreach ($avatar as $a) { ?>
              <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="img-circle" alt="User Image">
            <?php } ?>
          </div>
          <div class="pull-left info">
            <p><?= $this->session->userdata('name') ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li class="treeview active">
            <a href="<?php echo base_url('admin') ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </span>
            </a>
            <!-- <ul class="treeview-menu">
            <li class="active"><a href="<?= base_url('admin') ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
          </li>
          <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li> -->
          <!-- <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="<?php echo base_url() ?>assets/web_admin/pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li> -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Forms</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('admin/form_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tambah Data Barang Masuk</a></li>
              <li><a href="<?php echo base_url('admin/form_satuan') ?>"><i class="fa fa-circle-o"></i> Tambah Satuan Barang</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Tables</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url('admin/tabel_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tabel Barang Masuk</a></li>
              <li><a href="<?= base_url('admin/tabel_barangkeluar') ?>"><i class="fa fa-circle-o"></i> Tabel Barang Keluar</a></li>
              <li><a href="<?= base_url('admin/tabel_satuan') ?>"><i class="fa fa-circle-o"></i> Tabel Satuan</a></li>
            </ul>

          <li class="header">LABELS</li>
          <li>
            <a href="<?php echo base_url('admin/profile') ?>">
              <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/users') ?>">
              <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Users</span></a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content" style="min-height:150px">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <?php if (!isset($stokBarangMasuk)) { ?>
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
          <!-- ./col -->
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
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <?php if (!empty($dataUser)) { ?>
                  <h3><?= $dataUser ?></h3>
                <?php } ?>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/users') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
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
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->

      </section>
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