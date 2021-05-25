<div class="form-group">
    <label for="lokasi">Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?= isset($alamat)? $alamat:'' ?>" readonly>
</div>
<div class="form-group">
    <label for="lokasi">Kecamatan</label>
    <input type="text" name="kecamatan" class="form-control" value="<?= isset($kecamatan)? $kecamatan: '' ?>" readonly>
</div>
<div class="form-group">
    <label for="lokasi">Kota / Kabupaten</label>
    <input type="text" name="kota" class="form-control" value="<?= isset($kota)? $kota: '' ?>" readonly>
</div>
<div class="form-group">
    <label for="lokasi">Provinsi</label>
    <input type="text" name="provinsi" class="form-control" value="<?= isset($provinsi)? $provinsi: '' ?>" readonly>
</div>
<div class="form-group">
    <label for="lokasi">Kode POS</label>
    <input type="number" name="kode_pos" class="form-control" value="<?= isset($kode_pos)? $kode_pos: '' ?>" readonly>
</div>