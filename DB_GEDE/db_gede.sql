-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2019 at 05:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gede`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_10_16_021833_create_tb_users', 1),
(2, '2019_11_21_145640_create_tb_wishlists', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admins`
--

CREATE TABLE `tb_admins` (
  `admin_id` varchar(50) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admins`
--

INSERT INTO `tb_admins` (`admin_id`, `admin_nama`, `admin_email`, `password`) VALUES
('1', 'admin', 'admin@gmail.com', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `barang_id` varchar(13) NOT NULL,
  `barang_nama` varchar(50) NOT NULL,
  `barang_harga_beli` int(11) NOT NULL,
  `barang_harga_jual` int(11) NOT NULL,
  `barang_deskripsi` varchar(100) NOT NULL,
  `barang_kategori_id` int(11) NOT NULL,
  `barang_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`barang_id`, `barang_nama`, `barang_harga_beli`, `barang_harga_jual`, `barang_deskripsi`, `barang_kategori_id`, `barang_gambar`) VALUES
('5dc00fc76fa15', 'boxer', 20000, 22000, 'jadasd', 1, 'p1.jpg'),
('5dc02df14b5ff', 'jeans biru', 110000, 150000, 'uhiugiyf', 1, 'p2.jpg'),
('5dd8712959982', 'asdasd', 123123, 123123123, 'qweqweqwe', 1, 'q123123213');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `dt_nomor` int(11) NOT NULL,
  `dt_transaksi_nomor` varchar(50) NOT NULL,
  `dt_barang_id` varchar(50) NOT NULL,
  `dt_barang_ukuran` varchar(10) NOT NULL,
  `dt_jumlah_barang` int(11) NOT NULL,
  `dt_jumlah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`dt_nomor`, `dt_transaksi_nomor`, `dt_barang_id`, `dt_barang_ukuran`, `dt_jumlah_barang`, `dt_jumlah_harga`) VALUES
(6, 'TRX-000000001', '5dc00fc76fa15', 'XL', 4, 88000),
(7, 'TRX-000000001', '5dc00fc76fa15', 'L', 1, 22000),
(8, 'TRX-000000002', '5dc00fc76fa15', 'XL', 4, 88000),
(9, 'TRX-000000002', '5dc00fc76fa15', 'L', 1, 22000),
(10, 'TRX-000000003', '5dc02df14b5ff', 'XL', 5, 750000),
(11, 'TRX-000000003', '5dd8712959982', 'L', 1, 123123123);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi_masuk`
--

