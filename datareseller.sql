-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2021 pada 16.17
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datareseller`
--

CREATE TABLE `datareseller` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `toko` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datareseller`
--

INSERT INTO `datareseller` (`id`, `nama`, `nomor`, `email`, `toko`, `alamat`, `status`) VALUES
(1, 'Hana Ulfia', '089665898902', 'hanaulfia1612@gmail.com', 'Keibs Weebs', 'Tebet, Jakarta Selatan', 'Aktif'),
(5, 'Agnes Yemima ', '085397305061', 'agnesy1802@gmail.com', 'UROOTD', 'Kendari, Sulawesi Tenggara', 'Aktif'),
(6, 'Figo Muhammad Fabian', '081387735754', 'fmf2934@gmail.com', 'KochengUwU', 'Kwitang, Jakarta Pusat', 'Tdk Aktif'),
(7, 'Ayu Andini MH', '085712022620', 'ayuandini123@gmail.com', 'Stabs Crispy', 'Bandar Lampung', 'Tdk Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datareseller`
--
ALTER TABLE `datareseller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datareseller`
--
ALTER TABLE `datareseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
