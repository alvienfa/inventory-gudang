<div class="col-lg-12 col-md-6 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Barang Kembali</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-primary">View All</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($list_data as $item) : ?>
                            <tr>
                                <td><?= $item->id_transaksi ?></td>
                                <td class="font-weight-bold"><?= $item->nama_barang ?></td>
                                <td class="text-uppercase"><?= $item->kode_barang?></td>
                                <td><span class="font-weight-bold"><?= $item->jumlah . "</span> " . $item->satuan ?> </td>
                                <td><?= $item->status ?></td>
                                <td><?= $item->lokasi?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>