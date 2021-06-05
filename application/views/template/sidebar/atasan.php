<li class="menu-header">Dashboard</li>
<li class="nav-item dropdown <?= (base_url('user') == current_url() ? 'active' : '') ?>">
    <a href="<?= base_url('user') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="menu-header">Scan QR</li>
<li class="nav-item dropdown <?= (base_url('barang') == current_url() ? 'active' : '') ?>">
    <a href="<?= base_url('barang') ?>" class="nav-link"><i class="fas fa-qrcode"></i><span>Barcode Scan</span></a>
</li>
<li class="menu-header">Inventory</li>
<li class="nav-item dropdown <?= (strpos(current_url(), 'user/tabel') ? 'active' : '') ?>">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-table"></i> <span>Table</span></a>
    <ul class="dropdown-menu" style="<?= (strpos(current_url(), 'user/tabel') ? 'display:block' : '') ?>">
        <li class="<?= (strpos(current_url(), 'tabel_barang_masuk') ? 'active' : '') ?>"><a class="nav-link" href="<?= base_url('user/tabel_barang_masuk') ?>">Barang Masuk</a></li>
        <li class="<?= (strpos(current_url(), 'tabel_barang_keluar') ? 'active' : '') ?>"><a class="nav-link" href="<?= base_url('user/tabel_barang_keluar') ?>">Barang Keluar</a></li>
        <li class="<?= (strpos(current_url(), 'tabel_barang_kembali') ? 'active' : '') ?>"><a class="nav-link" href="<?= base_url('user/tabel_barang_kembali') ?>">Barang Kembali</a></li>
    </ul>
</li>
<li class="nav-item dropdown <?= (strpos(current_url(), 'user/list') ? 'active' : '') ?>">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i> <span>List</span></a>
    <ul class="dropdown-menu" style="<?= (strpos(current_url(), 'user/list') ? 'display:block' : '') ?>">
        <li class="<?= (strpos(current_url(), 'list_barang_masuk') ? 'active' : '') ?>"><a class="nav-link" href="<?= base_url('user/list_barang_masuk') ?>">Barang Masuk</a></li>
    </ul>
</li>
<li class="menu-header">Print</li>
<li class="nav-item dropdown <?= (strpos(current_url(), 'user/print') ? 'active' : '') ?>">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-pdf"></i> <span>Download</span></a>
    <ul class="dropdown-menu" style="<?= (strpos(current_url(), 'user/print') ? 'display:block' : '') ?>">
        <li class="<?= (strpos(current_url(), 'tabel_barang_masuk') ? 'active' : '') ?>">
            <a class="nav-link" href="<?= base_url('user/tabel_barang_masuk') ?>">Surat Jalan</a>
        </li>
        <li class="<?= (strpos(current_url(), 'tabel_barang_keluar') ? 'active' : '') ?>">
            <a class="nav-link" href="<?= base_url('user/tabel_barang_keluar') ?>">Barang Masuk</a>
        </li>
        <li class="<?= (strpos(current_url(), 'tabel_barang_kembali') ? 'active' : '') ?>">
            <a class="nav-link" href="<?= base_url('user/tabel_barang_kembali') ?>">Barang Kembali</a>
        </li>
    </ul>
</li>