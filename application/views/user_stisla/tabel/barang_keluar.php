<div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Barang Keluar</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-primary">Search <i class="fas fa-search"></i></a>
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
                            <th>Kode Barang</th>
                            <th>Jumlah</th>
                            <th>Contact</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_data as $item) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td class="font-weight-bold">
                                    <h6><a class="text-primary" href="<?= base_url('barang/' . $item->id_transaksi)?>"><?= $item->nama_barang ?></h6>
                                </td>
                                <td><small><?= $item->id_transaksi ?></small></td>
                                <td class="text-uppercase"><small><?= $item->kode_barang ?></small></td>
                                <td><small><span class="font-weight-bold"><?= $item->jumlah . "</span> " . $item->satuan ?> </small></td>
                                <td class="text-uppercase text-small"><small><i class="fas fa-user"></i> <?= $item->nm_penjab ?> (<?= $item->nohp_penjab ?>)</small></td>
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
                                <td>
                                    <a
                                    type="button"
                                    data-keterangan=<?= $item->keterangan?> 
                                    data-alamat=<?= $item->alamat ?> 
                                    data-kecamatan=<?= $item->kecamatan ?> 
                                    data-kota=<?= $item->kota ?> 
                                    data-provinsi=<?= $item->provinsi ?> 
                                    data-pos=<?= $item->kode_pos ?> 
                                    class="btn btn-secondary btn-sm btn-detail">...</a>
                                </td>
                                <td><?= $item->status ?></td>
                                <td class="text-uppercase text-sm">
                                    <span class="<?= $badge ?>">
                                        <small><?= $item->text_status ?></small>
                                    </span>
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