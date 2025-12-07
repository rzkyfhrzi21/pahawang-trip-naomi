<?php

session_start();

if (@$_SESSION['level']) {
  switch ($_SESSION['level']) {
    case 'admin':
      header('Location: ../user/admin?page=reservasi');
      break;
    case 'cust':
      header('Location: ../user/customer');
      break;
  }
}

$usernameLogin = @$_GET['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Pahawang Trip</title>

  <link rel="icon" href="../assets/logo1.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template2/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../template2/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template2/dist/css/adminlte.min.css">

  <style>
    body {
      background-image: url('../assets/123.jpg');
      /* Path ke gambar background */
      background-size: cover;
      /* Agar gambar menyesuaikan ukuran layar */
      background-repeat: no-repeat;
      /* Tidak mengulang gambar */
      background-position: center;
      /* Memusatkan gambar */
    }
  </style>
</head>

<body class="hold-transition login-page">

  <div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="login-logo">
          <a href="../index.php"><b>Pahawang Trip</b></a>
        </div>
        <p class="login-box-msg">Silakan masukkan data dengan benar</p>

        <form action="../functions/cek_login.php" method="post" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" class="form-control" value="<?= $usernameLogin; ?>" placeholder="Username / Email" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="text-center mb-3">
            <button type="submit" name="login" class="btn btn-block btn-primary">
              Masuk
            </button>
          </div>
        </form>

        <div class="text-center mb-3">
          <p>- atau -</p>
          <a href="../index" class="btn btn-block btn-secondary">
            Home
          </a>
        </div>
        <!-- /.social-auth-links -->
        <a href="register" class="text-center">Daftar akun baru.</a>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../template2/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../template2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../template2/dist/js/adminlte.min.js"></script>
</body>

</html>