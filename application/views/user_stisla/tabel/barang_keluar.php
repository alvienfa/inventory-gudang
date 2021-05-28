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
                            <th>ID Transaksi</th>
                            <th>Nama</th>
                            <th>Kode Barang</th>
                            <th>Jumlah</th>
                            <th>Penanggung Jawab</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($list_data as $item) : ?>
                            <tr>
                                <td><?= $item->id_transaksi ?></td>
                                <td class="font-weight-bold"><?= $item->nama_barang ?></td>
                                <td class="text-uppercase"><?= $item->kode_barang ?></td>
                                <td><span class="font-weight-bold"><?= $item->jumlah . "</span> " . $item->satuan ?> </td>
                                <td class="text-uppercase"><?= $item->nm_penjab ?> (<?= $item->nohp_penjab ?>)</td>
                                <td><?= $item->keterangan ?></td>
                                <!-- <td>
                                    <button 
                                    class="btn btn-primary modal-2" 
                                    data-alamat="<?= $item->alamat?>"
                                    data-kecamatan="<?= $item->kecamatan ?>"
                                    data-kota="<?= $item->kota?>"
                                    data-provinsi="<?= $item->provinsi?>"
                                    data-pos="<?= $item->kode_pos?>"
                                    ><i class="fas fa-map-marker"></i></button>
                                </td> -->
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Lamtoro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>