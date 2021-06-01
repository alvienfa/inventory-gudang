<div class="col-lg-12 col-md-6 col-12 col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4> Total Barang (<?= $total_barang_masuk?>)</h4>
            <div class="card-header-action">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">SEARCH <i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>ID Transaksi</th>
                            <th>Total</th>
                            <th>QR Code</th>
                            <th>Gudang</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_data as $item) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><small class="text-uppercase font-weight-bold"><?= $item->nama_barang ?></small></td>
                                <td><small><?= $item->id_transaksi ?></small></td>
                                <td><span class="font-weight-bold"><?= $item->jumlah . "</span> " . $item->satuan ?> </td>
                                <td>
                                    <a href="#">
                                        <img src="<?= base_url('assets/qrcode/images/') . $item->qr_code ?>" alt="<?= $item->nama_barang ?>" width="70" onerror="this.onerror=null;this.src='<?= base_url('assets/img/error-image.png') ?>'" class="rounded">
                                    </a>
                                </td>
                                <td><small><?= $item->nama_gudang ?></small></td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="<?= base_url('barang/') . $item->id_transaksi ?>"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
                <div class="card-body d-flex justify-content-center">
                    <nav class="" aria-label="...">
                        <?= $pagination ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>