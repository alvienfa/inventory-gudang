<div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <button class="btn btn-warning" data-toggle="modal" data-target="#printBarangKeluar"><i class="fas fa-print"></i> PRINT</button>
            </div>
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
                            <th>Penerima</th>
                            <th>Phone</th>
                            <th>Detail</th>
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
                                    <a class="badge text-primary text-uppercase" href="<?= base_url('barang/' . $item->id_transaksi) ?>"><?= $item->nama_barang ?>
                                </td>
                                <td><small><?= $item->id_transaksi ?></small></td>
                                <td class="text-uppercase"><small><?= $item->kode_barang ?></small></td>
                                <td><small><span class="font-weight-bold"><?= $item->jumlah . "</span> " . $item->satuan ?> </small></td>
                                <th><small><span class="text-uppercase text-small font-weight-bold"><?= $item->nm_penjab ?></span> </small></th>
                                <td><span class="badge badge-success"><i class="fab fa-whatsapp"></i> <?= $item->nohp_penjab ?></span></td>
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
                                    <a type="button" 
                                    data-keterangan=<?= $item->keterangan ?> data-alamat=<?= $item->alamat ?> data-kecamatan=<?= $item->kecamatan ?> 
                                    data-kota=<?= $item->kota ?> data-provinsi=<?= $item->provinsi ?> data-pos=<?= $item->kode_pos ?> 
                                    class="btn btn-secondary btn-sm btn-detail">...</a>
                                </td>
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