CREATE TABLE `tb_detail_transaksi_masuk` (
  `detiltrans_masuk_id` int(11) NOT NULL,
  `detiltrans_masuk_idtrans` varchar(13) NOT NULL,
  `detiltrans_masuk_idstok` int(11) NOT NULL,
  `detiltrans_masuk_stok` int(4) NOT NULL,
  `detiltrans_masuk_totalHarga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_transaksi_masuk`
--

INSERT INTO `tb_detail_transaksi_masuk` (`detiltrans_masuk_id`, `detiltrans_masuk_idtrans`, `detiltrans_masuk_idstok`, `detiltrans_masuk_stok`, `detiltrans_masuk_totalHarga`) VALUES
(1, 'TRX-000000001', 1, 5, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` int(2) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfirmasi`
--

CREATE TABLE `tb_konfirmasi` (
  `konfirmasi_nomor` int(11) NOT NULL,
  `konfirmasi_admin_id` varchar(50) NOT NULL,
  `konfirmasi_trans_no` varchar(50) NOT NULL,
  `konfirmasi_member_id` varchar(50) NOT NULL,
  `konfirmasi_upload` varchar(100) NOT NULL,
  `konfirmasi_validasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `member_id` varchar(50) NOT NULL,
  `member_nama` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `stok_id` int(11) NOT NULL,
  `stok_barang_id` varchar(50) NOT NULL,
  `stok_ukuran` varchar(50) NOT NULL,
  `stok_jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stok`
--

INSERT INTO `tb_stok` (`stok_id`, `stok_barang_id`, `stok_ukuran`, `stok_jumlah_stok`) VALUES
(1, '5dc00fc76fa15', 'XL', 24),
(2, '5dc00fc76fa15', 'M', 21),
(3, '5dc00fc76fa15', 'L', 24),
(4, '5dc00fc76fa15', 'S', 21),
(5, '5dc02df14b5ff', 'XL', 21),
(6, '5dc02df14b5ff', 'L', 22),
(7, '5dc02df14b5ff', 'M', 32),
(8, '5dc02df14b5ff', 'S', 10),
(10, '5dd8712959982', 'XL', 123),
(12, '5dd8712959982', 'L', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_nomor` varchar(50) NOT NULL,
  `transaksi_member_id` int(11) NOT NULL,
  `transaksi_tanggal` date NOT NULL,
  `transaksi_alamat_pengiriman` text NOT NULL,
  `transaksi_jumlah_uang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_nomor`, `transaksi_member_id`, `transaksi_tanggal`, `transaksi_alamat_pengiriman`, `transaksi_jumlah_uang`) VALUES
('TRX-000000001', 0, '2019-11-27', '-', 110000),
('TRX-000000002', 0, '2019-11-27', '-', 110000),
('TRX-000000003', 0, '2019-11-28', '-', 123873123);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_masuk`
--

CREATE TABLE `tb_transaksi_masuk` (
  `trans_masuk_id` varchar(13) NOT NULL,
  `trans_masuk_tanggal` date NOT NULL,
  `trans_masuk_suplier` varchar(50) NOT NULL,
  `trans_masuk_totalharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_masuk`
--

INSERT INTO `tb_transaksi_masuk` (`trans_masuk_id`, `trans_masuk_tanggal`, `trans_masuk_suplier`, `trans_masuk_totalharga`) VALUES
('TRX-000000001', '2019-11-26', 'qwqe', 111);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `idUser` int(10) UNSIGNED NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`idUser`, `namaUser`, `emailUser`, `password`, `created_at`, `updated_at`) VALUES
(1, 'yanuar', 'yanuar.ridwan.h@gmail.com', '4b3865dc277de5870cce27623f1e20fc', '2019-11-27 21:01:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wishlists`
--

CREATE TABLE `tb_wishlists` (
  `wishlist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admins`
--
ALTER TABLE `tb_admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_kategori_id` (`barang_kategori_id`);

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`dt_nomor`),
  ADD KEY `dt_transaksi_nomor` (`dt_transaksi_nomor`),
  ADD KEY `dt_barang_id` (`dt_barang_id`);

--
-- Indexes for table `tb_detail_transaksi_masuk`
--
ALTER TABLE `tb_detail_transaksi_masuk`
  ADD PRIMARY KEY (`detiltrans_masuk_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_nomor`),
  ADD KEY `konfirmasi_admin_id` (`konfirmasi_admin_id`),
  ADD KEY `konfirmasi_member_id` (`konfirmasi_member_id`),
  ADD KEY `konfirmasi_admin_id_2` (`konfirmasi_admin_id`),
  ADD KEY `konfirmasi_trans_no` (`konfirmasi_trans_no`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `stok_barang_id` (`stok_barang_id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_nomor`),
  ADD KEY `transaksi_member_id` (`transaksi_member_id`);

--
-- Indexes for table `tb_transaksi_masuk`
--
ALTER TABLE `tb_transaksi_masuk`
  ADD PRIMARY KEY (`trans_masuk_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `tb_wishlists`
--
ALTER TABLE `tb_wishlists`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `dt_nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_detail_transaksi_masuk`
--
ALTER TABLE `tb_detail_transaksi_masuk`
  MODIFY `detiltrans_masuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `idUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_wishlists`
--
ALTER TABLE `tb_wishlists`
  MODIFY `wishlist_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`barang_kategori_id`) REFERENCES `tb_kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`dt_barang_id`) REFERENCES `tb_barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
  ADD CONSTRAINT `tb_konfirmasi_ibfk_1` FOREIGN KEY (`konfirmasi_trans_no`) REFERENCES `tb_transaksi` (`transaksi_nomor`),
  ADD CONSTRAINT `tb_konfirmasi_ibfk_2` FOREIGN KEY (`konfirmasi_member_id`) REFERENCES `tb_member` (`member_id`),
  ADD CONSTRAINT `tb_konfirmasi_ibfk_3` FOREIGN KEY (`konfirmasi_admin_id`) REFERENCES `tb_admins` (`admin_id`);

--
-- Constraints for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD CONSTRAINT `tb_stok_ibfk_1` FOREIGN KEY (`stok_barang_id`) REFERENCES `tb_barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;