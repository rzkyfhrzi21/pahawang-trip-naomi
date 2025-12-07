<?php

session_start();

include 'functions/koneksi.php';

$pemesananId       = @$_GET['id'];

$sql_pemesanan = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pemesanan = '$pemesananId'");
if (!$sql_pemesanan || mysqli_num_rows($sql_pemesanan) == 0) {
    header('Location: pesan_trip.php');
    exit();
}
$pemesanan = mysqli_fetch_array($sql_pemesanan);
$nama_trip = $pemesanan['nama_trip'];

$sql_trip = mysqli_query($koneksi, "SELECT * FROM trip WHERE nama_trip = '$nama_trip'");
if (!$sql_trip || mysqli_num_rows($sql_trip) == 0) {
    die('Data trip tidak ditemukan.');
}
$trip = mysqli_fetch_array($sql_trip);
$harga_trip = $trip['harga_trip'];

$total_hargaPemesanan = $pemesanan['jumlah_paket'] * $harga_trip;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Invoice #<?= $pemesanan['id_pemesanan']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pahawang Trip menyediakan informasi wisata terbaik untuk pulau-pulau di Pahawang, Lampung. Temukan pengalaman perjalanan luar biasa dengan berbagai pilihan destinasi wisata alam dan laut yang memukau di Pahawang.">
    <meta name="keywords" content="wisata Pahawang, trip Pahawang, pulau wisata Lampung, wisata alam Pahawang, wisata laut Pahawang, perjalanan Pahawang">
    <meta name="author" content="Pahawang Trip">
    <meta property="og:title" content="Pahawang Trip - Wisata Pulau Pahawang, Lampung">
    <meta property="og:description" content="Jelajahi keindahan alam Pulau Pahawang di Lampung bersama Pahawang Trip. Kami membantu Anda menemukan destinasi wisata terbaik untuk liburan yang tak terlupakan.">
    <meta name="robots" content="index, follow">
    <link rel="icon" href="assets/logo1.png" alt="Keindahan Alam Pahawang, Pulau Wisata di Lampung">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

</head>

<body style="padding: 0 20;">
    <div>
        <section class="content">
            <div class="row">
                <div>
                    <div class="span12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h2><strong>Invoice </strong>#<?= $pemesanan['id_pemesanan']; ?></h2>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row pemesanan-info">
                <div class="col-sm-6 pemesanan-col">
                    From
                    <address>
                        <strong>Resepsionis Pahawang Trip</strong><br>
                        Jl. ZA Pagar Alam No.93, Gedong Meneng<br>
                        Kec. Rajabasa, Bandar Lampung<br>
                        Lampung 35141<br>
                        Telp: +62 878-8239-1847<br>
                        Email: naomi.2311010047@mail.darmajaya.ac.id
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 pemesanan-col">
                    To
                    <address>
                        <strong><?= $pemesanan['nama_pemesan']; ?></strong><br>
                        Telp : <?= $pemesanan['no_hp']; ?><br>
                        Email : <?= $pemesanan['email']; ?><br>
                        Status : <?= strtoupper($pemesanan['status']); ?>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Trip</th>
                                <th>Tgl Check In</th>
                                <th>Tgl Check Out</th>
                                <th>Jumlah Paket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td><?= $pemesanan['nama_trip']; ?></td>
                                <td><?= $pemesanan['check_in']; ?></td>
                                <td><?= $pemesanan['check_out']; ?></td>
                                <td><?= $pemesanan['jumlah_paket']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td><b>Total Biaya</b></td>
                                <td><b><?= $total_hargaPemesanan; ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </section>
    </div>

    <!-- Print -->
    <script>
        window.print()
    </script>
</body>

</html>