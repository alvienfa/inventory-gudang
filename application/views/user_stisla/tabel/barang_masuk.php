<style>
    .test{
        border-radius:1rem;
    }
</style>
<div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card position-relative">
        <div class="card-header d-flex justify-content-between">
            <div>
                <button class="btn btn-warning" data-toggle="modal" data-target="#printModal"><i class="fas fa-print"></i> PRINT</button>
            </div>
            <div class="card-header-action">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">SEARCH <i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="card-body p-0 ">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>KATEGORI</th>
                            <th>JUMLAH</th>
                            <th>GAMBAR</th>
                            <th>GUDANG</th>
                            <th>DETAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_data as $item) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <small><a class="badge text-uppercase font-weight-bold" href="<?= base_url('barang/') . $item->id_transaksi?>"><?= $item->nama_barang ?></a></small>
                                </td>
                                <td><small class="text-uppercase font-weight-bold"><?= $item->nama_kategori ?></small></td>
                                <td><span class="font-weight-bold text-small"><?= $item->jumlah . $item->satuan ?> </span></td>
                                <td>
                                    <a href="javascript:void(0)" class="btn-qr test"  
                                    data-toggle="tooltip" 
                                    data-html="true" 
                                    title="<img class='img-fluid' src='<?= base_url('assets/upload/gambar/') . $item->gambar ?>' >">
                                        <img class="img-fluid p-2 test" src="<?= base_url('assets/upload/gambar/') . $item->gambar ?>" alt="<?= $item->nama_barang ?>" width="70" 
                                        onerror="this.onerror=null;this.src='<?= base_url('assets/img/error-image.png') ?>'" >
                                    </a>
                                </td>
                                <td><small><?= $item->nama_gudang ?></small></td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="<?= base_url('barang/') . $item->id_transaksi ?>"><i class="fas fa-eye"></i></a>
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
        <?= $this->load->view('user_stisla/modals/qrcode', '', TRUE) ?>
    </div>
</div>
