<?php 
    $class="form-control form-control-sm border-0 w-25"
?>
<div class="col-lg-12 col-md-6 col-sm-6 col-12">
  <div class="card">
    <div class="card-wrap">
      <div class="card-body">
        <form action="" method="GET">
            <input placeholder="Cari barang..." type="search" name="search" value="<?= $this->input->get('search')?>"
            class="<?= $class?>">
        </form>
      </div>
    </div>
  </div>
</div>