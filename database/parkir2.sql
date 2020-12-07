-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2020 pada 04.36
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akses_admin`
--

CREATE TABLE `tb_akses_admin` (
  `username` varchar(50) NOT NULL,
  `jam_login` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akses_admin`
--

INSERT INTO `tb_akses_admin` (`username`, `jam_login`) VALUES
('Herman', '20:15'),
('Herman', '13:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_parkir`
--

CREATE TABLE `tb_daftar_parkir` (
  `kode` varchar(5) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `jenis` varchar(22) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `jam_masuk` varchar(9) NOT NULL,
  `status` varchar(2) NOT NULL,
  `jam_keluar` varchar(9) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daftar_parkir`
--

INSERT INTO `tb_daftar_parkir` (`kode`, `plat_nomor`, `jenis`, `merk`, `jam_masuk`, `status`, `jam_keluar`, `lokasi`, `keterangan`) VALUES
('EP104', 'BA 3451 GH', 'Motor', 'Yamaha', '20:00', '2', '20:01', 'Gedung F', ''),
('EP252', 'BA 7589 CV', 'Mobil', 'Honda', '20:00', '3', '', 'Auditorium', 'Warna Putih Hitam dengan Kenalpot racing'),
('EP496', 'BH 514 KO', 'Motor', 'Yamaha', '20:16', '3', '', 'Perpustakaan', 'Bunyi macam pesawat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`) VALUES
(11, 'Herman', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_daftar_parkir`
--
ALTER TABLE `tb_daftar_parkir`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
