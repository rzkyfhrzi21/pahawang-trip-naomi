<?php

include 'koneksi.php';

function uploadTrip()
{
	$nama_gambar 	= $_FILES['gambar_trip']['name'];
	$size_gambar 	= $_FILES['gambar_trip']['size'];
	$tmp_name 		= $_FILES['gambar_trip']['tmp_name'];

	$valid_gambar	= ['png', 'jpeg', 'jpg'];
	$extensi_gambar	= explode('.', $nama_gambar);
	$extensi_gambar	= strtolower(end($extensi_gambar));

	if (!in_array($extensi_gambar, $valid_gambar)) {
		echo "<script>
				alert('Exstensi gambar tidak valid!');
				location.replace('../user/admin.php?page=trip');
			</script>";
	} else if ($size_gambar > 10000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
				location.replace('../user/admin.php?page=trip');
			</script>";
	} else {
		$gambar_baru 	= uniqid();
		$gambar_baru 	.= '.' . $extensi_gambar;

		move_uploaded_file($tmp_name, '../assets/trip/' . $gambar_baru);

		return $gambar_baru;
	}
}

if (isset($_POST['tambah_trip'])) {
	$nama_trip		= htmlspecialchars($_POST['nama_trip']);
	$harga_trip		= htmlspecialchars($_POST['harga_trip']);
	$ket_trip		= htmlspecialchars($_POST['ket_trip']);
	$jumlah_hari	= htmlspecialchars($_POST['jumlah_hari']);
	$maks_orang		= htmlspecialchars($_POST['maks_orang']);

	$sql_trip		= mysqli_query($koneksi, "SELECT * from trip where nama_trip = '$nama_trip'");
	$cek_trip		= mysqli_num_rows($sql_trip);

	if ($cek_trip > 0) {
		echo "<script>
				alert('Maaf, Paket Trip telah ada!');
				location.replace('../user/admin.php?page=trip');
			</script>";
	} else {

		if ($_FILES['gambar_trip']['error'] == 4) {
			echo "<script>
					alert('Harap masukkan gambar!');
					location.replace('../user/admin.php?page=trip');
				</script>";
		} else {
			$gambar_trip	= uploadTrip();

			$query_tambah 	= "INSERT into trip 
								set nama_trip = '$nama_trip', 
								harga_trip = '$harga_trip', 
								ket_trip = '$ket_trip', 
								jumlah_hari = '$jumlah_hari', 
								maks_orang = '$maks_orang', 
								gambar_trip = '$gambar_trip'";
			$tambah_trip 	= mysqli_query($koneksi, $query_tambah);

			if ($tambah_trip) {
				echo "<script>
					alert('Paket Trip berhasil ditambahkan!');
					location.replace('../user/admin.php?page=trip');
				</script>";
			} else {
				echo "<script>
					alert('Paket Trip gagal ditambahkan!');
					location.replace('../user/admin.php?page=trip');
				</script>";
			}
		}
	}
}

if (isset($_POST['ubah_trip'])) {
	$nama_trip		= htmlspecialchars($_POST['nama_trip']);
	$harga_trip		= htmlspecialchars($_POST['harga_trip']);
	$ket_trip		= htmlspecialchars($_POST['ket_trip']);
	$jumlah_hari	= htmlspecialchars($_POST['jumlah_hari']);
	$maks_orang		= htmlspecialchars($_POST['maks_orang']);

	$id_trip		= $_POST['id_trip'];
	$gambar_lama	= $_POST['gambar_trip'];

	if ($_FILES['gambar_trip']['error'] == 4) {
		$gambar_trip	= $gambar_lama;
	} else {
		unlink('../assets/trip/' . $gambar_lama);
		$gambar_trip	= uploadTrip();
	}

	$query_ubah 		= "UPDATE trip 
							set nama_trip = '$nama_trip', 
							harga_trip = '$harga_trip',  
							ket_trip = '$ket_trip', 
							jumlah_hari = '$jumlah_hari', 
							maks_orang = '$maks_orang', 
							gambar_trip = '$gambar_trip'
							where id_trip = '$id_trip'";
	$ubah_trip 	= mysqli_query($koneksi, $query_ubah);

	if ($ubah_trip) {
		echo "<script>
			alert('Paket Trip berhasil diubah!');
			location.replace('../user/admin.php?page=trip');
		</script>";
	} else {
		echo "<script>
			alert('Paket Trip gagal diubah!');
			location.replace('../user/admin.php?page=trip');
		</script>";
	}
}

if (isset($_POST['hapus_trip'])) {
	$id_trip		= $_POST['id_trip'];
	$gambar_lama	= $_POST['gambar_trip'];

	$query_hapus 	= "DELETE from trip where id_trip = '$id_trip'";
	$hapus_trip 	= mysqli_query($koneksi, $query_hapus);

	if ($hapus_trip) {
		unlink('../assets/trip/' . $gambar_lama);
		echo "<script>
			alert('Paket Trip berhasil dihapus!');
			location.replace('../user/admin.php?page=trip');
		</script>";
	} else {
		echo "<script>
			alert('Paket Trip gagal dihapus!');
			location.replace('../user/admin.php?page=trip');
		</script>";
	}
}

if (isset($_POST['ubah_promo'])) {
	$promo			= htmlspecialchars($_POST['promo']);

	$id_trip		= $_POST['id_trip'];

	$query_ubah 		= "UPDATE trip 
							set promo = '$promo'
							where id_trip = '$id_trip'";
	$ubah_trip 	= mysqli_query($koneksi, $query_ubah);

	if ($ubah_trip) {
		echo "<script>
			alert('Promo Trip berhasil diubah!');
			location.replace('../user/admin.php?page=promo');
		</script>";
	} else {
		echo "<script>
			alert('Promo Trip gagal diubah!');
			location.replace('../user/admin.php?page=promo');
		</script>";
	}
}

if (isset($_POST['tambah_promo'])) {
	$promo			= htmlspecialchars($_POST['promo']);

	$id_trip		= $_POST['id_trip'];

	$query_ubah 		= "UPDATE trip 
							set promo = '$promo'
							where id_trip = '$id_trip'";
	$ubah_trip 	= mysqli_query($koneksi, $query_ubah);

	if ($ubah_trip) {
		echo "<script>
			alert('Promo Trip berhasil ditambah!');
			location.replace('../user/admin.php?page=promo');
		</script>";
	} else {
		echo "<script>
			alert('Promo Trip gagal ditambah!');
			location.replace('../user/admin.php?page=promo');
		</script>";
	}
}

if (isset($_POST['hapus_promo'])) {
	$promo			= '';

	$id_trip		= $_POST['id_trip'];

	$query_ubah 		= "UPDATE trip 
							set promo = '$promo'
							where id_trip = '$id_trip'";
	$ubah_trip 	= mysqli_query($koneksi, $query_ubah);

	if ($ubah_trip) {
		echo "<script>
			alert('Promo Trip berhasil dihapus!');
			location.replace('../user/admin.php?page=promo');
		</script>";
	} else {
		echo "<script>
			alert('Promo Trip gagal dihapus!');
			location.replace('../user/admin.php?page=promo');
		</script>";
	}
}
