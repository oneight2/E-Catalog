-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 11:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multimedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`) VALUES
(1, 'TK Karakter'),
(2, 'SD Karakter'),
(3, 'SMP Karakter'),
(4, 'SMA Karakter'),
(5, 'Divisi Pelatihan'),
(6, 'Toko Karakter');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `waktu_pengajuan` varchar(100) NOT NULL,
  `nama_pengaju` varchar(250) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `nama_perangkat` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `urgensitas` enum('tinggi','sedang','rendah') NOT NULL,
  `status` enum('Menunggu Diproses','Sedang Dikerjakan','Selesai','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `id_departemen`, `id_pegawai`, `waktu_pengajuan`, `nama_pengaju`, `no_telp`, `nama_perangkat`, `deskripsi`, `urgensitas`, `status`) VALUES
(1, 1, 2, '25/03/2021 - 10:35', 'Syarif', '89699838615', 'Acer', 'tes', 'tinggi', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(250) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `no_telp`, `foto`) VALUES
(1, 'Belum ada', '', NULL),
(2, 'Abdul', '082113051350', 'default.jpg'),
(3, 'Bayu', '083134468863', 'default.jpg'),
(4, 'Syarif Hidayat', '089699838615', 'default.jpg'),
(5, 'Dahlan', '081297584571', 'default.jpg'),
(6, 'Fea', '081219215065', 'default.jpg'),
(11, 'Halim', '085234151406', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_project` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `storyboard` text NOT NULL,
  `target_project` varchar(255) NOT NULL,
  `link` text DEFAULT NULL,
  `id_jenis_project` longtext NOT NULL,
  `waktu_pengajuan` varchar(50) NOT NULL,
  `status` enum('Menunggu Diproses','Sedang Dikerjakan','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nama`, `id_departemen`, `id_pegawai`, `nama_project`, `deskripsi`, `storyboard`, `target_project`, `link`, `id_jenis_project`, `waktu_pengajuan`, `status`) VALUES
(26, 'ucok baba', 2, 2, 'Wisuda', 'Wisuda 2021', '22-03-21_01_web01_01.pdf', '2021-03-26', '', '{\"1\":0}', '22/03/2021 - 15:55', 'Selesai'),
(28, 'santi', 1, 1, 'Buku Tahunan 2021', 'tes', '24-03-21_Artboard_1@4x.png', '2021-03-26', '', '{\"1\":0}', '24/03/2021 - 16:19', 'Menunggu Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `jenis_project` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `jenis_project`) VALUES
(1, 'Shoot Video'),
(2, 'Editing Video'),
(3, 'Desain Gambar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departemen` (`id_departemen`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departemen` (`id_departemen`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `maintenance_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
