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
-- Database: `php_restapi_sektor`
--

-- --------------------------------------------------------

--
-- Table structure for table `sektors`
--

CREATE TABLE `sektors` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sektors`
--

INSERT INTO `sektors` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Okuli', 'Ini adalah keterangan dari sektor baru', NULL, NULL, NULL),
(3, 'Letaree', 'Ini adalah keterangan dari sektor baru 256', NULL, '2024-05-15 13:38:03', NULL),
(4, 'Estomihi', 'brand new sector!', NULL, NULL, NULL),
(5, 'Rogate', 'brand new sector again!', NULL, NULL, NULL),
(6, 'Josua', 'Area Jl.parman sipoholon', '2024-05-15 10:58:43', '2024-05-15 10:58:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sektors`
--
ALTER TABLE `sektors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sektors`
--
ALTER TABLE `sektors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
