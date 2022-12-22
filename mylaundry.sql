-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 09:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `username`, `email`, `password`, `nama`, `alamat`, `no_telp`, `status`) VALUES
(1, 'rusdirusx', 'rusdiganteng@gmail.com', 'rusdiluxe', 'Mas Rusdi', 'Desa Jongkang Baru, Sleman, D.I.Yogyakarta', '0874206942069', 1),
(2, 'budibudiman', 'BudimanSup@gmail.com', 'randol71', 'Budiman Supriono', 'Desa Karangwuni, Sleman, D.I.Yogyakarta', '088832176892', 2),
(7, 'default', '', '', 'Bang Kulbet', 'Jakal  13', '+628233234232', 1),
(9, 'Kbj3UWrYKr', '', '', 'Juan Kulbet', 'Jakal  13', '+628233234232', 1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `email`, `password`, `no_telepon`, `role`) VALUES
(1, 'Nabil Najmudin', 'nabil@gmail.com     ', 'nabil123', '081327809872', 1),
(2, 'Huang Tao', 'TaoH@gmail.com', 'htaoz1', '081231898227', 2),
(5, 'Mbappe ', 'mbappe@gmail.com ', 'mbappe123', '+6282331397559', 1),
(7, 'Ronaldo', 'ronaldo@gmail.com     ', 'ronaldo123', '082333331341', 2),
(9, 'Pickfords ', 'pickford@gmail.com       ', 'pickford123  ', '+628233234233', 2),
(11, 'Jennie Kim', 'jennie@gmail.com     ', 'jennie123', '+628233234233', 1),
(12, 'Pickfords', 'pickfords@gmail.com ', 'pickford123 ', '+628233234233', 2),
(13, 'Varane', 'varane@gmail.com ', 'varane123', '+628233234232', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paket_laundry`
--

CREATE TABLE `paket_laundry` (
  `kategori` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_laundry`
--

INSERT INTO `paket_laundry` (`kategori`, `harga`, `id_paket`) VALUES
('Cuci', 3000, 1),
('Setrika', 1500, 2),
('Lengkap', 4000, 3),
('Setrika + Pijat ', 24000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(10) UNSIGNED NOT NULL,
  `nama_pesanan` varchar(100) NOT NULL,
  `tanggal_masuk_pesanan` date NOT NULL,
  `tanggal_keluar_pesanan` date NOT NULL,
  `status_pesanan` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `berat_pesanan` int(10) NOT NULL,
  `jenis_paket` int(10) NOT NULL,
  `status_pembayaran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pesanan`, `tanggal_masuk_pesanan`, `tanggal_keluar_pesanan`, `status_pesanan`, `id_customer`, `berat_pesanan`, `jenis_paket`, `status_pembayaran`) VALUES
(4, 'Laundry Seragam', '2022-12-15', '2022-12-18', 1, 1, 9, 2, 1),
(8, 'Laundry Baju Santri Al-Qolam', '2022-12-13', '2022-12-26', 1, 1, 60, 3, 2),
(9, 'Laundry Almamater UII', '2022-12-10', '2022-12-30', 1, 1, 100, 3, 2),
(11, 'Cuci Sendal ASU', '2022-12-08', '2022-12-21', 1, 2, 8, 2, 1),
(15, 'Cuci Seragam PNS', '2022-12-20', '2022-12-21', 2, 2, 23, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Admin'),
(2, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `status_customer`
--

CREATE TABLE `status_customer` (
  `nama` varchar(100) NOT NULL,
  `id_status_register` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_customer`
--

INSERT INTO `status_customer` (`nama`, `id_status_register`) VALUES
('SUDAH VERIFIKASI', 1),
('BELUM VERIFIKASI', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id_pembayaran`, `nama_status`) VALUES
(1, 'BELUM BAYAR'),
(2, 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `nama` varchar(100) NOT NULL,
  `id_status_pesanan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pesanan`
--

INSERT INTO `status_pesanan` (`nama`, `id_status_pesanan`) VALUES
('DI PROSES', 1),
('SELESAI', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `paket_laundry`
--
ALTER TABLE `paket_laundry`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `jenis_paket` (`jenis_paket`),
  ADD KEY `status_pesanan` (`status_pesanan`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `status_pembayaran` (`status_pembayaran`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status_customer`
--
ALTER TABLE `status_customer`
  ADD PRIMARY KEY (`id_status_register`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id_status_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `status_customer`
--
ALTER TABLE `status_customer`
  MODIFY `id_status_register` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  MODIFY `id_status_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_customer` (`id_status_register`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`jenis_paket`) REFERENCES `paket_laundry` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`status_pesanan`) REFERENCES `status_pesanan` (`id_status_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_4` FOREIGN KEY (`status_pembayaran`) REFERENCES `status_pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
