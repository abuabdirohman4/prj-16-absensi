-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 12, 2019 at 03:48 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gama`
--

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `univ` varchar(35) NOT NULL,
  `jurusan` varchar(35) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `desa` varchar(10) NOT NULL,
  `kelompok` varchar(25) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `email` varchar(35) NOT NULL,
  `ayah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `terdaftar`
--

CREATE TABLE `terdaftar` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `kelompok` text NOT NULL,
  `desa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terdaftar`
--

INSERT INTO `terdaftar` (`id`, `nama`, `kelompok`, `desa`) VALUES
(1, 'ADIL WIBOWO', 'CIJULANG', 'BANJARAN'),
(2, 'AGUNG HAFID FADIL', 'CIPAKU', 'CIPARAY'),
(3, 'ARIEF SIDIQ PAUZI', 'CIPAKU', 'CIPARAY'),
(4, 'AYUNI SULISTIA', 'PONGPORANG', 'MAJALAYA'),
(5, 'AZIZ FAWAZ NUR FADILLAH', 'CIWIDEY', 'SOREANG'),
(6, 'DINANDA DIYANITA FIRDAUS', 'SUKMA 2', 'MAJALAYA'),
(7, 'FAHRIZAL AZKA ALHAFIDZ', 'MUARA', 'MAJALAYA'),
(8, 'FAHRUL AZHARI ASSIDQI', 'MUARA', 'MAJALAYA'),
(9, 'FITRI RAMDAYANI', 'PONGPORANG', 'MAJALAYA'),
(10, 'FUJA SPARINGGA NURHIKMAH', 'BARUJATI', 'CIPARAY'),
(11, 'HADIYANTO', 'NAMBO', 'BANJARAN'),
(12, 'HALIM HAMBALI', 'CIJULANG', 'BANJARAN'),
(13, 'IMANDA HUDAYA PUTRI', 'CIDAWOLONG', 'CIPARAY'),
(14, 'LADI', 'CIJULANG', 'BANJARAN'),
(15, 'LULU AURALLIA', 'BOJONG', 'MAJALAYA'),
(16, 'MUGI BAROKAH', 'BOJONG', 'MAJALAYA'),
(17, 'MUHAMMAD THORIQ ASSIDIQ', 'HAUR BUYUT', 'MAJALAYA'),
(18, 'MUHAMMAD WAWAN', 'CIJULANG', 'BANJARAN'),
(19, 'NADYA ZAHRA PERMANA', 'CIPAKU', 'CIPARAY'),
(20, 'NIKEN AULIA RAHMAN', 'BURUJUL', 'SAYATI'),
(21, 'NURHASAN', 'CIJULANG', 'BANJARAN'),
(22, 'PIPIH SUMIATI', 'MUARA', 'MAJALAYA'),
(23, 'RARIQ MUHAMMAD GHANI RICKY', 'KOPER', 'SAYATI'),
(24, 'REFALDI WIDARA', 'HAUR BUYUT', 'MAJALAYA'),
(25, 'REFINA HILYATA RAMDANTI', 'CIDAWOLONG', 'CIPARAY'),
(26, 'RIVANA NUR HAQIQI', 'CIPAKU', 'CIPARAY'),
(27, 'ROFIFATUS SALMA', 'BOJONG', 'MAJALAYA'),
(28, 'RYAN HIDAYAT', 'CIJULANG', 'BANJARAN'),
(29, 'SABILA DINA UBAIDAH', 'MUARA', 'MAJALAYA'),
(30, 'SALSABILA RIFKI PRANADA', 'KBSI', 'CIPARAY'),
(31, 'SENDI NUR HASAN', 'MARKEN', 'SAYATI'),
(32, 'SOFIA KHAERUNNISA', 'CIDAWOLONG', 'CIPARAY'),
(33, 'SOFIA ULFAH', 'BOJONG', 'MAJALAYA'),
(34, 'TSALISA LAILY FEBRIANY', 'CIPAKU', 'CIPARAY'),
(35, 'ZULFAN AHMAD SIDIK', 'CIPBAR', 'BALEENDAH'),
(36, 'ABDUL KHOLIS ELAKMAL', 'MARKEN', 'SAYATI'),
(37, 'AHMED THOHIR', 'MARKEN', 'SAYATI'),
(38, 'AJIB FALANA SIDIQ', 'WARLOB II', 'SOREANG'),
(39, 'AURA CANTIKA N', 'BURUJUL', 'SAYATI'),
(40, 'DINDA ALVINA F.', 'CIPBAR', 'BALEENDAH'),
(41, 'GALIH ADNAN PERSADA', 'MARKEN', 'SAYATI'),
(42, 'HALIM FEBRIANA', 'CIPTIM', 'BALEENDAH'),
(43, 'IHWAN ABDILLAH', 'NAMBO', 'BANJARAN'),
(44, 'ILHAM ASSIDIQ', 'MARKEN', 'SAYATI'),
(45, 'KEVIN OKTAVIANOV ABDURAHMAN', 'WARLOB II', 'SOREANG'),
(46, 'LULUK SHINTA A.', 'MARKEN', 'SAYATI'),
(47, 'M. AZKA NUR IHSANUDIN', 'MARKEN', 'SAYATI'),
(48, 'M. KEVIN SHABIANA HAMZAH', 'MARKEN', 'SAYATI'),
(49, 'M. MUKHLIS HISBULLOH', 'CIPBAR', 'BALEENDAH'),
(50, 'MAULA AGNA F.', 'MARKEN', 'SAYATI'),
(51, 'MEISYA ROSELA', 'CIPTIM', 'BALEENDAH'),
(52, 'MULKI AHMAD MUJADI', 'PONGPORANG', 'MAJALAYA'),
(53, 'NISSA NUR AGNIA', 'HAUR BUYUT', 'MAJALAYA'),
(54, 'NUR\'AINI SALSABILA', 'KBSI', 'CIPARAY'),
(55, 'YUSUF ALIF', 'CIJULANG', 'BANJARAN'),
(56, 'AMALIA N F', 'BARUJATI', 'CIPARAY'),
(57, 'CANTIK S.', 'WARLOB I', 'SOREANG'),
(58, 'CANTIKA INDAH LESTARI', 'BARUJATI', 'CIPARAY'),
(59, 'DEANIRA SALSABILA', 'MUARA', 'MAJALAYA'),
(60, 'DINDA AZKA LULUK', 'KOPER', 'SAYATI'),
(61, 'EFRIDA USTADZATU K.', 'CIPBAR', 'BALEENDAH'),
(62, 'FIKA ANANDA FUADILAH', 'CIBADUYUT', 'SAYATI'),
(63, 'GHINA IMROATUL FADZILA', 'CIPTIM', 'BALEENDAH'),
(64, 'NIDA', 'BURUJUL', 'SAYATI'),
(65, 'NUR SITI AISYAH', 'MUNJUL', 'BALEENDAH'),
(66, 'NURRA GAIA DEWIYANTI', 'SOREANG II', 'SOREANG'),
(67, 'SARAH SRI WAHYUNI', 'PANGALENGAN', 'BANJARAN'),
(68, 'SULTHON A J', 'KBSI', 'CIPARAY'),
(69, 'SYIFA FADLIN ALFAINI RIYADUL JANNAH', 'CIPTIM', 'BALEENDAH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terdaftar`
--
ALTER TABLE `terdaftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terdaftar`
--
ALTER TABLE `terdaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
