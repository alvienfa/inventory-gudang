<div class="col-lg-3 col-md-6 col-12 col-sm-12">
    <div class="row">
        <div class="col-lg-12 col-6 col-sm-6 col-md-12">
            <article class="article article-style-c">
                <div class="article-header">
                    <div class="article-image" data-background="<?= base_url('assets/upload/gambar/') . $detail->gambar ?>">
                    </div>
                    <div class="article-title">
                        <h2>
                            <a href="#"> <?= $detail->id_transaksi ?></a>
                        </h2>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-lg-12 col-6 col-sm-6 col-md-12">
            <img
            class="img-fluid"
            onerror="this.onerror=null;this.src='<?= base_url('assets/img/error-image.png') ?>'" 
            src="<?= base_url('assets/qrcode/images/') . $detail->qr_code ?>">
        </div>
    </div>
</div>