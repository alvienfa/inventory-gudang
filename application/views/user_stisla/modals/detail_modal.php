<?php $input = "form-control form-control-sm bg-transparent border-0 pl-0 text-small text-warning"; ?>
<div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Alamat</label>
                    <input disabled type="text" name="alamat" value="test" 
                    class="<?= $input?>">
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <input disabled type="text" name="kecamatan" value="" class="<?= $input?>">
                </div>
                <div class="form-group">
                    <label>Kota / Kabupaten</label>
                    <input disabled type="text" name="kota" value="" class="<?= $input?>">
                </div>
                <div class="form-group">
                    <label>Provinsi</label>
                    <input disabled type="text" name="provinsi" value="" class="<?= $input?>">
                </div>
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input disabled type="text" name="kode_pos" value="" class="<?= $input?>">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input disabled type="text" name="keterangan" value="" class="<?= $input?>">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script>
  const btnDetail = document.querySelectorAll('.btn-detail')
  const modalDetail = document.getElementById('detailModal').children[0].children[0].children[1].children
  btnDetail.forEach(item => {
    item.addEventListener('click', (e) => {
      $("#detailModal").modal('show')
      modalDetail[0].children[1].value =  e.target.dataset.alamat
      modalDetail[1].children[1].value =  e.target.dataset.kecamatan
      modalDetail[2].children[1].value =  e.target.dataset.kota
      modalDetail[3].children[1].value =  e.target.dataset.provinsi
      modalDetail[4].children[1].value =  e.target.dataset.pos
      modalDetail[5].children[1].value =  e.target.dataset.keterangan
    })
  })
</script>

