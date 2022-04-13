-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 09:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dailyreport`
--
CREATE DATABASE IF NOT EXISTS `dailyreport` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dailyreport`;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kodejabatan` int(3) NOT NULL,
  `namajabatan` varchar(100) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kodejabatan`, `namajabatan`, `deskripsi`) VALUES
(1, 'Pimpinan', 'Pemimpin dalam sebuah perusahaan'),
(2, 'SPMI', 'Memonitoring Dalily Report para Karyawan'),
(3, 'Karyawan/Dosen', 'Pekerja dalam sebuah perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_jobdesk`
--

CREATE TABLE `jabatan_jobdesk` (
  `kodejabatan` int(3) NOT NULL,
  `kodejobdesk` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan_jobdesk`
--

INSERT INTO `jabatan_jobdesk` (`kodejabatan`, `kodejobdesk`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 4),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jobdesk`
--

CREATE TABLE `jobdesk` (
  `kodejobdesk` int(3) NOT NULL,
  `namajobdesk` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobdesk`
--

INSERT INTO `jobdesk` (`kodejobdesk`, `namajobdesk`, `keterangan`) VALUES
(1, 'Pengelolan', ''),
(2, 'Pengawasan', ''),
(3, 'Pengembang', ''),
(4, 'Observasi', 'Melakukan pengamatan terhadap subjek dan mengumpulkan data terkait subjek secara objektif');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(2) NOT NULL,
  `code` varchar(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `bio` text NOT NULL,
  `jabatan` int(3) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `code`, `nama`, `bio`, `jabatan`, `password`, `email`) VALUES
(1, '0302F', 'Jhon Doe', 'Saya seorang pemimpin perusahaan Twins Mountain di Selatan Bumi.', 1, '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com'),
(2, '042HH', 'Steve Job', 'Saya adalah pengawas Profesional dalam berbagai bidang, dan akan selalu mengawasi setiap detail karyawan.', 2, '7e3d86b75c091118b07071ab26737aae', 'spmi@spmi.com'),
(3, '030B3', 'Sri Sulastri', 'Saya adalah karyawan yang profesional, dan saya akan selalu mematuhi perintah dari atasan sebagai bentuk profesionalitas saya.', 3, '826e80abdb355e21caf30aafe904ff64', 'karyawan@karyawan.com');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_jobdesk`
--

CREATE TABLE `karyawan_jobdesk` (
  `karyawan_id` int(11) NOT NULL,
  `kodejobdesk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `kodelaporan` varchar(100) NOT NULL,
  `kegiatan` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(3) NOT NULL,
  `pelapor` int(3) NOT NULL,
  `kodejobdesk` int(11) NOT NULL,
  `tanggalposting` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kodejabatan`);

--
-- Indexes for table `jabatan_jobdesk`
--
ALTER TABLE `jabatan_jobdesk`
  ADD KEY `kodejabatan` (`kodejabatan`,`kodejobdesk`),
  ADD KEY `kodejobdesk` (`kodejobdesk`);

--
-- Indexes for table `jobdesk`
--
ALTER TABLE `jobdesk`
  ADD PRIMARY KEY (`kodejobdesk`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan_jobdesk`
--
ALTER TABLE `karyawan_jobdesk`
  ADD KEY `karyawan_id` (`karyawan_id`,`kodejobdesk`),
  ADD KEY `kodejobdesk` (`kodejobdesk`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`kodelaporan`),
  ADD KEY `pelapor` (`pelapor`),
  ADD KEY `kodejobdesk` (`kodejobdesk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kodejabatan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobdesk`
--
ALTER TABLE `jobdesk`
  MODIFY `kodejobdesk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jabatan_jobdesk`
--
ALTER TABLE `jabatan_jobdesk`
  ADD CONSTRAINT `jabatan_jobdesk_ibfk_1` FOREIGN KEY (`kodejabatan`) REFERENCES `jabatan` (`kodejabatan`) ON DELETE CASCADE,
  ADD CONSTRAINT `jabatan_jobdesk_ibfk_2` FOREIGN KEY (`kodejobdesk`) REFERENCES `jobdesk` (`kodejobdesk`) ON DELETE CASCADE;

--
-- Constraints for table `karyawan_jobdesk`
--
ALTER TABLE `karyawan_jobdesk`
  ADD CONSTRAINT `karyawan_jobdesk_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `karyawan_jobdesk_ibfk_2` FOREIGN KEY (`kodejobdesk`) REFERENCES `jobdesk` (`kodejobdesk`) ON DELETE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`kodejobdesk`) REFERENCES `jobdesk` (`kodejobdesk`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
