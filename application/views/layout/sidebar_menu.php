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
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"><?= $sidebar['nama_gudang'] ?></li>
      <li class='<?= (base_url('admin') == current_url() ? ' active' : '') ?> '>
        <a href="<?= base_url('admin') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <?php 
      if($role == 1){
        $this->load->view('layout/sidebar/superadmin', $sidebar);
      }else{
        $this->load->view('layout/sidebar/admin', $sidebar);
      }
      
      ?>
      
      <li class="header">LABELS</li>
      <li class='<?= (base_url('admin/profile') == current_url() ? ' active' : '') ?> '>
        <a href="<?php echo base_url('admin/profile') ?>">
          <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
      </li>
      <li class='<?= (base_url('admin/users') ==  current_url() ? ' active' : '') ?> '>
        <a href="<?php echo base_url('admin/users') ?>">
          <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Users</span></a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>