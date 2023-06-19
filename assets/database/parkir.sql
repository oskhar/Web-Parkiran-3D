-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2023 at 08:31 AM
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
(181, '2023-06-01', 9),
(182, '2023-06-02', 54),
(183, '2023-06-03', 71),
(184, '2023-06-04', 56),
(185, '2023-06-05', 60),
(186, '2023-06-06', 52),
(187, '2023-06-07', 72),
(188, '2023-06-08', 59),
(189, '2023-06-09', 32),
(190, '2023-06-10', 63),
(191, '2023-06-11', 22),
(192, '2023-06-12', 30),
(193, '2023-06-13', 17),
(194, '2023-06-14', 50),
(195, '2023-06-15', 25),
(196, '2023-06-16', 22),
(197, '2023-06-17', 47),
(198, '2023-06-18', 46),
(199, '2023-06-19', 60),
(200, '2023-06-20', 39);

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
  `lokasi` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `waktu_masuk` varchar(100) DEFAULT NULL,
  `waktu_keluar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plat_nomor`
--

INSERT INTO `plat_nomor` (`nomor`, `id`, `lantai`, `lokasi`, `status`, `waktu_masuk`, `waktu_keluar`) VALUES
('B0192PO', 14, 0, 26, 1, '2023-06-16 07:49:08', 'belum keluar'),
('B1084AB', 15, 1, 9, 1, '2023-06-15 12:25:30', 'belum keluar'),
('B1084AG', 61, 0, 1, 1, '2023-06-16 04:15:53', 'belum keluar'),
('B1957AB', 18, 1, 3, 1, '2023-06-15 12:24:12', 'belum keluar'),
('B2817GA', 14, 0, 11, 0, '2023-06-15 12:42:44', '2023-06-16 07:34:16'),
('B2910OK', 1, 0, 4, 0, '2023-06-16 04:36:12', '2023-06-16 07:24:05'),
('B8291JH', 17, 0, 19, 0, '2023-06-16 07:46:45', '2023-06-17 19:52:15'),
('B8721KW', 53, 0, 15, 1, '2023-06-16 07:49:45', 'belum keluar'),
('B9218PB', 11, 0, 8, 1, '2023-06-17 19:11:01', 'belum keluar'),
('B9218PK', 11, 0, 10, 1, '2023-06-17 19:11:14', 'belum keluar'),
('B9218PL', 11, 0, 20, 1, '2023-06-17 19:11:26', 'belum keluar'),
('B9218PO', 11, 0, 6, 1, '2023-06-17 19:10:47', 'belum keluar'),
('B9218PP', 11, 0, 11, 1, '2023-06-17 19:11:38', 'belum keluar'),
('H9021YT', 49, 0, 17, 1, '2023-06-16 07:50:25', 'belum keluar'),
('J3390OP', 59, 0, 24, 1, '2023-06-16 07:48:35', 'belum keluar'),
('K0918OL', 19, 0, 18, 1, '2023-06-16 07:47:56', 'belum keluar'),
('K8321IK', 19, 0, 12, 1, '2023-06-16 07:51:58', 'belum keluar'),
('L8432PI', 15, 0, 9, 1, '2023-06-17 19:47:03', 'belum keluar'),
('O9108KJ', 20, 0, 22, 1, '2023-06-16 07:46:57', 'belum keluar'),
('P0291LO', 57, 0, 25, 1, '2023-06-16 07:47:29', 'belum keluar');

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
(2, 1, 0, 1),
(3, 2, 0, 0),
(4, 3, 0, 0),
(5, 4, 0, 0),
(6, 5, 0, 0),
(7, 6, 0, 1),
(8, 7, 0, 0),
(9, 8, 0, 1),
(10, 9, 0, 1),
(11, 10, 0, 1),
(12, 11, 0, 1),
(13, 12, 0, 1),
(14, 13, 0, 0),
(15, 14, 0, 1),
(16, 15, 0, 1),
(17, 16, 0, 0),
(18, 17, 0, 1),
(19, 18, 0, 1),
(20, 19, 0, 0),
(21, 20, 0, 1),
(22, 21, 0, 1),
(23, 22, 0, 1),
(24, 23, 0, 0),
(25, 24, 0, 1),
(26, 25, 0, 1),
(27, 26, 0, 1),
(28, 27, 0, 0),
(29, 0, 1, 0),
(30, 1, 1, 0),
(31, 2, 1, 0),
(32, 3, 1, 1),
(33, 4, 1, 0),
(34, 5, 1, 0),
(35, 6, 1, 0),
(36, 7, 1, 0),
(37, 8, 1, 0),
(38, 9, 1, 1),
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
(1, 'fai', '123aja'),
(2, 'tanjung', 'arswendo'),
(7, 'Abdurahman', 'Rafif'),
(8, 'Rafif', 'Dawy'),
(9, 'Daffa', 'Malik'),
(10, 'Aidil', 'Riansyah'),
(11, 'Fajar', 'Ganevi'),
(12, 'Mohammed', 'Nashwan'),
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
(60, '9938746@mhs.uinjkt.ac.id', '087515'),
(62, 'B1084AG', 'B1084AG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `data_parkir`
--
ALTER TABLE `data_parkir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tanggal` (`tanggal`),
  ADD KEY `tanggal_2` (`tanggal`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
