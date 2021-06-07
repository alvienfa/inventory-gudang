<li class="menu-header">Scan</li>
<li class="nav-item dropdown <?= (strpos(current_url(), 'barang') ? 'active' : '') ?>">
    <a href="<?= base_url('barang')?>" class="nav-link">
        <i class="fas fa-qrcode"></i> <span>Scan</span>
    </a>
</li>
<li class="nav-item <?= (strpos(current_url(), 'setting_user') ? 'active' : '') ?>">
    <a href="<?= base_url('user/setting_user')?>" class="nav-link">
        <i class="fas fa-cog"></i> <span>Setting</span>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('user/signout')?>" class="nav-link text-danger" >
        <i class="fas fa-power-off"></i> <span>Logout</span>
    </a>
</li>
