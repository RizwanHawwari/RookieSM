-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
  `Role` enum('A','S') NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`, `Role`, `name`, `email`, `phone`, `join_date`) VALUES
(2, 'admin', '$2y$10$2y/8t3aFaw2QoFFrz5QLx.hiFPMvDZsAvkFub14QGJgZogij0zl2W', 'A', 'John Doe', 'johndoe@gmail.com', '08951234567', '2024-10-20'),
(4, 'admin_baru', 'dea75af85f93d7819eab44a0065ce6cd5a5f0c4109bac0b9ff95d8da3cbac1b0', 'A', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link_pelajaran` varchar(255) DEFAULT NULL,
  `kategori` enum('PPLG','OTKP','PEMASARAN','DKV','TJKT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama_pelajaran`, `gambar`, `link_pelajaran`, `kategori`) VALUES
(1, 'HTML & CSS', 'img-logo/htmlcss-removebg-preview.png', 'learningHtml.php', 'PPLG'),
(2, 'JavaScript', 'img-logo/js.png', 'JavaScript.php', 'PPLG'),
(3, 'PHP', 'img-logo/pehape-removebg-preview.png', 'learningPhp.php', 'PPLG'),
(4, 'Akutansi', 'img-logo/akutansi-removebg-preview.png', 'learningAkuntansi.php', 'OTKP'),
(5, 'Online Bisnis', 'img-logo/online.png', 'learningOnlineBisnis.php', 'PEMASARAN'),
(6, 'Videografi', 'img-logo/videografi.png', 'learningVideografi.php', 'DKV'),
(7, 'Arduino', 'img-logo/arduino-removebg-preview.png', 'arduino.php', 'TJKT'),
(8, 'Jaringan Komputer', 'img-logo/jaringankom-removebg-preview.png', 'learningJaringanKomputer.php', 'TJKT'),
(9, 'Server Administrator', 'img-logo/server-removebg-preview.png', 'learningServerAdministrator.php', 'TJKT');

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
(5, 'Travis Scott', 'trav567', '', '$2y$10$Hl0DMTybvpgSFEyTLNbcIe4/60dDtkIoMTLymx5rs91q7i1XnbmiO', 'S', 'aktif', '10', 'PPLG', '2024-10-31 13:22:48'),
(13, 'mas ardi', 'siswa1', 'NIS12345', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'S', 'aktif', '10', 'RPL', NULL),
(14, 'Rizwan Hawwari', 'raxxs', '56789123', '$2y$10$hOUPRO/.8fYesJB1JCt8gOKIlDUqSSM4Bvt/Xa6sop5PqJ8ETcvrq', 'S', 'aktif', '11', 'PPLG', NULL),
(15, 'Gunawan Hakim', 'gnwn67', '567891233', '$2y$10$n3yUsAuaPzSJ5oTXRH.wp.vFQoX7UB4Oql2POmGbdiZjAOFnuHlu6', 'S', 'aktif', '10', 'PPLG', NULL),
(16, 'Arif Erlangga', 'rifff', '45612789', '$2y$10$J5QXZAfk3J4WKEur3oWYHeuZPl5E41Pev.UUnXfLoEtARUaKqURn.', 'S', 'aktif', '11', 'TJKT', NULL),
(17, 'Kiara Elvia', 'kiaraaa', '567812990', '$2y$10$.fVdvmXh8Vd/T914nTsZkelsOpks0eIwEaW.Mz8PnXm1BxXA0ZUjC', 'S', 'aktif', '12', 'OTKP', NULL),
(18, 'Fatimah Hasan', 'flowertim', '7894456', '$2y$10$pK8pEE84ppPu4DDKrmPLO.dy7YU1wm38F33emyFIU87ZFrUFmMx/O', 'S', 'aktif', '10', 'PM', NULL),
(19, 'zzz', 'zzz', '12321312321', '$2y$10$FTVID9BGCK7HvXbVJcKcMek2JPPRSK107y670FquEmc7gyS7ZgVVe', 'S', 'aktif', '11', 'DKV', '2024-11-18 17:44:47');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
