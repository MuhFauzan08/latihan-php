-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 09:23 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukularis`
--

CREATE TABLE `bukularis` (
  `id` int(11) NOT NULL,
  `foto` varchar(30) DEFAULT '0',
  `judul` varchar(50) NOT NULL DEFAULT '0',
  `pengarang` varchar(30) NOT NULL DEFAULT '0',
  `penerbit` varchar(30) NOT NULL DEFAULT '0',
  `tahunterbit` year(4) NOT NULL DEFAULT 2000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukularis`
--

INSERT INTO `bukularis` (`id`, `foto`, `judul`, `pengarang`, `penerbit`, `tahunterbit`) VALUES
(1, 'atomic.jpg', 'Atomic Habbit ', 'James Clear', 'PT. Masindo', 2012),
(2, 'bercanda.jpg', 'Kamu Terlalu Banyak Bercanda', 'Marchella FP', 'PT. Rumah Buku', 2019),
(3, 'generasi.jpg', 'Generasi Kembali Ke Akar', 'Dr Muhammad Faisal', 'PT. Suka Buku', 2009),
(4, 'guru.jpg', 'Guru Aini', 'Andrea Hirata', 'PT. Gemar Baca', 2008),
(9, 'kita.jpg', 'Jika Kita Tak Pernah Jadi Apa-Apa', 'Alvi Syahrin', 'PT. Suka Buku', 2010),
(10, 'perjamuan.jpg', 'Perjamuan Khong Guan', 'Joko Pinurbo', 'PT. Kutu Buku', 2011),
(11, 'sunny.jpg', 'Sunny Everywhere', 'Suny Dahye', 'PT. Indonesia Membaca', 2017),
(12, 'techno.jpg', 'Techno Preneur Ship', 'Eko Suhartanto &amp; Ary Setia', 'PT. Suka Baca', 2008),
(16, 'gerbang.jpg', 'Ku Antar Ke Gerbang', 'Ramadhan KH', 'PT. Mencari Buku', 2010),
(17, 'seni.jpg', 'Seni Membuat Hidup Jadi Lebih Ringan', 'Francine Jay', 'PT. Indonesia Membaca Buku', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'admin', '$2y$10$Q.8S1xR35w38Hdvee9A9/O1PnZ4vyn7yYmBsEOc5vmYK.a8TdSx3.'),
(5, 'fauzan', '$2y$10$gx4O4JMoYMM2bMk9aw26vuLDKFZ9//AQ9LEBx031Cvg85JJczUgH6'),
(18, 'admoon', '$2y$10$1/kX8lB2wxPmrnRw6hLK1.YoryN3mYZdcwOSnXo3Skx/9MaIK4sMu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukularis`
--
ALTER TABLE `bukularis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukularis`
--
ALTER TABLE `bukularis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
