-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 08:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nurul`
--

-- --------------------------------------------------------

--
-- Table structure for table `datagaleri`
--

CREATE TABLE `datagaleri` (
  `id_galeri` int(11) NOT NULL,
  `dataGaleri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datagaleri`
--

INSERT INTO `datagaleri` (`id_galeri`, `dataGaleri`) VALUES
(2, 'uploads/1730274598_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dataguru`
--

CREATE TABLE `dataguru` (
  `id_guru` int(11) NOT NULL,
  `namaGuru` varchar(150) NOT NULL,
  `jabatanGuru` varchar(100) NOT NULL,
  `gambarGuru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataguru`
--

INSERT INTO `dataguru` (`id_guru`, `namaGuru`, `jabatanGuru`, `gambarGuru`) VALUES
(5, 'Ulfah Hidayatiningsih, S.E.', 'Kepala Sekolah', 'uploads/ulfah.jpg'),
(6, 'Fatkhuri, S.Ag.', 'Guru Aqidah Akhlak', 'uploads/fatkhuri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `datakelas`
--

CREATE TABLE `datakelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkatKelas` varchar(11) NOT NULL,
  `jumlahSiswaLelaki` int(11) NOT NULL,
  `jumlahSiswaPerempuan` int(11) NOT NULL,
  `totalSiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datakelas`
--

INSERT INTO `datakelas` (`id_kelas`, `tingkatKelas`, `jumlahSiswaLelaki`, `jumlahSiswaPerempuan`, `totalSiswa`) VALUES
(2, 'X.1', 8, 9, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datagaleri`
--
ALTER TABLE `datagaleri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `dataguru`
--
ALTER TABLE `dataguru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `datakelas`
--
ALTER TABLE `datakelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datagaleri`
--
ALTER TABLE `datagaleri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dataguru`
--
ALTER TABLE `dataguru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `datakelas`
--
ALTER TABLE `datakelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
