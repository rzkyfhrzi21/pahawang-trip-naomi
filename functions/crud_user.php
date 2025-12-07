<?php

include 'koneksi.php';

/**
 * TAMBAH USER BARU
 */
if (isset($_POST['tambah_user'])) {
    $nama_user = htmlspecialchars($_POST['nama_user']);
    $username  = htmlspecialchars($_POST['username']);
    $level     = htmlspecialchars($_POST['level']);
    $password  = $_POST['password'];
    $password2 = $_POST['password2'];

    // Cek apakah nama_user atau username sudah ada
    $sql_cek = mysqli_query(
        $koneksi,
        "SELECT * FROM user 
         WHERE nama_user = '$nama_user' 
            OR username  = '$username'"
    );
    $cek_data = mysqli_num_rows($sql_cek);

    if ($cek_data > 0) {
        echo "<script>
                alert('Nama user atau username sudah terdaftar!');
                location.replace('../user/admin.php?page=users');
            </script>";
        exit;
    }

    // Cek password dan verifikasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Password tidak sama!');
                location.replace('../user/admin.php?page=users');
            </script>";
        exit;
    }

    // Simpan user baru (tanpa hash)
    $query_tambah = "INSERT INTO user 
                        (nama_user, username, password, level)
                     VALUES
                        ('$nama_user', '$username', '$password', '$level')";

    $tambah_user = mysqli_query($koneksi, $query_tambah);

    if ($tambah_user) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
                location.replace('../user/admin.php?page=users');
            </script>";
    } else {
        echo "<script>
                alert('User baru gagal ditambahkan!');
                location.replace('../user/admin.php?page=users');
            </script>";
    }
}

/**
 * UBAH USER
 * (Tidak ada field level)
 */
if (isset($_POST['ubah_user'])) {
    $id_user       = $_POST['id_user'];
    $nama_user     = htmlspecialchars($_POST['nama_user']);
    $username      = htmlspecialchars($_POST['username']);
    $password_baru = $_POST['password_baru'] ?? '';
    $password_baru2 = $_POST['password_baru2'] ?? '';

    // Cek apakah nama_user atau username sudah digunakan user lain
    $sql_cek = mysqli_query(
        $koneksi,
        "SELECT * FROM user 
         WHERE (nama_user = '$nama_user' OR username = '$username')
           AND id_user != '$id_user'"
    );
    if (mysqli_num_rows($sql_cek) > 0) {
        echo "<script>
                alert('Nama user atau username sudah digunakan user lain!');
                location.replace('../user/admin.php?page=users');
            </script>";
        exit;
    }

    // Buat query dasar
    $set_query = "
        nama_user = '$nama_user',
        username  = '$username'
    ";

    // Jika salah satu password baru diisi, wajib sama
    if (!empty($password_baru) || !empty($password_baru2)) {
        if ($password_baru !== $password_baru2) {
            echo "<script>
                    alert('Password tidak sama!');
                    location.replace('../user/admin.php?page=users');
                </script>";
            exit;
        }

        // Simpan password baru (plain)
        $set_query .= ",
        password = '$password_baru'
        ";
    }

    $query_ubah = "UPDATE user SET $set_query WHERE id_user = '$id_user'";
    $ubah_user  = mysqli_query($koneksi, $query_ubah);

    if ($ubah_user) {
        echo "<script>
                alert('Data user berhasil diubah!');
                location.replace('../user/admin.php?page=users');
            </script>";
    } else {
        echo "<script>
                alert('Data user gagal diubah!');
                location.replace('../user/admin.php?page=users');
            </script>";
    }
}

/**
 * HAPUS USER
 */
if (isset($_POST['hapus_user'])) {
    $id_user = $_POST['id_user'];

    $query_hapus = "DELETE FROM user WHERE id_user = '$id_user'";
    $hapus_user  = mysqli_query($koneksi, $query_hapus);

    if ($hapus_user) {
        echo "<script>
                alert('User berhasil dihapus!');
                location.replace('../user/admin.php?page=users');
            </script>";
    } else {
        echo "<script>
                alert('User gagal dihapus!');
                location.replace('../user/admin.php?page=users');
            </script>";
    }
}
