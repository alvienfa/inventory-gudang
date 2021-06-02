<?php
$text_class = "text-uppercase font-weight-bold text-primary mb-0";
?>
<div class="col-lg-6 col-md-6 col-12 col-sm-12">
    <article class="article article-style-c">
        <div class="article-details">
            <div class="article-body">
                <div class="form-group">
                    <label class="mb-0" for="">ID Transaksi</label>
                    <p class="<?= $text_class ?>"><?= $detail->id_transaksi ?></p>
                    <label class="mb-0" for="">Nama Barang</label>
                    <p class="<?= $text_class ?>"><?= $detail->nama_barang ?></p>
                    <label class="mb-0" for="">Serie</label>
                    <p class="mb-0">________________</p>
                    <label class="mb-0" for="">Warna</label>
                    <p class="mb-0">________________</p>
                    <label class="mb-0" for="">Jumlah </label>
                    <p class="<?= $text_class ?>"><?= $detail->jumlah ?> <?= $detail->satuan ?></p>
                    <label class="mb-0" for="">Nama Gudang</label>
                    <p class="<?= $text_class ?>"><?= $detail->nama_gudang ?></p>
                    <label class="mb-0" for="">Keterangan</label>
                    <p class="<?= $text_class ?>"><?= $detail->keterangan ?></p>
                </div>
            </div>
        </div>
    </article>
</div>