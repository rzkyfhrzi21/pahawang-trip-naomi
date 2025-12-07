<?php

if ($_SESSION['level'] !== 'admin') {
    return;
}

?>

<div class="card">
    <div class="card-header">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h4>Data User</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                Tambah User
            </button>
        </div>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-info">
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                include '../functions/koneksi.php';

                $sql_user = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id_user DESC");

                while ($user = mysqli_fetch_array($sql_user)) :
                ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $user['nama_user']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td>
                            <?php if ($user['level'] === 'admin') : ?>
                                <span class="badge badge-primary">Admin</span>
                            <?php elseif ($user['level'] === 'cust') : ?>
                                <span class="badge badge-success">Customer</span>
                            <?php else : ?>
                                <span class="badge badge-secondary"><?= ucfirst($user['level']); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Pilih
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-ubah<?= $user['id_user']; ?>">
                                        Ubah User
                                    </button>
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-hapus<?= $user['id_user']; ?>">
                                        Hapus User
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Ubah User -->
                    <div class="modal fade" id="modal-ubah<?= $user['id_user']; ?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Data User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="../functions/crud_user.php" method="post" autocomplete="off">
                                    <div class="modal-body">
                                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">

                                        <div class="form-group">
                                            <label for="nama_user<?= $user['id_user']; ?>">Nama User</label>
                                            <input type="text" name="nama_user" class="form-control" id="nama_user<?= $user['id_user']; ?>" placeholder="Masukkan Nama User" value="<?= $user['nama_user']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="username<?= $user['id_user']; ?>">Username</label>
                                            <input type="text" name="username" class="form-control" id="username<?= $user['id_user']; ?>" placeholder="Masukkan Username" value="<?= $user['username']; ?>" required>
                                        </div>

                                        <hr>
                                        <p class="mb-1"><strong>Ubah Password (Opsional)</strong></p>
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>

                                        <div class="form-group mt-2">
                                            <label for="password_baru<?= $user['id_user']; ?>">Password Baru</label>
                                            <input type="password" name="password_baru" class="form-control" id="password_baru<?= $user['id_user']; ?>" placeholder="Masukkan Password Baru">
                                        </div>

                                        <div class="form-group">
                                            <label for="password_baru2<?= $user['id_user']; ?>">Verifikasi Password Baru</label>
                                            <input type="password" name="password_baru2" class="form-control" id="password_baru2<?= $user['id_user']; ?>" placeholder="Ulangi Password Baru">
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="ubah_user" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapus User -->
                    <div class="modal fade" id="modal-hapus<?= $user['id_user']; ?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="../functions/crud_user.php" method="post" autocomplete="off">
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus user <em><?= $user['nama_user']; ?></em> (username: <strong><?= $user['username']; ?></strong>) ?</p>
                                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="hapus_user" class="btn btn-danger">Hapus User</button>
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
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal Tambah User -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="../functions/crud_user.php" method="post" autocomplete="off">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_user_tambah">Nama User</label>
                        <input type="text" name="nama_user" class="form-control" id="nama_user_tambah" placeholder="Masukkan Nama User" required>
                    </div>

                    <div class="form-group">
                        <label for="username_tambah">Username</label>
                        <input type="text" name="username" class="form-control" id="username_tambah" placeholder="Masukkan Username" required>
                    </div>

                    <div class="form-group">
                        <label for="level_tambah">Level User</label>
                        <select name="level" id="level_tambah" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Level --</option>
                            <option value="admin">Admin</option>
                            <option value="cust">Customer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password_tambah">Password</label>
                        <input type="password" name="password" class="form-control" id="password_tambah" placeholder="Masukkan Password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_tambah2">Verifikasi Password</label>
                        <input type="password" name="password2" class="form-control" id="password_tambah2" placeholder="Ulangi Password" required>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambah_user" class="btn btn-primary">Simpan User</button>
                </div>
            </form>
        </div>
    </div>
</div>