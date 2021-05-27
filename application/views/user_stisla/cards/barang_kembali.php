<div class="col-lg-9 col-md-6 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Last Barang Kembali</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-primary">View All</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <td>
                            <a href="#" class="font-weight-600">
                            <img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                        </td> -->
                        <?php foreach ($last_data as $last) : ?>
                            <tr>
                                <td>
                                    <?= $last->nama_barang ?>
                                    <div class="table-links">
                                        in <a href="#">Web Development</a>
                                        <div class="bullet"></div>
                                        <a href="#">View</a>
                                    </div>
                                </td>
                                <td><?= $last->id_transaksi ?></td>
                                <td><span class="font-weight-bold"><?= $last->jumlah . "</span> " . $last->satuan ?> </td>
                                <td><span class="badge badge-success text-uppercase"><?= $last->text_status ?></span></td>
                                <td>
                                    <a class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="btn btn-danger btn-action " data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>