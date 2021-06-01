<?php if (empty($list_data) && $this->input->get('search')) : ?>
    <?= $this->load->view('barang/404', '', TRUE) ?>
<?php endif; ?>
<div class="col-12">
    <p>Total Barang: <span class="font-weight-bold"><?= $total_barang_masuk ?></span> Data</p>
</div>
<?php foreach ($list_data as $item) : ?>
    <div class="col-lg-2 col-md-6 col-6 col-sm-6">
        <article class="article article-style-b">
            <div class="article-header">
                <div class="article-image" data-background="<?= base_url('assets/upload/gambar/') . $item->gambar ?>" style="background-image: url(&quot;../assets/img/news/img13.jpg&quot;);">
                </div>
                <div class="article-badge">
                    <div class="article-badge-item bg-dark"><?= $item->jumlah . "</span> " . $item->satuan ?></div>
                </div>
            </div>
            <div class="article-details">
                <div class="article-title mb-0">
                    <a class="text-info text-decoration-none text-uppercase" href="<?= base_url('barang/') . $item->id_transaksi ?>"><small><?= $item->nama_barang ?>
                        </small></a>
                </div>
                <small><?= $item->nama_gudang ?></small>
            </div>
        </article>
    </div>
<?php endforeach; ?>
<?php if (isset($pagination)) : ?>
    <div class="col-lg-12 col-md-12 col-12 col-sm-12 d-flex justifu-content-center">
        <?= $pagination ?>
    </div>
<?php endif; ?>