-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 06:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_info`
--

CREATE TABLE `t_info` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_peserta`
--

CREATE TABLE `t_peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` char(9) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `prov` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_peserta`
--

INSERT INTO `t_peserta` (`id`, `nama`, `jk`, `alamat`, `kota`, `prov`, `status`, `agama`, `tlp`, `foto`) VALUES
(32, 'Anita Purnama', 'perempuan', 'Pemalang', 'Pemalang', 'Jawa Tengah', 'mahasiswi', 'Islam', '082311466137', '5bde915d3465e.jpg'),
(33, 'Candra Septia Cahya', 'laki-laki', 'Tasikmalaya', 'Tasikmalaya', 'Jawa Barat', 'mahasiswa', 'Islam', '082311466137', '5bde918e2c800.jpg'),
(34, 'Andriyani', 'perempuan', 'Tasikmalaya', 'Tasikmalaya', 'Jawa Barat', 'mahasiswi', 'Islam', '082311466137', '5bde92e485ba2.jpg'),
(35, 'Akang Gebot', 'laki-laki', 'Tasikmalaya', 'Tasikmalaya', 'Jawa Barat', 'mahasiswa', 'Islam', '082311466137', '5be071039ad25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_registrasi`
--

CREATE TABLE `t_registrasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_registrasi`
--

INSERT INTO `t_registrasi` (`id`, `nama`, `email`, `username`, `password`) VALUES
(10, 'candra septia cahya', 'candraseptia93@gmail.com', 'admin', '$2y$10$0ZKbomp0zQo2vfZNwmUZcuylP89YMJ4NslHs/4thklmeAsiBqGPt2'),
(11, 'candra septia cahya', 'akanggebot12@gmail.com', 'akang', '$2y$10$bC/rX9MnCmU8nKq/zbD6fO6m7me8iHa/a8zQ6OTSbvDEilMaC2ABe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_info`
--
ALTER TABLE `t_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_peserta`
--
ALTER TABLE `t_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_registrasi`
--
ALTER TABLE `t_registrasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_info`
--
ALTER TABLE `t_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_peserta`
--
ALTER TABLE `t_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `t_registrasi`
--
ALTER TABLE `t_registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
