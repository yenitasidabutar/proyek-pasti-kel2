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
-- Database: `go_restapi_pelayangereja`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelayans`
--

CREATE TABLE `pelayans` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `peran` varchar(255) DEFAULT NULL,
  `tanggal_terima_jabatan` date DEFAULT NULL,
  `tanggal_akhir_jabatan` date DEFAULT NULL,
  `id_jemaat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelayans`
--

INSERT INTO `pelayans` (`id`, `created_at`, `updated_at`, `deleted_at`, `peran`, `tanggal_terima_jabatan`, `tanggal_akhir_jabatan`, `id_jemaat`) VALUES
(1, '2024-05-16 05:30:56', '2024-05-16 11:39:24', NULL, 'Seksi Diakoni', '2024-05-17', '2024-05-18', 1),
(5, '2024-05-16 10:43:49', '2024-05-16 10:43:49', NULL, 'Seksi Pekabaran Injil', '2024-05-15', '0000-00-00', 3),
(6, '2024-05-16 11:35:56', '2024-05-16 11:35:56', NULL, 'Seksi Sekolah Minggu', '2024-05-10', '0000-00-00', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelayans`
--
ALTER TABLE `pelayans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pelayans_deleted_at` (`deleted_at`),
  ADD KEY `fk_jemaatt` (`id_jemaat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelayans`
--
ALTER TABLE `pelayans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelayans`
--
ALTER TABLE `pelayans`
  ADD CONSTRAINT `fk_jemaatt` FOREIGN KEY (`id_jemaat`) REFERENCES `go_restapi_jemaat`.`jemaats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
