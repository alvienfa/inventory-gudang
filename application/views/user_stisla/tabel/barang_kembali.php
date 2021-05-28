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
                                <td class="text-uppercase"><?= $item->kode_barang ?></td>
                                <td><span class="font-weight-bold"><?= $item->jumlah . "</span> " . $item->satuan ?> </td>
                                <?php
                                switch ($item->status):
                                    case '0':
                                        $badge = 'badge badge-warning';
                                        break;
                                    case '1':
                                        $badge = 'badge badge-success';
                                        break;
                                    case '2':
                                        $badge = 'badge badge-primary';
                                        break;
                                    case '3':
                                        $badge = 'badge badge-danger';
                                        break;
                                endswitch;
                                ?>
                                <td class="text-uppercase">
                                    <span class="<?= $badge ?>"><?= $item->text_status ?></span>
                                </td>
                                <td><?= $item->lokasi ?></td>
                            </tr>
                        <?php endforeach; ?>
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