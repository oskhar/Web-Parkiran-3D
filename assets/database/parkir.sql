-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2023 at 10:27 AM
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
(2, 'faiz', '123'),
(3, 'mohammed', '123'),
(4, 'seka', '123'),
(11, 'tes', 'tesdoang'),
(12, 'a', 'a'),
(13, 'oskhar', '123');

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

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `tanggal`, `username`, `pesan`) VALUES
(2, '2023-06-09', 'oskhar', 'Tesdoang'),
(6, '2023-06-09', 'oskhar', 'Hari ini mengalami penurunan, tapi besok kemungkinan akan mengalami peningkatan jumlah pengunjung parkir, karna besok akan ada acara wisuda. tolong siapkan seluruh tempat parkir yang tersedia, dan bersiap untuk membuka beberapa lahan untuk menjadi tempat parkir sementara'),
(7, '2023-06-10', 'faiz', 'Ngatur?'),
(8, '2023-06-10', 'oskhar', '😎');

-- --------------------------------------------------------

--
-- Table structure for table `plat_nomor`
--

CREATE TABLE `plat_nomor` (
  `nomor` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `lantai` int(11) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plat_nomor`
--

INSERT INTO `plat_nomor` (`nomor`, `id`, `lantai`, `lokasi`) VALUES
('B1057ABC', 46, 0, 6),
('B1084ABC', 57, 1, 17),
('B1754ABC', 21, 2, 20),
('B2161ABC', 16, 2, 22),
('B2277ABC', 23, 2, 16),
('B2406ABC', 7, 1, 20),
('B2474ABC', 2, 2, 12),
('B2935ABC', 10, 1, 8),
('B3019ABC', 22, 1, 13),
('B3481ABC', 16, 2, 21),
('B3530ABC', 12, 2, 14),
('B3772ABC', 54, 1, 23),
('B4306ABC', 48, 2, 27),
('B4394ABC', 10, 2, 11),
('B4397ABC', 48, 1, 4),
('B4407ABC', 53, 1, 16),
('B4867ABC', 45, 1, 5),
('B5278ABC', 52, 0, 7),
('B5327ABC', 44, 2, 19),
('B6124ABC', 7, 1, 12),
('B6223ABC', 54, 2, 9),
('B6243ABC', 42, 1, 16),
('B6953ABC', 11, 2, 1),
('B7039ABC', 3, 2, 25),
('B7577ABC', 53, 2, 5),
('B7589ABC', 18, 0, 13),
('B7752ABC', 46, 2, 8),
('B8256ABC', 18, 1, 1),
('B8338ABC', 9, 1, 3),
('B8690ABC', 3, 2, 19),
('B8705ABC', 46, 2, 12),
('B9185ABC', 20, 1, 15),
('B9379ABC', 53, 1, 15),
('B9391ABC', 57, 2, 6),
('B9409ABC', 45, 1, 23),
('B9516ABC', 59, 2, 24),
('B9880ABC', 42, 2, 10),
('B9948ABC', 23, 1, 25),
('B9955ABC', 15, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `spot_parkir`
--

CREATE TABLE `spot_parkir` (
  `id` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `lantai` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spot_parkir`
--

INSERT INTO `spot_parkir` (`id`, `lokasi`, `lantai`, `status`) VALUES
(1, 0, 0, 0),
(2, 1, 0, 0),
(3, 2, 0, 0),
(4, 3, 0, 0),
(5, 4, 0, 0),
(6, 5, 0, 0),
(7, 6, 0, 0),
(8, 7, 0, 0),
(9, 8, 0, 0),
(10, 9, 0, 0),
(11, 10, 0, 0),
(12, 11, 0, 0),
(13, 12, 0, 0),
(14, 13, 0, 0),
(15, 14, 0, 0),
(16, 15, 0, 0),
(17, 16, 0, 0),
(18, 17, 0, 0),
(19, 18, 0, 0),
(20, 19, 0, 0),
(21, 20, 0, 0),
(22, 21, 0, 0),
(23, 22, 0, 0),
(24, 23, 0, 0),
(25, 24, 0, 0),
(26, 25, 0, 0),
(27, 26, 0, 0),
(28, 27, 0, 0),
(29, 0, 1, 0),
(30, 1, 1, 0),
(31, 2, 1, 0),
(32, 3, 1, 0),
(33, 4, 1, 0),
(34, 5, 1, 0),
(35, 6, 1, 0),
(36, 7, 1, 0),
(37, 8, 1, 0),
(38, 9, 1, 0),
(39, 10, 1, 0),
(40, 11, 1, 0),
(41, 12, 1, 0),
(42, 13, 1, 0),
(43, 14, 1, 0),
(44, 15, 1, 0),
(45, 16, 1, 0),
(46, 17, 1, 0),
(47, 18, 1, 0),
(48, 19, 1, 0),
(49, 20, 1, 0),
(50, 21, 1, 0),
(51, 22, 1, 0),
(52, 23, 1, 0),
(53, 24, 1, 0),
(54, 25, 1, 0),
(55, 26, 1, 0),
(56, 27, 1, 0),
(57, 0, 2, 0),
(58, 1, 2, 0),
(59, 2, 2, 0),
(60, 3, 2, 0),
(61, 4, 2, 0),
(62, 5, 2, 0),
(63, 6, 2, 0),
(64, 7, 2, 0),
(65, 8, 2, 0),
(66, 9, 2, 0),
(67, 10, 2, 0),
(68, 11, 2, 0),
(69, 12, 2, 0),
(70, 13, 2, 0),
(71, 14, 2, 0),
(72, 15, 2, 0),
(73, 16, 2, 0),
(74, 17, 2, 0),
(75, 18, 2, 0),
(76, 19, 2, 0),
(77, 20, 2, 0),
(78, 21, 2, 0),
(79, 22, 2, 0),
(80, 23, 2, 0),
(81, 24, 2, 0),
(82, 25, 2, 0),
(83, 26, 2, 0),
(84, 27, 2, 0);

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
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `spot_parkir`
--
ALTER TABLE `spot_parkir`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_parkir`
--
ALTER TABLE `data_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spot_parkir`
--
ALTER TABLE `spot_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
