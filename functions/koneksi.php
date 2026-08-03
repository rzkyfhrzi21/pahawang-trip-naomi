<?php

// Deteksi lingkungan: Localhost atau Hosting
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';

if (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false || strpos($host, '.test') !== false) {
    // Konfigurasi untuk Localhost
    $server     = '127.0.0.1';
    $username   = 'root';
    $password   = '';
    $database   = 'pahawang-trip-naomi';
    $port       = 3309;
} else {
    // Konfigurasi untuk Hosting
    $server     = '';
    $username   = '';
    $password   = '';
    $database   = '';
    $port       = 3306;
}

// Membuat koneksi ke database
$koneksi = mysqli_connect(
    $server,
    $username,
    $password,
    $database,
    $port
);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Menetapkan zona waktu
date_default_timezone_set('Asia/Jakarta');

// Mendapatkan waktu saat ini
$pukul = date('H:i A');
