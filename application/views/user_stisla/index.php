<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1 class="text-uppercase"><?= $title?></h1>
    </div>
    <div class="row">
      <?= isset($views['header'])?$views['header']:NULL?>
    </div>
    <div class="row">
        <?= isset($views['card_satu'])?$views['card_satu']: NULL ?>
        <?= isset($views['card_dua'])? $views['card_dua']: NULL ?>
        <?= isset($views['card_tiga'])? $views['card_tiga']: NULL ?>
    </div>
  </section>
  
  <?= $this->load->view('user_stisla/modals/search_modal', '', TRUE)?>
  <?= $this->load->view('user_stisla/modals/detail_modal', '', TRUE)?>
  <?= $this->load->view('user_stisla/modals/scanner', '', TRUE)?>
</div>