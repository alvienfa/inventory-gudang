<form action="<?= base_url("report/barangMasuk") ?>" method="GET">
    <div class="modal fade" tabindex="-1" role="dialog" id="printModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Print Stok Barang </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 400px;overflow-y:scroll">
                    <div class="form-group">
                        <label for="nama barang">Nama Barang</label>
                        <input value="<?= $this->input->get('nama_barang') ?>" type="text" name="nama_barang" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">ID Transaksi</label>
                        <input value="<?= $this->input->get('id_transaksi') ?>" type="text" name="id_transaksi" class="form-control form-control-sm">
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
                        <label for="nama barang">Kategori</label>
                        <select class="custom-select text-small" name="id_kategori">
                            <option value="">--Pilih Kategori--</option>
                            <?php
                            foreach ($list_kategori as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->nama_kategori ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Gudang Barang</label>
                        <select class="custom-select text-small" name="id_gudang">
                            <option value="">--Pilih Gudang--</option>
                            <?php
                            foreach ($list_gudang as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->nama_gudang ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-primary">PRINT <i class="fas fa-print"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?= base_url("report/laporan_barang") ?>" method="GET">
    <div class="modal fade" tabindex="-1" role="dialog" id="printBarangKeluar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Print Barang Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama barang">Nama Barang</label>
                        <input value="<?= $this->input->get('nama_barang') ?>" type="text" name="nama_barang" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">ID Transaksi</label>
                        <input value="<?= $this->input->get('id_transaksi') ?>" type="text" name="id_transaksi" class="form-control form-control-sm">
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
                        <label for="nama barang">Kategori</label>
                        <select class="custom-select text-small text-uppercase" name="id_kategori">
                            <option value="">--Pilih Kategori--</option>
                            <?php
                            foreach ($list_kategori as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->nama_kategori ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Status Barang</label>
                        <select class="custom-select text-small text-uppercase" name="id_gudang">
                            <option value="">--Pilih Status--</option>
                            <?php
                            foreach ($list_status as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->text_status ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Gudang Barang</label>
                        <select class="custom-select text-small text-uppercase" name="id_gudang">
                            <option value="">--Pilih Gudang--</option>
                            <?php
                            foreach ($list_gudang as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->nama_gudang ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-primary">PRINT <i class="fas fa-print"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?= base_url("report/barangKembali") ?>" method="GET">
    <div class="modal fade" tabindex="-1" role="dialog" id="printBarangKembali">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Print Barang Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama barang">Nama Barang</label>
                        <input value="<?= $this->input->get('nama_barang') ?>" type="text" name="nama_barang" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">ID Transaksi</label>
                        <input value="<?= $this->input->get('id_transaksi') ?>" type="text" name="id_transaksi" class="form-control form-control-sm">
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
                        <label for="nama barang">Kategori</label>
                        <select class="custom-select text-small text-uppercase" name="id_kategori">
                            <option value="">--Pilih Kategori--</option>
                            <?php
                            foreach ($list_kategori as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->nama_kategori ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Status Barang</label>
                        <select class="custom-select text-small text-uppercase" name="id_gudang">
                            <option value="">--Pilih Status--</option>
                            <?php
                            foreach ($list_status as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->text_status ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Gudang Barang</label>
                        <select class="custom-select text-small text-uppercase" name="id_gudang">
                            <option value="">--Pilih Gudang--</option>
                            <?php
                            foreach ($list_gudang as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->nama_gudang ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-primary">PRINT <i class="fas fa-print"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

