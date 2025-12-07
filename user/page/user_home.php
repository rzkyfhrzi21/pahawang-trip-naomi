<?php

include '../functions/koneksi.php';
include '../functions/data.php';

if ($_SESSION['level'] == 0) {
  return;
}

date_default_timezone_set('Asia/Jakarta');

$tanggal    = date('d M');
$jam        = date('H:i A');

$sesi_id      = $_SESSION['id_user'];
$sesi_nama    = $_SESSION['nama_user'];
$sesi_level   = $_SESSION['level'];

?>

<!-- ROW 1: DATA UMUM -->
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $total_trip; ?></h3>
        <p>Total Trip</p>
      </div>
      <div class="icon">
        <i class="fas fa-tree"></i>
      </div>
    </div>
  </div>

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

  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $total_user; ?></h3>
        <p>Total Staff</p>
      </div>
      <div class="icon">
        <i class="fas fa-user"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $total_cust; ?></h3>
        <p>Total Customer</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
    </div>
  </div>
</div>

<!-- ROW 2: DATA PEMESANAN BERDASARKAN TANGGAL CHECK_IN -->
<div class="row">
  <div class="col-lg-4 col-12">
    <div class="small-box bg-primary">
      <div class="inner">
        <h3><?= $total_pemesanan_hari_ini; ?></h3>
        <p>Pemesanan Hari Ini (berdasarkan Check In)</p>
      </div>
      <div class="icon">
        <i class="fas fa-calendar-day"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-12">
    <div class="small-box bg-secondary">
      <div class="inner">
        <h3><?= $total_pemesanan_minggu_ini; ?></h3>
        <p>Pemesanan Minggu Ini (berdasarkan Check In)</p>
      </div>
      <div class="icon">
        <i class="fas fa-calendar-week"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-12">
    <div class="small-box bg-dark">
      <div class="inner">
        <h3><?= $total_pemesanan_bulan_ini; ?></h3>
        <p>Pemesanan Bulan Ini (berdasarkan Check In)</p>
      </div>
      <div class="icon">
        <i class="fas fa-calendar-alt"></i>
      </div>
    </div>
  </div>
</div>

<!-- ROW 3: DATA PENDAPATAN -->
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>Rp <?= number_format($total_pendapatan_hari_ini, 0, ',', '.'); ?></h3>
        <p>Pendapatan Hari Ini</p>
      </div>
      <div class="icon">
        <i class="fas fa-money-bill-wave"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>Rp <?= number_format($total_pendapatan_minggu_ini, 0, ',', '.'); ?></h3>
        <p>Pendapatan Minggu Ini</p>
      </div>
      <div class="icon">
        <i class="fas fa-money-check-alt"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>Rp <?= number_format($total_pendapatan_bulan_ini, 0, ',', '.'); ?></h3>
        <p>Pendapatan Bulan Ini</p>
      </div>
      <div class="icon">
        <i class="fas fa-coins"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-orange">
      <div class="inner">
        <h3>Rp <?= number_format($total_pendapatan_total, 0, ',', '.'); ?></h3>
        <p>Total Pendapatan (Semua Waktu)</p>
      </div>
      <div class="icon">
        <i class="fas fa-chart-line"></i>
      </div>
    </div>
  </div>
</div>