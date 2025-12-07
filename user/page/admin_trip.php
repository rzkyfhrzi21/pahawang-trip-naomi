<?php

if ($_SESSION['level'] !== 'admin') {
  return;
}

?>

<div class="card">
  <div class="card-header">
    <div class="d-sm-flex justify-content-between align-items-center">
      <h4>Trip Pahawang</h4>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
        Tambah Data
      </button>

    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead class="bg-info">
        <tr>
          <th class="text-center">No</th>
          <th>Nama Trip</th>
          <th>Harga <sup>/Paket</sup></th>
          <th>Keterangan</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $no = 1;

        include '../functions/koneksi.php';

        $sql_trip = mysqli_query($koneksi, "SELECT * from trip order by id_trip desc");

        while ($trip = mysqli_fetch_array($sql_trip)) :

        ?>
          <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $trip['nama_trip']; ?></td>
            <td>Rp <?= $trip['harga_trip']; ?></td>
            <td><?= $trip['ket_trip']; ?></td>
            <td>
              <img src="../assets/trip/<?= $trip['gambar_trip']; ?>" width="150" alt="gambar error" title="<?= $trip['nama_trip']; ?>">
            </td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  Detail
                </button>
                <div class="dropdown-menu" role="menu">
                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-ubah<?= $trip['id_trip']; ?>">
                    Ubah
                  </button>
                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-hapus<?= $trip['id_trip']; ?>">
                    Hapus
                  </button>
                </div>
              </div>
            </td>
          </tr>

          <!-- Modal Ubah -->
          <div class="modal fade" id="modal-ubah<?= $trip['id_trip']; ?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Ubah Trip</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="../functions/crud_trip.php" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="nama_trip">Nama Trip <code>*Maksimal 30 huruf</code></label>
                      <input type="text" name="nama_trip" max="30" class="form-control" id="nama_trip" placeholder="Masukkan Nama Trip" value="<?= $trip['nama_trip']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="harga_trip">Harga Trip <code>*Harga permalam & menggunakan mata uang rupiah</code></label>
                      <input type="number" name="harga_trip" class="form-control" id="harga_trip" placeholder="Masukkan Harga Trip" value="<?= $trip['harga_trip']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="ket_trip">Keterangan Trip <code>*Maksimal 250 huruf</code></label>
                      <textarea name="ket_trip" class="form-control" id="ket_trip" maxlength="250" rows="3" placeholder="Masukkan Keterangan Trip" required><?= $trip['ket_trip']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="maks_orang">Maks Tamu <code>*Maksimal 2 digit</code></label>
                      <input type="number" name="maks_orang" class="form-control" id="maks_orang" maxlength="2" placeholder="Ex. Maks 4 Orang" value="<?= $trip['maks_orang']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="jumlah_hari">Jumlah Hari</label>
                      <input type="number" name="jumlah_hari" class="form-control" id="jumlah_hari" maxlength="2" placeholder="Ex. 2 Hari" value="<?= $trip['jumlah_hari']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="gambar_trip">Gambar <code>*Abaikan jika tidak ingin mengganti gambar</code></label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="gambar_trip" class="custom-file-input" id="gambar_trip">
                          <label class="custom-file-label" for="gambar_trip">Pilih Gambar </label>
                        </div>
                      </div>
                    </div>
                    <img src="../assets/trip/<?= $trip['gambar_trip']; ?>" alt="gambar error" title="<?= $trip['nama_trip']; ?>" width="200">
                    <input type="hidden" name="id_trip" value="<?= $trip['id_trip']; ?>">
                    <input type="hidden" name="gambar_trip" value="<?= $trip['gambar_trip']; ?>">
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" name="ubah_trip" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal Hapus -->
          <div class="modal fade" id="modal-hapus<?= $trip['id_trip']; ?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus Trip</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="../functions/crud_trip.php" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data trip dari <em><?= $trip['nama_trip']; ?></em> ?</p>
                    <input type="hidden" name="id_trip" value="<?= $trip['id_trip']; ?>">
                    <input type="hidden" name="gambar_trip" value="<?= $trip['gambar_trip']; ?>">
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" name="hapus_trip" class="btn btn-primary">Hapus Trip</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        <?php endwhile ?>
      </tbody>
      <tfoot>
        <tr>
          <th class="text-center">No</th>
          <th>Nama Trip</th>
          <th>Harga <sup>/Paket</sup></th>
          <th>Keterangan</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Trip</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../functions/crud_trip.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_trip">Nama Trip <code>*Maksimal 30 huruf</code></label>
            <input type="text" name="nama_trip" maxlength="30" class="form-control" id="nama_trip" placeholder="Masukkan Nama Trip" required>
          </div>
          <div class="form-group">
            <label for="harga_trip">Harga Trip <code>*Harga permalam & menggunakan mata uang rupiah</code></label>
            <input type="number" name="harga_trip" class="form-control" id="harga_trip" placeholder="Masukkan Harga Trip" required>
          </div>
          <div class="form-group">
            <label for="ket_trip">Keterangan Trip <code>*Maksimal 250 huruf</code></label>
            <textarea name="ket_trip" maxlength="250" class="form-control" id="ket_trip" rows="3" placeholder="Masukkan Keterangan Trip" required></textarea>
          </div>
          <div class="form-group">
            <label for="maks_orang">Maks Tamu <code>*Maksimal 2 digit</code></label>
            <input type="number" name="maks_orang" maxlength="2" class="form-control" id="maks_orang" placeholder="Ex. 4 Orang" required>
          </div>
          <div class="form-group">
            <label for="jumlah_hari">Jumlah Hari</label>
            <input type="number" name="jumlah_hari" maxlength="2" class="form-control" id="jumlah_hari" placeholder="Ex. 2 Hari" required>
          </div>
          <div class="form-group">
            <label for="gambar_trip">Gambar Thumbnail Trip <code>*Wajib melampirkan gambar</code></label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="gambar_trip" class="custom-file-input" id="gambar_trip">
                <label class="custom-file-label" for="gambar_trip">Pilih Gambar Trip</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" name="tambah_trip" class="btn btn-primary">Tambah Trip</button>
        </div>
      </form>
    </div>
  </div>
</div>