-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 03:19 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gede`
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
  `berat_barang` int(11) NOT NULL,
  `barang_gambar` text NOT NULL,
  `created_at` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`barang_id`, `barang_nama`, `barang_harga_beli`, `barang_harga_jual`, `barang_deskripsi`, `barang_kategori_id`, `berat_barang`, `barang_gambar`, `created_at`, `last_update`) VALUES
('5dc00fc76fa15', 'boxer', 20000, 22000, 'jadasd', 1, 1000, 'p1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dc02df14b5ff', 'jeans biru', 110000, 150000, 'uhiugiyf', 1, 50, 'p2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5dd8712959982', 'asdasd', 123123, 123123123, 'qweqweqwe', 1, 230, '1575384736_2 someone like u sunghajung.PNG', '0000-00-00 00:00:00', '2019-12-04 13:09:27'),
('5de5b793ed5da', 'bqju crocodile', 20000, 22000, 'ini barang bagus', 2, 60, 'p3.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5de760a629d31', 'jaket bomber', 100000, 120000, 'ini barang bagus', 3, 500, '1575444646_31.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5de76bc33996f', 'asdasd', 123123, 123123123, 'qweqweqwebxcddc', 1, 100, '1575449043_42133.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5de7b03d2aee9', 'baju jelek 2', 400000, 500000, 'wewewewqeqweqwe', 3, 2000, '1575465021_WhatsApp Image 2019-11-19 at 09.22.52.jpeg', '2019-12-04 13:10:21', '0000-00-00 00:00:00');

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
(11, 'TRX-000000003', '5dd8712959982', 'L', 1, 123123123),
(12, 'TRX-000000004', '5dc02df14b5ff', 'XL', 4, 600000),
(13, 'TRX-000000005', '5dc00fc76fa15', 'S', 7, 154000),
(14, 'TRX-000000006', '5dc00fc76fa15', 'L', 4, 88000),
(15, 'TRX-000000007', '5dd8712959982', 'XL', 19, 2147483647),
(16, 'TRX-000000008', '5dd8712959982', 'L', 4, 492492492),
(17, 'TRX-000000008', '5dd8712959982', 'XL', 3, 369369369),
(18, 'TRX-000000009', '5de760a629d31', 'L', 1, 120000),
(19, 'TRX-000000010', '5de76bc33996f', 'M', 1, 123123123),
(20, 'TRX-000000010', '5de760a629d31', 'L', 5, 600000);

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
(1, 'TRX-000000001', 1, 5, 100000),
(3, 'TRX-000000002', 2, 3, 60000),
(4, 'TRX-000000003', 17, 100, 10000000),
(8, 'TRX-000000004', 1, 50, 1000000);

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
(1, 'Celana'),
(2, 'Baju'),
(3, 'jaket');

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
(1, '5dc00fc76fa15', 'XL', 28),
(2, '5dc00fc76fa15', 'M', 26),
(3, '5dc00fc76fa15', 'L', 20),
(4, '5dc00fc76fa15', 'S', 21),
(5, '5dc02df14b5ff', 'XL', 21),
(6, '5dc02df14b5ff', 'L', 22),
(7, '5dc02df14b5ff', 'M', 32),
(8, '5dc02df14b5ff', 'S', 10),
(10, '5dd8712959982', 'XL', 101),
(12, '5dd8712959982', 'L', 56),
(13, '5de5b793ed5da', 'XL', 25),
(14, '5de5b793ed5da', 'L', 10),
(15, '5de5b793ed5da', 'M', 20),
(16, '5de5b793ed5da', 'S', 10),
(17, '5de760a629d31', 'XL', -90),
(18, '5de760a629d31', 'L', 14),
(19, '5de76bc33996f', 'M', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_nomor` varchar(50) NOT NULL,
  `transaksi_member_id` int(11) NOT NULL,
  `transaksi_tanggal` date NOT NULL,
  `transaksi_alamat_pengiriman` text NOT NULL,
  `transaksi_jumlah_uang` int(11) NOT NULL,
  `ongkir` int(15) NOT NULL,
  `transaksi_status` varchar(10) NOT NULL,
  `transaksi_status_pesanan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_nomor`, `transaksi_member_id`, `transaksi_tanggal`, `transaksi_alamat_pengiriman`, `transaksi_jumlah_uang`, `ongkir`, `transaksi_status`, `transaksi_status_pesanan`) VALUES
