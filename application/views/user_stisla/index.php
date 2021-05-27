<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
    </div>
    <div class="row">
      <?= $views['header']?>
    </div>
    <div class="row">
        <?= isset($views['card_satu'])?$views['card_satu']: NULL?>
     
        <?= isset($views['card_dua'])? $views['card_dua']: NULL ?>

    </div>
  </section>
</div>