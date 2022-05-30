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
      <p class="login-box-msg">Isi data diri Anda</p> 
                <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif; ?>
                <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth/register'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap" name='nama'>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Masukan Alamat Email" name='email'>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="nohp" placeholder="Masukan No HP" name='nohp'>
            </div>

            <div class="form-group">
                <div class="select">
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="3">Pelanggan</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" name='alamat'>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="Masukan Username" name='username'>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Masukan Password" name='password'>
            </div>
        </div>
        <div class="modal-footer">
            <a href="<?= base_url('auth') ?>" type="button" class="btn btn-secondary" data-dismiss="modal">Login</a>
            <button type="submit" class="btn btn-primary">Daftar</button>
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