('TRX-000000001', 3, '2019-11-27', '-', 110000, 0, 'online', 'belum'),
('TRX-000000002', 3, '2019-11-27', '-', 110000, 0, 'online', 'belum'),
('TRX-000000003', 3, '2019-11-28', '-', 123873123, 0, 'online', 'sudah'),
('TRX-000000004', 3, '2019-12-02', 'jgfhvhn,', 600000, 0, 'online', 'sudah'),
('TRX-000000005', 0, '2019-12-03', '-', 154000, 0, 'offline', ''),
('TRX-000000006', 0, '2019-12-04', '-', 88000, 0, 'offline', ''),
('TRX-000000007', 6, '2019-12-04', 'jl karimata V', 2147483647, 0, 'online', ''),
('TRX-000000008', 7, '2019-12-04', 'Jl. Karimata V blok D12', 861861861, 32000, 'online', 'belum'),
('TRX-000000009', 7, '2019-12-04', 'Jl. Karimata V blok D12', 120000, 16000, 'online', 'belum'),
('TRX-000000010', 7, '2019-12-05', 'Jl. Karimata V blok D12', 123723123, 54000, 'online', 'belum');

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
('TRX-000000001', '2019-11-26', 'qwqe', 111),
('TRX-000000002', '2019-12-04', 'uwu', 60000),
('TRX-000000003', '2019-12-04', 'uwu', 10000000),
('TRX-000000004', '2019-12-04', 'uwu', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `idUser` int(10) UNSIGNED NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telponUser` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov` int(5) NOT NULL,
  `city` int(5) NOT NULL,
  `alamatUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`idUser`, `namaUser`, `emailUser`, `telponUser`, `prov`, `city`, `alamatUser`, `password`, `token`, `created_at`, `updated_at`) VALUES
(1, 'yanuar', 'yanuar.ridwan.h@gmail.com', '081227579300', 0, 0, 'jl. karimata V blok D12, jember, jawa timur', 'efe6398127928f1b2e9ef3207fb82663', '', '2019-11-27 21:01:30', NULL),
(3, 'bela', 'bela@gmail.com', '089121111111', 0, 0, 'Jl. Karimata V blok D12', 'd41d8cd98f00b204e9800998ecf8427e', '', NULL, '2019-12-02 21:19:03'),
(5, 'yanu', 'yanuar.ridwan.h@gmail.com', '08122277777', 11, 160, 'Jl. Karimata V blok D12', '4297f44b13955235245b2497399d7a93', '', NULL, '2019-12-03 19:52:09'),
(6, 'irfan', 'irfan@gmail.com', '09876545678', 11, 160, 'Jl. Karimata V blok D12', '202cb962ac59075b964b07152d234b70', '', NULL, '2019-12-04 00:39:54'),
(7, 'irfan', 'superadmin@cc.magelangkota.go.id', '1082510285', 11, 80, 'Jl. Karimata V blok D12', '4297f44b13955235245b2497399d7a93', '', NULL, '2019-12-04 04:25:06'),
(9, 'bagus', 'guramin01@gmail.com', '08978678686', 20, 140, 'jl.qwqwdqweqw', '04321c02f72e45384fc2bb03a20a942a', '', '2019-12-04 04:32:53', '2019-12-04 04:34:21'),
(10, 'asd', 'asd@gmail.com', '', 0, 0, '', '4297f44b13955235245b2497399d7a93', '', '2019-12-04 04:53:10', NULL),
(11, 'Irfan2', 'meme@gmail.com', '', 0, 0, '', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '2019-12-04 11:30:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wishlists`
--

CREATE TABLE `tb_wishlists` (
  `wishlist_id` int(10) UNSIGNED NOT NULL,
  `wishlist_userid` int(11) NOT NULL,
  `wishlist_barangid` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_wishlists`
--

INSERT INTO `tb_wishlists` (`wishlist_id`, `wishlist_userid`, `wishlist_barangid`, `created_at`, `updated_at`) VALUES
(1, 3, '5dc02df14b5ff', '2019-12-02 00:51:52', NULL),
(2, 3, '5dc00fc76fa15', '2019-12-02 00:52:21', NULL),
(4, 3, '5dc02df14b5ff', '2019-12-02 20:19:45', NULL),
(5, 6, '5de760a629d31', '2019-12-04 00:40:28', NULL);

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
  MODIFY `dt_nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_detail_transaksi_masuk`
--
ALTER TABLE `tb_detail_transaksi_masuk`
  MODIFY `detiltrans_masuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `idUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_wishlists`
--
ALTER TABLE `tb_wishlists`
  MODIFY `wishlist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
