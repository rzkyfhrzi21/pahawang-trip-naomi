<?php

include 'koneksi.php';

if (isset($_POST['btn_reservasi'])) {
	$nama_pemesan	= htmlspecialchars($_POST['nama_pemesan']);
	$no_hp			= htmlspecialchars($_POST['no_hp']);
	$jumlah_paket	= htmlspecialchars($_POST['jumlah_paket']);
	$check_in		= htmlspecialchars($_POST['check_in']);
	$nama_trip		= htmlspecialchars($_POST['nama_trip']);
	$email			= htmlspecialchars($_POST['email']);
	$status			= 'pending';

	$query_pesan	= "INSERT into pemesanan set 
						nama_pemesan 	= '$nama_pemesan',
						email 			= '$email', 
						check_in 		= '$check_in', 
						jumlah_paket 	= '$jumlah_paket', 
						nama_trip 		= '$nama_trip', 
						no_hp 			= '$no_hp', 
						status 			= '$status'";
	$pesan	= mysqli_query($koneksi, $query_pesan);

	$sql_cust 	= mysqli_query($koneksi, "SELECT * from user where username = '$email'");
	$cek_cust	= mysqli_num_rows($sql_cust);

	if ($pesan) {
		if ($cek_cust > 0) {
			echo "<script>
				alert('Paket Trip berhasil dipesan! Silahkan login untuk melihat reservasi anda');
				location.replace('../auth/login.php');
				</script>";
		} else {
			echo "<script>
				alert('Paket Trip berhasil dipesan! Tapi anda belum mempunyai akun. Silakan register dengan email pemesanan anda');
			</script>";
			header('Location: ../auth/register.php?nama=' . $nama_pemesan . '&email=' . $email);
		}
	} else {
		echo "<script>
			alert('Paket Trip gagal dipesan!');
			location.replace('../reservation');
		</script>";
	}
}

if (isset($_POST['admin_reservasi'])) {
	$nama_pemesan	= htmlspecialchars($_POST['nama_pemesan']);
	$nama_trip		= htmlspecialchars($_POST['nama_trip']);
	$check_in		= htmlspecialchars($_POST['check_in']);
	$jumlah_paket	= htmlspecialchars($_POST['jumlah_paket']);
	$email			= htmlspecialchars($_POST['email']);
	$no_hp			= htmlspecialchars($_POST['no_hp']);
	$status			= 'pending';

	$query_pesan	= "INSERT into pemesanan 
						set nama_pemesan = '$nama_pemesan', 
						nama_trip = '$nama_trip', 
						check_in = '$check_in', 
						jumlah_paket = '$jumlah_paket', 
						email = '$email', 
						no_hp = '$no_hp',
						status = '$status'";
	$pesan	= mysqli_query($koneksi, $query_pesan);

	if ($pesan) {
		echo "<script>
			location.replace('../user/admin.php?page=reservasi');
			</script>";
	} else {
		echo "<script>
			alert('Paket Trip gagal dipesan!');
			location.replace('../user/admin.php?page=reservasi');
		</script>";
	}
}

if (isset($_POST['cust_reservasi'])) {
	$nama_pemesan	= htmlspecialchars($_POST['nama_pemesan']);
	$check_in		= htmlspecialchars($_POST['check_in']);
	$jumlah_paket	= htmlspecialchars($_POST['jumlah_paket']);
	$nama_trip		= htmlspecialchars($_POST['nama_trip']);
	$email			= htmlspecialchars($_POST['email']);
	$no_hp			= htmlspecialchars($_POST['no_hp']);
	$status			= 'pending';

	$query_pesan	= "INSERT into pemesanan set 
						nama_pemesan 	= '$nama_pemesan', 
						check_in 		= '$check_in',  
						jumlah_paket 	= '$jumlah_paket', 
						nama_trip 		= '$nama_trip', 
						email 			= '$email', 
						status 			= '$status', 
						no_hp 			= '$no_hp'";
	$pesan	= mysqli_query($koneksi, $query_pesan);

	if ($pesan) {
		echo "<script>
			location.replace('../user/customer.php?page=reservasisaya');
			</script>";
	} else {
		echo "<script>
			alert('Paket Trip gagal dipesan!');
			location.replace('../user/customer.php?page=reservasisaya');
		</script>";
	}
}
