<div class="col-lg-9 col-md-6 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Last Barang Kembali</h4>
            <div class="card-header-action">
                <a href="<?= base_url('user/tabel_barang_kembali')?>" class="btn btn-primary">View All</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>TITLE</th>
                            <th>ID TRANSAKSI</th>
                            <th>JUMLAH</th>
                            <th>PENERIMA</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($last_data as $last) : ?>
                            <tr>
                                <td><a class="badge text-primary" href="<?= base_url('barang/' . $last->id_transaksi)?>"><?= $last->nama_barang ?></a></td>
                                <td class="text-small"><?= $last->id_transaksi ?></td>
                                <td class="text-small"><span class="font-weight-bold"><?= $last->jumlah . "</span> " . $last->satuan ?> </td>
                                <td class="text-uppercase text-small"><?= $last->nm_penjab ?></td>
                                <td><span class="badge badge-success text-uppercase text-small"><?= $last->text_status ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>