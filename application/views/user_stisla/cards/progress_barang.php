<div class="col-lg-4 col-md-6 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Total Barang</h4>
        </div>
        <div class="card-body">
            <?php foreach ($progress_barang as $data) :
            ?>
                <div class="mb-4">
                    <div class="text-small float-right font-weight-bold text-muted"><?= $data->jumlah ?></div>
                    <div class="font-weight-bold mb-1 text-uppercase"><a class="badge badge-sm" href="<?= base_url("barang/") . $data->id_transaksi?>"><?= $data->nama_barang ?><a></div>
                    <div class="progress" data-height="3">
                        <div class="progress-bar" role="progressbar" data-width="<?= $data->jumlah / ($progress_barang[0]->jumlah / 100) ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax=" <?= $progress_barang[0]->jumlah ?>"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>