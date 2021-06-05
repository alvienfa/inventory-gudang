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
      <?php $stok = (strpos(current_url(),'admin/gudang')? 'treeview active' : 'treeview')?>
      <li class='<?= $stok ?>'>
        <a href="#">
          <i class="fa fa-edit"></i> <span>Stok</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class='<?= (base_url('admin/gudang/1') == current_url() ? ' active' : '') ?> '><a href="<?php echo base_url('admin/gudang/1') ?>"><i class="fa fa-circle-o"></i> Stok Gudang Pak Sandy</a></li>
          <li class='<?= (base_url('admin/gudang/2') == current_url() ? ' active' : '') ?> '><a href="<?php echo base_url('admin/gudang/2') ?>"><i class="fa fa-circle-o"></i> Stok Gudang Inventory</a></li>
          <li class='<?= (base_url('admin/gudang/3') == current_url() ? ' active' : '') ?> '><a href="<?php echo base_url('admin/gudang/3') ?>"><i class="fa fa-circle-o"></i> Stok Gudang BBL</a></li>
        </ul>
      </li>
      <?php $tables = base_url('admin/tabel_barangmasuk') == current_url() ||
        base_url('admin/tabel_barangkeluar') == current_url() || base_url('admin/tabel_satuan') == current_url() ? 'treeview active' : 'treeview' ?>
      <li class="<?= $tables ?>">
        <a href="#">
          <i class="fa fa-table"></i> <span>SuperAdmin </span>
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