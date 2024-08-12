-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2023 pada 14.00
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_2407`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbadmin_2407`
--

CREATE TABLE `tbadmin_2407` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbadmin_2407`
--

INSERT INTO `tbadmin_2407` (`id_admin`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@a', 'admin'),
(2, 'nanda', 'nanda@a', '321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbarang_2407`
--

CREATE TABLE `tbbarang_2407` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `PG_Rating` varchar(3) NOT NULL,
  `harga_barang` int(8) NOT NULL,
  `stok_barang` int(3) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `cerita` text NOT NULL,
  `foto_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbbarang_2407`
--

INSERT INTO `tbbarang_2407` (`id_barang`, `nama_barang`, `PG_Rating`, `harga_barang`, `stok_barang`, `tanggal_rilis`, `cerita`, `foto_barang`) VALUES
(43, 'Spiderman-222222', '15+', 800000, 6, '2012-10-12', 'Superhero dengan kekuatan laba-laba', 'download.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbhistorybarang_2407`
--

CREATE TABLE `tbhistorybarang_2407` (
  `id_historyBarang` int(11) NOT NULL,
  `Aktivitas` varchar(10) NOT NULL,
  `detail_aktivitas` varchar(100) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `id_barang` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbhistorybarang_2407`
--

INSERT INTO `tbhistorybarang_2407` (`id_historyBarang`, `Aktivitas`, `detail_aktivitas`, `waktu`, `id_barang`, `id_admin`) VALUES
(25, 'create', 'Barang baru ditambahkan dengan ID: 43', '2023-11-03 09:36:33', 43, 1),
(26, 'update', 'Barang  dengan ID: 43 diupdate', '2023-11-03 09:39:49', 43, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbadmin_2407`
--
ALTER TABLE `tbadmin_2407`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbbarang_2407`
--
ALTER TABLE `tbbarang_2407`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbhistorybarang_2407`
--
ALTER TABLE `tbhistorybarang_2407`
  ADD PRIMARY KEY (`id_historyBarang`),
  ADD KEY `tbhistorybarang_2407_ibfk_2` (`id_barang`),
  ADD KEY `tbhistorybarang_2407_ibfk_1` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbadmin_2407`
--
ALTER TABLE `tbadmin_2407`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbbarang_2407`
--
ALTER TABLE `tbbarang_2407`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tbhistorybarang_2407`
--
ALTER TABLE `tbhistorybarang_2407`
  MODIFY `id_historyBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbhistorybarang_2407`
--
ALTER TABLE `tbhistorybarang_2407`
  ADD CONSTRAINT `tbhistorybarang_2407_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbadmin_2407` (`id_admin`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbhistorybarang_2407_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbbarang_2407` (`id_barang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
