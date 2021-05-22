<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web Gudang | Data Barang Masuk</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/datetimepicker/css/bootstrap-datetimepicker.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        #qr-canvas {
            margin: auto;
            width: 50%;
            max-width: 100%;

        }

        .posisi {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            /* margin-left: 350px;
            padding-left: 50px; */
        }
        .icon-qr{
            align-self: center;
            object-position: center;
            width: 200px
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url('admin') ?>" class="logo">
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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
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
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat"><i class="fa fa-cogs" aria-hidden="true"></i> Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('admin/sigout') ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->

        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <?php foreach ($avatar as $a) { ?>
                            <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="img-circle" alt="User Image">
                        <?php } ?>
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->session->userdata('name') ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?= base_url('admin') ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                <!-- <i class="fa fa-angle-left pull-right"></i> -->
                            </span>
                        </a>
                        <!-- <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>assets/web_admin/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Forms</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('admin/form_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tambah Data Barang Masuk</a></li>
                            <li><a href="<?= base_url('admin/form_satuan') ?>"><i class="fa fa-circle-o"></i> Tambah Satuan Barang</a></li>
                            <li><a href="<?= base_url('admin/barang_keluar') ?>"><i class="fa fa-circle-o"></i> Keluar Satuan Barang</a></li>
                        </ul>
                    </li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Tables</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?= base_url('admin/tabel_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tabel Stok Barang</a></li>
                            <li><a href="<?= base_url('admin/tabel_barangkeluar') ?>"><i class="fa fa-circle-o"></i> Data Barang Keluar</a></li>
                            <li><a href="<?= base_url('admin/tabel_satuan') ?>"><i class="fa fa-circle-o"></i> Tabel Satuan</a></li>
                        </ul>
                    </li>
                    <li class="header">LABELS</li>
                    <li>
                        <a href="<?php echo base_url('admin/profile') ?>">
                            <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/users') ?>">
                            <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Users</span></a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Tambah Barang Kembali
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url('admin/tabel_barangmasuk') ?>">Tables</a></li>
                    <li class="active">Tambah Barang Keluar</li>
                </ol>
            </section>

            <!-- Main content -->
            <?php if(!$list_data) :?>
            <section id="qr-content" class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div id="qr-wrapper">
                                <div class="posisi">
                                    <a href="#" id="btn-scan-qr">
                                        <img class="icon-qr" src="<?= base_url() . "/assets/img/scan-me.png" ?>" >
                                    </a>
                                </div>
                                <canvas hidden="" id="qr-canvas"></canvas>
                                <div class="text-center" id="qr-result">
                                    <form method="post" action="process/submit_qrcode.php" enctype="multipart/form-data">
                                        <label>
                                            <input class="form-control" id="outputData" type="hidden" name="data_qrcode" placeholder="Insert QR text" value="" required>
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php else:?>
            <section class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="container">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Barang Keluar</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <div class="container">
                                    <form action="<?= base_url('admin/proses_data_keluar') ?>" role="form" method="post">
                                        <?php if (validation_errors()) { ?>
                                            <div class="alert alert-warning alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                                            </div>
                                        <?php } ?>



                                        <div class="box-body" id='barang_scan'>

                                            <div class="form-group">
                                                <?php foreach ($list_data as $d)  { ?>
                                                    <label for="id_transaksi" style="margin-left:220px;display:inline;">ID Transaksi</label>
                                                    <input type="text" name="id_transaksi" style="margin-left:84px;width:20%;display:inline;" class="form-control" readonly="readonly" value="<?= $d->id_transaksi ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="tanggal_keluar" style="margin-left:220px;display:inline;">Tanggal Keluar</label>
                                                <input type="text" 
                                                name="tanggal_keluar" 
                                                style="margin-left:66px;width:20%;display:inline;" 
                                                class="form-control" 
                                                readonly="readonly" 
                                                value="<?= $d->tanggal_keluar ?>">
                                            </div> -->
                                            <div class="form-group">
                                                <label for="tanggal_kembali" style="margin-left:220px;display:inline;">Tanggal Kembali</label>
                                                <input type="text" name="tanggal_kembali" style="margin-left:60px;width:20%;display:inline;" 
                                                class="form-control form_datetime" required="" placeholder="Klik Disini">
                                            </div>
                                            <div class="form-group" style="margin-bottom:40px;">
                                                <label for="lokasi" style="margin-left:220px;display:inline;">Lokasi</label>
                                                <input type="text" name="lokasi" style="margin-left:100px;width:20%;display:inline;" class="form-control"  value="<?= $d->lokasi ?>">
                                            </div>
                                            <div class="form-group" style="display:inline-block;">
                                                <label for="kode_barang" style="width:87%;margin-left: 12px;">Kode Barang / Barcode</label>
                                                <input type="text" name="kode_barang" readonly="readonly" style="width: 90%;margin-right: 67px;margin-left: 11px;" class="form-control" id="kode_barang" value="<?= $d->kode_barang ?>">
                                            </div>
                                            <div class="form-group" style="display:inline-block;">
                                                <label for="nama_Barang" style="width:73%;">Nama Barang</label>
                                                <input type="text" name="nama_barang" readonly="readonly" style="width:90%;margin-right: 67px;" class="form-control" id="nama_Barang" value="<?= $d->nama_barang ?>">
                                            </div>
                                            <div class="form-group" style="display:inline-block;">
                                                <label for="satuan" style="width:73%;">Satuan</label>
                                                <select class="form-control" name="satuan" style="width:110%;margin-right: 18px;">
                                                    <?php foreach ($list_satuan as $s) { ?>
                                                        <?php if ($d->satuan == $s->nama_satuan) { ?>
                                                            <option value="<?= $d->satuan ?>" selected=""><?= $d->satuan ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $s->kode_satuan ?>"><?= $s->nama_satuan ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="display:inline-block;">
                                                <label for="jumlah" style="width:73%;margin-left:28px;">Jumlah</label>
                                                <input type="number" name="jumlah" style="width:41%;margin-left:28px;margin-right:18px;" class="form-control" id="jumlah" max="<?= $d->jumlah ?>" value="<?= $d->jumlah ?>">
                                            </div>
                                            <div class="form-group" style="display:inline-block;">
                                                <label for="status" style="width:73%;margin-left:-80px">Keterangan</label>
                                                <input type="text" name="status" style="width:100%;margin-left:-80px;" class="form-control" id="status" >
                                            </div>
                                        <?php } ?>
                                        
                                        <!-- /.box-body -->

                                        <div class="box-footer" style="width:93%;">
                                            <a type="button" class="btn btn-warning" style="width:10%" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                                            <button type="submit" style="width:20%;margin-left:689px;" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <?php endif;?>
        </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; <?= date('Y') ?></strong>

    </footer>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
    <script>
        const qrcodes = window.qrcode;

        const video = document.createElement("video");
        const canvasElement = document.getElementById("qr-canvas");
        const canvas = canvasElement.getContext("2d");

        const qrResult = document.getElementById("qr-result");
        const outputData = document.getElementById("outputData");
        const btnScanQR = document.getElementById("btn-scan-qr");

        let scanning = false;

        // Scan
        qrcodes.callback = res => {
            // If result is true, ...
            if (res) {
                outputData.value = res;
                res.replace("X", "-");
                document.getElementById("qr-content").style.display = 'none';
                window.location.href = '<?= base_url('admin/scan_barang_kembali/') ?>' + res;
                scanning = false;

                // Stop video
                video.srcObject.getTracks().forEach(track => {
                    track.stop();
                })

                qrResult.hidden = false; // Show result
                canvasElement.hidden = true; // Hide canvas
                btnScanQR.hidden = false; // Show scan button again
            }
        };

        // When scan button on click, ...
        btnScanQR.onclick = () => {
            navigator.mediaDevices
                .getUserMedia({
                    video: {
                        facingMode: "environment"
                    }
                })
                .then(function(stream) {
                    scanning = true;
                    qrResult.hidden = true;
                    btnScanQR.hidden = true;
                    canvasElement.hidden = false;
                    video.setAttribute("playsinline", true);

                    video.srcObject = stream;
                    video.play(); // Show video
                    tick(); // Set canvas
                    scan(); // Scan QRCode
                });
        };

        function tick() {
            canvasElement.height = video.videoHeight;
            canvasElement.width = video.videoWidth;
            canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

            scanning && requestAnimationFrame(tick);
        }

        function scan() {
            try {
                qrcode.decode();
            } catch (e) {
                setTimeout(scan, 300);
            }
        }
    </script>
    <!-- jQuery 3 -->

    <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/web_admin/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url() ?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/web_admin/dist/js/demo.js"></script>

    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayBtn: true,
            pickTime: false,
            minView: 2,
            maxView: 4,
        });
    </script>
</body>

</html>