<form action="<?= base_url("report/barangMasuk")?>" method="GET">
    <div class="modal fade" tabindex="-1" role="dialog" id="printModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Print</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama barang">Nama Barang</label>
                        <input value="<?= $this->input->get('nama_barang') ?>" placeholder="" type="text" name="nama_barang" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">ID Transaksi</label>
                        <input value="<?= $this->input->get('id_transaksi') ?>" type="text" name="id_transaksi" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Kategori</label>
                        <select class="form-control form-control-sm" name="id_kategori">
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
                        <select class="form-control form-control-sm" name="id_gudang">
                            <option value="">--Pilih Gudang--</option>
                            <?php
                            foreach ($list_gudang as $item) : ?>
                                <option value="<?= $item->id ?>"><?= $item->nama_gudang ?></option>
                            <?php
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama barang">Show Data Per Page</label>
                        <select class="form-control" name="limit" value="<?= $this->input->get('id_gudang') ?>">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
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