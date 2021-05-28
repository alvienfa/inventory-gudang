<div class="col-lg-3 col-md-6 col-sm-12 col-12">
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
<div class="col-lg-3 col-md-6 col-sm-12 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-danger">
      <i class="fas fa-truck"></i>
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
    <div class="card-icon bg-warning">
      <i class="fas fa-th-large"></i>
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
    <div class="card-icon bg-success">
      <i class="fas fa-shopping-basket"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Barang Jual</h4>
      </div>
      <div class="card-body">
        0
      </div>
    </div>
  </div>
</div>
