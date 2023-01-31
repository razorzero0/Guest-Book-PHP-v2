-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2023 pada 06.24
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
-- Database: `gb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `bintang` tinyint(1) NOT NULL,
  `profile` varchar(122) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `username`, `komentar`, `bintang`, `profile`, `waktu`) VALUES
(214, 'admin', 'ljljjl', 1, '1674150288_4184.png', '25 January 2023, 20:21'),
(216, 'admin', 'jlj', 0, '1674150288_4184.png', '25 January 2023, 21:00'),
(217, 'admin', 'dsds', 0, '1674657611_7901.jpg', '26 January 2023, 11:59'),
(218, 'admin', 'dsdsd', 0, '1674657611_7901.jpg', '26 January 2023, 11:59'),
(220, 'admin', 'sa', 0, '1674657611_7901.jpg', '26 January 2023, 12:00'),
(221, 'admin', 'qqe', 0, '1674657611_7901.jpg', '26 January 2023, 12:01'),
(222, 'admin', 'qlejq', 0, '1674657611_7901.jpg', '26 January 2023, 12:01'),
(223, 'admin', 'qeqhe', 0, '1674657611_7901.jpg', '26 January 2023, 12:02'),
(224, 'admin', 'sasa', 0, '1674657611_7901.jpg', '26 January 2023, 12:02'),
(225, 'yayan', 'asS', 0, '1674709027_9879.png', '26 January 2023, 12:05'),
(226, 'yayan', 'sSA', 0, '1674709027_9879.png', '26 January 2023, 12:05'),
(227, 'yayan', 'SSD', 0, '1674709027_9879.png', '26 January 2023, 12:05'),
(228, 'yayan', 'AS', 0, '1674709027_9879.png', '26 January 2023, 12:06'),
(229, 'yayan', 'sa', 0, '1674709027_9879.png', '26 January 2023, 12:06'),
(230, 'yayan', 'adadjadkj', 0, '1674709027_9879.png', '26 January 2023, 12:06'),
(231, 'yayan', 'adaldja', 0, '1674709027_9879.png', '26 January 2023, 12:06'),
(232, 'yayan', 'ok', 0, '1674709027_9879.png', '26 January 2023, 12:06'),
(233, 'admin', 'da', 0, '1674657611_7901.jpg', '26 January 2023, 12:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jam_masuk` varchar(233) NOT NULL,
  `jam_keluar` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama`, `email`, `jam_masuk`, `jam_keluar`) VALUES
(47, 'yayan', 'jwacana@example.net', '2023-01-19T20:42', '2023-0'),
(48, 'yayan', 'jwacana@example.net', '2023-01-18T20:44', '2023-0'),
(49, 'yayan', 'jwacana@example.net', '2023-01-26T20:45', '2023-01-11T20:45'),
(50, 'yayan', 'jwacana@example.net', '2023-01-25T21:47', '2023-01-26T20:47'),
(51, 'yayan', 'jwacana@example.net', '2023-01-25 21:48', '2023-01-28T20:48'),
(52, 'yayan', 'jwacana@example.net', '2023-01-24  20:48', '2023-01-20T20:48'),
(53, 'rini', 'jwacana@example.net', '2023-01-26 20:49', '2023-01-20T20:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` char(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_Admin` tinyint(1) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `waktu_login` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `email`, `status`, `is_Admin`, `foto`, `password`, `waktu_login`) VALUES
(92, 'Admin', 'admin', 'admin@gmailcom', 1, 1, '1674657611_7901.jpg', '202cb962ac59075b964b07152d234b70', '2023-01-26 12:01:57.000000'),
(93, 'yayan', 'yayan', 'muhainun059@gmail.com', 1, 0, '1674709027_9879.png', 'ccbf0a5c0f14f09a68076c4804296a62', '2023-01-26 12:01:20.000000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
