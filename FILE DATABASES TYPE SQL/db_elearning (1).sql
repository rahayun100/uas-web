-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 10:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `NIP` varchar(20) NOT NULL,
  `Nama_Dosen` varchar(100) NOT NULL,
  `Jenis_Kelamin` varchar(10) NOT NULL,
  `Alamat` text NOT NULL,
  `Telpon` varchar(12) NOT NULL,
  `Pw` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`NIP`, `Nama_Dosen`, `Jenis_Kelamin`, `Alamat`, `Telpon`, `Pw`) VALUES
('00125', 'Andi', 'Laki-Laki', 'Mataram', '083445124321', '1'),
('0054', 'Hery', 'Laki-Laki', 'Mataram', '087653231', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `NIM` varchar(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `No_Telpon` varchar(12) NOT NULL,
  `Jurusan` varchar(100) NOT NULL,
  `Jenis_Kelamin` varchar(10) NOT NULL,
  `Pw` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`NIM`, `Nama`, `Alamat`, `No_Telpon`, `Jurusan`, `Jenis_Kelamin`, `Pw`) VALUES
('1810520059', 'Muhammad Ikbal Tamimi', 'Gondang, Kabupaten Lombok Utara', '083115709375', 'S1 ILMU KOMPUTER', 'Laki-Laki', '1'),
('1810520077', 'Ainun Fitri', 'Labuan Bajo', '08311523112', 'S1 ILMU KOMPUTER', 'Perempuan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `Id` int(11) NOT NULL,
  `Id_Matkul` int(11) NOT NULL,
  `NIM` varchar(20) NOT NULL,
  `Pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_materi`
--

INSERT INTO `tbl_materi` (`Id`, `Id_Matkul`, `NIM`, `Pertanyaan`) VALUES
(14, 1, '1810520077', 'barusaja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `Id_Matkul` int(11) NOT NULL,
  `Nama_Matkul` varchar(100) NOT NULL,
  `SKS` varchar(5) NOT NULL,
  `Ruang` varchar(50) NOT NULL,
  `NIP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`Id_Matkul`, `Nama_Matkul`, `SKS`, `Ruang`, `NIP`) VALUES
(1, 'Pemrograman Linear', '3', 'GB3', '00125');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelajaran`
--

CREATE TABLE `tbl_pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `Id_Matkul` int(11) NOT NULL,
  `NIM` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `mate_matku` (`Id_Matkul`),
  ADD KEY `mate_mhs` (`NIM`);

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`Id_Matkul`),
  ADD KEY `mat_dos` (`NIP`);

--
-- Indexes for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`),
  ADD KEY `pel_matkul` (`Id_Matkul`),
  ADD KEY `pel_mhs` (`NIM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD CONSTRAINT `mate_matku` FOREIGN KEY (`Id_Matkul`) REFERENCES `tbl_matkul` (`Id_Matkul`),
  ADD CONSTRAINT `mate_mhs` FOREIGN KEY (`NIM`) REFERENCES `tbl_mahasiswa` (`NIM`);

--
-- Constraints for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD CONSTRAINT `mat_dos` FOREIGN KEY (`NIP`) REFERENCES `tbl_dosen` (`NIP`);

--
-- Constraints for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  ADD CONSTRAINT `pel_matkul` FOREIGN KEY (`Id_Matkul`) REFERENCES `tbl_matkul` (`Id_Matkul`),
  ADD CONSTRAINT `pel_mhs` FOREIGN KEY (`NIM`) REFERENCES `tbl_mahasiswa` (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
