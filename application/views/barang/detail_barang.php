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
<div class="col-lg-5 col-md-6 col-12 col-sm-6">
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
                                <th class="bg-danger text-white">
                                    Rusak
                                </th>
                                <th class="bg-primary text-white">
                                    Service
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-danger font-weight-bold">
                                    <?= $total->total_rusak ?> <?= $detail->satuan ?>
                                </td>
                                <td class="text-primary font-weight-bold">
                                    <?= $total->total_service ?> <?= $detail->satuan ?>
                                </td>

                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th class="bg-warning text-white">
                                    Keluar
                                </th>
                                <th class="bg-success text-white">
                                    Gudang
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-warning font-weight-bold">
                                    <?= $total->total_keluar ?> <?= $detail->satuan ?>
                                </td>
                                <td class="text-success font-weight-bold">
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