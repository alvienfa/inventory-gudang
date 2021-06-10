<?php
$id_kategori = $this->input->get('id_kategori')
?>
<?php $forms = base_url('admin/form_barangmasuk') == current_url() || base_url('admin/form_satuan') == current_url() ? 'treeview active' : 'treeview' ?>

<li class='<?= $forms ?>'>
  <a href="#">
    <i class="fa fa-edit"></i> <span>Form Stok Barang</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class='<?= (base_url('admin/form_barangmasuk') == current_url() ? ' active' : '') ?> '><a href="<?php echo base_url('admin/form_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tambah Data Barang Baru</a></li>
    
  </ul>
</li>

<?php $barang_masuk = (strpos(current_url(), 'admin/tabel_barangmasuk') ? 'treeview active' : 'treeview') ?>
<li class="<?= $barang_masuk ?>">
    <a href="#">
        <i class="fa fa-table"></i> <span>Stok Barang </span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class='<?= (strpos(current_url(), 'tabel_barangmasuk') && $id_kategori == 1 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangmasuk?id_kategori=1') ?>">
                <i class="fa fa-circle-o"></i> Demo</a>
        </li>
        <li class='<?= (strpos(current_url(), 'tabel_barangmasuk') && $id_kategori == 2 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangmasuk?id_kategori=2') ?>"><i class="fa fa-circle-o"></i> Inventory</a>
        </li>
        <li class='<?= (strpos(current_url(), 'tabel_barangmasuk') && $id_kategori == 3 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangmasuk?id_kategori=3') ?>"><i class="fa fa-circle-o"></i> Persediaan</a>
        </li>
    </ul>
</li>
<?php $barang_keluar = (strpos(current_url(), 'admin/tabel_barangkeluar') ? 'treeview active' : 'treeview') ?>
<li class="<?= $barang_keluar ?>">
    <a href="#">
        <i class="fa fa-th"></i> <span>Barang Keluar </span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class='<?= (strpos(current_url(), 'tabel_barangkeluar') && $id_kategori == 1 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkeluar?id_kategori=1') ?>">
                <i class="fa fa-circle-o"></i> Demo</a>
        </li>
        <li class='<?= (strpos(current_url(), 'tabel_barangkeluar') && $id_kategori == 2 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkeluar?id_kategori=2') ?>"><i class="fa fa-circle-o"></i> Inventory</a>
        </li>
        <li class='<?= (strpos(current_url(), 'tabel_barangkeluar') && $id_kategori == 3 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkeluar?id_kategori=3') ?>"><i class="fa fa-circle-o"></i> Persediaan</a>
        </li>
    </ul>
</li>
<?php $barang_keluar = (strpos(current_url(), 'admin/tabel_barangkembali') ? 'treeview active' : 'treeview') ?>
<li class="<?= $barang_keluar ?>">
    <a href="#">
        <i class="fa fa-th-large"></i> <span>Barang Kembali </span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class='<?= (strpos(current_url(), 'tabel_barangkembali') && $id_kategori == 1 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkembali?id_kategori=1') ?>">
                <i class="fa fa-circle-o"></i> Demo</a>
        </li>
        <li class='<?= (strpos(current_url(), 'tabel_barangkembali') && $id_kategori == 2 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkembali?id_kategori=2') ?>"><i class="fa fa-circle-o"></i> Inventory</a>
        </li>
        <li class='<?= (strpos(current_url(), 'tabel_barangkembali') && $id_kategori == 3 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkembali?id_kategori=3') ?>"><i class="fa fa-circle-o"></i> Persediaan</a>
        </li>
    </ul>
</li>
<li class='<?= (base_url('admin/profile') == current_url() ? ' active' : '') ?> '>
  <a href="<?php echo base_url('admin/profile') ?>">
    <i class="fa fa-cogs" aria-hidden="true"></i> <span>Setting</span></a>
</li>