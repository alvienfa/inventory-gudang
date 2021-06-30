<div class="col-lg-8 col-md-6 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Last Barang Kembali</h4>
            <div class="card-header-action">
                <a href="<?= base_url('user/tabel_barang_kembali') ?>" class="btn btn-primary">View All</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <!-- <thead>
                        <tr>
                            <th>TITLE</th>
                            <th>ID TRANSAKSI</th>
                            <th>JUMLAH</th>
                            <th class="text-center">PENERIMA</th>
                            <th>STATUS</th>
                        </tr>
                    </thead> -->
                    <tbody>
                        <?php foreach ($last_data as $last) : ?>
                            <tr>
                                <td><a class="badge text-primary text-uppercase" href="<?= base_url('barang/' . $last->id_transaksi) ?>"><?= $last->nama_barang ?></a></td>
                                <td class="text-small"><?= $last->id_transaksi ?></td>
                                <td class="text-small"><span class="font-weight-bold"><?= $last->jumlah . "</span> " . $last->satuan ?> </td>
                                <th class="text-uppercase text-small text-center"><?= $last->nm_penjab ?></th>
                                <th><span style="font-size: 7pt;" class="badge badge-success"><i class="fab fa-whatsapp"></i> <?= $last->nohp_penjab ?></span></th>
                                <?php
                                switch ($last->status) {
                                    case 0:
                                        $color = 'text-uppercase badge badge-warning';
                                        break;
                                    case 1:
                                        $color = 'text-uppercase badge badge-success';
                                        break;
                                    case 2:
                                        $color = 'text-uppercase badge badge-primary';
                                        break;
                                    case 3:
                                        $color = 'text-uppercase badge badge-danger';
                                        break;
                                }   ?>
                                <th><span style="font-size: 7pt;" class="<?= $color?>"><?= $last->text_status ?></span></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>