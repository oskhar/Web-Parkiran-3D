-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2023 at 02:45 AM
-- Server version: 10.11.3-MariaDB
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'oskhar', '123'),
(2, 'faiz', '123'),
(3, 'mohammed', '123'),
(4, 'seka', '123');

-- --------------------------------------------------------

--
-- Table structure for table `data_parkir`
--

CREATE TABLE `data_parkir` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_parkir`
--

INSERT INTO `data_parkir` (`id`, `tanggal`, `jumlah`) VALUES
(181, '1 juni', 9),
(182, '2 juni', 54),
(183, '3 juni', 71),
(184, '4 juni', 56),
(185, '5 juni', 60),
(186, '6 juni', 52),
(187, '7 juni', 72),
(188, '8 juni', 59),
(189, '9 juni', 32),
(190, '10 juni', 63),
(191, '11 juni', 22),
(192, '12 juni', 30),
(193, '13 juni', 17),
(194, '14 juni', 50),
(195, '15 juni', 25),
(196, '16 juni', 22),
(197, '17 juni', 44),
(198, '18 juni', 46),
(199, '19 juni', 60),
(200, '20 juni', 39);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plat_nomor`
--

CREATE TABLE `plat_nomor` (
  `nomor` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `lokasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'faiz', 'haidar'),
(2, 'tanjung', 'arswendo'),
(3, 'muh', 'oskhar'),
(7, 'Abdurahman', 'Rafif'),
(8, 'Rafif', 'Dawy'),
(9, 'Daffa', 'Malik'),
(10, 'Aidil', 'Riansyah'),
(11, 'Fajar', 'Ganevi'),
(12, 'Mohammed', 'Nashwan'),
(13, 'Muhamad', 'Faried'),
(14, 'Jestine', 'Vallendra'),
(15, 'hadi', 'sudrajad'),
(16, 'isna', 'latifa'),
(17, 'nia', 'zeiniah'),
(18, 'oskhar', 'mubarok'),
(19, 'bisma', 'riefky'),
(20, 'ewog', 'fatirdh'),
(21, 'dara', 'ayu'),
(22, 'fidain', 'raditia'),
(23, 'fatihul', 'choir'),
(24, 'bagus', 'riski'),
(42, 'bang faiz', 'ooakowkoakw'),
(43, '20', 'L'),
(44, '8085', 'aowkodakwo@gmail.com'),
(45, 'Tanjung arswendo', 'tes'),
(46, 'o', '02'),
(47, 'P', '37992'),
(48, 'okokokokokokok@gmail.com', '081672617627'),
(49, 'khar', 'o'),
(50, 'muahmadoskhar@gmail.com', '08291732'),
(51, 'Anopan', '123456789'),
(52, '12345@mhs.uinjkt.ac.id', '081234231'),
(53, 'Lazenggan', '987653'),
(54, '987654322@mhs.uinjkt.ac.id', '08261767'),
(55, 'VP_Zstar', '87654567'),
(56, '987654@mhs.uinjkt.ac.id', '08127321'),
(57, 'Idile', '1023948'),
(58, '918273@mhs.uinjkt.ac.id', '0872635'),
(59, 'Mx|Xavior', '10928e47'),
(60, '9938746@mhs.uinjkt.ac.id', '087515');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_parkir`
--
ALTER TABLE `data_parkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plat_nomor`
--
ALTER TABLE `plat_nomor`
  ADD PRIMARY KEY (`nomor`),
  ADD UNIQUE KEY `lokasi` (`lokasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_parkir`
--
ALTER TABLE `data_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
