-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 04:23 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `id` int(3) NOT NULL,
  `kodelokasi` char(3) NOT NULL,
  `kodeunit` char(3) NOT NULL,
  `kodekelompok` char(3) NOT NULL,
  `idsub` int(3) NOT NULL,
  `idsubsub` int(3) NOT NULL,
  `nomorurut` char(5) NOT NULL,
  `nomorinventaris` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `status` enum('Baik','Rusak','','') NOT NULL,
  `pic` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`id`, `kodelokasi`, `kodeunit`, `kodekelompok`, `idsub`, `idsubsub`, `nomorurut`, `nomorinventaris`, `tipe`, `warna`, `status`, `pic`, `tanggal`) VALUES
(7, '11', '010', '12', 5, 5, '19', '11.010/12.01.01/19', 'Guuud', 'Hitam', 'Baik', 'Farindaaaa', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelompokbarang`
--

CREATE TABLE `tb_kelompokbarang` (
  `kode` char(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelompokbarang`
--

INSERT INTO `tb_kelompokbarang` (`kode`, `nama`, `tanggal`, `pic`) VALUES
('', 'Ndi', '2019-01-25', 'Adam'),
('12', 'Pecah Belah', '2019-01-17', 'Adama');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasibarang`
--

CREATE TABLE `tb_lokasibarang` (
  `kode` char(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasibarang`
--

INSERT INTO `tb_lokasibarang` (`kode`, `nama`, `tanggal`, `pic`) VALUES
('11', 'MNA', '2019-01-21', 'Adam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemeriksaan`
--

CREATE TABLE `tb_pemeriksaan` (
  `id` int(11) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `id_detail` int(3) NOT NULL,
  `pic` int(40) NOT NULL,
  `jumlahbarang` int(100) NOT NULL,
  `status` char(10) NOT NULL,
  `tanggalcek` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `nama`) VALUES
(5, 'Jancok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkelompok`
--

CREATE TABLE `tb_subkelompok` (
  `id` int(11) NOT NULL,
  `kode` char(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subkelompok`
--

INSERT INTO `tb_subkelompok` (`id`, `kode`, `nama`, `tanggal`, `pic`) VALUES
(5, '01', 'Tanah Persil Perumahan Kelas', '0000-00-00', 'Adam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subsubkelompok`
--

CREATE TABLE `tb_subsubkelompok` (
  `id` int(11) NOT NULL,
  `kode` char(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subsubkelompok`
--

INSERT INTO `tb_subsubkelompok` (`id`, `kode`, `nama`, `tanggal`, `pic`) VALUES
(5, '01', 'Jalan Aspal', '0000-00-00', 'Farindaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unitkerja`
--

CREATE TABLE `tb_unitkerja` (
  `kode` char(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unitkerja`
--

INSERT INTO `tb_unitkerja` (`kode`, `nama`, `tanggal`, `pic`) VALUES
('010', 'Kantor Pusat', '2019-01-17', 'Adam'),
('020', 'Gerbang Tol Waru', '2019-01-23', 'Adam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodelokasi` (`kodelokasi`),
  ADD KEY `kodeunit` (`kodeunit`),
  ADD KEY `kodekelompok` (`kodekelompok`),
  ADD KEY `idsub` (`idsub`),
  ADD KEY `idsubsub` (`idsubsub`);

--
-- Indexes for table `tb_kelompokbarang`
--
ALTER TABLE `tb_kelompokbarang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_lokasibarang`
--
ALTER TABLE `tb_lokasibarang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_detail` (`id_detail`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_subkelompok`
--
ALTER TABLE `tb_subkelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_subsubkelompok`
--
ALTER TABLE `tb_subsubkelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_unitkerja`
--
ALTER TABLE `tb_unitkerja`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_subkelompok`
--
ALTER TABLE `tb_subkelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_subsubkelompok`
--
ALTER TABLE `tb_subsubkelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD CONSTRAINT `tb_detail_ibfk_1` FOREIGN KEY (`kodelokasi`) REFERENCES `tb_lokasibarang` (`kode`),
  ADD CONSTRAINT `tb_detail_ibfk_2` FOREIGN KEY (`kodeunit`) REFERENCES `tb_unitkerja` (`kode`),
  ADD CONSTRAINT `tb_detail_ibfk_3` FOREIGN KEY (`kodekelompok`) REFERENCES `tb_kelompokbarang` (`kode`),
  ADD CONSTRAINT `tb_detail_ibfk_4` FOREIGN KEY (`idsub`) REFERENCES `tb_subkelompok` (`id`),
  ADD CONSTRAINT `tb_detail_ibfk_5` FOREIGN KEY (`idsubsub`) REFERENCES `tb_subsubkelompok` (`id`);

--
-- Constraints for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD CONSTRAINT `tb_pemeriksaan_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `tb_detail` (`id`),
  ADD CONSTRAINT `tb_pemeriksaan_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
