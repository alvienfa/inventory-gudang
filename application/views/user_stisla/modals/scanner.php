<?php $input_styles = "form-control form-control-sm text-uppercase text-small" ?>

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
                                <label for="nama barang">Jumlah (*<?= $detail->satuan ?>)</label>
                                <input type="hidden" name="id_transaksi" value="<?= $detail->id_transaksi ?>">
                                <input value="" placeholder="" type="phone" name="jumlah" class="<?= $input_styles?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stok barang">Stok</label>
                                <input type="text" value="<?= $detail->jumlah ?> <?= $detail->satuan ?>" 
                                class="<?= $input_styles?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Keterangan</label>
                        <input value="" type="text" name="keterangan" class="<?= $input_styles?>">
                    </div>

                    <div class="form-group">
                        <label for="nama barang">Alamat</label>
                        <input value="" type="text" name="alamat" class="<?= $input_styles?> ">
                    </div>

                    <div class="form-group">
                        <label for="nama barang">Kecamatan</label>
                        <input value="" placeholder="" type="text" name="kecamatan" class="<?= $input_styles?> ">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Kota</label>
                        <input value="" placeholder="" type="text" name="kota" class="<?= $input_styles?> ">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Provinsi</label>
                        <input value="" placeholder="" type="text" name="provinsi" class="<?= $input_styles?> ">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Kode Pos</label>
                        <input value="" placeholder="" type="phone" name="kode_pos" class="<?= $input_styles?> " maxlength="5">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Penanggung Jawab</label>
                                <input value="" placeholder="" type="text" name="nm_penjab" class="<?= $input_styles?> ">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">No HP Penanggung Jawab</label>
                                <input value="" placeholder="" type="phone" name="nohp_penjab" class="<?= $input_styles?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Author</label>
                        <input value="<?= $this->session->userdata('name') ?>" placeholder="" type="text" 
                        class="<?= $input_styles?>" readonly>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" onclick="this.disabled = true" class="btn btn-danger">SUBMIT BARANG <i class="fas fa-arrow-down"></i></button>
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
                    <h5 class="modal-title"><?= $detail->nama_barang ?> (#<?= $detail->kode_barang ?>) </h5>
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
                                <input value="<?= $detail->jumlah?>" type="phone" name="jumlah" class="<?= $input_styles?>" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stok barang">Stok</label>
                                <input id="stok" type="number" name="stok" value="" class="<?= $input_styles?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Author</label>
                                <input value="@<?= $this->session->userdata('name') ?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama barang">Status</label>
                                <select name="status" class="custom-select form-control-s " required>
                                    <?php foreach ($list_status as $item) : ?>
                                        <option value="<?= $item->id ?>"><?= $item->text_status ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Keterangan</label>
                        <input value="" type="text" name="keterangan" class="<?= $input_styles?>" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" onclick="this.disabled = true" class="btn btn-success">SUBMIT BARANG <i class="fas fa-arrow-up"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>