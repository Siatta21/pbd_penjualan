-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 12:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbd_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`) VALUES
('BR001', 'KP Branding(L)', '500.00'),
('BR002', 'PRT KM/AR 200g', '16000.00'),
('BR003', 'NS WLN CHO 100g', '11200.00'),
('BR004', 'CIMORY BL 250ml', '7500.00'),
('BR005', 'CIMORY ALM 250ml', '7500.00'),
('BR006', 'Kopi mantap', '9000.00');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` varchar(10) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_toko`, `alamat`, `no_telp`) VALUES
('CTRU001', 'Alfamart Citeureup', 'Jl. Sangkuriang Kel No.98,Cimahi', '1 500 959'),
('CTRU002', 'Alfamart Citeureup 2', 'Jl. Jencep Karta Wiria, Cimahi', '081294659055'),
('DPKR005', 'Alfamart Dipati Ukur', 'Jl. Dipati Ukur, Bandung', '081510001877'),
('MGRY003', 'Alfamart Margahayu Raya', 'Jl. Tata Surya, Margahayu Raya', '(022) 7502113'),
('PST', 'Kantor Pusat Alamart', 'Jl. satu No.23', '082233215051'),
('RCBL004', 'Alfamart Rancabolang', 'Jl. Rancabolang, Bandung', '08558207993');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` varchar(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `diskon` decimal(10,2) DEFAULT NULL,
  `total_diskon` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `ppn` decimal(10,2) NOT NULL,
  `ref` varchar(20) DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `jumlah`, `diskon`, `total_diskon`, `subtotal`, `ppn`, `ref`, `id_barang`) VALUES
('1', 1, '0.00', '1600.00', '500.00', '4221.00', 'N597-256-1501ZK49', 'BR001'),
('2', 1, '0.00', '1600.00', '16000.00', '4221.00', 'N597-256-1501ZK49', 'BR002'),
('3', 1, '0.00', '1600.00', '11200.00', '4221.00', 'N597-256-1501ZK49', 'BR003'),
('4', 1, '1600.00', '1600.00', '7500.00', '4221.00', 'N597-256-1501ZK49', 'BR004'),
('5', 1, '0.00', '1600.00', '7500.00', '4221.00', 'N597-256-1501ZK49', 'BR005');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(10) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `poin` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `poin`) VALUES
('MB001', 'Jihan Salsabila', 1876),
('MB002', 'Atta Idzes', 582),
('MB003', 'Rian Dika', 338),
('MB004', 'Vincent Tirta', 3386),
('MB005', 'Ragnar Subianto', 7042);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nomor_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `id_cabang` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nomor_pegawai`, `nama_pegawai`, `jabatan`, `password`, `id_cabang`) VALUES
('ADM001', 'admin', 'admin', 'admin123', 'PST'),
('K001', 'Satria', 'kasir', 'kasir123', 'CTRU002'),
('K002', 'Shyabi', 'kasir', 'kasir124', 'CTRU001'),
('K003', 'Nisa', 'kasir', 'kasir125', 'MGRY003'),
('K004', 'Rafi', 'kasir', 'kasir126', 'RCBL004'),
('K005', 'Putri', 'kasir', 'kasir127', 'DPKR005');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ref` varchar(20) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `total_item` decimal(10,2) NOT NULL,
  `total_belanja` decimal(10,2) NOT NULL,
  `kembalian` decimal(10,2) DEFAULT NULL,
  `tunai` decimal(10,2) NOT NULL,
  `tanggal_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `id_cabang` varchar(10) DEFAULT NULL,
  `nomor_pegawai` varchar(10) DEFAULT NULL,
  `id_member` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ref`, `nama_pegawai`, `total_item`, `total_belanja`, `kembalian`, `tunai`, `tanggal_transaksi`, `id_cabang`, `nomor_pegawai`, `id_member`) VALUES
('N597-256-0701Z3T7', 'Satria', '20700.00', '19100.00', '20000.00', '900.00', '2025-02-03', 'CTRU002', 'K001', 'MB001'),
('N597-256-1501ZK49', 'Satria', '42700.00', '41100.00', '41100.00', '0.00', '2025-02-03', 'CTRU002', 'K001', 'MB001'),
('N597-801-1201MKX9', 'Shyabi', '61000.00', '59900.00', '100000.00', '40100.00', '2025-02-03', 'CTRU001', 'K002', 'MB002'),
('N597-801-30125MD4', 'Shyabi', '31800.00', '28200.00', '50000.00', '21800.00', '2025-02-03', 'CTRU001', 'K002', 'MB001'),
('N597-989-0901V458', 'Rafi', '69000.00', '51400.00', '52000.00', '600.00', '2025-02-03', 'RCBL004', 'K004', 'MB002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `ref` (`ref`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nomor_pegawai`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `id_cabang` (`id_cabang`),
  ADD KEY `id_pegawai` (`nomor_pegawai`),
  ADD KEY `id_member` (`id_member`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `transaksi` (`ref`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`nomor_pegawai`) REFERENCES `pegawai` (`nomor_pegawai`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
