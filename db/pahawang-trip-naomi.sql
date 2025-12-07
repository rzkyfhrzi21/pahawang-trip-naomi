-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2025 at 03:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pahawang-trip-naomi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `jumlah_paket` int(11) NOT NULL,
  `nama_trip` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pemesan`, `check_in`, `check_out`, `email`, `jumlah_paket`, `nama_trip`, `no_hp`, `status`, `created_at`) VALUES
(10, 'Rizky ', '2025-01-12', '2025-01-12', 'rizky01011991@gmail.com', 2, 'Pahawang VIP', '085173200421', 'selesai', '2025-11-07 20:15:49'),
(11, 'Rizky Fahrezi', '2025-01-12', '2025-11-07', 'rizky01011991@gmail.com', 1, 'Pahawang VIP', '085173200421', 'selesai', '2025-11-07 20:15:49'),
(12, 'Intan', '2025-01-19', '2025-01-12', 'intan11@gmail.com', 1, 'Reguler Pahawang Trip', '1212121212', 'selesai', '2025-11-07 20:15:49'),
(13, 'Rizky Fahrezi', '2025-11-07', '2025-11-07', 'rizky01011991@gmail.com', 1, 'Pahawang VIP', '085173200421', 'selesai', '2025-11-07 20:15:49'),
(14, 'RRRRR', '2025-11-07', '2025-11-07', 'rizky11111@gmail.com', 1, 'Pahawang VIP', '11111111111111', 'selesai', '2025-11-07 20:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id_trip` int(11) NOT NULL,
  `nama_trip` varchar(255) NOT NULL,
  `ket_trip` text NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `maks_orang` int(11) NOT NULL,
  `harga_trip` varchar(255) NOT NULL,
  `promo` varchar(255) NOT NULL,
  `gambar_trip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id_trip`, `nama_trip`, `ket_trip`, `jumlah_hari`, `maks_orang`, `harga_trip`, `promo`, `gambar_trip`) VALUES
(1, 'Pahawang VIP', 'Pelayanan eksklusif bintang 5', 7, 5, '5000000', '', '6782cbe468ceb.jpg'),
(2, 'Reguler Pahawang Trip', 'Paket standar2 aja', 2, 2, '3000000', 'Bonus snack', '6782cbd64e8c3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','cust') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Kelila Naomi Abira ', 'naomi1', 'naomi1', 'admin'),
(2, 'Kelila', 'Kelila1', 'Kelila', 'cust'),
(6, 'Rizky Fahrezi', 'rizky01011991@gmail.com', 'rizky1', 'cust'),
(7, 'rizzzzz', 'rrrrrrrrrrrrr@gmail.com', 'rizzzzz', 'cust'),
(8, 'dadadddddddd', 'dd@dadad', 'dadadddddddd', 'cust'),
(9, 'rizkyaja', 'rizkyaja', 'rizkyaja', 'cust'),
(10, 'rizkyajarizkyajarizkyaja', 'rizkyajarizkyajarizkyaja', 'rizkyaja', 'admin'),
(11, '11111111111111', '11111111111111', '11111111111111', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id_trip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id_trip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
