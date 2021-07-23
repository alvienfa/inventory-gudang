<?php $input_styles = "form-control form-control-sm text-uppercase text-small";
$dummy = (object) array(
    'keterangan' => 'digunakan untuk penyemprotan',
    'alamat'     => 'Jl. Dermaga 01 RT005/RW015',
    'kecamatan'  => 'Jagakarsa',
    'kota'       => 'Jakarta Selatan',
    'provinsi'   => 'DKI Jakarta',
    'kode_pos'   => '12345',
    'nm_penjab'  => 'Ari Lesmana',
    'nohp_penjab' => '62878288394921',
    'customer_nama' => 'PT. Risky Semesta',
    'customer_telp' => '087889238391',
);
// $dummy = (object) array(
//     'keterangan' => NULL,
//     'alamat'     => NULL,
//     'kecamatan'  => NULL,
//     'kota'       => NULL,
//     'provinsi'   => NULL,
//     'kode_pos'   => NULL,
//     'nm_penjab'  => NULL,
//     'nohp_penjab' => NULL,
//     'customer_nama' => NULL,
//     'customer_telp' => NULL,
// );


?>
<!-- Keluar -->
<form id="keluar" action="<?= base_url('barang/submit/keluar') ?>" method="POST">
    <div class="modal fade" tabindex="-1" role="dialog" id="scannerKeluar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase"><?= $detail->nama_barang ?> (#<?= $detail->kode_barang ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 400px;overflow-y:scroll">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Jumlah</label>
                                <?php if ($detail->jumlah <= 0) : ?>
                                    <p class="text-danger font-weight-bold text-small">Stok Barang Tidak Tersedia</p>
                                    <input type="hidden" name="jumlah" value="0" class="<?= $input_styles ?>">
                                <?php else : ?>
                                    <input type="hidden" name="id_transaksi" value="<?= $detail->id_transaksi ?>">
                                    <input type="number" max="<?= $detail->jumlah ?>" min="1" name="jumlah" class="<?= $input_styles ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stok barang">Stok Di Gudang</label>
                                <div class="row pl-3">
                                    <input type="number" min="0" name="stok_barang" value="<?= $detail->jumlah ?>" class="w-50 <?= $input_styles ?>" readonly>
                                    <label class="p-1"><?= $detail->satuan ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Dari Tanggal Sampai Tanggal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input type="text" name="daterange" class="form-control daterange-cus">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Keterangan</label>
                        <input value="<?= $dummy->keterangan ?>" type="text" name="keterangan" class="<?= $input_styles ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama barang">Alamat</label>
                        <input value="<?= $dummy->alamat ?>" type="text" name="alamat" class="<?= $input_styles ?> ">
                    </div>

                    <div class="form-group">
                        <label for="nama barang">Kecamatan</label>
                        <input value="<?= $dummy->kecamatan ?>" type="text" name="kecamatan" class="<?= $input_styles ?> ">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Kota</label>
                        <input value="<?= $dummy->kota ?>" type="text" name="kota" class="<?= $input_styles ?> ">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Provinsi</label>
                        <input value="<?= $dummy->provinsi ?>" type="text" name="provinsi" class="<?= $input_styles ?> ">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Kode Pos</label>
                        <input value="<?= $dummy->kode_pos ?>" type="phone" name="kode_pos" class="<?= $input_styles ?> " maxlength="5">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Penanggung Jawab</label>
                                <input value="<?= $dummy->nm_penjab ?>" type="text" name="nm_penjab" class="<?= $input_styles ?> " required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">No HP Penanggung Jawab</label>
                                <input value="<?= $dummy->nohp_penjab ?>" type="phone" name="nohp_penjab" class="<?= $input_styles ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Nama Customer</label>
                                <input value="<?= $dummy->customer_nama ?>" type="text" name="customer_nama" class="<?= $input_styles ?> " required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Customer Telp</label>
                                <input value="<?= $dummy->customer_telp ?>" type="phone" name="customer_telp" class="<?= $input_styles ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Author</label>
                        <input value="<?= $this->session->userdata('name') ?>" type="text" class="<?= $input_styles ?>" disabled>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-danger btnSubmit">SUBMIT BARANG</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Kembali -->
<form id="kembali" action="<?= base_url('barang/submit/kembali') ?>" method="POST">
    <div class="modal fade" tabindex="-1" role="dialog" id="scannerKembali">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase"><?= $detail->nama_barang ?> (#<?= $detail->kode_barang ?>) </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Jumlah (*<?= $detail->satuan ?>)</label>
                                <input type="hidden" name="id_transaksi" value="<?= $detail->id_transaksi ?>">
                                <input value="" max="<?= $detail->jumlah ?>" min="1" type="number" name="jumlah" class="<?= $input_styles ?> jumlah" required>
                                <input type="hidden" name="total_keluar" value="<?= $detail->jumlah ?>">
                                <input type="hidden" name="id" value="<?= $detail->id ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stok barang">Stok Di Gudang</label>
                                <input id="stok" type="number" name="stok_barang" value="<?= $detail->jumlah ?>" class="<?= $input_styles ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-6"><?= $this->load->view('components/forms/input_number', NULL, TRUE) ?></div> -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Author</label>
                                <input value="<?= $this->session->userdata('name') ?>" type="text" class="<?= $input_styles ?>" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Status</label>
                                <select name="status" class="custom-select form-control-sm text-small text-uppercase" required>
                                    <?php foreach ($list_status as $item) : ?>
                                        <option <?= ($item->id == 0 ? 'disabled' : NULL) ?> value="<?= $item->id ?>"><?= $item->text_status ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Keterangan</label>
                        <input value="" type="text" name="keterangan" class="<?= $input_styles ?>" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-success btnSubmit">SUBMIT BARANG <i class="fas fa-arrow-up"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const btnSubmit = document.querySelectorAll(".btnSubmit")
    const jumlah = document.querySelector("input[name='jumlah']")
    jumlah.addEventListener('change', (e) => {
        console.dir(jumlah.closest("form").querySelector(".btnSubmit").removeAttribute('disabled'))
    })
    btnSubmit.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault()
            const form = item.closest("form")
            const stok = item.closest("form").querySelector("input[name='stok_barang']").value
            const jumlah = item.closest("form").querySelector("input[name='jumlah']").value
            switch (form.attributes.id.value) {
                case 'kembali':
                    item.closest("form").submit()
                    e.target.setAttribute('disabled', 'disabled')
                    break;
                    case 'keluar':
                    
                    if (+stok > 0 && +stok >= +jumlah) {
                        item.closest("form").submit()
                        e.target.setAttribute('disabled', 'disabled')
                    } else {
                        alert('Barang Tidak Tersedia')
                    }
                    break;
            }

        })
    })
</script>