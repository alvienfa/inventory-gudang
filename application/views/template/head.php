<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/summernote/dist/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/stisla/components.css') ?>">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
</head>
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
            <div class="d-sm-none d-lg-inline-block"><?= $username?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="<?= base_url('user/setting_user'); ?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('user/signout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown <?= (base_url('user') == current_url()? 'active' : '') ?>">
                <a href="<?= base_url('user')?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Scan QR</li>
              <li class="nav-item dropdown <?= (base_url('barang') == current_url()? 'active' : '') ?>">
                <a href="<?= base_url('barang')?>" class="nav-link"><i class="fas fa-qrcode"></i><span>Barcode Scan</span></a>
              </li>
              <li class="menu-header">Inventory</li>
              <li class="nav-item dropdown <?= (strpos(current_url(),'user/tabel')? 'active' : '') ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-table"></i> <span>Table</span></a>
                <ul class="dropdown-menu" style="<?= (strpos(current_url(),'user/tabel')? 'display:block' : '') ?>">
                  <li class="<?= (strpos(current_url(),'tabel_barang_masuk')? 'active' : '') ?>"><a class="nav-link" href="<?= base_url('user/tabel_barang_masuk')?>">Barang Masuk</a></li>
                  <li class="<?= (strpos(current_url(),'tabel_barang_keluar')? 'active' : '') ?>"><a class="nav-link" href="<?= base_url('user/tabel_barang_keluar')?>">Barang Keluar</a></li>
                  <li class="<?= (strpos(current_url(),'tabel_barang_kembali')? 'active' : '') ?>"><a class="nav-link" href="<?= base_url('user/tabel_barang_kembali')?>">Barang Kembali</a></li>
                </ul>
              </li>  
            </ul>
        </aside>
      </div>