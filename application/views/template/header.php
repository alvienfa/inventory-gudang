<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-primary">
      <i class="fas fa-archive"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Total Barang</h4>
      </div>
      <div class="card-body">
        <?= $total['barang_masuk'] ?>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon" style="background-color: pink;">
      <i class="fas fa-box-open"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Demo / Entertain</h4>
      </div>
      <div class="card-body">
        <?= $kategori->total_demo ?>
      </div>
    </div>
  </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-info">
        <i class="fas fa-box"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Inventory</h4>
        </div>
        <div class="card-body">
          <?= $kategori->total_inventory ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-toolbox"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Persediaan</h4>
        </div>
        <div class="card-body">
          <?= $kategori->total_persediaan ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-cogs"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Barang Service</h4>
        </div>
        <div class="card-body">
          <?= $status->total_service?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon" style="background-color: brown;">
      <i class="fas fa-shipping-fast"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Barang Keluar</h4>
      </div>
      <div class="card-body">
        <?= $total['barang_keluar'] ?>
      </div>
    </div>
  </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon" style="background-color: blue;">
        <i class="fas fa-undo"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Barang Kembali</h4>
        </div>
        <div class="card-body">
          <?= $total['barang_kembali'] ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon" style="background-color: red;">
        <i class="fas fa-trash"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Barang Rusak</h4>
        </div>
        <div class="card-body">
          <?= $status->total_rusak ?>
        </div>
      </div>
    </div>
  </div>