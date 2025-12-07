<?php

session_start();

$cust_nama  = @$_GET['nama'];
$cust_email = @$_GET['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi | Pahawang Trip</title>
  <link rel="icon" href="../assets/logo1.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template2/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../template2/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template2/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../index"><b>Pahawang Trip</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Daftar akun baru</p>

        <form action="../functions/daftar_login.php" method="post">
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control"
              value="<?= $cust_nama; ?>"
              required
              name="nama_user"
              minlength="5"
              placeholder="Nama lengkap">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="username" value="<?= $cust_email; ?>" <?= !empty($cust_email) ? 'readonly' : ''; ?> required class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" minlength="5" class="form-control" required placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="konfirmasiPassword" minlength="5" class="form-control" placeholder="Konfirmasi password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" required id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  Saya setuju dengan <a href="#">Syarat yang berlaku</a>
                </label>
              </div>
            </div>
            <input type="hidden" name="level" value="cust">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="btn_register" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="text-center mb-3">
          <p>- atau -</p>
          <a href="../index" class="btn btn-block btn-secondary">
            Home
          </a>
        </div>

        <a href="login" class="text-center">Saya telah mempunyai akun.</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../template2/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../template2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../template2/dist/js/adminlte.min.js"></script>
</body>

</html>