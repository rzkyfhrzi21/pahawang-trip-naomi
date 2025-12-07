<?php

include 'koneksi.php';

// TOTAL YANG SUDAH ADA
$sql_totalTrip   = mysqli_query($koneksi, "SELECT * FROM trip");
$total_trip      = mysqli_num_rows($sql_totalTrip);

$sql_totaluser   = mysqli_query($koneksi, "SELECT * FROM user WHERE level != 'cust'");
$total_user      = mysqli_num_rows($sql_totaluser);

$sql_totalcust   = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 'cust'");
$total_cust      = mysqli_num_rows($sql_totalcust);

$sql_totalKlien  = mysqli_query($koneksi, "SELECT * FROM pemesanan");
$total_klien     = mysqli_num_rows($sql_totalKlien);

/////////////////////////////////////////////
// 1. DATA PEMESANAN BERDASARKAN CHECK_IN  //
/////////////////////////////////////////////

// Hari ini
$sql_pemesanan_hari_ini = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total 
     FROM pemesanan 
     WHERE check_in = CURDATE()"
);
$data_hari_ini           = mysqli_fetch_assoc($sql_pemesanan_hari_ini);
$total_pemesanan_hari_ini = $data_hari_ini['total'] ?? 0;

// Minggu ini (Senin–Minggu, mode 1)
$sql_pemesanan_minggu_ini = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total 
     FROM pemesanan 
     WHERE YEARWEEK(check_in, 1) = YEARWEEK(CURDATE(), 1)"
);
$data_minggu_ini           = mysqli_fetch_assoc($sql_pemesanan_minggu_ini);
$total_pemesanan_minggu_ini = $data_minggu_ini['total'] ?? 0;

// Bulan ini
$sql_pemesanan_bulan_ini = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total 
     FROM pemesanan 
     WHERE YEAR(check_in) = YEAR(CURDATE())
       AND MONTH(check_in) = MONTH(CURDATE())"
);
$data_bulan_ini           = mysqli_fetch_assoc($sql_pemesanan_bulan_ini);
$total_pemesanan_bulan_ini = $data_bulan_ini['total'] ?? 0;

//////////////////////////////////////////////////
// 2. TOTAL PENDAPATAN (JOIN trip & pemesanan)  //
//////////////////////////////////////////////////

// Catatan: diasumsikan trip.harga_trip berisi angka murni.
// Kalau VARCHAR tapi tetap angka, kita CAST ke UNSIGNED.
// Revenue hanya dari pemesanan dengan status = 'selesai'.

// Pendapatan hari ini
$sql_pendapatan_hari_ini = mysqli_query(
    $koneksi,
    "SELECT 
        SUM(p.jumlah_paket * CAST(t.harga_trip AS UNSIGNED)) AS total
     FROM pemesanan p
     JOIN trip t ON p.nama_trip = t.nama_trip
     WHERE p.status = 'selesai'
       AND p.check_in = CURDATE()"
);
$data_pendapatan_hari_ini   = mysqli_fetch_assoc($sql_pendapatan_hari_ini);
$total_pendapatan_hari_ini  = $data_pendapatan_hari_ini['total'] ?? 0;

// Pendapatan minggu ini
$sql_pendapatan_minggu_ini = mysqli_query(
    $koneksi,
    "SELECT 
        SUM(p.jumlah_paket * CAST(t.harga_trip AS UNSIGNED)) AS total
     FROM pemesanan p
     JOIN trip t ON p.nama_trip = t.nama_trip
     WHERE p.status = 'selesai'
       AND YEARWEEK(p.check_in, 1) = YEARWEEK(CURDATE(), 1)"
);
$data_pendapatan_minggu_ini   = mysqli_fetch_assoc($sql_pendapatan_minggu_ini);
$total_pendapatan_minggu_ini  = $data_pendapatan_minggu_ini['total'] ?? 0;

// Pendapatan bulan ini
$sql_pendapatan_bulan_ini = mysqli_query(
    $koneksi,
    "SELECT 
        SUM(p.jumlah_paket * CAST(t.harga_trip AS UNSIGNED)) AS total
     FROM pemesanan p
     JOIN trip t ON p.nama_trip = t.nama_trip
     WHERE p.status = 'selesai'
       AND YEAR(p.check_in) = YEAR(CURDATE())
       AND MONTH(p.check_in) = MONTH(CURDATE())"
);
$data_pendapatan_bulan_ini   = mysqli_fetch_assoc($sql_pendapatan_bulan_ini);
$total_pendapatan_bulan_ini  = $data_pendapatan_bulan_ini['total'] ?? 0;

// Pendapatan total (semua waktu)
$sql_pendapatan_total = mysqli_query(
    $koneksi,
    "SELECT 
        SUM(p.jumlah_paket * CAST(t.harga_trip AS UNSIGNED)) AS total
     FROM pemesanan p
     JOIN trip t ON p.nama_trip = t.nama_trip
     WHERE p.status = 'selesai'"
);
$data_pendapatan_total  = mysqli_fetch_assoc($sql_pendapatan_total);
$total_pendapatan_total = $data_pendapatan_total['total'] ?? 0;
