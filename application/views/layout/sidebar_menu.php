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
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class='<?= (base_url('admin') == current_url() ? ' active' : '') ?> '>
        <a href="<?= base_url('admin') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <?php $forms = base_url('admin/form_barangmasuk') == current_url() || base_url('admin/form_satuan') == current_url() ? 'treeview active' : 'treeview' ?>
      <li class='<?= $forms ?>'>
        <a href="#">
          <i class="fa fa-edit"></i> <span>Forms</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class='<?= (base_url('admin/form_barangmasuk') == current_url() ? ' active' : '') ?> '><a href="<?php echo base_url('admin/form_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tambah Data Barang Baru</a></li>
          <li class='<?= (base_url('admin/form_satuan') == current_url() ? ' active' : '') ?> '><a href="<?php echo base_url('admin/form_satuan') ?>"><i class="fa fa-circle-o"></i> Tambah Satuan Barang</a></li>
        </ul>
      </li>
      <?php $tables = base_url('admin/tabel_barangmasuk') == current_url() ||
        base_url('admin/tabel_barangkeluar') == current_url() || base_url('admin/tabel_satuan') == current_url() ? 'treeview active' : 'treeview' ?>
      <li class="<?= $tables ?>">
        <a href="#">
          <i class="fa fa-table"></i> <span>Tables </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class='<?= (base_url('admin/tabel_barangmasuk') == current_url() ? ' active' : '') ?> '><a href="<?= base_url('admin/tabel_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tabel Barang Masuk</a></li>
          <li class='<?= (base_url('admin/tabel_barangkeluar') == current_url() ? ' active' : '') ?> '><a href="<?= base_url('admin/tabel_barangkeluar') ?>"><i class="fa fa-circle-o"></i> Tabel Barang Keluar</a></li>
          <li class='<?= (base_url('admin/tabel_barangkembali') == current_url() ? ' active' : '') ?> '><a href="<?= base_url('admin/tabel_barangkembali') ?>"><i class="fa fa-circle-o"></i> Tabel Barang Kembali</a></li>
          <li class='<?= (base_url('admin/tabel_satuan') == current_url() ? ' active' : '') ?> '><a href="<?= base_url('admin/tabel_satuan') ?>"><i class="fa fa-circle-o"></i> Tabel Satuan</a></li>
          <li class='<?= (base_url('admin/tabel_gudang') == current_url() ? ' active' : '') ?> '><a href="<?= base_url('admin/tabel_gudang') ?>"><i class="fa fa-circle-o"></i> Tabel Data Gudang</a></li>
          <li class='<?= (base_url('admin/tabel_barang_delete') == current_url() ? ' active' : '') ?> '><a href="<?= base_url('admin/tabel_barang_delete') ?>"><i class="fa fa-trash"></i> Deleted Barang</a></li>
        </ul>
      </li>
      <?php $scans = base_url('admin/scan_barang_kembali') == current_url() ||
        base_url('admin/scan_barang_keluar') == current_url() ? 'treeview active' : 'treeview' ?>
      <li class="<?= $scans ?>">
        <a href="#">
          <i class="fa fa-qrcode"></i> <span>Scan QR </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class='<?= (base_url('admin/scan_barang_kembali') == current_url() ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/scan_barang_kembali') ?>"><i class="fa fa-arrow-up text-green"></i> Scan Barang Kembali</a>
          </li>
          <li class='<?= (base_url('admin/scan_barang_keluar') == current_url() ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/scan_barang_keluar') ?>"><i class="fa fa-arrow-down text-red"></i> Scan Barang Keluar</a>
          </li>
        </ul>
      </li>
      <li class="header">LABELS</li>
      <li class='<?= (base_url('admin/profile') == current_url() ? ' active' : '') ?> '>
        <a href="<?php echo base_url('admin/profile') ?>">
          <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
      </li>
      <li class='<?= (base_url('admin/users') ==  current_url() ? ' active' : '') ?> '>
        <a href="<?php echo base_url('admin/users') ?>">
          <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Users</span></a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>