<?php $input = "form-control form-control-sm bg-transparent border-0 pl-0 text-small text-primary font-weight-bold"; ?>
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
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input disabled type="text" name="alamat" value="test" class="<?= $input ?>">
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input disabled type="text" name="kecamatan" value="" class="<?= $input ?>">
                        </div>
                        <div class="form-group">
                            <label>Kota / Kabupaten</label>
                            <input disabled type="text" name="kota" value="" class="<?= $input ?>">
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input disabled type="text" name="provinsi" value="" class="<?= $input ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input disabled type="text" name="kode_pos" value="" class="<?= $input ?>">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input disabled type="text" name="keterangan" value="" class="<?= $input ?>">
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input disabled type="text" name="created_by" value="" class="<?= $input ?>">
                        </div>
                    </div>
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
            document.querySelector("input[name='alamat']").value = e.target.dataset.alamat || NULL
            document.querySelector("input[name='kecamatan']").value = e.target.dataset.kecamatan
            document.querySelector("input[name='kota']").value = e.target.dataset.kota || NULL
            document.querySelector("input[name='provinsi']").value = e.target.dataset.provinsi || NULL
            document.querySelector("input[name='kode_pos']").value = e.target.dataset.pos || NULL
            document.querySelector("input[name='keterangan']").value = e.target.dataset.keterangan || NULL
            document.querySelector("input[name='created_by']").value = "<?= $this->session->userdata('name')?>"
        })
    })
</script>