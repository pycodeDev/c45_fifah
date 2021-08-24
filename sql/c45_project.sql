-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2021 pada 17.09
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c45_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2021-08-12-071244', 'App\\Database\\Migrations\\TbUsers', 'default', 'App', 1628782896, 1),
(3, '2021-08-13-172202', 'App\\Database\\Migrations\\TbData', 'default', 'App', 1628875624, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(20) NOT NULL,
  `nomor_trx` varchar(100) NOT NULL,
  `tanggal_jam` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `golongan` text NOT NULL,
  `job` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `rekomendasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_data`
--

INSERT INTO `tb_data` (`id`, `nomor_trx`, `tanggal_jam`, `instansi`, `nama`, `jk`, `umur`, `golongan`, `job`, `status`, `jumlah`, `rekomendasi`) VALUES
(1, 'M1010421-1471-0001', '4/1/2021 9:50', 'DOMPET DHUAFA RIAU', 'Pendonor 1', 'Pria', '49', 'A+', 'Lain-Lainnya', 'Ulang', 6, 'Pendonor Tetap'),
(2, 'M1010421-1471-0002', '4/1/2021 9:53', 'DOMPET DHUAFA RIAU', 'Pendonor 2', 'Pria', '25', 'O+', 'Lain-Lainnya', 'Ulang', 8, 'Pendonor Tetap'),
(3, 'M1010421-1471-0003', '4/1/2021 9:55', 'DOMPET DHUAFA RIAU', 'Pendonor 3', 'Pria', '46', 'O+', 'Lain-Lainnya', 'Baru', 40, 'Tidak Pendonor Tetap'),
(4, 'M1010421-1471-0004', '4/1/2021 9:57', 'DOMPET DHUAFA RIAU', 'Pendonor 4', 'Pria', '17', 'B+', 'Pelajar', 'Baru', 19, 'Tidak Pendonor Tetap'),
(5, 'M1010421-1471-0005', '4/1/2021 10:13', 'DOMPET DHUAFA RIAU', 'Pendonor 5', 'Pria', '40', 'A+', 'Wiraswasta', 'Ulang', 7, 'Pendonor Tetap'),
(6, 'M1010421-1471-0006', '4/1/2021 10:15', 'DOMPET DHUAFA RIAU', 'Pendonor 6', 'Pria', '23', 'O+', 'Tni', 'Baru', 7, 'Tidak Pendonor Tetap'),
(7, 'M1010421-1471-0007', '4/1/2021 10:16', 'DOMPET DHUAFA RIAU', 'Pendonor 7', 'Pria', '25', 'O+', 'Tni', 'Ulang', 14, 'Tidak Pendonor Tetap'),
(8, 'M1010421-1471-0008', '4/1/2021 11:04', 'DOMPET DHUAFA RIAU', 'Pendonor 8', 'Pria', '33', 'O+', 'Tni', 'Ulang', 1, 'Pendonor Tetap'),
(9, 'M1010421-1471-0009', '4/1/2021 11:07', 'DOMPET DHUAFA RIAU', 'Pendonor 9', 'Pria', '40', 'O+', 'Wiraswasta', 'Ulang', 1, 'Pendonor Tetap'),
(10, 'M1010421-1471-0010', '4/1/2021 11:08', 'DOMPET DHUAFA RIAU', 'Pendonor 10', 'Pria', '25', 'O+', 'Lain-Lainnya', 'Baru', 8, 'Tidak Pendonor Tetap'),
(11, 'M1010421-1471-0011', '4/1/2021 11:10', 'DOMPET DHUAFA RIAU', 'Pendonor 11', 'Pria', '25', 'A+', 'Wiraswasta', 'Ulang', 1, 'Pendonor Tetap'),
(12, 'M1010421-1471-0012', '4/1/2021 11:12', 'DOMPET DHUAFA RIAU', 'Pendonor 12', 'Pria', '30', 'B+', 'Lain-Lainnya', 'Baru', 2, 'Tidak Pendonor Tetap'),
(13, 'M1010421-1471-0013', '4/1/2021 11:25', 'DOMPET DHUAFA RIAU', 'Pendonor 13', 'Pria', '31', 'B+', 'Lain-Lainnya', 'Ulang', 25, 'Pendonor Tetap'),
(14, 'M1010421-1471-0014', '4/1/2021 11:27', 'DOMPET DHUAFA RIAU', 'Pendonor 14', 'Pria', '49', 'O+', 'Lain-Lainnya', 'Ulang', 2, 'Pendonor Tetap'),
(15, 'M1010421-1471-0015', '4/1/2021 11:28', 'DOMPET DHUAFA RIAU', 'Pendonor 15', 'Pria', '42', 'O+', 'Lain-Lainnya', 'Ulang', 2, 'Pendonor Tetap'),
(16, 'M1010421-1471-0016', '4/1/2021 11:31', 'DOMPET DHUAFA RIAU', 'Pendonor 16', 'Pria', '45', 'O+', 'Lain-Lainnya', 'Ulang', 3, 'Tidak Pendonor Tetap'),
(17, 'M1010421-1471-0017', '4/1/2021 11:38', 'DOMPET DHUAFA RIAU', 'Pendonor 17', 'Pria', '17', 'A+', 'Pelajar', 'Ulang', 8, 'Tidak Pendonor Tetap'),
(18, 'M1010421-1471-0018', '4/1/2021 11:45', 'DOMPET DHUAFA RIAU', 'Pendonor 18', 'Pria', '50', 'B+', 'Buruh', 'Ulang', 2, 'Pendonor Tetap'),
(19, 'M1010421-1471-0019', '4/1/2021 11:48', 'DOMPET DHUAFA RIAU', 'Pendonor 19', 'Pria', '30', 'O+', 'Tni', 'Ulang', 1, 'Tidak Pendonor Tetap'),
(20, 'M1010421-1471-0020', '4/1/2021 11:51', 'DOMPET DHUAFA RIAU', 'Pendonor 20', 'Pria', '46', 'O+', 'Buruh', 'Ulang', 4, 'Pendonor Tetap'),
(21, 'M1010421-1471-0021', '4/1/2021 11:53', 'DOMPET DHUAFA RIAU', 'Pendonor 21', 'Pria', '35', 'O+', 'Peg. Swasta', 'Ulang', 1, 'Pendonor Tetap'),
(22, 'M1010421-1471-0022', '4/1/2021 12:08', 'DOMPET DHUAFA RIAU', 'Pendonor 22', 'Pria', '39', 'O+', 'Wiraswasta', 'Baru', 1, 'Tidak Pendonor Tetap'),
(23, 'M1010421-1471-0023', '4/1/2021 12:12', 'DOMPET DHUAFA RIAU', 'Pendonor 23', 'Pria', '31', 'B+', 'Buruh', 'Baru', 1, 'Tidak Pendonor Tetap'),
(24, 'M1010421-1471-0024', '4/1/2021 12:14', 'DOMPET DHUAFA RIAU', 'Pendonor 24', 'Pria', '26', 'B+', 'Buruh', 'Ulang', 1, 'Tidak Pendonor Tetap'),
(25, 'M1010421-1471-0025', '4/1/2021 12:17', 'DOMPET DHUAFA RIAU', 'Pendonor 25', 'Pria', '42', 'B+', 'Buruh', 'Ulang', 1, 'Tidak Pendonor Tetap'),
(26, 'M1010421-1471-0026', '4/1/2021 12:30', 'DOMPET DHUAFA RIAU', 'Pendonor 26', 'Pria', '45', 'B+', 'Lain-Lainnya', 'Ulang', 2, 'Tidak Pendonor Tetap'),
(27, 'M1010421-1471-0027', '4/1/2021 12:34', 'DOMPET DHUAFA RIAU', 'Pendonor 27', 'Wanita', '21', 'B+', 'Mahasiswa', 'Baru', 6, 'Tidak Pendonor Tetap'),
(28, 'M1010421-1471-0028', '4/1/2021 12:38', 'DOMPET DHUAFA RIAU', 'Pendonor 28', 'Pria', '41', 'AB+', 'Wiraswasta', 'Ulang', 1, 'Tidak Pendonor Tetap'),
(29, 'M1010421-1471-0029', '4/1/2021 12:40', 'DOMPET DHUAFA RIAU', 'Pendonor 29', 'Pria', '53', 'A+', 'Wiraswasta', 'Baru', 2, 'Tidak Pendonor Tetap'),
(30, 'M1010421-1471-0030', '4/1/2021 12:41', 'DOMPET DHUAFA RIAU', 'Pendonor 30', 'Pria', '24', 'O+', 'Peg. Swasta', 'Baru', 5, 'Tidak Pendonor Tetap'),
(31, 'M1010421-1471-0031', '4/1/2021 12:43', 'DOMPET DHUAFA RIAU', 'Pendonor 31', 'Wanita', '22', 'A+', 'Mahasiswa', 'Ulang', 1, 'Tidak Pendonor Tetap'),
(32, 'M1010421-1471-0032', '4/1/2021 12:46', 'DOMPET DHUAFA RIAU', 'Pendonor 32', 'Wanita', '24', 'B+', 'Peg. Swasta', 'Baru', 1, 'Tidak Pendonor Tetap'),
(33, 'M1010421-1471-0033', '4/1/2021 12:49', 'DOMPET DHUAFA RIAU', 'Pendonor 33', 'Wanita', '23', 'B+', 'Mahasiswa', 'Ulang', 2, 'Pendonor Tetap'),
(34, 'M1040421-1471-0001', '4/4/2021 9:37', 'X-MOC PEKANBARU', 'Pendonor 34', 'Pria', '25', 'O+', 'Lain-Lainnya', 'Ulang', 5, 'Pendonor Tetap'),
(35, 'M1040421-1471-0002', '4/4/2021 9:42', 'X-MOC PEKANBARU', 'Pendonor 35', 'Wanita', '26', 'O+', 'Mahasiswa', 'Ulang', 3, 'Pendonor Tetap'),
(36, 'M1040421-1471-0003', '4/4/2021 9:48', 'X-MOC PEKANBARU', 'Pendonor 36', 'Pria', '25', 'O+', 'Lain-Lainnya', 'Ulang', 2, 'Tidak Pendonor Tetap'),
(37, 'M1040421-1471-0004', '4/4/2021 9:51', 'X-MOC PEKANBARU', 'Pendonor 37', 'Wanita', '25', 'AB+', 'Mahasiswa', 'Ulang', 1, 'Pendonor Tetap'),
(38, 'M1040421-1471-0005', '4/4/2021 9:55', 'X-MOC PEKANBARU', 'Pendonor 38', 'Wanita', '54', 'O+', 'Peg. Swasta', 'Ulang', 7, 'Pendonor Tetap'),
(39, 'M1040421-1471-0006', '4/4/2021 9:59', 'X-MOC PEKANBARU', 'Pendonor 39', 'Wanita', '32', 'B+', 'Peg. Negeri', 'Ulang', 1, 'Pendonor Tetap'),
(40, 'M1040421-1471-0007', '4/4/2021 10:04', 'X-MOC PEKANBARU', 'Pendonor 40', 'Pria', '45', 'A+', 'Peg. Swasta', 'Ulang', 4, 'Pendonor Tetap'),
(41, 'M1040421-1471-0008', '4/4/2021 10:07', 'X-MOC PEKANBARU', 'Pendonor 41', 'Wanita', '25', 'B+', 'Lain-Lainnya', 'Ulang', 2, 'Tidak Pendonor Tetap'),
(42, 'M1040421-1471-0009', '4/4/2021 10:09', 'X-MOC PEKANBARU', 'Pendonor 42', 'Pria', '45', 'A+', 'Lain-Lainnya', 'Ulang', 2, 'Tidak Pendonor Tetap'),
(43, 'M1040421-1471-0010', '4/4/2021 10:13', 'X-MOC PEKANBARU', 'Pendonor 43', 'Wanita', '26', 'O+', 'Wiraswasta', 'Ulang', 13, 'Pendonor Tetap'),
(44, 'M1040421-1471-0011', '4/4/2021 10:16', 'X-MOC PEKANBARU', 'Pendonor 44', 'Pria', '46', 'O+', 'Lain-Lainnya', 'Ulang', 5, 'Pendonor Tetap'),
(45, 'M1040421-1471-0012', '4/4/2021 10:21', 'X-MOC PEKANBARU', 'Pendonor 45', 'Pria', '48', 'B+', 'Lain-Lainnya', 'Ulang', 2, 'Pendonor Tetap'),
(46, 'M1040421-1471-0013', '4/4/2021 10:28', 'X-MOC PEKANBARU', 'Pendonor 46', 'Pria', '24', 'B+', 'Lain-Lainnya', 'Ulang', 2, 'Pendonor Tetap'),
(47, 'M1040421-1471-0014', '4/4/2021 10:35', 'X-MOC PEKANBARU', 'Pendonor 47', 'Pria', '40', 'O+', 'Peg. Negeri', 'Ulang', 2, 'Pendonor Tetap'),
(48, 'M1040421-1471-0015', '4/4/2021 10:36', 'X-MOC PEKANBARU', 'Pendonor 48', 'Wanita', '40', 'O+', 'Lain-Lainnya', 'Ulang', 3, 'Pendonor Tetap'),
(49, 'M1040421-1471-0016', '4/4/2021 10:40', 'X-MOC PEKANBARU', 'Pendonor 49', 'Wanita', '23', 'A+', 'Lain-Lainnya', 'Ulang', 2, 'Pendonor Tetap'),
(50, 'M1040421-1471-0017', '4/4/2021 10:42', 'X-MOC PEKANBARU', 'Pendonor 50', 'Pria', '30', 'B+', 'Peg. Swasta', 'Ulang', 3, 'Pendonor Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3 ', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
