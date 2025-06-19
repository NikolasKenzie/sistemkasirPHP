-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2025 pada 15.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restopro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`username`, `password`) VALUES
('herman', 'herman123'),
('sarah', 'sarah123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(200) DEFAULT NULL,
  `nama_menu` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `nama_menu`, `qty`, `total`) VALUES
(11, 'TRX202506182ADA2', 'Ayam Geprek', 3, 45000),
(12, 'TRX202506182ADA2', 'Es Teh', 3, 15000),
(13, 'TRX202506182ADA2', 'Bebek penyet', 1, 18000),
(14, 'TRX202506182ADA2', 'Jus Jeruk', 1, 5000),
(15, 'TRX202506184625C', 'Ayam Geprek', 3, 45000),
(16, 'TRX202506184625C', 'Nasi Goreng', 1, 15000),
(17, 'TRX202506184625C', 'Es Teh', 4, 20000),
(18, 'TRX20250618CC33F', 'Ayam Geprek', 4, 60000),
(19, 'TRX20250618CC33F', 'Nasi Goreng', 2, 30000),
(20, 'TRX20250618CC33F', 'Bebek penyet', 2, 36000),
(21, 'TRX20250618CC33F', 'Es Teh', 3, 15000),
(22, 'TRX20250618CC33F', 'Teh Tarik', 3, 18000),
(23, 'TRX202506182CE85', 'Ayam Geprek', 2, 30000),
(24, 'TRX202506182CE85', 'Teh Tarik', 2, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_menu`
--

CREATE TABLE `list_menu` (
  `ID` int(11) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` int(200) NOT NULL,
  `ketersediaan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `list_menu`
--

INSERT INTO `list_menu` (`ID`, `nama_menu`, `kategori`, `harga`, `ketersediaan`) VALUES
(1, 'Ayam Geprek', 'makanan', 15000, 1),
(2, 'Es Teh', 'minuman', 5000, 1),
(3, 'Bebek penyet', 'makanan', 18000, 1),
(4, 'Jus Jeruk', 'minuman', 5000, 1),
(5, 'Nasi Goreng', 'makanan', 15000, 1),
(7, 'Teh Tarik', 'minuman', 6000, 1),
(8, 'capcai', 'makanan', 20000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id_transaksi` varchar(200) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nama_kasir` varchar(50) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id_transaksi`, `tanggal`, `nama_kasir`, `total_harga`, `metode_pembayaran`) VALUES
('TRX202506182ADA2', '2025-06-18 12:34:00', 'herman', 83000, 'CASH'),
('TRX202506182CE85', '2025-06-18 13:23:17', 'sarah', 42000, 'CASH'),
('TRX202506184625C', '2025-06-18 13:13:28', 'herman', 80000, 'CASH'),
('TRX20250618CC33F', '2025-06-18 13:20:31', 'sarah', 159000, 'CASH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_pelanggan`
--

CREATE TABLE `ulasan_pelanggan` (
  `email` varchar(200) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `ulasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan_pelanggan`
--

INSERT INTO `ulasan_pelanggan` (`email`, `subjek`, `ulasan`) VALUES
('hendra123@gmail.com', 'Hendra', 'Makanan disini enak banget, sesuai sama harganya!\r\n'),
('kevin321@gmail.com', 'Kevin', 'Tempatnya enak buat nongki bareng temen\r\n'),
('angelica789@gmail.com', 'angelll', 'Tempatnya enak buat ngedate\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `list_menu`
--
ALTER TABLE `list_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `list_menu`
--
ALTER TABLE `list_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `riwayat_transaksi` (`id_transaksi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
