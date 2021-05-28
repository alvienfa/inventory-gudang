<div class="col-lg-6 col-md-6 col-12 col-sm-12">
    <article class="article article-style-c">
        <div class="article-details">
            <div class="article-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th class="text-right">ID Transaksi</th>
                            <th>:</th>
                            <th><?= $detail->id_transaksi ?></th>
                        </tr>
                        <tr>
                            <th class="text-right">Nama Barang</th>
                            <th>:</th>
                            <th class="text-uppercase"><?= $detail->nama_barang ?></th>
                        </tr>
                        <tr>
                            <th class="text-right">Detail Barang</th>
                            <th>:</th>
                            <th>...</th>
                        </tr>
                        <tr>
                            <th class="text-right">Merek</th>
                            <th>:</th>
                            <th>...</th>
                        </tr>
                        <tr>
                            <th class="text-right">Type</th>
                            <th>:</th>
                            <th>...</th>
                        </tr>
                        <tr>
                            <th class="text-right">Jumlah</th>
                            <th>:</th>
                            <th><?= $detail->jumlah ?> <?= $detail->satuan ?></th>
                        </tr>
                        <tr>
                            <th class="text-right">Lokasi</th>
                            <th>:</th>
                            <th><?= $detail->lokasi ?></th>
                        </tr>
                        <tr>
                            <th class="text-right">Keterangan</th>
                            <th>:</th>
                            <th><?= $detail->keterangan ?></th>
                        </tr>
                        <tr>
                            <th class="text-right">Gudang</th>
                            <th>:</th>
                            <th><?= $detail->nama_gudang ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </article>
</div>