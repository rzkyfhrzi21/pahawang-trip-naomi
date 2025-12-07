<?php

include 'koneksi.php';

$sql_totalKlien         = mysqli_query($koneksi, "SELECT * from pemesanan where email = '$sesi_username'");
$total_klien            = mysqli_num_rows($sql_totalKlien);
    