-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2023 pada 11.11
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipeta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_transaksi`
--

CREATE TABLE `log_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `no_kursi` int(11) NOT NULL,
  `id_pwt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_transaksi`
--

INSERT INTO `log_transaksi` (`id_transaksi`, `tgl_transaksi`, `no_kursi`, `id_pwt`) VALUES
(27, '2023-06-30', 1, 1),
(28, '2023-06-30', 2, 1),
(29, '2023-06-30', 3, 1),
(30, '2023-06-30', 4, 1),
(31, '2023-06-30', 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_tiket`
--

CREATE TABLE `pesanan_tiket` (
  `id_pwt` int(11) NOT NULL,
  `nama_pwt` text NOT NULL,
  `kota_brkt` text NOT NULL,
  `tujuan` text NOT NULL,
  `tgl_brkt` date NOT NULL,
  `jam_brkt` time NOT NULL,
  `harga_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan_tiket`
--

INSERT INTO `pesanan_tiket` (`id_pwt`, `nama_pwt`, `kota_brkt`, `tujuan`, `tgl_brkt`, `jam_brkt`, `harga_tiket`) VALUES
(1, 'Boeing', 'Pati', 'Semarang', '2023-06-24', '02:30:00', 500000),
(2, 'gggg', 'Pati', 'Semarang', '2023-06-14', '22:55:00', 2147483647),
(3, 'Asia Jaya', 'Jakarta', 'Padang', '2002-01-05', '23:12:00', 30000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_transaksi`
--
ALTER TABLE `log_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `pesanan_tiket`
--
ALTER TABLE `pesanan_tiket`
  ADD PRIMARY KEY (`id_pwt`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_transaksi`
--
ALTER TABLE `log_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `pesanan_tiket`
--
ALTER TABLE `pesanan_tiket`
  MODIFY `id_pwt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
