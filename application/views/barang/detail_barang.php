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

    .table td.fit,
    .table th.fit {
        white-space: nowrap;
        width: 1%;
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
                    <label class="mb-0" for="">Gudang</label>
                    <p class="<?= $text_class ?>"><?= $detail->nama_gudang ?></p>
                </div>
                <div class="">
                    <table class="table table-strip">
                        <thead>
                            <tr>
                                <th>
                                    Rusak
                                </th>
                                <th>
                                    Service
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bg-danger text-white">
                                    <?= $total->total_rusak ?> <?= $detail->satuan ?>
                                </td>
                                <td class="bg-primary text-white">
                                    <?= $total->total_service ?> <?= $detail->satuan ?>
                                </td>

                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>
                                    Keluar
                                </th>
                                <th>
                                    Gudang
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bg-warning text-white">
                                    <?= $total->total_keluar ?> <?= $detail->satuan ?>
                                </td>
                                <td class="bg-success text-white">
                                    <?= $detail->jumlah ?> <?= $detail->satuan ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
</div>