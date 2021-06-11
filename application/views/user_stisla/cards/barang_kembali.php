<div class="col-lg-6 col-md-6 col-12 col-sm-12">
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($last_data as $last) : ?>
                            <tr>
                                <td><?= $last->nama_barang ?></td>
                                <td><?= $last->id_transaksi ?></td>
                                <td><span class="font-weight-bold"><?= $last->jumlah . "</span> " . $last->satuan ?> </td>
                                <td><span class="badge badge-success text-uppercase"><?= $last->text_status ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>