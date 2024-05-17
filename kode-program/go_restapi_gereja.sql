-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 11:39 PM
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
-- Database: `go_restapi_gereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluargas`
--

CREATE TABLE `keluargas` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `no_kk` varchar(255) DEFAULT NULL,
  `nama_Keluarga` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Pindah','Disabled') DEFAULT NULL,
  `tanggal_nikah` date DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluargas`
--

INSERT INTO `keluargas` (`id`, `created_at`, `updated_at`, `deleted_at`, `no_kk`, `nama_Keluarga`, `alamat`, `status`, `tanggal_nikah`, `lampiran`) VALUES
(1, '2024-05-15 09:45:39', '2024-05-16 08:58:43', NULL, 'GKPI_JKPS_KK_1', 'Ama. Deby Manalu/ Br. Pakpahannn', 'Laguboti', 'Aktif', '2024-05-16', '/lampiran/keluarga/1715754186-0b0348554ed51287ea365e38dbc744ee.png'),
(2, '2024-05-15 15:58:35', '2024-05-15 21:09:25', NULL, 'GKPI_JKPS_KK_2', 'Ama Handika Harahap/ Br. Tambunan', 'Laguboti', 'Aktif', '2011-03-03', '/lampiran/keluarga/1715763514-2bd1ac928a79a7b9429811cce977ae63.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluargas`
--
ALTER TABLE `keluargas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_keluargas_deleted_at` (`deleted_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluargas`
--
ALTER TABLE `keluargas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
