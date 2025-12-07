<?php

include 'koneksi.php';

$id_pemesanan         = $_GET['id'];

date_default_timezone_set('Asia/Jakarta');
$check_out          = date('Y-m-d');
$status_selesai     = 'selesai';

$query_selesai        = "UPDATE pemesanan set check_out = '$check_out', status = '$status_selesai' where id_pemesanan = '$id_pemesanan'";
$pesanan_selesai    = mysqli_query($koneksi, $query_selesai);

if ($pesanan_selesai) {
    echo "<script>
			location.replace('../user/customer.php?page=reservasisaya');
		</script>";
} else {
    echo "<script>
			alert('Gagal mengubah status!');
			location.replace('../user/customer.php?page=reservasisaya');
		</script>";
}
