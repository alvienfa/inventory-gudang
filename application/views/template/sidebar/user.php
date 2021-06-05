<li class="menu-header">Scan</li>
<li class="nav-item dropdown <?= (strpos(current_url(), 'scan') ? 'active' : '') ?>">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
        <i class="fas fa-qrcode"></i> <span>Scan</span>
    </a>
    <ul class="dropdown-menu" style="<?= (strpos(current_url(), 'scan') ? 'display:block' : '') ?>">
        <li class="<?= (strpos(current_url(), 'scan/kembali') ? 'active' : '') ?>">
            <a class="nav-link" href="<?= base_url('scan/kembali') ?>">Barang Masuk</a>
        </li>
        <li class="<?= (strpos(current_url(), 'scan/keluar') ? 'active' : '') ?>">
            <a class="nav-link" href="<?= base_url('scan/keluar') ?>">Barang Keluar</a>
        </li>
    </ul>
</li>