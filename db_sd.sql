-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2018 at 07:18 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sd`
--

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `x` varchar(50) NOT NULL,
  `y` varchar(50) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `x`, `y`, `jenis`, `foto`) VALUES
(1, 'TK-SD Sekolah Alam Rumbai', '', '0.56753', '101.428048', 'Swasta', ''),
(2, 'Sekolah Dasar Negeri 59 Pekanbaru', '', '0.563713', '101.421937', 'Negeri', ''),
(3, 'Sekolah Dasar Negeri 86 Pekanbaru', '', '0.56542', '101.434437', 'Negeri', ''),
(4, 'Sekolah Dasar Daniel HKBP Rumbai', '', '0.570969', '101.437388', 'Swasta', ''),
(5, 'SDIT AL ITTIHAD Pekanbaru', '', '0.574498', '101.436844', 'Swasta', ''),
(6, 'Sekolah Dasar Negeri 149 Pekanbaru', '', '0.57331', '101.436292', 'Negeri', ''),
(7, 'SD Negeri 8 Pekanbaru', '', '0.569715', '101.445694', 'Negeri', ''),
(8, 'SD Negeri 85 Pekanbaru', '', '0.568134', '101.451562', 'Negeri', ''),
(9, 'SD Negeri 119 Pekanbaru', '', '0.570949', '101.458396', 'Negeri', ''),
(10, 'SD IT Al Birru', '', '0.572406', '101.456704', 'Swasta', ''),
(11, 'SD Smart Indonesia', '', '0.566202', '101.448978', 'Swasta', ''),
(12, 'SD Negeri 106 Pekanbaru', '', '0.563303', '101.44171', 'Negeri', ''),
(13, 'SD Negeri 55 Pekanbaru', '', '0.560446', '101.445004', 'Negeri', ''),
(14, 'MI Swasta Muhammadiyah 02', '', '0.561508', '101.439239', 'Swasta', ''),
(15, 'SD Negeri 25 Pekanbaru', '', '0.559702', '101.435006', 'Negeri', ''),
(16, 'SD IT Ibnu Abbas', '', '0.478962', '101.404359', 'Swasta', ''),
(17, 'SD Negeri 187 Pekanbaru', '', '0.492195', '101.366519', 'Negeri', ''),
(18, 'SD Azzuhra', '', '0.490859', '101.361081', 'Swasta', ''),
(19, 'SD Smart Indonesia', '', '0.498703', '101.363232', 'Swasta', ''),
(20, 'SD Islam As-Shofa', '', '0.50059', '101.398236', 'Swasta', ''),
(21, 'SD Islam Al-Ulum', '', '0.497618', '101.398804', 'Swasta', ''),
(22, 'SD Heaven Kids', '', '0.500761', '101.381442', 'Swasta', ''),
(23, 'Madrasah Ibtidaiyah Muhammadiyah 01 Rumbai', '', '0.582644', '101.419401', 'Swasta', ''),
(24, 'SDN 16 Pekanbaru', '', '0.588284', '101.53017', 'Negeri', ''),
(25, 'SDN 150 Pekanbaru', '', '0.581513', '101.423628', 'Negeri', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
