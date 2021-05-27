<div class="col-lg-12 col-md-6 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Barang Masuk</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-primary">View All</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Total</th>
                            <th>QR Code</th>
                            <th>Gudang</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($list_data as $last) : ?>
                            <tr>
                                <td>
                                    <?= $last->nama_barang ?>
                                    <div class="table-links">
                                        in <a href="#">Web Development</a>
                                        <div class="bullet"></div>
                                        <a href="#">View</a>
                                    </div>
                                </td>
                                <td><?= $last->id_transaksi ?></td>
                                <td><span class="font-weight-bold"><?= $last->jumlah . "</span> " . $last->satuan ?> </td>
                                <td>
                                    <a href="#" >
                                        <img src="<?= base_url('assets/qrcode/images/') .$last->qr_code ?>" alt="<?= $last->nama_barang?>" width="50" class="rounded"></a>
                                </td>
                                <td><?= $last->nama_gudang ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>