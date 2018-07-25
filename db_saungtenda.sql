-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 08:48 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saungtenda`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_lain`
--

CREATE TABLE `tbl_biaya_lain` (
  `id_biaya_lain` int(11) NOT NULL,
  `nama_biaya_lain` varchar(50) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biaya_lain`
--

INSERT INTO `tbl_biaya_lain` (`id_biaya_lain`, `nama_biaya_lain`, `kuantitas`, `harga`, `tanggal`) VALUES
(1, 'Magic Jars', 3, 25000, '2017-04-16'),
(3, 'Banner', 1, 25000, '2017-04-20'),
(4, 'Kompor', 1, 200000, '2017-04-21'),
(5, 'Termos', 1, 50000, '2017-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_menu`
--

CREATE TABLE `tbl_category_menu` (
  `id_category` varchar(7) NOT NULL,
  `category_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category_menu`
--

INSERT INTO `tbl_category_menu` (`id_category`, `category_menu`) VALUES
('CA-0001', 'Makanan'),
('CA-0002', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftar_biaya`
--

CREATE TABLE `tbl_daftar_biaya` (
  `id_biaya` varchar(8) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `golongan_biaya` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daftar_biaya`
--

INSERT INTO `tbl_daftar_biaya` (`id_biaya`, `nama_biaya`, `satuan`, `golongan_biaya`) VALUES
('BBB-0001', 'Ayam', 'Potong', 'Biaya Bahan Baku'),
('BBB-0002', 'Ikan', 'Ekor', 'Biaya Bahan Baku'),
('BBB-0003', 'Tempe', 'Batang', 'Biaya Bahan Baku'),
('BBB-0004', 'Tahu', 'Potong', 'Biaya Bahan Baku'),
('BBB-0005', 'Jagung', 'KG', 'Biaya Bahan Baku'),
('BBB-0006', 'Beras', 'Liter', 'Biaya Bahan Baku'),
('BBB-0007', 'Teh Celup', 'Kotak', 'Biaya Bahan Baku'),
('BBB-0008', 'Jeruk', 'KG', 'Biaya Bahan Baku'),
('BBP-0001', 'Minyak Goreng', 'KG', 'Biaya Bahan Penolong'),
('BBP-0002', 'Saos', 'Botol', 'Biaya Bahan Penolong'),
('BBP-0004', 'Cabe Rawit', 'KG', 'Biaya Bahan Penolong'),
('BBP-0005', 'Cabe Merah', 'KG', 'Biaya Bahan Penolong'),
('BBP-0006', 'Tomat', 'KG', 'Biaya Bahan Penolong'),
('BBP-0007', 'Mentimun', 'KG', 'Biaya Bahan Penolong'),
('BBP-0008', 'Kemangi', 'Ikat', 'Biaya Bahan Penolong'),
('BBP-0009', 'Kecap', 'Pouch', 'Biaya Bahan Penolong'),
('BBP-0010', 'Lada', 'Renceng', 'Biaya Bahan Penolong'),
('BBP-0011', 'Kunyit', 'KG', 'Biaya Bahan Penolong'),
('BBP-0012', 'Bawang Putih', 'Ons', 'Biaya Bahan Penolong'),
('BBP-0013', 'Bawang Merah', 'Ons', 'Biaya Bahan Penolong'),
('BBP-0014', 'Kemiri', 'Ons', 'Biaya Bahan Penolong'),
('BBP-0015', 'Mentega', 'Ons', 'Biaya Bahan Penolong'),
('BBP-0016', 'Garam', 'Pack', 'Biaya Bahan Penolong'),
('BBP-0017', 'Penyedap Rasa', 'Bungkus', 'Biaya Bahan Penolong'),
('BBP-0018', 'Cuka', 'Botol', 'Biaya Bahan Penolong'),
('BBP-0019', 'Gula', 'KG', 'Biaya Bahan Penolong'),
('BBP-0020', 'Es', 'Termos', 'Biaya Bahan Penolong'),
('BBP-0021', 'Air', 'Galon', 'Biaya Bahan Penolong'),
('BBP-0022', 'Arang', 'Bungkus', 'Biaya Bahan Penolong'),
('BOL-0001', 'Listrik', 'Bulan', 'Biaya Overhead Pabrik Lain'),
('BOL-0002', 'Gas', 'Tabung 3 K', 'Biaya Overhead Pabrik Lain'),
('REP-0001', 'Conblock', '-', 'Biaya Reparasi dan Pemeliharaan'),
('REP-0003', 'Perbaikan Kompor', '-', 'Biaya Reparasi dan Pemeliharaan'),
('TEN-0001', 'Antar Ikan', '-', 'Biaya Tenaga Kerja Tak Langsung'),
('TEN-0002', 'Antar Ayam', '-', 'Biaya Tenaga Kerja Tak Langsung'),
('TEN-0003', 'Petikin Cabe', '-', 'Biaya Tenaga Kerja Tak Langsung'),
('TKL-0001', 'Kasir', 'Orang', 'Biaya Tenaga Kerja Langsung'),
('TKL-0002', 'Pelayan', 'Orang', 'Biaya Tenaga Kerja Langsung'),
('TKL-0003', 'Koki', 'Orang', 'Biaya Tenaga Kerja Langsung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` varchar(8) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `id_category` varchar(8) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `id_category`, `harga`, `foto`) VALUES
('MEN-0001', 'Ayam Bakar', 'CA-0001', 14000, 'd5bd8e3f916fbc5993a34d5501e2a43e.jpg'),
('MEN-0002', 'Ikan Bakar', 'CA-0001', 16000, 'fdb45d17cd52039eee608deb59ee852d.jpg'),
('MEN-0003', 'Nasi', 'CA-0001', 4000, '49d798bc7c02e0683beff13f862baa19.jpg'),
('MEN-0005', 'Es Teh Manis', 'CA-0002', 3000, '5acd3e5a4ac6967d351357cd258d33bd.png'),
('MEN-0007', 'Teh Hangat', 'CA-0002', 1000, 'a6238d155bb054ae273f10f4a42c5580.jpg'),
('MEN-0008', 'Es Jeruk', 'CA-0002', 5000, 'ade976785e33403f9f3bbd8242fc74d6.jpg'),
('MEN-0009', 'Tahu', 'CA-0001', 1000, 'f59fe6c598f086c905c72929aae03148.jpg'),
('MEN-0010', 'Tempe', 'CA-0001', 1000, '6cfacb33ca9592736614ed1c404266d2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modal`
--

CREATE TABLE `tbl_modal` (
  `id_modal` int(11) NOT NULL,
  `id_biaya` varchar(8) NOT NULL,
  `kuantitas` float NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modal`
--

INSERT INTO `tbl_modal` (`id_modal`, `id_biaya`, `kuantitas`, `harga`, `jumlah`, `tanggal`) VALUES
(1, 'BBB-0006', 7, 8000, 56000, '2017-02-21'),
(2, 'TKL-0002', 1, 20000, 20000, '2017-02-21'),
(3, 'TKL-0001', 1, 25000, 25000, '2017-02-21'),
(4, 'BBB-0001', 40, 6250, 250000, '2017-02-21'),
(5, 'BBP-0013', 1, 3000, 3000, '2017-02-21'),
(6, 'BBP-0012', 1, 3000, 3000, '2017-02-21'),
(7, 'BBP-0004', 0.5, 50000, 25000, '2017-02-21'),
(8, 'BBP-0005', 0.5, 40000, 20000, '2017-02-21'),
(9, 'BBP-0018', 2, 1000, 2000, '2017-02-21'),
(10, 'BBP-0016', 1, 3000, 3000, '2017-02-21'),
(11, 'BBP-0009', 1, 24000, 24000, '2017-02-21'),
(12, 'BBP-0008', 1, 5000, 5000, '2017-02-21'),
(13, 'BBP-0014', 1, 2000, 2000, '2017-02-21'),
(14, 'BBP-0011', 1, 2000, 2000, '2017-02-21'),
(15, 'BBP-0010', 1, 10000, 10000, '2017-02-21'),
(16, 'BBP-0015', 1, 3000, 3000, '2017-02-21'),
(17, 'BBP-0007', 2, 5000, 10000, '2017-02-21'),
(18, 'BBP-0001', 1, 13000, 13000, '2017-02-21'),
(19, 'BBP-0017', 1, 5000, 5000, '2017-02-21'),
(20, 'BBP-0006', 0.5, 3000, 1500, '2017-02-21'),
(21, 'BBP-0003', 1, 25000, 25000, '2017-02-21'),
(22, 'BBP-0019', 1, 13000, 13000, '2017-02-21'),
(23, 'BBP-0021', 1, 4000, 4000, '2017-02-21'),
(24, 'BBP-0020', 1, 10000, 10000, '2017-02-21'),
(25, 'BBB-0007', 1, 5500, 5500, '2017-02-21'),
(26, 'BBB-0001', 90, 6250, 562500, '2017-03-01'),
(27, 'BBB-0001', 10, 6250, 62500, '2017-03-16'),
(28, 'BBB-0002', 12, 6250, 75000, '2017-03-19'),
(29, 'BBB-0001', 1, 6250, 6250, '2017-03-21'),
(30, 'BBB-0001', 10, 6250, 62500, '2017-04-16'),
(31, 'BBB-0001', 10, 6250, 62500, '2017-04-17'),
(32, 'BBB-0001', 10, 6250, 62500, '2017-04-20'),
(33, 'BBB-0002', 120, 6250, 750000, '2017-04-20'),
(34, 'BBB-0003', 0, 0, 0, '2017-04-20'),
(35, 'BBB-0006', 10, 8500, 85000, '2017-04-20'),
(36, 'TEN-0001', 1, 10000, 10000, '2017-04-20'),
(37, 'BOL-0001', 1, 25000, 25000, '2017-04-20'),
(38, 'TKL-0001', 1, 25000, 25000, '2017-04-20'),
(39, 'BBP-0010', 10, 1000, 10000, '2017-04-20'),
(40, 'REP-0003', 1, 2000, 2000, '2017-04-20'),
(41, 'BOL-0002', 1, 25000, 25000, '2017-04-20'),
(42, 'BBB-0001', 10, 6250, 62500, '2017-04-21'),
(43, 'BBB-0002', 10, 6250, 62500, '2017-04-21'),
(44, 'BBB-0001', 40, 6250, 250000, '2017-04-22'),
(45, 'BBB-0002', 60, 6250, 375000, '2017-04-22'),
(46, 'BBB-0001', 10, 6250, 62500, '2017-04-25'),
(47, 'BBB-0001', 15, 6250, 93750, '2017-04-26'),
(48, 'BBB-0006', 1.5, 8000, 12000, '2017-04-26'),
(49, 'BBB-0002', 10, 6250, 62500, '2017-04-26'),
(50, 'BBB-0001', 10, 6250, 62500, '2017-04-29'),
(51, 'BBB-0001', 10, 6250, 62500, '2017-04-30'),
(52, 'BBB-0001', 40, 6250, 250000, '2017-05-02'),
(53, 'BBP-0012', 1, 5000, 5000, '2017-05-22'),
(54, 'BBP-0002', 3, 2000, 6000, '2017-05-22'),
(55, 'BBB-0001', 40, 6250, 250000, '2017-06-13'),
(56, 'BBB-0002', 40, 6250, 250000, '2017-06-13'),
(57, 'BBP-0021', 1, 4000, 4000, '2017-06-13'),
(58, 'BBP-0013', 2, 3000, 6000, '2017-06-13'),
(59, 'BBP-0012', 2, 3000, 6000, '2017-06-13'),
(60, 'BBB-0006', 12, 8000, 96000, '2017-06-13'),
(61, 'BBP-0005', 1, 20000, 20000, '2017-06-13'),
(62, 'BBP-0004', 1, 25000, 25000, '2017-06-13'),
(63, 'BBP-0018', 3, 1000, 3000, '2017-06-13'),
(64, 'BBP-0020', 1, 10000, 10000, '2017-06-13'),
(65, 'BBP-0016', 1, 3000, 3000, '2017-06-13'),
(66, 'BBP-0019', 2, 13000, 26000, '2017-06-13'),
(67, 'BBP-0009', 1, 24000, 24000, '2017-06-13'),
(68, 'BBP-0008', 1, 5000, 5000, '2017-06-13'),
(69, 'BBP-0011', 1, 2000, 2000, '2017-06-13'),
(70, 'BBP-0010', 1, 10000, 10000, '2017-06-13'),
(71, 'BBP-0015', 1, 3000, 3000, '2017-06-13'),
(72, 'BBP-0007', 2, 5000, 10000, '2017-06-13'),
(73, 'BBP-0001', 2, 13000, 26000, '2017-06-13'),
(74, 'BBP-0017', 1, 5000, 5000, '2017-06-13'),
(75, 'BBP-0006', 1, 3000, 3000, '2017-06-13'),
(76, 'BBB-0007', 1, 5500, 5500, '2017-06-13'),
(77, 'BBP-0002', 2, 10000, 20000, '2017-06-13'),
(78, 'TKL-0001', 1, 25000, 25000, '2017-06-13'),
(79, 'TKL-0002', 1, 30000, 30000, '2017-06-13'),
(80, 'BBP-0022', 2, 7500, 15000, '2017-06-13'),
(81, 'BOL-0001', 1, 20000, 20000, '2017-06-13'),
(82, 'BOL-0002', 2, 22000, 44000, '2017-06-13'),
(83, 'BBB-0008', 2, 10000, 20000, '2017-06-14'),
(84, 'BBP-0020', 1, 10000, 10000, '2017-06-14'),
(85, 'BBP-0019', 1, 12000, 12000, '2017-06-14'),
(86, 'BBB-0001', 12, 6250, 75000, '2017-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` varchar(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `jk`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jabatan`, `no_hp`, `foto`) VALUES
('KAS-0001', '1341177004064', 'Eryan Fauzans', 'Laki-laki', 'Rengasdengklok', 'Bekasi', '1995-07-10', 'Kasir', '0857-7273-1434', 'e390faebee6d888fe73d06a80ccc0394.jpg'),
('KKI-0001', '235454545', 'Irfan Fahreza', 'Laki-laki', 'Karawang', 'Jakarta', '1996-11-22', 'Koki', '7858-6758-7685', '0114cf6d589fe31687b54e92a34d3f25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `no_meja` varchar(25) NOT NULL,
  `antrian` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`id_pembeli`, `no_meja`, `antrian`, `tanggal`, `bayar`, `status`, `keterangan`) VALUES
(1, '1', 3, '2017-04-21', 75000, 'paid', '12'),
(2, '2', 4, '2017-04-21', 200000, 'paid', 'asdf'),
(3, 'Bungkus', 5, '2017-04-21', 3100000, 'paid', 'UNSIKA'),
(4, '1', 6, '2017-04-21', 250000, 'paid', ''),
(5, '3', 1, '2017-04-23', 0, 'unpaid', ''),
(6, '1', 1, '2017-04-24', 0, 'unpaid', 'lol'),
(7, '2', 2, '2017-04-24', 0, 'unpaid', 'asdf'),
(8, '2', 3, '2017-04-24', 0, 'unpaid', 'sfsdf'),
(9, '4', 4, '2017-04-24', 0, 'unpaid', ''),
(10, '1', 1, '2017-04-25', 80000, 'paid', ''),
(11, '2', 2, '2017-04-25', 20000, 'paid', ''),
(12, '4', 3, '2017-04-25', 18000, 'paid', 'a'),
(13, '1', 4, '2017-04-25', 10000, 'paid', 'asd'),
(14, '2', 5, '2017-04-25', 50000, 'paid', 'BRI'),
(15, '3', 1, '2017-04-26', 75000, 'paid', 'Kelas A 2013'),
(16, 'Bungkus', 2, '2017-02-27', 600000, 'paid', ''),
(17, 'Bungkus', 3, '2017-03-31', 1710000, 'paid', 'Acara'),
(18, '3', 2, '2017-04-26', 250000, 'paid', 'ASLAB Makan Bersama'),
(19, '1', 3, '2017-04-26', 150000, 'paid', 'Fasilkom UNSIKA'),
(20, 'Bungkus', 1, '2017-04-30', 150000, 'paid', 'Aslab'),
(21, '1', 1, '2017-05-02', 50000, 'paid', ''),
(22, 'Bungkus', 1, '2017-05-22', 600000, 'paid', ''),
(23, 'Bungkus', 1, '2017-06-13', 700000, 'paid', 'Fasilkom'),
(24, 'Bungkus', 2, '2017-06-13', 1000000, 'paid', 'Aslab'),
(25, 'Bungkus', 3, '2017-06-13', 100000, 'paid', 'Haus'),
(26, 'Bungkus', 1, '2017-06-14', 75000, 'paid', 'Fasilkom'),
(27, 'Bungkus', 1, '2017-09-09', 0, 'unpaid', 'Fasilkom 1'),
(28, '4', 2, '2017-09-09', 0, 'unpaid', 'asdf'),
(29, '2', 1, '2017-11-07', 50000, 'paid', 'Angga'),
(30, 'Bungkus', 1, '2017-12-12', 150000, 'paid', 'Zia Traktir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_menu` varchar(8) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_pembeli`, `id_menu`, `nama_menu`, `qty`, `price`) VALUES
(1, 1, 'MEN-0001', 'Ayam Bakar', 5, 15000),
(2, 2, 'MEN-0002', 'Ikan Bakar', 10, 16000),
(3, 3, 'MEN-0001', 'Ayam Bakar', 100, 15000),
(4, 3, 'MEN-0002', 'Ikan Bakar', 100, 16000),
(5, 4, 'MEN-0001', 'Ayam Bakar', 9, 15000),
(6, 4, 'MEN-0002', 'Ikan Bakar', 6, 16000),
(7, 4, 'MEN-0003', 'Nasi', 2, 4000),
(8, 5, 'MEN-0001', 'Ayam Bakar', 2, 15000),
(9, 6, 'MEN-0001', 'Ayam Bakar', 5, 15000),
(10, 6, 'MEN-0002', 'Ikan Bakar', 5, 16000),
(11, 7, 'MEN-0003', 'Nasi', 5, 4000),
(12, 7, 'MEN-0005', 'Es Teh Manis', 3, 3000),
(13, 7, 'MEN-0002', 'Ikan Bakar', 3, 16000),
(15, 9, 'MEN-0007', 'Teh Hangat', 10, 3000),
(16, 10, 'MEN-0001', 'Ayam Bakar', 5, 15000),
(17, 11, 'MEN-0003', 'Nasi', 5, 4000),
(18, 12, 'MEN-0002', 'Ikan Bakar', 1, 16000),
(19, 13, 'MEN-0007', 'Teh Hangat', 3, 3000),
(20, 14, 'MEN-0001', 'Ayam Bakar', 2, 15000),
(21, 14, 'MEN-0003', 'Nasi', 2, 4000),
(22, 14, 'MEN-0005', 'Es Teh Manis', 2, 3000),
(23, 15, 'MEN-0001', 'Ayam Bakar', 5, 15000),
(24, 16, 'MEN-0001', 'Ayam Bakar', 40, 15000),
(25, 17, 'MEN-0001', 'Ayam Bakar', 101, 15000),
(26, 17, 'MEN-0002', 'Ikan Bakar', 12, 16000),
(27, 18, 'MEN-0001', 'Ayam Bakar', 10, 15000),
(28, 18, 'MEN-0003', 'Nasi', 10, 4000),
(29, 18, 'MEN-0005', 'Es Teh Manis', 10, 3000),
(30, 19, 'MEN-0001', 'Ayam Bakar', 5, 15000),
(31, 19, 'MEN-0008', 'Es Jeruk', 5, 5000),
(32, 19, 'MEN-0003', 'Nasi', 5, 4000),
(33, 20, 'MEN-0001', 'Ayam Bakar', 10, 15000),
(34, 21, 'MEN-0001', 'Ayam Bakar', 3, 15000),
(35, 22, 'MEN-0001', 'Ayam Bakar', 37, 15000),
(36, 23, 'MEN-0001', 'Ayam Bakar', 40, 14000),
(37, 24, 'MEN-0002', 'Ikan Bakar', 40, 16000),
(38, 24, 'MEN-0003', 'Nasi', 80, 4000),
(39, 25, 'MEN-0005', 'Es Teh Manis', 30, 3000),
(40, 26, 'MEN-0008', 'Es Jeruk', 15, 5000),
(41, 27, 'MEN-0001', 'Ayam Bakar', 10, 14000),
(42, 27, 'MEN-0003', 'Nasi', 10, 4000),
(43, 27, 'MEN-0005', 'Es Teh Manis', 10, 3000),
(44, 27, 'MEN-0009', 'Tahu', 5, 1000),
(45, 27, 'MEN-0010', 'Tempe', 5, 1000),
(46, 28, 'MEN-0002', 'Ikan Bakar', 7, 16000),
(47, 28, 'MEN-0003', 'Nasi', 7, 4000),
(48, 29, 'MEN-0002', 'Ikan Bakar', 2, 16000),
(49, 30, 'MEN-0002', 'Ikan Bakar', 5, 16000),
(50, 30, 'MEN-0003', 'Nasi', 5, 4000),
(51, 30, 'MEN-0005', 'Es Teh Manis', 5, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resep`
--

CREATE TABLE `tbl_resep` (
  `id_resep` int(11) NOT NULL,
  `id_menu` varchar(8) NOT NULL,
  `id_biaya` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resep`
--

INSERT INTO `tbl_resep` (`id_resep`, `id_menu`, `id_biaya`) VALUES
(1, 'MEN-0001', 'BBB-0001'),
(2, 'MEN-0001', 'BBP-0004'),
(3, 'MEN-0001', 'BBP-0005'),
(4, 'MEN-0001', 'BBP-0007'),
(5, 'MEN-0001', 'BBP-0008'),
(7, 'MEN-0001', 'BBP-0009'),
(8, 'MEN-0001', 'BBP-0010'),
(9, 'MEN-0001', 'BBP-0001'),
(10, 'MEN-0002', 'BBB-0002'),
(11, 'MEN-0003', 'BBB-0006'),
(12, 'MEN-0004', 'BBB-0002'),
(13, 'MEN-0004', 'BBP-0008'),
(14, 'MEN-0004', 'BBP-0007'),
(16, 'MEN-0004', 'BBP-0004'),
(17, 'MEN-0004', 'BBP-0005'),
(18, 'MEN-0004', 'BBP-0011'),
(19, 'MEN-0001', 'BBP-0011'),
(20, 'MEN-0001', 'BBP-0012'),
(22, 'MEN-0001', 'BBP-0014'),
(23, 'MEN-0001', 'BBP-0015'),
(24, 'MEN-0001', 'BBP-0016'),
(25, 'MEN-0001', 'BBP-0017'),
(26, 'MEN-0001', 'BBP-0018'),
(27, 'MEN-0001', 'BBP-0006'),
(29, 'MEN-0005', 'BBP-0019'),
(30, 'MEN-0005', 'BBB-0007'),
(31, 'MEN-0005', 'BBP-0020'),
(32, 'MEN-0005', 'BBP-0021'),
(34, 'MEN-0001', 'BBP-0013'),
(35, 'MEN-0009', 'BBB-0004'),
(36, 'MEN-0010', 'BBB-0003'),
(37, 'MEN-0002', 'BBP-0004'),
(38, 'MEN-0002', 'BBP-0008'),
(39, 'MEN-0002', 'BBP-0007'),
(40, 'MEN-0002', 'BBP-0016'),
(41, 'MEN-0002', 'BBP-0017'),
(42, 'MEN-0002', 'BBP-0018'),
(43, 'MEN-0002', 'BBP-0011'),
(44, 'MEN-0002', 'BBP-0002'),
(46, 'MEN-0002', 'BBP-0001'),
(47, 'MEN-0003', 'BBP-0021'),
(48, 'MEN-0002', 'BBP-0006'),
(49, 'MEN-0002', 'BBP-0022'),
(50, 'MEN-0001', 'BBP-0022'),
(51, 'MEN-0002', 'BBP-0005'),
(52, 'MEN-0008', 'BBB-0008'),
(53, 'MEN-0008', 'BBP-0019'),
(54, 'MEN-0008', 'BBP-0020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` varchar(8) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Admin','Kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('ADM-0001', 'Eryan Gamer', 'eryan', 'b89c4e1c4b5bd2129b44582a8abb8604cc14c350', 'Admin'),
('USR-0001', 'kasir', 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biaya_lain`
--
ALTER TABLE `tbl_biaya_lain`
  ADD PRIMARY KEY (`id_biaya_lain`);

--
-- Indexes for table `tbl_category_menu`
--
ALTER TABLE `tbl_category_menu`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tbl_daftar_biaya`
--
ALTER TABLE `tbl_daftar_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_modal`
--
ALTER TABLE `tbl_modal`
  ADD PRIMARY KEY (`id_modal`);

--
-- Indexes for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biaya_lain`
--
ALTER TABLE `tbl_biaya_lain`
  MODIFY `id_biaya_lain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_modal`
--
ALTER TABLE `tbl_modal`
  MODIFY `id_modal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
