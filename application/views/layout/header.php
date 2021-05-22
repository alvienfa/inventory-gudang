<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php foreach ($avatar as $a) { ?>
                            <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="user-image" alt="User Image">
                        <?php } ?>
                        <span class="hidden-xs"><?= $this->session->userdata('name') ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php foreach ($avatar as $a) { ?>
                                <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="img-circle" alt="User Image">
                            <?php } ?>

                            <p>
                                <?= $this->session->userdata('name') ?> - Web Developer
                                <small>Last Login : <?= $this->session->userdata('last_login') ?></small>
                            </p>
                        </li>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="<?= base_url('admin/profile') ?>" class="btn btn-default btn-flat"><i class="fa fa-cogs" aria-hidden="true"></i> Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="<?= base_url('admin/signout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                    </div>
                </li>
            </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>