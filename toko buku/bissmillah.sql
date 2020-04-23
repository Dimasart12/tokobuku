-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2020 pada 16.09
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bissmillah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `nama` varchar(300) COLLATE utf8_slovenian_ci NOT NULL,
  `kontak` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `kontak`, `username`, `password`) VALUES
('011', 'dms', 'dms', 'dmsdms', 'dms123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `judul` varchar(400) COLLATE utf8_slovenian_ci NOT NULL,
  `penulis` varchar(400) COLLATE utf8_slovenian_ci NOT NULL,
  `tahun` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `harga` double NOT NULL,
  `stok` double NOT NULL,
  `image` varchar(400) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `penulis`, `tahun`, `harga`, `stok`, `image`) VALUES
('001', 'After Met You', 'Dwitasari', '2020', 35000, 4, '001-704.jpg'),
('002', 'Dilan 1990', 'Pidi Baiq', '1990', 35000, 17, '002-768.jpg'),
('003', 'Nanti Kita Cerita Tentang Hari ', 'Marchella FP', '2019', 50000, 8, '003-828.jpg'),
('004', 'ILY From 38000ft', 'Tisa TS & Stanley Meulen', '2018', 60000, 15, '004-738.jpg'),
('005', 'Mariposa', 'Luluk HF', '2019', 100000, 6, '005-995.jpg'),
('006', 'Dilan 1991', 'Pidi Baiq', '1991', 15000, 17, '006-201.jpg'),
('007', 'Milea', 'Pidi Baiq', '1991', 50000, 3, '007-993.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `alamat` varchar(400) COLLATE utf8_slovenian_ci NOT NULL,
  `kontak` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `kontak`, `username`, `password`) VALUES
('012', 'wkw', 'wkw', 'wkw', 'wkwk', 'wkw123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `kode_buku` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `jumlah` double NOT NULL,
  `harga_beli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `kode_buku`, `jumlah`, `harga_beli`) VALUES
('ID6657', '1820', 1, 89),
('ID4234', '1819', 3, 100000),
('ID2513', '1819', 3, 100000),
('ID2513', '1826', 2, 88000),
('ID6290', '1819', 3, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `tgl` datetime NOT NULL,
  `id_customer` varchar(30) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl`, `id_customer`) VALUES
('ID1603', '2020-04-17 15:49:57', '181925'),
('ID2513', '2020-04-18 13:47:58', '181925'),
('ID4234', '2020-04-18 08:58:08', '181925'),
('ID6290', '2020-04-23 14:32:34', '012'),
('ID6657', '2020-04-18 05:46:47', '181925'),
('ID9269', '2020-04-18 08:59:31', '181925');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
