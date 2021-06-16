<style>
    .hide-scroll::-webkit-scrollbar {
        display: none;
    }

    body::-webkit-scrollbar {
        width: 0.5em;
    }

    body::-webkit-scrollbar-track {
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    body::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        /* outline: 1px solid slategrey; */
        border-radius: 20px;
    }
</style>
<div class="col-lg-4 col-md-4 col-12 col-sm-6">
    <div class="card bg-transparent shadow-none">
        <div class="card-body d-flex justify-content-center">
            <a class="btn btn-danger btn-round text-lg" href="javascript:void(0)" data-toggle="modal" data-target="#scannerKeluar">
                <i class="fas fa-arrow-up"></i> Barang Keluar
            </a>
        </div>
    </div>
    <h6>Barang Keluar</h6>
    <?php if (!$barang_keluar) : ?>
        <div class="card">
            <div class="card-body pb-2">
                <h6 class="text-uppercase text-center">belum ada transaksi</h6>
            </div>
        </div>
    <?php endif; ?>
    <div class="hide-scroll" style="height: 35rem;overflow-y:scroll;">
        <?php
        $no = 1;
        foreach ($barang_keluar as $item) :
            switch ($item->status):
                case 0:
                    $button = '<div><button class="btn btn-warning btn-round text-small" href="javascript:void(0)" >ONGOING</button></div>';
                    $color = "bg-warning";
                    break;
                case 1:
                    $button = '<div><button class="btn btn-success btn-round text-small" href="javascript:void(0)" ><i class="fas fa-check"></i></button></div>';
                    $color = "bg-success";
                    break;
                case 2:
                    $button = '<div><button class="btn btn-primary btn-round text-small" href="javascript:void(0)" >SERVICE</button></div>';
                    $color = "bg-primary";
                    break;
                case 3:
                    $button = '<div><button class="btn btn-danger btn-round text-small" href="javascript:void(0)" >RUSAK</button></div>';
                    $color = "bg-danger";
                    break;
                default:
                    $button = '<div><button class="btn btn-default btn-round text-small" href="javascript:void(0)" >Rusak</button></div>';
                    $color = "bg-info";
                    break;
            endswitch; ?>
            <div class="card">
                <div class="position-absolute <?= $color ?> pr-4 pb-2 text-white" style="clip-path: polygon(0 0, 0 100%, 100% 0);">
                    <p class="ml-2 font-weight-bold"><?= $no++; ?></p>
                </div>
                <div class="card-body pb-0 text-center text-small">
                    <p><?= $item->tanggal_keluar ?></p>
                    <h6 class="text-uppercase"><?= $item->nama_barang ?> </h6>
                    <label><?= $item->jumlah == 0 ? NULL : $item->jumlah . " " . $item->satuan ?></label>
                    <h6 class="text-small text-uppercase"><i class="fas fa-map-marker-alt"></i> <?= $item->kota ?>, <?= $item->provinsi ?> </h6>
                </div>
                <div class="card-body d-flex flex-row justify-content-around">
                    <?= $button ?>
                    <?php if ($item->status !== 1) : ?>
                        <div>
                            <button type="button" 
                            class="btn btn-secondary btn-round text-small btnKembalikan" 
                            href="javascript:void(0)" 
                            data-lokasi="<?= $item->id_lokasi ?>" 
                            data-id="<?= $item->id ?>" 
                            data-stok="<?= $item->jumlah ?>"
                            data-nm_penjab="<?= $item->nm_penjab?>"
                            data-nohp_penjab="<?= $item->nohp_penjab?>" 
                            data-toggle="modal" 
                            data-target="#scannerKembali">PROSES</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>