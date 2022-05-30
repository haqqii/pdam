<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in | Pengaduan PDAM</title>

  <!-- icon -->
  <link rel="shortcut icon" href="<?= base_url('') ?>img/logo.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('theme/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('theme/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('theme/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <center>
                <h2 class="">Perusahaan Umum Daerah Air <br> Minum Kabupaten Lamongan</h2>
                </center>
                <!-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div> -->
            </div>
        </div>
    </div>
    <center>
<div class="col-lg-5" style="margin-top:-55px">
  <div class="login-logo">
    <a href=""><img src="<?= base_url('img/') ?>logo.png" alt="" width="300" style="margin-bottom:-55px"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg">Masukan dengan akun Anda</p>

      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth') ?>" method="post" class="form-horizontal">
        <div class="input-group row">
          <label for="username" class="col-sm-2 col-form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= set_value('username');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mt-3 row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <input type="password" name="password"  id="password" class="form-control" placeholder="Password"">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

        <div class="row mt-4" style="margin-left: 100px;">
          <p class="mb-1">
            <a href="forgot-password.html">Lupa password ?</a>
          </p>
        </div>
        <div class="row" style="margin-left: 93px;">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div> 
            <p class="mt-2">
                Atau &nbsp;
              <a href="<?= base_url('auth/register') ?>" class="text-center">Mendaftar</a>
            </p>
        </div>
      </form>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</center>

<!-- jQuery -->
<script src="<?= base_url('theme/') ?>../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('theme/') ?>../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('theme/') ?>../../dist/js/adminlte.min.js"></script>
</body>
</html>
