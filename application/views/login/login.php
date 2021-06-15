<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Inventory Gudang | Login</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() . "assets/register.css" ?>">
</head>

<body>
  <div class="wrapper">
    <form action="<?php echo base_url('login/proses_login') ?>" class="login" method="post">

      <p class="title"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</p>
      <?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-warning alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Warning!</strong><br> <?php echo $this->session->flashdata('msg'); ?>
        </div>
      <?php } ?>
      <input type="text" name="username" placeholder="Username" autofocus required="" />

      <i class="fa fa-user-circle-o"></i>
      <input type="password" name="password" placeholder="Password" required="" />

      <i class="fa fa-key"></i>
      <?php if (isset($token_generate)) { ?>
        <input type="hidden" name="token" value="<?php echo $token_generate ?>">
      <?php } else {
        redirect(base_url());
      } ?>
      <?php echo anchor(base_url('login/register'), 'Register') ?><br>
      <!-- <a href="#">Forgot your password?</a> -->
      <button>
        <!-- <i class="spinner"></i> -->
        <span class="state"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</span>
      </button>
    </form>
    <!-- <footer><a target="blank" href="http://unsadacoder.or.id">UnsadaCoder.or.id</a></footer> -->
    </p>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>

</html>