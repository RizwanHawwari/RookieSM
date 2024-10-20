<<<<<<< HEAD
-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: login
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB
=======
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 08:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

>>>>>>> server-side

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('A','S') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`, `Role`) VALUES
(1, 'admin123', '482c811da5d5b4bc6d497ffa98491e38', 'A'),
(2, 'admin', '$2y$10$2y/8t3aFaw2QoFFrz5QLx.hiFPMvDZsAvkFub14QGJgZogij0zl2W', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama_pelajaran` varchar(255) NOT NULL,
  `link_pelajaran` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama_pelajaran`, `link_pelajaran`, `gambar`) VALUES
(1, 'HTML & CSS', 'learningHtml.php', 'img-logo/htmlcss-removebg-preview.png'),
(2, 'JavaScript', '', 'img-logo/js.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `NIS` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('A','S') NOT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT 'aktif',
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID`, `Nama`, `Username`, `NIS`, `Password`, `Role`, `status`, `kelas`, `jurusan`, `last_login`) VALUES
(1, 'Rizwan Hawwari', 'raxxs47', '123456789', '202cb962ac59075b964b07152d234b70', 'S', 'aktif', '', '', NULL),
(3, 'Rizwan Hawwari', 'rizwanganteng', '55667788', '$2y$10$4dsdv9mBK1GzaoqgVSxRL./dgI81G9TMDhbIsFUFFhnNBiipEQAJ2', 'S', 'tidak aktif', '', '', NULL),
(4, 'Budiono Siregar', 'budi343', '', '$2y$10$0m3fcpbca216p0aicaAJieDkdsDUnzCrngoiiLjXsbeBUQTlD66We', 'S', 'aktif', '12', 'RPL', NULL),
(5, 'Travis Scott', 'trav567', '', '$2y$10$Hl0DMTybvpgSFEyTLNbcIe4/60dDtkIoMTLymx5rs91q7i1XnbmiO', 'S', 'aktif', '10', 'PPLG', '2024-10-17 16:35:01'),
(11, 'Justin Beiber', 'beiber55', '87612309', '$2y$10$kRi0g8ZKjsuJnZ4P5mkmqu2hezoV56Q/aBOivEsU6yCkJ6T6FJ/H6', 'S', 'aktif', '11', 'PM', NULL),
(12, 'zzz', 'zzz1', '69696969', '$2y$10$O/4DE99YrEmUuc0RtOp9KevcNqJxGmJoB55oX7BDIiBPfZjpJ3CUm', 'S', 'aktif', '11', 'PPLG', '2024-10-17 18:59:53'),
(13, 'xxx', 'xxx', '3242432432', '$2y$10$2uJJ6bCVYMAahotkBuGOO.R.IXpQDQlyjMBv6O2rO9ZGSJbdaqRkW', 'S', 'aktif', '10', 'PPLG', '2024-10-17 19:02:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`,`Username`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID`,`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
