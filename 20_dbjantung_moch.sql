-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 09:30 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20_dbjantung_moch`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_diagnosa`
--

CREATE TABLE `tbdetail_diagnosa` (
  `id_detail` int(10) NOT NULL,
  `id_diagnosa` varchar(10) NOT NULL,
  `id_gejala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_diagnosa`
--

INSERT INTO `tbdetail_diagnosa` (`id_detail`, `id_diagnosa`, `id_gejala`) VALUES
(1, 'D2011001', 3),
(2, 'D2011001', 7),
(3, 'D2011001', 8),
(4, 'D2011001', 12),
(5, 'D2011001', 13),
(6, 'D2101001', 1),
(7, 'D2101001', 3),
(8, 'D2101001', 5),
(9, 'D2101001', 7),
(10, 'D2101001', 8),
(11, 'D2104001', 1),
(12, 'D2104001', 4),
(13, 'D2104001', 8),
(14, 'D2104001', 15),
(15, 'D2104001', 18),
(16, 'D2204002', 11),
(17, 'D2204002', 14),
(18, 'D2204002', 17),
(19, 'D2204002', 19),
(20, 'D2204003', 2),
(21, 'D2204003', 4),
(22, 'D2204003', 6),
(23, 'D2204003', 7),
(24, 'D2204003', 8),
(25, 'D2204003', 13),
(26, 'D2204003', 15),
(27, 'D2204003', 18),
(28, 'D2204003', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbdiagnosa`
--

CREATE TABLE `tbdiagnosa` (
  `id_diagnosa` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `id_penyakit` int(10) NOT NULL,
  `hasil_diagnosa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdiagnosa`
--

INSERT INTO `tbdiagnosa` (`id_diagnosa`, `tanggal`, `id_pengguna`, `id_penyakit`, `hasil_diagnosa`) VALUES
('D2011001', '2020-11-10', 1, 4, '0.67'),
('D2101001', '2021-01-23', 2, 2, '0.5'),
('D2104001', '2021-04-10', 6, 9, '0.4'),
('D2204002', '2022-04-06', 8, 2, '0.18'),
('D2204003', '2022-04-06', 8, 1, '0.57');

-- --------------------------------------------------------

--
-- Table structure for table `tbgejala`
--

CREATE TABLE `tbgejala` (
  `id_gejala` int(10) NOT NULL,
  `nama_gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbgejala`
--

INSERT INTO `tbgejala` (`id_gejala`, `nama_gejala`) VALUES
(1, 'Mendengkur'),
(2, 'Nyeri Dada\r\n'),
(3, 'Sesak Nafas\r\n'),
(4, 'Keringat Dingin'),
(5, 'Dada Berdebar'),
(6, 'Mual'),
(7, 'Cepat Lelah'),
(8, 'Pusing'),
(9, 'Serasa Ingin Pingsan'),
(10, 'Jantung berdetak lebih cepat dari normal'),
(11, 'Batuk-batuk\r\n'),
(12, 'Pembengkakan pada tungkai dan pergelangan kaki'),
(13, 'Napas pendek dan cepat'),
(14, 'Kulit membiru'),
(15, 'Berat Badan Menurun'),
(16, 'Tumbuh kembang anak terlambat'),
(17, 'Detak jantung tidak beraturan'),
(18, 'Demam dan menggigil'),
(19, 'Keringat berlebih pada malam hari'),
(20, 'Tekanan darah rendah'),
(21, 'Jantung berdetak lebih lambat dari normal'),
(22, 'Penglihatan berkunang-kunang'),
(23, 'Penurunan kemampuan untuk beraktivitas'),
(24, 'Bengkak pada bagian perut'),
(25, 'Penurunan nafsu makan dan rasa mual'),
(26, 'Tampak semburat kebiruan atau kehitaman pada bibir, kulit, atau jari-jari'),
(27, 'Pertumbuhan terhambat'),
(28, 'Pipi memerah, khususnya pada penderita stenosis katup mitral'),
(29, 'Batuk darah'),
(30, 'Lemas'),
(31, 'Nyeri otot dan sendi'),
(32, 'Sakit kepala');

-- --------------------------------------------------------

--
-- Table structure for table `tbhasil`
--

CREATE TABLE `tbhasil` (
  `id_hasil` int(10) NOT NULL,
  `id_diagnosa` varchar(10) NOT NULL,
  `id_penyakit` int(10) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhasil`
--

INSERT INTO `tbhasil` (`id_hasil`, `id_diagnosa`, `id_penyakit`, `hasil`) VALUES
(1, 'D2011001', 1, 0.4),
(2, 'D2011001', 2, 0.33),
(3, 'D2011001', 3, 0.5),
(4, 'D2011001', 4, 0.67),
(5, 'D2011001', 5, 0.55),
(6, 'D2011001', 6, 0.55),
(7, 'D2011001', 7, 0.67),
(8, 'D2011001', 9, 0.2),
(9, 'D2101001', 1, 0.4),
(10, 'D2101001', 2, 0.5),
(11, 'D2101001', 3, 0.5),
(12, 'D2101001', 4, 0.5),
(13, 'D2101001', 5, 0.36),
(14, 'D2101001', 6, 0.36),
(15, 'D2101001', 7, 0.5),
(16, 'D2104001', 1, 0.2),
(17, 'D2104001', 2, 0.33),
(18, 'D2104001', 3, 0.17),
(19, 'D2104001', 4, 0.17),
(20, 'D2104001', 6, 0.18),
(21, 'D2104001', 7, 0.17),
(22, 'D2104001', 8, 0.17),
(23, 'D2104001', 9, 0.4),
(24, 'D2204002', 2, 0.18),
(25, 'D2204002', 8, 0.18),
(26, 'D2204003', 1, 0.57),
(27, 'D2204003', 2, 0.38),
(28, 'D2204003', 3, 0.38),
(29, 'D2204003', 4, 0.5),
(30, 'D2204003', 5, 0.13),
(31, 'D2204003', 6, 0.27),
(32, 'D2204003', 7, 0.38),
(33, 'D2204003', 8, 0.25),
(34, 'D2204003', 9, 0.29);

-- --------------------------------------------------------

--
-- Table structure for table `tbhasil_diagnosa`
--

CREATE TABLE `tbhasil_diagnosa` (
  `id_hasil` int(10) NOT NULL,
  `id_diagnosa` varchar(10) NOT NULL,
  `id_penyakit` int(10) NOT NULL,
  `id_gejala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhasil_diagnosa`
--

INSERT INTO `tbhasil_diagnosa` (`id_hasil`, `id_diagnosa`, `id_penyakit`, `id_gejala`) VALUES
(1, 'D2011001', 1, 3),
(2, 'D2011001', 2, 3),
(3, 'D2011001', 3, 3),
(4, 'D2011001', 5, 3),
(5, 'D2011001', 6, 3),
(6, 'D2011001', 7, 3),
(7, 'D2011001', 1, 7),
(8, 'D2011001', 2, 7),
(9, 'D2011001', 3, 7),
(10, 'D2011001', 4, 7),
(11, 'D2011001', 5, 7),
(12, 'D2011001', 6, 7),
(13, 'D2011001', 7, 7),
(14, 'D2011001', 3, 8),
(15, 'D2011001', 4, 8),
(16, 'D2011001', 7, 8),
(17, 'D2011001', 4, 12),
(18, 'D2011001', 5, 12),
(19, 'D2011001', 6, 12),
(20, 'D2011001', 7, 12),
(21, 'D2011001', 9, 12),
(22, 'D2011001', 4, 13),
(23, 'D2101001', 2, 1),
(24, 'D2101001', 1, 3),
(25, 'D2101001', 2, 3),
(26, 'D2101001', 3, 3),
(27, 'D2101001', 5, 3),
(28, 'D2101001', 6, 3),
(29, 'D2101001', 7, 3),
(30, 'D2101001', 4, 5),
(31, 'D2101001', 1, 7),
(32, 'D2101001', 2, 7),
(33, 'D2101001', 3, 7),
(34, 'D2101001', 4, 7),
(35, 'D2101001', 5, 7),
(36, 'D2101001', 6, 7),
(37, 'D2101001', 7, 7),
(38, 'D2101001', 3, 8),
(39, 'D2101001', 4, 8),
(40, 'D2101001', 7, 8),
(41, 'D2104001', 2, 1),
(42, 'D2104001', 1, 4),
(43, 'D2104001', 2, 4),
(44, 'D2104001', 3, 8),
(45, 'D2104001', 4, 8),
(46, 'D2104001', 7, 8),
(47, 'D2104001', 6, 15),
(48, 'D2104001', 9, 15),
(49, 'D2104001', 8, 18),
(50, 'D2104001', 9, 18),
(51, 'D2204002', 2, 11),
(52, 'D2204002', 8, 19),
(53, 'D2204003', 1, 2),
(54, 'D2204003', 2, 2),
(55, 'D2204003', 3, 2),
(56, 'D2204003', 4, 2),
(57, 'D2204003', 7, 2),
(58, 'D2204003', 8, 2),
(59, 'D2204003', 1, 4),
(60, 'D2204003', 2, 4),
(61, 'D2204003', 1, 6),
(62, 'D2204003', 1, 7),
(63, 'D2204003', 2, 7),
(64, 'D2204003', 3, 7),
(65, 'D2204003', 4, 7),
(66, 'D2204003', 5, 7),
(67, 'D2204003', 6, 7),
(68, 'D2204003', 7, 7),
(69, 'D2204003', 3, 8),
(70, 'D2204003', 4, 8),
(71, 'D2204003', 7, 8),
(72, 'D2204003', 4, 13),
(73, 'D2204003', 6, 15),
(74, 'D2204003', 9, 15),
(75, 'D2204003', 8, 18),
(76, 'D2204003', 9, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbpengetahuan`
--

CREATE TABLE `tbpengetahuan` (
  `id_pengetahuan` int(10) NOT NULL,
  `id_penyakit` int(10) NOT NULL,
  `id_gejala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengetahuan`
--

INSERT INTO `tbpengetahuan` (`id_pengetahuan`, `id_penyakit`, `id_gejala`) VALUES
(14, 1, 2),
(15, 1, 3),
(16, 1, 7),
(17, 1, 4),
(18, 1, 6),
(19, 2, 2),
(20, 2, 3),
(21, 2, 7),
(22, 2, 4),
(23, 2, 11),
(24, 2, 9),
(25, 2, 1),
(26, 3, 10),
(27, 3, 21),
(28, 3, 8),
(29, 3, 9),
(30, 3, 2),
(31, 3, 3),
(32, 3, 7),
(34, 4, 12),
(35, 4, 13),
(36, 4, 2),
(37, 4, 8),
(38, 4, 7),
(39, 4, 22),
(40, 4, 5),
(41, 5, 3),
(42, 5, 7),
(43, 5, 12),
(44, 5, 23),
(45, 5, 24),
(46, 5, 25),
(47, 6, 26),
(48, 6, 3),
(49, 6, 7),
(50, 6, 15),
(51, 6, 27),
(52, 6, 12),
(53, 7, 2),
(54, 7, 3),
(55, 7, 7),
(56, 7, 8),
(57, 7, 12),
(58, 7, 28),
(59, 7, 29),
(60, 8, 18),
(61, 8, 30),
(62, 8, 31),
(63, 8, 32),
(64, 8, 19),
(65, 8, 25),
(66, 8, 2),
(67, 9, 29),
(68, 9, 18),
(69, 9, 31),
(70, 9, 15),
(71, 9, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbpengguna`
--

CREATE TABLE `tbpengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengguna`
--

INSERT INTO `tbpengguna` (`id_pengguna`, `nama`, `email`, `password`) VALUES
(1, 'joni', 'joni@gmail.com', 'joni'),
(2, 'Aditiya', 'adit@gmail.com', 'adit'),
(3, 'Arumi Basma', 'arumi@gmail.com', 'arumi'),
(4, 'Jaka Sembung', 'jaka@gmail.com', 'sembung'),
(5, 'Andre', 'andre@gmail.com', 'andre'),
(6, 'Rio', 'rio@gmail.com', 'rio'),
(7, 'Juki', 'juki@gmail.com', 'juki'),
(8, 'Hendi', 'hendi@gmail.com', 'hendi'),
(9, 'Andre', 'andre@gmail.com', 'andre');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyakit`
--

CREATE TABLE `tbpenyakit` (
  `id_penyakit` int(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenyakit`
--

INSERT INTO `tbpenyakit` (`id_penyakit`, `nama_penyakit`) VALUES
(1, 'Jantung Koroner'),
(2, 'Serangan Jantung'),
(3, 'Aritmia'),
(4, 'Kardiomiopati'),
(5, 'Gagal Jantung'),
(6, 'Penyakit Jantung Bawaan'),
(7, 'Penyakit Katup Jantung'),
(8, 'Endokarditis'),
(9, 'Tumor Jantung');

-- --------------------------------------------------------

--
-- Table structure for table `tbsolusi`
--

CREATE TABLE `tbsolusi` (
  `id_solusi` int(10) NOT NULL,
  `nama_solusi` text NOT NULL,
  `id_penyakit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsolusi`
--

INSERT INTO `tbsolusi` (`id_solusi`, `nama_solusi`, `id_penyakit`) VALUES
(1, 'Berhenti merokok, Mengurangi atau berhenti mengonsumsi alkohol, Mengonsumsi makanan dengan gizi seimbang, Mengurangi stress, Menjaga berat badan ideal, Berolahraga secara teratur.', 1),
(2, 'Duduk bersandar senyaman yang kamu rasakan. Hindari posisi berbaring, karena kemungkinan besar posisi tersebut akan mengganggu jalannya pernapasanmu.Sebisa mungkin tidak minum air terlalu banyak. Di beberapa kasus, minum air malah akan membuat pengidap serangan jantung semakin sesak.', 2),
(3, 'Obat-obatan yang diresepkan dokter untuk mengatasi aritmia adalah obat antiaritmia. Dokter juga akan meresepkan warfarin untuk menurunkan risiko terjadinya penggumpalan darah.', 3),
(4, 'Menjaga berat badan tetap ideal, Mengonsumsi makanan yang bergizi, Mengurangi minum kopi atau minuman berkafein, Berhenti merokok, Mengelola stres dengan baik, Mengelola watu tidur dan istirahat, Berolahraga rutin, Membatasi konsumsi minuman beralkohol.', 4),
(5, 'Pengobatan dilakukan untuk meredakan gejala dan meningkatkan kekuatan jantung. Penderita disarankan untuk membatasi aktivitas, menjalani pola hidup sehat, serta akan diberikan obat-obatan sesuai kondisi yang diderita atau berdasarkan penyebab gagal jantung yang dialami.', 5),
(6, 'Penanganan berupa penggunaan obat-obatan untuk tekanan darah rendah dan kontrol detak jantung, perangkat jantung, prosedur kateter, dan operasi. Kasus yang serius mungkin memerlukan transplantasi jantung.', 6),
(7, 'Pengobatan dilakukan berdasarkan tingkat keparahan gejala, bervariasi dari obat-obatan sampai tindakan surgikal. Obat-obatan ini bertujuan untuk meredakan gejala dan menurunkan risiko memburuknya kerusakan katup. Tindakan operatif termasuk koreksi atau penggantian katup.', 7),
(8, 'Dalam banyak kasus, pasien endokarditis berhasil disembuhkan dengan pemberian antibiotik. Sedangkan pada beberapa kasus lainnya, prosedur bedah perlu dilakukan untuk memperbaiki kerusakan katup jantung dan membersihkan sisa infeksi.', 8),
(9, 'Reseksi sederhana seringkali dipilih untuk tumor jinak seperti miksoma. Perawatan harus dilakukan dengan menghubungkan mesin jantung-paru untuk menghindari lepasnya bahan tumor. Mengenai alasan ini dokter membuka kedua atrium dari vena pulmonalis superior kanan tanpa melukai tumor atau dasarnya.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `nama`, `email`, `password`, `gambar`, `level`) VALUES
(1, 'Maell Lee', 'mael@gmail.com', 'mael', 'noimages.jpg', 'Admin'),
(2, 'Jaka Tarub', 'admin@gmail.com', 'admin', 'avatar.png', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbdetail_diagnosa`
--
ALTER TABLE `tbdetail_diagnosa`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbdiagnosa`
--
ALTER TABLE `tbdiagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `tbgejala`
--
ALTER TABLE `tbgejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tbhasil`
--
ALTER TABLE `tbhasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbhasil_diagnosa`
--
ALTER TABLE `tbhasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbpengetahuan`
--
ALTER TABLE `tbpengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- Indexes for table `tbpengguna`
--
ALTER TABLE `tbpengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbpenyakit`
--
ALTER TABLE `tbpenyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `tbsolusi`
--
ALTER TABLE `tbsolusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetail_diagnosa`
--
ALTER TABLE `tbdetail_diagnosa`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbgejala`
--
ALTER TABLE `tbgejala`
  MODIFY `id_gejala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbhasil`
--
ALTER TABLE `tbhasil`
  MODIFY `id_hasil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbhasil_diagnosa`
--
ALTER TABLE `tbhasil_diagnosa`
  MODIFY `id_hasil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tbpengetahuan`
--
ALTER TABLE `tbpengetahuan`
  MODIFY `id_pengetahuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `tbpengguna`
--
ALTER TABLE `tbpengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbpenyakit`
--
ALTER TABLE `tbpenyakit`
  MODIFY `id_penyakit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbsolusi`
--
ALTER TABLE `tbsolusi`
  MODIFY `id_solusi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
