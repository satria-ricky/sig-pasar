-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2021 pada 08.52
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_nama` varchar(255) DEFAULT NULL,
  `admin_alamat` varchar(255) DEFAULT NULL,
  `admin_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_nama`, `admin_alamat`, `admin_foto`) VALUES
(25, 'user2', 'user2', 'zaenalabidin', 'ampenan', 'WhatsApp_Image_2021-05-27_at_19_40_08.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasar`
--

CREATE TABLE `tb_pasar` (
  `pasar_id` int(11) NOT NULL,
  `pasar_nama` varchar(255) DEFAULT NULL,
  `pasar_alamat` varchar(255) DEFAULT NULL,
  `pasar_jam_buka` varchar(255) DEFAULT NULL,
  `pasar_jam_tutup` varchar(255) DEFAULT NULL,
  `pasar_foto` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `pasar_deskripsi` text DEFAULT NULL,
  `pasar_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasar`
--

INSERT INTO `tb_pasar` (`pasar_id`, `pasar_nama`, `pasar_alamat`, `pasar_jam_buka`, `pasar_jam_tutup`, `pasar_foto`, `latitude`, `longitude`, `pasar_deskripsi`, `pasar_status`) VALUES
(18, 'gor bulu tangkis warna agung', 'Gg. Hiu Putih, Kekalik Jaya, Kec. Sekarbela, Kota Mataram, Nusa Tenggara Bar. 83114', '09:00', '12:00', 'warna_agung.jpg', '-8.59299', '116.076694', NULL, 1),
(19, 'gor bulu tangkis bintang', 'Jl. KH. Ahmad Dahlan No.41B, Pagesangan, Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83116', '08:00', '12:00', 'bintang.jpg', '-8.60579', '116.101622', NULL, 1),
(20, 'Gor Garuda', 'Jl. Swasembada No.32, Kekalik Jaya, Kec. Sekarbela, Kota Mataram, Nusa Tenggara Bar. 83115', '08:00', '12:00', 'garuda.jpg', '-8.592392657\r\n', '116.0891263\r\n', NULL, 1),
(21, 'Gor bulu tangkis puriartha', 'Pagutan Bar., Kec. Mataram, Kota Mataram, Nusa Tenggara Bar. 83127', '10:00', '22:00', 'bt_default.jpg', '-8.605488583586792', '116.11161163065378', NULL, 1),
(22, 'Gor Batur Bulutangkis', 'Jl. Energi gang pogot karang buyuk, Ampenan Sel., Kec. Ampenan, Kota Mataram, Nusa Tenggara Bar. 83112', '10:00', '23:00', 'batur.jpg', '-8.577851086030648', '116.07433741719652', NULL, 1),
(23, 'Gelanggang pemuda loahraga', 'Jl. Pendidikan, Dasan Agung Baru, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83126', '08:00', '22:00', 'gelanggag.jpg', '-8.580995656878384', '116.08806265594296', NULL, 1),
(24, 'Gedung Bulutangkis Universitas Mataram', 'Jl. Brawijaya No.22, Cakranegara Sel. Baru, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83233', '08:00', '22:00', 'image_2021-05-27_232013.png', '-8.594361452369611', '116.14091866146562', NULL, 1),
(25, 'Lapangan bulu tangkis Putra Gora', 'Jl. Gora, Selagalas, Kec. Sandubaya, Kota Mataram, Nusa Tenggara Bar. 83237', '09:30', '22:00', 'gora.jpg', '-8.577798493834633', '116.14349962649526', NULL, 1),
(26, 'nama', 'alamat', '13:50', '18:54', 'default.jpg', '-8.5970915', '116.1004778', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `stts_id` int(11) NOT NULL,
  `stts_nama` varchar(255) DEFAULT NULL,
  `stts_mapicon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`stts_id`, `stts_nama`, `stts_mapicon`) VALUES
(1, 'Diverifikasi', 'mapicon_verif.png'),
(2, 'Tidak diverifikasi', 'mapicon_unverif.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_pasar`
--
ALTER TABLE `tb_pasar`
  ADD PRIMARY KEY (`pasar_id`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`stts_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_pasar`
--
ALTER TABLE `tb_pasar`
  MODIFY `pasar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `stts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
