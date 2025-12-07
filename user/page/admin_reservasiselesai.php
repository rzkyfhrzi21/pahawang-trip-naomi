<?php
if ($_SESSION['level'] !== 'admin') {
  return;
}

include '../functions/koneksi.php';
$status_selesai = 'selesai';

// Ambil data pemesanan selesai
$sql_pemesanan = mysqli_query(
  $koneksi,
  "SELECT * 
   FROM pemesanan 
   WHERE status = '$status_selesai'
   ORDER BY id_pemesanan DESC"
);
?>

<div class="card">
  <div class="card-header">
    <div class="d-sm-flex justify-content-between align-items-center">
      <h4>Data Reservasi Trip <code>*Selesai</code></h4>
    </div>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th>Nama Pemesan</th>
          <th>Email</th>
          <th>Nama Trip</th>
          <th>Check In</th>
          <th>Check Out</th>
          <th>Jumlah Paket</th>
          <th>No Hp</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($pemesanan = mysqli_fetch_array($sql_pemesanan)) :
          $id_pemesanan = htmlspecialchars($pemesanan['id_pemesanan']);
          $nama_pemesan = htmlspecialchars($pemesanan['nama_pemesan']);
          $email = htmlspecialchars($pemesanan['email']);
          $nama_trip = htmlspecialchars($pemesanan['nama_trip']);
          $check_in = htmlspecialchars($pemesanan['check_in']);
          $check_out = htmlspecialchars($pemesanan['check_out']);
          $jumlah_paket = htmlspecialchars($pemesanan['jumlah_paket']);
          $no_hp = htmlspecialchars($pemesanan['no_hp']);
        ?>
          <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $nama_pemesan; ?></td>
            <td><?= $email; ?></td>
            <td><?= $nama_trip; ?></td>
            <td><?= $check_in; ?></td>
            <td><?= $check_out; ?></td>
            <td><?= $jumlah_paket; ?></td>
            <td><?= $no_hp; ?></td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  Detail
                </button>
                <div class="dropdown-menu" role="menu">
                  <a href="../invoice.php?id=<?= $id_pemesanan; ?>" target="_blank" class="dropdown-item">
                    Invoice
                  </a>
                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-hapus<?= $id_pemesanan; ?>">
                    Hapus
                  </button>
                </div>
              </div>
            </td>
          </tr>

          <!-- Modal Hapus -->
          <div class="modal fade" id="modal-hapus<?= $id_pemesanan; ?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus Reservasi</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="../functions/crud_reservasi.php" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data reservasi dari <?= $nama_pemesan; ?>?</p>
                    <input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan; ?>">
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" name="hapus_pemesanan" class="btn btn-danger">Hapus Reservasi</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>