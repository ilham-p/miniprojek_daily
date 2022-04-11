-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 02:23 PM
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
  `jobdesk` int(3) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `code`, `nama`, `bio`, `jabatan`, `jobdesk`, `password`, `email`) VALUES
(2, '0302F', 'Jhon Doe', 'Saya seorang karyawan dengan kekuatan super.', 1, 1, '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com'),
(6, '030AB', 'Steve Job', 'Saya adalah karyawan disebuah perusahaan yang pegawainya rata-rata menganggur', 2, 2, '826e80abdb355e21caf30aafe904ff64', 'stevejob@mail.com'),
(7, '03027', 'William Shakesphere', 'Saya adalah ahli dalam bidang sastra dengan imajinasi yang bebas saya selalu membuat sebuah karya yang tiada tara.', 3, 3, '826e80abdb355e21caf30aafe904ff64', 'william@mail.com'),
(13, '0D45A', 'Joe Biden', 'Saya seorang pengangguran', 3, 4, '826e80abdb355e21caf30aafe904ff64', 'biden@mail.com'),
(14, '90650', 'Santi Sri', 'Saya syantik', 3, 4, '826e80abdb355e21caf30aafe904ff64', 'santi@mail.com');

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
  `tanggalposting` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`kodelaporan`, `kegiatan`, `deskripsi`, `status`, `pelapor`, `tanggalposting`) VALUES
('1f37353066169a7aebdb819f0db0c363', '12312asd', '123123', 2, 7, '2022-04-30 05:35:14'),
('3', 'asdas', '', 2, 2, '2022-04-30 13:09:57'),
('37cd7eb8de8e52894714af7b555c0d52', '12312', '123213', 3, 7, '2022-04-11 05:35:14'),
('396d9d015f1d82054bf735e3ed1d8ab1', 'qweqwe', 'qweqwe', 2, 7, '2022-04-11 05:34:30'),
('577dba84566d9bc8520340552aa1f465', 'asdasd', 'asdasd', 3, 7, '2022-04-11 05:28:15'),
('6', 'Penelitian Makhluk Laut', 'Makhluk laut itu unik', 2, 2, '2022-04-02 08:35:58'),
('6c4ec6a8e64396e23fc4ebc57dbca25e', 'qweqwe', 'qweqwe', 3, 7, '2022-04-11 05:34:30'),
('7', 'Meneliti Gunung Kembar', 'Penelitian di sebuah gunung misterius di utara.', 2, 2, '2022-04-09 08:37:18'),
('7e8f7671123a4caa483d7a82d674abd2', '12312', '123123', 2, 7, '2022-04-11 05:30:06'),
('8', 'Mengembangkan software AI', 'AI Development', 3, 7, '2022-04-03 09:55:58'),
('8447a0f1308ad2e34698505ff00e4196', '21312321', '213123', 3, 7, '2022-04-11 05:35:14'),
('9', 'Mengimplementasi template mockup', 'Begitulah', 2, 7, '2022-04-09 11:45:28'),
('c6b803029c84221c0e7ff2cc63d52155', 'asda', 'asdasd', 2, 7, '2022-04-11 05:30:06'),
('d09df192e78a369893d26f445a816b92', '23123', '124124', 2, 7, '2022-04-11 05:30:06'),
('e77e4617ca1ea2a122b7035c3b06bb56', '12412', '124124', 3, 7, '2022-04-11 05:30:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kodejabatan`);

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
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
