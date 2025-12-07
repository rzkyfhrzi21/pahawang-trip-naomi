<?php

session_start();

include 'koneksi.php';

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql_login = mysqli_query($koneksi, "SELECT * from user where username = '$username' and password = '$password'");
	$jumlah_user = mysqli_num_rows($sql_login);
	$data_user	= mysqli_fetch_array($sql_login);

	if ($jumlah_user > 0) {
		$_SESSION['nama_user'] 	= $data_user['nama_user'];
		$_SESSION['level'] 		= $data_user['level'];
		$_SESSION['username'] 	= $data_user['username'];
		$_SESSION['id_user'] 	= $data_user['id_user'];

		if ($data_user['level'] == 'admin') {
			header('Location: ../user/admin');
		} else if ($data_user['level'] == 'cust') {
			header('Location: ../user/customer');
		} else {
			echo "<script>
				alert('Level user tidak diketahui!');
				location.replace('../auth/login');
			</script>";
		}
	} else {
		echo "<script>
				alert('User tidak ditemukan!');
				location.replace('../auth/login');
			</script>";
	}
}
