<?php

session_start();

include 'koneksi.php';

if (isset($_POST['btn_register'])) {
    $nama_user          = $_POST['nama_user'];
    $username           = $_POST['username'];
    $password           = $_POST['password'];
    $konfirmasiPassword = $_POST['konfirmasiPassword'];
    $level              = $_POST['level'];

    $sql_login       = mysqli_query($koneksi, "SELECT * from user where username = '$username'");
    $jumlah_user     = mysqli_num_rows($sql_login);
    $data_user       = mysqli_fetch_array($sql_login);

    if ($password != $konfirmasiPassword) {
        echo "<script>
            alert('Password tidak sama! Silakan masukkan ulang');
            location.replace('../auth/register.php');
        </script>";
        header('Location: ../auth/register.php?nama=' . $nama_user . '&email=' . $username);
    } else {
        if ($jumlah_user > 0) {
            echo "<script>
            alert('Email telah terdaftar sebelumnya! Silakan login');
            location.replace('../auth/login.php');
        </script>";
            header('Location: ../auth/login.php?username=' . $username);
        } else {
            $query_daftar    = "INSERT into user set username = '$username', nama_user = '$nama_user', level = '$level', password = '$password'";
            $daftar         = mysqli_query($koneksi, $query_daftar);

            if ($daftar) {
                echo "<script>
                    alert('Akun telah berhasil terdaftar! Silakan login');
                    location.replace('../auth/login.php');
                </script>";
            } else {
                echo "<script>
                    alert('Akun telah gagal terdaftar! Silakan masukkan ulang');
                    location.replace('../auth/register.php');
                </script>";
            }
        }
    }
}
