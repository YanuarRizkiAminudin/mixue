-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2024 pada 14.41
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
-- Database: `db_mixue`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_hp` int(25) NOT NULL,
  `kelamin` enum('P','L','','') NOT NULL,
  `alamat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `no_hp`, `kelamin`, `alamat`) VALUES
(4, 'rth', 8982229, 'P', 'sdf'),
(5, 'qwswdc', 8689, 'P', 'sxadc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`) VALUES
(1, 'Peach Earl Grey Tea', 10000),
(2, 'Original Jasmine Tea', 12000),
(3, 'Original Earl Grey Tea', 11000),
(4, 'Pearl Milk Tea', 16000),
(5, 'Lemon Jasmine Tea', 16000),
(6, 'Oats Milk Tea', 22000),
(7, 'Hawaiian Fruit Tea', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `variant` varchar(25) NOT NULL,
  `kuantitas` int(15) NOT NULL,
  `metode_pembayaran` varchar(25) NOT NULL,
  `subtotal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `harga_satuan`, `variant`, `kuantitas`, `metode_pembayaran`, `subtotal`) VALUES
(35, 'Original Jasmine Tea', 12000, 'Panas', 20, 'Bayar Cash', 240000),
(36, 'Lemon Jasmine Tea', 16000, 'Panas', 23, 'Transfer via KoPay', 368000),
(37, 'Oats Milk Tea', 22000, 'Dingin', 3, 'Transfer via KoPay', 66000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
