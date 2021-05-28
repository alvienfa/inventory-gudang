<div class="col-lg-12 col-md-6 col-12 col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
               <form action="" type="get">
                    <select class="form-control" name="limit" id="" onchange="submit()">
                        <option value="0">Show</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
               </form>
            </div>

            <div class="card-header-action">
                <a href="?limit=3" class="btn btn-primary">View All</a>
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
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($list_data as $item) : ?>
                            <tr>
                                <td class="text-uppercase font-weight-bold"><?= $item->nama_barang ?></td>
                                <td><?= $item->id_transaksi ?></td>
                                <td><span class="font-weight-bold"><?= $item->jumlah . "</span> " . $item->satuan ?> </td>
                                <td>
                                    <a href="#">
                                        <img src="<?= base_url('assets/qrcode/images/') . $item->qr_code ?>" alt="<?= $item->nama_barang ?>" width="70" onerror="this.onerror=null;this.src='<?= base_url('assets/img/error-image.png') ?>'" class="rounded">
                                    </a>
                                </td>
                                <td><?= $item->nama_gudang ?></td>
                                <td>
                                    <a class="btn btn-secondary" href="<?= base_url('barang/') . $item->id_transaksi ?>"><i class="fas fa-eye"></i></a>
                                </td>
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

<script>
    function submit(){
        console.log('test')
    }
</script>