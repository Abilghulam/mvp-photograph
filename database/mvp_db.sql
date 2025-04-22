-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 01:24 PM
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
-- Database: `mvp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `logreg`
--

CREATE TABLE `logreg` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logreg`
--

INSERT INTO `logreg` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Evan Rasyid', 'evanras@gmail.com', 'evan2005', ''),
(2, 'Nabil Ghulam', 'nabilghlm12@gmail.com', 'nabil2005', 'admin'),
(3, 'Ramadhan', 'ramadhanal@gmail.com', 'ramadhan2004', ''),
(4, 'Ryan Firmansyah', 'ryanfir@gmail.com', 'ryan2004', 'user'),
(5, 'Achmad Khoirun', 'niam2003@gmail.com', '$2y$10$jquH0qeG8oEsLIEUKeIsZO.EnnOhcfRYycHof3lkLJ2dMzrSR1LZe', 'user'),
(6, 'Refida Muflichuna', 'refidamuf@gmail.com', '$2y$10$TemZl6r35YCEkdUrGIJbMuynUF1KjpmzCGuxPKnPHzWkXYOCVfceS', 'user'),
(7, 'admin nabil', 'adminnabil@gmail.com', '$2y$10$IXhZSk5/559MMHd7G0ExCuHKFh2if74ZCbKyZVuO4UVgi/pFcXfma', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(255) NOT NULL,
  `jenis_layanan` varchar(100) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `waktu_pemesanan` time NOT NULL,
  `lokasi` text NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `jenis_layanan`, `tanggal_pemesanan`, `waktu_pemesanan`, `lokasi`, `nama_lengkap`, `nomor_telepon`, `email`, `status`, `created_at`) VALUES
(1, 'Graduation', '2025-04-26', '07:00:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 06:58:53'),
(2, 'Wedding/Pre-Wedding', '2025-04-26', '07:00:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:02:27'),
(3, 'Models', '2025-05-10', '12:12:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:05:06'),
(4, 'Models', '2025-05-10', '12:12:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:06:21'),
(5, 'Graduation', '2025-04-30', '12:22:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:08:18'),
(6, 'Graduation', '2025-04-30', '12:22:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:09:15'),
(7, 'Product', '2025-05-05', '11:23:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:09:30'),
(8, 'Wedding/Pre-Wedding', '2025-05-10', '23:11:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:11:21'),
(9, 'Graduation', '2025-05-10', '06:07:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:12:01'),
(10, 'Graduation', '2025-05-10', '04:05:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:12:50'),
(11, 'Wedding/Pre-Wedding', '2025-05-10', '05:06:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:13:14'),
(12, 'Graduation', '2025-05-10', '12:12:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:16:38'),
(13, 'Product', '2025-05-09', '12:12:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:19:08'),
(14, 'Models', '2025-05-08', '20:26:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Disetujui', '2025-04-20 07:20:30'),
(15, 'Wedding/Pre-Wedding', '2025-05-10', '19:26:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Ditolak', '2025-04-20 07:22:03'),
(16, 'Models', '2025-04-26', '12:12:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Ditolak', '2025-04-20 14:30:14'),
(17, 'Graduation', '2025-04-12', '13:42:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Ditolak', '2025-04-21 03:40:11'),
(18, 'Graduation', '2025-04-12', '13:42:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Ditolak', '2025-04-21 03:40:28'),
(19, 'Wedding/Pre-Wedding', '2025-04-26', '12:00:00', 'Surabaya', 'Nabil Ghulam', '085102860099', 'nabilghlm12@gmail.com', 'Ditolak', '2025-04-21 03:41:40'),
(20, 'Product', '2025-05-10', '12:12:00', 'Malang', 'Evan Rasyid', '085102860099', 'evanras@gmail.com', 'Disetujui', '2025-04-21 03:43:41'),
(21, 'Graduation', '2025-04-26', '12:56:00', 'Malang', 'Evan Rasyid', '085102860099', 'evanras@gmail.com', 'Ditolak', '2025-04-21 08:14:06'),
(22, 'Event', '2025-04-21', '18:22:00', 'Jln. Kalibader RT 21 RW 03 Taman', 'nabilah nareswari', '08113199915', 'nabilahnares45@gmail.com', 'Ditolak', '2025-04-21 10:23:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logreg`
--
ALTER TABLE `logreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logreg`
--
ALTER TABLE `logreg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
