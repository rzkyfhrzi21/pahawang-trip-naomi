<?php

if ($_SESSION['level'] !== 'cust') {
  return;
}

?>

<div class="card">
  <div class="card-header">
    <div class="d-sm-flex justify-content-between align-items-center">
      <h4>Data Reservasi : <?= $sesi_nama; ?></h4>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th>Nama Pemesan</th>
          <th>Email</th>
          <th>Trip</th>
          <th>Check In</th>
          <th>Check Out</th>
          <th>Jumlah</th>
          <th>No Hp</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $no = 1;

        include '../functions/koneksi.php';

        $email = $sesi_username;

        $sql_pemesanan = mysqli_query($koneksi, "SELECT * from pemesanan where email = '$email'");

        while ($pemesanan = mysqli_fetch_array($sql_pemesanan)) :

        ?>
          <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $pemesanan['nama_pemesan']; ?></td>
            <td><?= $pemesanan['email']; ?></td>
            <td><?= $pemesanan['nama_trip']; ?></td>
            <td><?= $pemesanan['check_in']; ?></td>
            <td><?= $pemesanan['check_out']; ?></td>
            <td><?= $pemesanan['jumlah_paket']; ?></td>
            <td><?= $pemesanan['no_hp']; ?></td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  <?= strtoupper($pemesanan['status']); ?>
                </button>
                <div class="dropdown-menu" role="menu">
                  <a href="../invoice.php?id=<?= $pemesanan['id_pemesanan']; ?>" target="_blank" class="dropdown-item">
                    Invoice
                  </a>
                  <?php
                  if ($pemesanan['status'] != 'selesai') :
                  ?>
                    <a href="../functions/trip_custselesai.php?id=<?= $pemesanan['id_pemesanan']; ?>" class="dropdown-item">
                      Selesai
                    </a>
                  <?php endif ?>
                </div>
              </div>
            </td>
          </tr>

        <?php endwhile ?>
      </tbody>
      <tfoot>
        <tr>
          <th class="text-center">No</th>
          <th>Nama Pemesan</th>
          <th>Email</th>
          <th>Trip</th>
          <th>Check In</th>
          <th>Check Out</th>
          <th>Jumlah</th>
          <th>No Hp</th>
          <th>Status</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>