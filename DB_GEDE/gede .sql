-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2019 pada 19.42
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.2.22

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
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idAdmin` int(2) NOT NULL,
  `namaAdmin` varchar(30) NOT NULL,
  `usernameAdm` varchar(30) NOT NULL,
  `passwordAdm` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `idBrg` varchar(50) NOT NULL,
  `namaBrg` varchar(100) NOT NULL,
  `hargaBeli` int(10) NOT NULL,
  `hargaJual` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `idKtgr` int(3) NOT NULL,
  `gambarBrg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`idBrg`, `namaBrg`, `hargaBeli`, `hargaJual`, `deskripsi`, `idKtgr`, `gambarBrg`) VALUES
('BR00001', 'Jaket', 10000, 20000, 'Jaket dengan Kualitas Bahan yang sangat mahal', 1, 'p1.jpg'),
('BR00002', 'Baju', 30000, 40000, 'ini baju keren sekali', 2, 'p1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_costumer`
--

CREATE TABLE `tb_costumer` (
  `idCst` varchar(32) NOT NULL,
  `namaCst` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noTelp` varchar(12) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `usernameCst` varchar(30) NOT NULL,
  `passwordCst` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `idKtgr` int(3) NOT NULL,
  `namaKtgr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`idKtgr`, `namaKtgr`) VALUES
(1, 'Jaket'),
(2, 'Baju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `idStok` int(10) NOT NULL,
  `idBrg` varchar(50) NOT NULL,
  `size` varchar(5) NOT NULL,
  `jumlahStok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`idStok`, `idBrg`, `size`, `jumlahStok`) VALUES
(1, 'BR00001', 'XL', 5),
(2, 'BR00002', 'XXL', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `usernameAdm` (`usernameAdm`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`idBrg`);

--
-- Indeks untuk tabel `tb_costumer`
--
ALTER TABLE `tb_costumer`
  ADD PRIMARY KEY (`idCst`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`idKtgr`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`idStok`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `idKtgr` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `idStok` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
