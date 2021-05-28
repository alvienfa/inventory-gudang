<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Setting</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('user'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('user/setting_user'); ?>">Setting</a></div>
                <div class="breadcrumb-item">Setting</div>
            </div>
        </div>

        <div class="section-body">
            

            <form action="<?php echo base_url('user/proses_new_password') ?>" method="post">
                <?php if ($this->session->flashdata('msg_berhasil')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
                    </div>
                <?php } else if (validation_errors()) { ?>
                    <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                    </div>
                <?php  } ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ganti Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="username" class="form-control" value="<?= $this->session->userdata('name')?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Baru</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" name="new_password" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Password Baru</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" name="confirm_new_password" class="form-control">
                                    </div>
                                </div>

                                <?php if (isset($token_generate)) { ?>
                                    <input type="hidden" name="token" class="form-control" value="<?= $token_generate ?>">
                                <?php } else {
                                    redirect(base_url('user/setting'));
                                } ?>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="submit" class="btn btn-primary">Ganti Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>