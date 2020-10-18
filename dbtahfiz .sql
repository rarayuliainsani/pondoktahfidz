-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 05:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtahfiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `idabsensi` int(11) NOT NULL,
  `idpertemuan` int(11) NOT NULL,
  `idsantri` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idabsensi`, `idpertemuan`, `idsantri`, `keterangan`) VALUES
(4, 5, 1, 'Sakit'),
(5, 4, 2, 'Hadir'),
(6, 4, 7, 'Alfa');

-- --------------------------------------------------------

--
-- Table structure for table `detail_spp`
--

CREATE TABLE `detail_spp` (
  `iddetail` int(11) NOT NULL,
  `idsantri` int(11) NOT NULL,
  `idspp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hafalan`
--

CREATE TABLE `hafalan` (
  `idhafalan` int(11) NOT NULL,
  `idsantri` int(11) NOT NULL,
  `idpengajar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `dari_ayat` int(11) NOT NULL,
  `dari_surat` int(11) NOT NULL,
  `sampai_ayat` int(11) NOT NULL,
  `sampai_surat` int(11) NOT NULL,
  `jml_hafalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hafalan`
--

INSERT INTO `hafalan` (`idhafalan`, `idsantri`, `idpengajar`, `tanggal`, `dari_ayat`, `dari_surat`, `sampai_ayat`, `sampai_surat`, `jml_hafalan`) VALUES
(2, 6, 1, '2020-09-06', 15, 8, 20, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `idkelompok` int(11) NOT NULL,
  `kdkelompok` varchar(5) NOT NULL,
  `namakelompok` varchar(25) NOT NULL,
  `kategori_kelompok` varchar(10) NOT NULL,
  `idpengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`idkelompok`, `kdkelompok`, `namakelompok`, `kategori_kelompok`, `idpengajar`) VALUES
(1, 'PI001', 'Muhabbatil Qur''an', 'tahfidz', 1),
(2, 'PA001', 'Hafidz Qur''an', 'Tahsin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelompoksantri`
--

CREATE TABLE `kelompoksantri` (
  `idkelompoksantri` int(11) NOT NULL,
  `idsantri` int(11) NOT NULL,
  `idkelompok` int(11) NOT NULL,
  `ketegori_kelompok` varchar(10) NOT NULL,
  `pengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompoksantri`
--

INSERT INTO `kelompoksantri` (`idkelompoksantri`, `idsantri`, `idkelompok`, `ketegori_kelompok`, `pengajar`) VALUES
(15, 6, 1, '', 0),
(16, 7, 2, '', 0),
(17, 6, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `idpendaftaran` int(11) NOT NULL,
  `nama_santri` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`idpendaftaran`, `nama_santri`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `nama_ayah`, `nama_ibu`, `asal_sekolah`, `kelas`, `alamat`, `nohp`, `tgl_daftar`) VALUES
(5, 'Rara Yulia Insani', 'Pariaman', '1999-01-07', 'Perempuan', 'Syafrizal', 'Aldeni Dewi Suryani', 'Politeknik Negeri Padang', 'Semester 6', 'Lubuk Begalung', '0813456789', '2020-09-08'),
(6, 'Ninda Gustiana', 'Bekasi', '1998-08-13', 'Perempuan', '--', '--', 'UIN Imam Bonjol', 'Semester 5', 'Ulakan Tapakis', '086527182893', '2020-09-08'),
(7, 'Randi', 'Padang', '2000-01-01', 'Laki-laki', 'Martin', 'Martini', 'SMKN 2 Padang', '12', 'Padang', '081234556778', '2020-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `idpengajar` int(12) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`idpengajar`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `nohp`, `foto`) VALUES
(1, 'U002', 'Ustadzah Nurul', 'Padang', '1990-08-04', 'Perempuan', 'Lubuk Begalung', '081324567899', 'IMG_20180801_222620.jpg'),
(2, 'U001', 'Ustadz Yandi', 'Padang', '1989-09-01', 'Laki-laki', 'Lubuk Begalung', '081234567', 'IMG-20180114-WA0000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `idpertemuan` int(11) NOT NULL,
  `pertemuanke` int(11) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`idpertemuan`, `pertemuanke`, `tempat`, `tanggal`) VALUES
(4, 1, 'Mesjid Raya Sumbar', '2020-08-29'),
(5, 2, 'Mesjid UIN', '2020-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `idsantri` int(11) NOT NULL,
  `kode_santri` varchar(10) NOT NULL,
  `nama_santri` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `jumlah_hafalan` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`idsantri`, `kode_santri`, `nama_santri`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `pendidikan`, `tahun_masuk`, `alamat`, `asal_sekolah`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `nohp`, `jumlah_hafalan`, `foto`, `username`, `password`) VALUES
(5, 'S001', 'Rara Yulia Insani', 'Pariamannnnn', '1999-01-07', 'Perempuan', 'D3', 2018, 'Lubuk Begalung', 'Politeknik Negeri Padang', 'Syafrizal', 'Sopir', 'Aldeni Dewi Suryani', 'Pedagang', '0813456789', '2 juz', '', 'S001', ''),
(6, 'S002', 'Ninda Gustiana', 'Bekasi', '1998-08-13', 'Perempuan', '', 0, 'Ulakan Tapakis', 'UIN Imam Bonjol', '--', '', '--', '', '086527182893', '', '', 'S002', ''),
(7, 'S003', 'Randi', 'Padang', '2000-01-01', 'Laki-laki', '', 0, 'Padang', 'SMKN 2 Padang', 'Martin', '', 'Martini', '', '081234556778', '', '', 'S003', '');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(11) NOT NULL,
  `bulan` varchar(25) NOT NULL,
  `idsantri` int(11) NOT NULL,
  `nominal` double(10,0) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `tunggakan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `bulan`, `idsantri`, `nominal`, `tgl_bayar`, `status`, `tunggakan`) VALUES
(5, 'Agustus', 3, 13000, '2020-08-19', 'Belum Lunas', 137000),
(11, 'September', 2, 150000, '2020-09-02', 'Lunas', 0),
(12, 'Februari', 2, 130000, '2020-09-08', 'Belum Lunas', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `idsurat` int(11) NOT NULL,
  `nama_surat` varchar(10) NOT NULL,
  `jumlah_ayat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`idsurat`, `nama_surat`, `jumlah_ayat`) VALUES
(2, 'Al-Fatihah', 7),
(3, 'Al-Baqarah', 286),
(4, 'Ali Imran', 200),
(5, 'An-Nisaa', 176),
(6, 'Al-Maidah', 120),
(7, 'Al-An''am', 165),
(8, 'Al-A''raf', 206),
(9, 'Al-Anfal', 75);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Rara Yulia Insani', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin'),
(6, 'Rara Yulia Insani', 'S001', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Santri'),
(7, 'Ninda Gustiana', 'S002', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Santri'),
(8, 'Ustadzah Nurul', 'U002', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pengajar'),
(9, 'Masyitah', 'bendahara', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bendahara'),
(11, 'Randi', 'S003', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Santri'),
(12, 'Ustadz Yandi', 'U001', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Pengajar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idabsensi`);

--
-- Indexes for table `detail_spp`
--
ALTER TABLE `detail_spp`
  ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `hafalan`
--
ALTER TABLE `hafalan`
  ADD PRIMARY KEY (`idhafalan`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`idkelompok`);

--
-- Indexes for table `kelompoksantri`
--
ALTER TABLE `kelompoksantri`
  ADD PRIMARY KEY (`idkelompoksantri`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`idpendaftaran`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`idpengajar`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`idpertemuan`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`idsantri`),
  ADD UNIQUE KEY `kode_santri` (`kode_santri`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`idsurat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idabsensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_spp`
--
ALTER TABLE `detail_spp`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hafalan`
--
ALTER TABLE `hafalan`
  MODIFY `idhafalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `idkelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelompoksantri`
--
ALTER TABLE `kelompoksantri`
  MODIFY `idkelompoksantri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `idpendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `idpengajar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `idpertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `idsantri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `idsurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
