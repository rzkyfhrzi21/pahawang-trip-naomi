<?php

include '../functions/koneksi.php';

include '../functions/datacust.php';

if ($_SESSION['level'] == 0) {
  return;
}

date_default_timezone_set('Asia/Jakarta');

$tanggal   = date('d M');
$jam      = date('H:i A');

$sesi_id      = $_SESSION['id_user'];
$sesi_nama    = $_SESSION['nama_user'];
$sesi_level   = $_SESSION['level'];

?>
<div class="row">

  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $total_klien; ?></h3>
        <p>Total Reservasi</p>
      </div>
      <div class="icon">
        <i class="fas fa-book"></i>
      </div>
    </div>
  </div>
</div>