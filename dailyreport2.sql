-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 02:52 PM
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
-- Database: `dailyreport2`
--

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
  `jobdesk` int(3) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `code`, `nama`, `bio`, `jabatan`, `jobdesk`, `password`, `email`) VALUES
(2, '0302F', 'Jhon Doe', 'Saya seorang karyawan dengan kekuatan super.', 1, 1, '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `kodelaporan` int(11) NOT NULL,
  `kegiatan` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(3) NOT NULL,
  `pelapor` int(3) NOT NULL,
  `tanggalposting` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`kodelaporan`, `kegiatan`, `deskripsi`, `status`, `pelapor`, `tanggalposting`) VALUES
(3, 'asdas', '', 2, 2, '2022-04-08 13:09:57'),
(6, 'Penelitian Makhluk Laut', 'Makhluk laut itu unik', 2, 2, '2022-04-02 08:35:58'),
(7, 'Meneliti Gunung Kembar', 'Penelitian di sebuah gunung misterius di utara.', 2, 2, '2022-04-09 08:37:18'),
(8, 'Mengembangkan software AI', 'AI Development', 3, 2, '2022-04-03 09:55:58'),
(9, 'Mengimplementasi template mockup', 'Begitulah', 2, 2, '2022-04-09 11:45:28');

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
  ADD UNIQUE KEY `kodejabatan` (`kodejabatan`),
  ADD UNIQUE KEY `kodejobdesk` (`kodejobdesk`);

--
-- Indexes for table `jobdesk`
--
ALTER TABLE `jobdesk`
  ADD PRIMARY KEY (`kodejobdesk`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodejobdesk` (`jabatan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`kodelaporan`);

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
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `kodelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
