-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 03:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
(2, 'Islam'),
(3, 'Kristen'),
(4, 'Budha'),
(5, 'Katholik'),
(6, 'Kong Hu Chu'),
(7, 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `id_kelas`, `id_agama`, `jenis_kelamin`, `hp`, `alamat`, `ket`, `foto`) VALUES
('17284', 'Zanira Sungkar', 54, 2, 'P', '0842356568', 'Jl. Selat Karimata No. 26 Seturi Pekalongan', 'test lagi', ''),
('17318', 'Theodore Fanuel Mulyono', 52, 3, 'L', '081325456', 'Perum Gama Asri Jl. Batik Rengganis No. 8 Pekalongan', '', '200804082513.png'),
('17542', 'Kenni Roberto Kristianto', 24, 3, 'L', '082248828161', 'Jl. Sugihwaras Gg.3 No.1', '', ''),
('17679', 'Galuh Yuanita Maira', 23, 2, 'P', '0858686760537', 'Jl. Sumatra Timur Pekalongan', '', ''),
('17716', 'Irzam Edi Saputro', 23, 2, 'L', '085879888587', 'Yosorejo', '', ''),
('17740', 'Bayu Bimo Seno', 27, 2, 'L', '08512234568', 'Jl. Teratai No 14 A Klego Pekalongan', '', '200811015728.jpg'),
('17751', 'Luna', 22, 2, 'P', '085869160422', 'Perum Limas No 1', '', ''),
('17784', 'Jannati Zumaroh', 46, 2, 'P', '082323455048', 'Buaran Gg. 4 RT. 03 RW. 04', '', '200812052747.png'),
('17856', 'Fatimah Az-zahra', 9, 2, 'P', '082135186131', 'Jl. Truntum Klego Bumi Mas Pekalongan', '', '200810084818.jpg'),
('17899', 'Muhammad Faishal Caesario Adi Syabana', 10, 2, 'L', '081542389617', 'Jl. Anggrek III A/5 Perum Graha Tirto Asri\r\n', '', ''),
('17942', 'Rajendra Farras Rayhan', 11, 2, 'L', '081391922292', 'Jl. Merpati No. 7 Perum Binagriya\r\n', '', ''),
('17972', 'Natali Angelica', 12, 2, 'P', '081215224349', 'Jl. Teratai Gg. 5 No. 34 B\r\n', '', ''),
('17992', 'Carina Rizkiana', 13, 2, 'P', '085875929962', 'Jln. Ki Hajar Dewantoro No. 11 Doro\r\n', '', ''),
('18047', 'Sulthan Adib Firmansyah', 14, 2, 'L', '085842575121', 'Jl. Terate Gg. 2 / 70 Pekalongan Timur', '', ''),
('18067', 'Haefa Septiani', 15, 2, 'P', '085600738811', 'Wonoyoso Gg. 5 No. 22', '', ''),
('18095', 'Dafa Tiara', 18, 2, 'P', '08176565652', 'Sugihwaras', '', ''),
('18135', 'Elga Agung Kurniawan', 19, 2, 'L', '081345476', 'Landung Sari', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `id_penerbit` int(3) NOT NULL,
  `id_pengarang` int(3) NOT NULL,
  `no_rak` int(2) NOT NULL,
  `thn_terbit` year(4) NOT NULL,
  `stok` int(3) NOT NULL,
  `ket` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `ISBN`, `judul`, `id_kategori`, `id_penerbit`, `id_pengarang`, `no_rak`, `thn_terbit`, `stok`, `ket`, `gambar`) VALUES
