<div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <button class="btn btn-warning" data-toggle="modal" data-target="#printBarangKembali"><i class="fas fa-print"></i> PRINT</button>
            </div>
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
                            <th>ID Transaksi</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_data as $item) : ?>
                            <tr>
                                <td><?= $no?></td>
                                <td class="font-weight-bold text-uppercase"><a href="<?= base_url('barang/') . $item->id_transaksi?>" class="badge"><?= $item->nama_barang ?></a></td>
                                <td><small><?= $item->id_transaksi ?></small></td>
                                <td class="text-uppercase"><small><?= $item->kode_barang ?></small></td>
                                <td><small><span class="font-weight-bold"><?= $item->jumlah . "</span> " . $item->satuan ?> </small></td>
                                <?php
                                switch ($item->status):
                                    case 0:
                                        $badge = 'badge badge-warning';
                                        break;
                                    case 1:
                                        $badge = 'badge badge-success';
                                        break;
                                    case 2:
                                        $badge = 'badge badge-primary';
                                        break;
                                    case 3:
                                        $badge = 'badge badge-danger';
                                        break;
                                endswitch;
                                ?>
                                <td class="text-uppercase">
                                    <span class="<?= $badge ?>"><small><?= $item->text_status ?></small></span>
                                </td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="<?= base_url('barang/') . $item->id_transaksi ?>"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php $no++; endforeach; ?>
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