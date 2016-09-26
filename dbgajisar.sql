-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2014 at 11:00 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbgajisar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_gajipokok`
--

CREATE TABLE IF NOT EXISTS `tb_gajipokok` (
`id_gajipokok` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `jumlah_gajipokok` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_gajipokok`
--

INSERT INTO `tb_gajipokok` (`id_gajipokok`, `id_golongan`, `jumlah_gajipokok`) VALUES
(3, 10, 550000),
(4, 4, 600000),
(5, 5, 650000),
(6, 6, 700000),
(7, 7, 750000),
(8, 8, 800000),
(9, 9, 850000),
(13, 11, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE IF NOT EXISTS `tb_golongan` (
`id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(50) NOT NULL,
  `pangkat` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_golongan`, `nama_golongan`, `pangkat`) VALUES
(4, '1C', 'asdas'),
(5, '1D', 'zxczxc'),
(6, '2A', 'asdasd'),
(7, '2B', 'Budi'),
(8, '2C', 'asdasd'),
(9, '2D', 'asdasd'),
(10, '1B', 'asda'),
(11, '1A', 'asuu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE IF NOT EXISTS `tb_jabatan` (
`id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2, 'Staff'),
(3, 'Staff 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE IF NOT EXISTS `tb_karyawan` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `anak` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE IF NOT EXISTS `tb_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` char(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kehadiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendapatan`
--

CREATE TABLE IF NOT EXISTS `tb_pendapatan` (
`id_pendapatan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `gaji_bersih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tunjangankinerja`
--

CREATE TABLE IF NOT EXISTS `tb_tunjangankinerja` (
`id_tunj` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tunjangan` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_tunjangankinerja`
--

INSERT INTO `tb_tunjangankinerja` (`id_tunj`, `id_jabatan`, `tunjangan`) VALUES
(3, 3, 500000),
(4, 2, 250000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gaji_pokok`
--
CREATE TABLE IF NOT EXISTS `view_gaji_pokok` (
`id_gajipokok` int(11)
,`nama_golongan` varchar(50)
,`pangkat` varchar(50)
,`jumlah_gajipokok` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tunj_kin`
--
CREATE TABLE IF NOT EXISTS `view_tunj_kin` (
`id_tunj` int(11)
,`nama_jabatan` varchar(50)
,`tunjangan` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `view_gaji_pokok`
--
DROP TABLE IF EXISTS `view_gaji_pokok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gaji_pokok` AS select `tb_gajipokok`.`id_gajipokok` AS `id_gajipokok`,`tb_golongan`.`nama_golongan` AS `nama_golongan`,`tb_golongan`.`pangkat` AS `pangkat`,`tb_gajipokok`.`jumlah_gajipokok` AS `jumlah_gajipokok` from (`tb_golongan` join `tb_gajipokok`) where (`tb_golongan`.`id_golongan` = `tb_gajipokok`.`id_golongan`);

-- --------------------------------------------------------

--
-- Structure for view `view_tunj_kin`
--
DROP TABLE IF EXISTS `view_tunj_kin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tunj_kin` AS select `tb_tunjangankinerja`.`id_tunj` AS `id_tunj`,`tb_jabatan`.`nama_jabatan` AS `nama_jabatan`,`tb_tunjangankinerja`.`tunjangan` AS `tunjangan` from (`tb_jabatan` join `tb_tunjangankinerja`) where (`tb_tunjangankinerja`.`id_jabatan` = `tb_jabatan`.`id_jabatan`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gajipokok`
--
ALTER TABLE `tb_gajipokok`
 ADD PRIMARY KEY (`id_gajipokok`), ADD UNIQUE KEY `id_golongan_2` (`id_golongan`), ADD KEY `id_golongan` (`id_golongan`);

--
-- Indexes for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
 ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
 ADD PRIMARY KEY (`nip`), ADD KEY `id_golongan` (`id_golongan`), ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
 ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
 ADD PRIMARY KEY (`id_pendapatan`), ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_tunjangankinerja`
--
ALTER TABLE `tb_tunjangankinerja`
 ADD PRIMARY KEY (`id_tunj`), ADD UNIQUE KEY `id_jabatan_2` (`id_jabatan`), ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gajipokok`
--
ALTER TABLE `tb_gajipokok`
MODIFY `id_gajipokok` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tunjangankinerja`
--
ALTER TABLE `tb_tunjangankinerja`
MODIFY `id_tunj` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_gajipokok`
--
ALTER TABLE `tb_gajipokok`
ADD CONSTRAINT `tb_gajipokok_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `tb_golongan` (`id_golongan`);

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
ADD CONSTRAINT `tb_karyawan_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `tb_golongan` (`id_golongan`),
ADD CONSTRAINT `tb_karyawan_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`);

--
-- Constraints for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
ADD CONSTRAINT `tb_kehadiran_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_karyawan` (`nip`);

--
-- Constraints for table `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
ADD CONSTRAINT `tb_pendapatan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_karyawan` (`nip`);

--
-- Constraints for table `tb_tunjangankinerja`
--
ALTER TABLE `tb_tunjangankinerja`
ADD CONSTRAINT `tb_tunjangankinerja_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
