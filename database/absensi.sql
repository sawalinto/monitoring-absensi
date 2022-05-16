-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 12:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `kartu` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jam_masuk` datetime NOT NULL,
  `jam_pulang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `kartu`, `nama`, `jam_masuk`, `jam_pulang`) VALUES
(1, '2018', 'sawal', '2022-04-19 15:50:55', '2022-04-19 16:50:55'),
(2, '2019', 'sada', '2022-04-19 16:30:11', '2022-04-19 17:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbberkas`
--

CREATE TABLE `tbberkas` (
  `id` int(11) NOT NULL,
  `email_mhs` varchar(100) NOT NULL,
  `filenya` text NOT NULL,
  `email_reviewer` varchar(100) NOT NULL,
  `file_ok` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbguru`
--

CREATE TABLE `tbguru` (
  `id` int(11) NOT NULL,
  `kartu` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbguru`
--

INSERT INTO `tbguru` (`id`, `kartu`, `nama`, `alamat`, `ttl`, `kelamin`) VALUES
(4, '2018030152', 'wallin', 'medan', '2022-03-30', 'Pria');

-- --------------------------------------------------------

--
-- Table structure for table `tbinfo`
--

CREATE TABLE `tbinfo` (
  `id` int(11) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbinfo`
--

INSERT INTO `tbinfo` (`id`, `info`) VALUES
(1, '<p>Ini adalah info PKM</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `id` int(11) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`id`, `id_pengguna`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbpanduan`
--

CREATE TABLE `tbpanduan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `filenya` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbpendaftar`
--

CREATE TABLE `tbpendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `judul` text NOT NULL,
  `file_login` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbreviewer`
--

CREATE TABLE `tbreviewer` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbberkas`
--
ALTER TABLE `tbberkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbguru`
--
ALTER TABLE `tbguru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbinfo`
--
ALTER TABLE `tbinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbpanduan`
--
ALTER TABLE `tbpanduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbpendaftar`
--
ALTER TABLE `tbpendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbreviewer`
--
ALTER TABLE `tbreviewer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbberkas`
--
ALTER TABLE `tbberkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbguru`
--
ALTER TABLE `tbguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbinfo`
--
ALTER TABLE `tbinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbpanduan`
--
ALTER TABLE `tbpanduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbpendaftar`
--
ALTER TABLE `tbpendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbreviewer`
--
ALTER TABLE `tbreviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
