<?php
$text_class = "text-uppercase font-weight-bold text-primary mb-0";
?>
<style>
.table th {
   text-align: center;   
}
.table td {
   text-align: center;   
}
</style>
<div class="col-lg-6 col-md-6 col-12 col-sm-12">
    <article class="article article-style-c">
        <div class="article-details">
            <div class="article-body">
                <div class="form-group">
                    <label class="mb-0" for="">ID Transaksi</label>
                    <p class="<?= $text_class ?>"><?= $detail->id_transaksi ?></p>
                    <label class="mb-0" for="">Nama Barang</label>
                    <p class="<?= $text_class ?>"><?= $detail->nama_barang ?></p>
                    <p class="<?= $text_class ?>">#<?= $detail->kode_barang ?></p>
                    <label class="mb-0" for="">Kategori</label>
                    <p class="<?= $text_class ?>"><?= $detail->nama_kategori ?></p>
                    <label class="mb-0" for="">Jumlah </label>
                    <p class="<?= $text_class ?>"><?= $detail->jumlah ?> <?= $detail->satuan ?></p>
                    <label class="mb-0" for="">Gudang</label>
                    <p class="<?= $text_class ?>"><?= $detail->nama_gudang ?></p>
                </div>
                <div class="pl-4 pr-4">
                    <label class="mb-0 text-center" for="">Status</label>
                <table class="table table-strip">
                        <thead>
                            <tr>
                                <th>
                                    Rusak
                                </th>
                                <th>
                                    Service
                                </th>
                                <th>
                                    Keluar
                                </th>
                                <th>
                                    Di Gudang
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    12
                                </td>
                                <td>
                                    10
                                </td>
                                <td>
                                    11
                                </td>
                                <td>
                                    1
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
</div>