(11111, '9-786-020-606-071', 'Si Boneka Hidup Beraksi', 14, 5, 1, 12, 2018, 4, '', '200812054535.jpg'),
(22222, '9786020623399', 'Komet Minor', 14, 5, 2, 12, 2019, 10, '+ 376 hlm - ilus. - 20 / 13,5 cm', '200810085943.jpg'),
(33333, '978-623-206-431-7', 'Pesantren Itu Keren', 4, 6, 4, 2, 2020, 9, '+ 32 hlm - ilus. - 25 / 14 cm', ''),
(44444, '978-979-518-315-2', 'Psikologi Kerja', 15, 7, 5, 13, 2014, 7, '128 Hlm, 14 x 21 cm', ''),
(2147483647, '77777777', 'test', 6, 5, 2, 13, 2006, 32, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(6) NOT NULL,
  `denda` int(6) NOT NULL,
  `status` enum('A','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `denda`, `status`) VALUES
(1, 2500, 'N'),
(5, 3000, 'N'),
(6, 1000, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_buku`
--

CREATE TABLE `tb_detail_buku` (
  `id_detail_buku` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_buku`
--

INSERT INTO `tb_detail_buku` (`id_detail_buku`, `id_buku`, `no_buku`, `status`) VALUES
(1, 11111, 1, '1'),
(2, 11111, 2, '0'),
(3, 11111, 3, '1'),
(9, 22222, 1, '1'),
(10, 22222, 2, '1'),
(11, 22222, 3, '0'),
(12, 22222, 4, '1'),
(13, 22222, 5, '1'),
(14, 22222, 6, '1'),
(15, 22222, 7, '1'),
(16, 22222, 8, '1'),
(17, 33333, 1, '1'),
(18, 33333, 2, '0'),
(19, 33333, 3, '1'),
(20, 33333, 4, '1'),
(21, 33333, 5, '1'),
(22, 33333, 6, '1'),
(23, 44444, 1, '1'),
(24, 44444, 2, '1'),
(25, 44444, 3, '1'),
(26, 44444, 4, '1'),
(27, 2147483647, 1, '1'),
(28, 2147483647, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pinjam`
--

CREATE TABLE `tb_detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `flag` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pinjam`
--

INSERT INTO `tb_detail_pinjam` (`id_detail_pinjam`, `id_pinjam`, `id_buku`, `no_buku`, `flag`) VALUES
(2, 2, 22222, 1, 1),
(3, 3, 22222, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ebook`
--

CREATE TABLE `tb_ebook` (
  `id_ebook` int(11) NOT NULL,
  `nama_ebook` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ebook`
--

INSERT INTO `tb_ebook` (`id_ebook`, `nama_ebook`, `id_kelas`, `id_mapel`, `file`) VALUES
(1, 'Soal dan Pembahasan Fisika', 4, 1, ''),
(2, 'Pantun', 6, 2, ''),
(6, 'Sistem Reproduksi Manusia', 29, 10, '6.pdf'),
(7, 'Biologi Kelas XI', 29, 10, '200811031450.pdf'),
(8, 'Pendidikan Kewarganegaraan Kelas 12', 60, 17, '200811032120.pdf'),
(10, 'Sejarah Kelas 12', 55, 14, 'Sejarah_Kelas_122.pdf'),
(11, 'Matematika Kelas X', 58, 2, 'Matematika_Kelas_X.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(4, 'Agama'),
(5, 'Ilmu Sosial, Sosiologi dan Antropologi'),
(6, 'Statistik'),
(7, 'Ilmu Politik'),
(8, 'Ekonomi'),
(9, 'Matematika'),
(10, 'Sains'),
(11, 'Arsitektur'),
(12, 'Teknologi'),
(13, 'Bahasa'),
(14, 'Literatur, Sastra, Retorika dan Kritik'),
(15, 'Psikologi'),
(16, 'Musik'),
(17, 'Olahraga, Permainan dan Hiburan'),
(18, 'Kesenian dan rekreasi'),
(19, 'Kesehatan dan Obat-Obatan'),
(20, 'Pendidikan'),
(21, 'Fisika'),
(22, 'Sejarah'),
(23, 'Fiksi Ilmiah'),
(24, 'Biologi'),
(25, 'Fisika');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(9, 'X MIPA 1'),
(10, 'X MIPA 2'),
(11, 'X MIPA 3'),
(12, 'X MIPA 4'),
(13, 'X MIPA 5'),
(14, 'X MIPA 6'),
(15, 'X MIPA 7'),
(16, 'X MIPA'),
(17, 'X IPS'),
(18, 'X IPS 1'),
(19, 'X IPS 2'),
(22, 'XI MIPA 1'),
(23, 'XI MIPA 2'),
(24, 'XI MIPA 3'),
(25, 'XI MIPA 4'),
(26, 'XI MIPA 5'),
(27, 'XI MIPA 6'),
(28, 'XI MIPA 7'),
(29, 'XI MIPA'),
(44, 'XI IPS'),
(45, 'XI IPS 1'),
(46, 'XI IPS 2'),
(47, 'XII MIPA'),
(48, 'XII MIPA 1'),
(49, 'XII MIPA 2'),
(50, 'XII MIPA 3'),
(51, 'XII MIPA 4'),
(52, 'XII MIPA 5'),
(53, 'XII MIPA 6'),
(54, 'XII MIPA 7'),
(55, 'XII IPS'),
(56, 'XII IPS 1'),
(57, 'XII IPS 2'),
(58, 'X'),
(59, 'XI'),
(60, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `terlambat` int(2) NOT NULL,
  `id_denda` int(6) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_pinjam`, `tgl_dikembalikan`, `terlambat`, `id_denda`, `denda`) VALUES
(1, 1, '2020-08-18', 3, 6, 3000),
(2, 2, '2020-08-13', 0, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(75) NOT NULL,
  `stts` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `stts`) VALUES
('14111063', '7f4fbc6a1e8e31fed102ec0cfc5b42fa', 'petugas'),
('14111064', '1463ccd2104eeb36769180b8a0c86bb6', 'petugas'),
('14111101', '6401efc407f5da9cb5efe0a2ee10cb82', 'petugas'),
('221122', '827ccb0eea8a706c4c34a16891f84e7b', 'petugas'),
('232323', 'd16d377af76c99d27093abc22244b342', 'petugas'),
('3333333', 'f4ae294a56d57e0b78e57b5594d272a5', 'petugas'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika'),
(6, 'Pendidikan Agama Islam'),
(9, 'Fisika'),
(10, 'Biologi'),
(11, 'Ekonomi'),
(13, 'Kimia'),
(14, 'Sejarah'),
(15, 'Geografi'),
(16, 'Ekonomi'),
(17, 'Pendidikan Kewarganegaraan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(3) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `id_provinsi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`, `id_provinsi`) VALUES
(1, 'Andi Publisher', 2),
(4, 'Gagas Media', 7),
(5, 'Gramedia Pustaka Utama', 7),
(6, 'Tiga Ananda', 8),
(7, 'PT. Rineka Cipta', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id_pengarang` int(3) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'RL Stine'),
(2, 'Tere Liye'),
(3, 'Graha Mulia'),
(4, 'Yazidah Nur Rahmah'),
(5, 'Panji Anoraga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `img`, `jenis_kelamin`, `alamat`, `password`, `id_agama`, `hp`, `ket`) VALUES
('14111063', 'Kendall Jenner', 'RYOZHKQ9LNAD0J37X8VF6T4BIGWUM2E15SCP.jpg', 'P', 'Harnowo', 'jenner', 2, '089526585356', ''),
('14111064', 'Lionel Messi', 'UCGDONLYAT5PM32679VQIXWHFSEK14J0B8ZR.jpg', 'L', 'Barcelona', 'messi', 5, '085382005325', 'GOAT'),
('14111101', 'Brad Pitt', 'H1EFNO2GZPAWU4DIKRS09L8MBCYQ7XTV5J63.jpg', 'L', 'Comal', 'pitt', 3, '085487645665', 'bosen jadi orang ganteng hmm'),
('221122', 'Kagami', 'EFPB0T1V2R34ZOXGQY65MULAJHIDW78KN9CS.jpg', 'L', 'sasasas', '12345', 3, '082321321', ''),
('232323', 'Michael Jordan', 'EUDF4JRA15XHSWL6KP37IYCV8TNOZ2M9GB0Q.jpg', 'L', 'jogja', 'jordan', 2, '053xxxx', ''),
('3333333', 'John Lennon', 'NT9YGF8JP76RMUA1QLWVD30B4OXEZ2HCS5IK.jpg', 'L', 'Liverpool', 'lennon', 6, '081666666666', ''),
('admin', 'Rastra Dimas', 'FAZ0JP1GYLVE4KUSWTH3O6N2QX985RIM7DBC.jpg', 'L', 'Jalan menuju kebahagiaan', 'admin', 2, '0812326565', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_buku` int(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `tgl_kembali`, `total_buku`, `status`) VALUES
(1, '2020-08-12', '17318', '2020-08-15', 1, 1),
(2, '2020-08-12', '17284', '2020-08-13', 1, 1),
(3, '2020-08-12', '17740', '2020-08-13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(2) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`, `kota`) VALUES
(1, 'Sumatera Selatan', 'Palembang'),
(2, 'D.I.Y Yogyakarta', 'Yogya'),
(4, 'Jambi', 'Jambi Kota'),
(6, 'Pekanbaru', 'Riau'),
(7, 'DKI Jakarta', 'Jakarta'),
(8, 'Jawa Tengah', 'Semarang'),
(9, 'Jawa Timur', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `no_rak` int(2) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `id_kategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`no_rak`, `nama_rak`, `id_kategori`) VALUES
(2, '200 - Agama', 4),
(3, '300 – Ilmu sosial, sosiologi dan antropologi', 5),
(4, '310 - Statistik', 6),
(5, '320 – Ilmu politik', 7),
(6, '330 – Ekonomi', 8),
(7, '510 – Matematika', 9),
(8, '500 – Sains', 10),
(9, '720 – Arsitektur', 11),
(10, '600 – Teknologi', 12),
(11, '400 – Bahasa', 13),
(12, '800 - Literatur, Sastra, Retorika dan Kritik', 14),
(13, '150 – Psikologi', 15),
(14, '780 – Musik', 16),
(15, '700 - Olahraga, Permainan dan Hiburan', 17),
(16, '700 - Kesenian dan rekreasi', 18),
(17, '610 – Kesehatan dan Obat-Obatan', 19),
(18, '370 – Pendidikan', 20),
(19, '900 – Sejarah', 22),
(20, '530 – Fisika', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_pengarang` (`id_pengarang`),
  ADD KEY `no_rak` (`no_rak`),
  ADD KEY `id_buku` (`id_buku`,`ISBN`,`judul`,`id_kategori`,`id_penerbit`,`id_pengarang`,`no_rak`,`thn_terbit`,`stok`);

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD KEY `id_detail_buku` (`id_detail_buku`,`id_buku`,`no_buku`,`status`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_anggota` (`id_pinjam`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`,`id_pinjam`,`id_buku`,`no_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tb_ebook`
--
ALTER TABLE `tb_ebook`
  ADD PRIMARY KEY (`id_ebook`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_detail` (`id_pinjam`),
  ADD KEY `id_kembali` (`id_kembali`,`id_pinjam`,`tgl_dikembalikan`,`terlambat`,`id_denda`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`,`password`,`stts`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`),
  ADD KEY `id_penerbit` (`id_penerbit`,`nama_penerbit`,`id_provinsi`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_detail` (`tgl_kembali`),
  ADD KEY `id_buku` (`id_anggota`),
  ADD KEY `id_pinjam` (`id_pinjam`,`tgl_pinjam`,`id_anggota`,`tgl_kembali`,`total_buku`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`no_rak`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  MODIFY `id_detail_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_ebook`
--
ALTER TABLE `tb_ebook`
  MODIFY `id_ebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id_pengarang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_provinsi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `no_rak` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `tb_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_3` FOREIGN KEY (`id_pengarang`) REFERENCES `tb_pengarang` (`id_pengarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_buku_ibfk_4` FOREIGN KEY (`no_rak`) REFERENCES `tb_rak` (`no_rak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD CONSTRAINT `tb_detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD CONSTRAINT `tb_kembali_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD CONSTRAINT `tb_penerbit_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tb_provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD CONSTRAINT `tb_rak_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
