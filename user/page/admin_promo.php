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
                Tambah Promo
            </button>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-warning">
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Trip</th>
                    <th>Keterangan Promo</th>
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
                        <td><?= $trip['promo']; ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Detail
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-ubah<?= $trip['id_trip']; ?>">
                                        Ubah Promo
                                    </button>
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-hapus<?= $trip['id_trip']; ?>">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Ubah Promo -->
                    <div class="modal fade" id="modal-ubah<?= $trip['id_trip']; ?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Promo Trip</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="../functions/crud_trip.php" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_trip">Nama Trip <code>*Maksimal 30 huruf</code></label>
                                            <input type="text" name="nama_trip" max="30" class="form-control" id="nama_trip" placeholder="Masukkan Nama Trip" value="<?= $trip['nama_trip']; ?>" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="promo">Keterangan Promo <code>*Maksimal 250 huruf</code></label>
                                            <textarea name="promo" class="form-control" id="promo" maxlength="250" rows="3" placeholder="Masukkan Keterangan Promo" required><?= $trip['promo']; ?></textarea>
                                        </div>
                                        <input type="hidden" name="id_trip" value="<?= $trip['id_trip']; ?>">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="ubah_promo" class="btn btn-primary">Simpan Promo</button>
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
                                        <p>Apakah anda yakin ingin menghapus promo dari trip <em><?= $trip['nama_trip']; ?></em> ?</p>
                                        <input type="hidden" name="id_trip" value="<?= $trip['id_trip']; ?>">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="hapus_promo" class="btn btn-primary">Hapus Promo</button>
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
                    <th>Keterangan Promo</th>
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
                <h4 class="modal-title">Tambah Promo Trip</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../functions/crud_trip.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_trip">Nama Trip <code>*Pilih Trip yang akan diberi Promo</code></label>
                        <select class="form-control" id="nama_trip" name="nama_trip" required>
                            <?php

                            include 'functions/koneksi.php';

                            $sql_trip = mysqli_query($koneksi, "SELECT * from trip where promo = ''");

                            while ($trip = mysqli_fetch_array($sql_trip)) :

                                // Validasi jika kolom 'promo' ada isinya
                                if (empty($trip['promo'])) {
                            ?>
                                    <option value="<?= $trip['id_trip']; ?>"><?= $trip['nama_trip']; ?></option>
                            <?php
                                } else {
                                    // Jika 'promo' ada isinya, maka menampilkan kosong (atau bisa diubah sesuai kebutuhan)
                                    echo "<option value=''>Tidak ada trip yang promo kosong</option>";
                                }
                            endwhile;
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="promo">Keterangan Promo <code>*Maksimal 250 huruf</code></label>
                        <textarea name="promo" maxlength="250" class="form-control" id="promo" rows="3" placeholder="Masukkan Keterangan Promo" required></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambah_promo" class="btn btn-primary">Tambah Promo</button>
                </div>
            </form>
        </div>
    </div>
</div>