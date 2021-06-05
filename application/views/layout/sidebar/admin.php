<?php 
    $id_kategori = $this->input->get('id_kategori')
?>

<?php $barang_masuk = (strpos(current_url(),'admin/tabel_barangmasuk') ? 'treeview active' : 'treeview') ?>
<li class="<?= $barang_masuk ?>">
    <a href="#">
        <i class="fa fa-table"></i> <span>Stok Barang </span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class='<?= (strpos(current_url(),'tabel_barangmasuk') && $id_kategori == 1 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangmasuk?id_kategori=1') ?>">
                <i class="fa fa-circle-o"></i> Demo</a>
        </li>
        <li class='<?= (strpos(current_url(),'tabel_barangmasuk') && $id_kategori == 2 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangmasuk?id_kategori=2') ?>"><i class="fa fa-circle-o"></i> Inventory</a>
        </li>
        <li class='<?= (strpos(current_url(),'tabel_barangmasuk') && $id_kategori == 3 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangmasuk?id_kategori=3') ?>"><i class="fa fa-circle-o"></i> Persediaan</a>
        </li>
    </ul>
</li>
<?php $barang_keluar = (strpos(current_url(),'admin/tabel_barangkeluar')? 'treeview active' : 'treeview') ?>
<li class="<?= $barang_keluar ?>">
    <a href="#">
        <i class="fa fa-table"></i> <span>Barang Keluar </span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class='<?= (strpos(current_url(),'tabel_barangkeluar') && $id_kategori == 1 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkeluar?id_kategori=1') ?>">
                <i class="fa fa-circle-o"></i> Demo</a>
        </li>
        <li class='<?= (strpos(current_url(),'tabel_barangkeluar') && $id_kategori == 2 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkeluar?id_kategori=2') ?>"><i class="fa fa-circle-o"></i> Inventory</a>
        </li>
        <li class='<?= (strpos(current_url(),'tabel_barangkeluar') && $id_kategori == 3 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkeluar?id_kategori=3') ?>"><i class="fa fa-circle-o"></i> Persediaan</a>
        </li>
    </ul>
</li>
<?php $barang_keluar = (strpos(current_url(),'admin/tabel_barangkembali')? 'treeview active' : 'treeview') ?>
<li class="<?= $barang_keluar ?>">
    <a href="#">
        <i class="fa fa-table"></i> <span>Barang Kembali </span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class='<?= (strpos(current_url(),'tabel_barangkembali') && $id_kategori == 1 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkembali?id_kategori=1') ?>">
                <i class="fa fa-circle-o"></i> Demo</a>
        </li>
        <li class='<?= (strpos(current_url(),'tabel_barangkembali') && $id_kategori == 2 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkembali?id_kategori=2') ?>"><i class="fa fa-circle-o"></i> Inventory</a>
        </li>
        <li class='<?= (strpos(current_url(),'tabel_barangkembali') && $id_kategori == 3 ? ' active' : '') ?> '>
            <a href="<?= base_url('admin/tabel_barangkembali?id_kategori=3') ?>"><i class="fa fa-circle-o"></i> Persediaan</a>
        </li>
    </ul>
</li>