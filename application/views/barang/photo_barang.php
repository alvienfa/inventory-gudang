<div class="col-lg-3 col-md-6 col-12 col-sm-12">
    <div class="row">
        <div class="col-12">
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
        <div class="col-12">
            <img style="width: 100%;" src="<?= base_url('assets/qrcode/images/') . $detail->qr_code ?>">
        </div>
    </div>
</div>