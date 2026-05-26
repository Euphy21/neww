-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2026 pada 00.04
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
-- Database: `perpustakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `kategori`, `stok`) VALUES
(1, 'Laskar Pelangi', 'Andrea Hirata', 'Novel', 7),
(2, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Novel', 4),
(3, 'Filosofi Teras', 'Henry Manampiring', 'Pengembangan Diri', 6),
(4, 'Atomic Habits', 'James Clear', 'Pengembangan Diri', 8),
(5, 'Dunia Sophie', 'Jostein Gaarder', 'Filsafat', 3),
(6, 'Sebuah Seni untuk Bersikap Bodo Amat', 'Mark Manson', 'Pengembangan Diri', 5),
(7, 'A Brief History of Time', 'Stephen Hawking', 'Sains', 2),
(8, 'Negeri 5 Menara', 'Ahmad Fuadi', 'Novel', 5),
(9, 'Dasar-Dasar Teknik Informatika', 'Wahyu Setiawan', 'Teknologi', 3),
(10, 'Pengantar Jaringan Komputer', 'Melwin Syafrizal', 'Teknologi', 3),
(11, 'Sejarah Dunia yang Disembunyikan', 'Jonathan Black', 'Sejarah', 2),
(12, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', 'Keuangan', 6),
(13, 'Pulang', 'Tere Liye', 'Novel', 5),
(14, 'Perahu Kertas', 'Dee Lestari', 'Novel', 4),
(15, 'Kalkulus Edisi Sembilan', 'Dale Varberg', 'Pendidikan', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_user`, `id_buku`, `tgl_pengajuan`, `status`) VALUES
(1, 1, 2, '2026-05-26', 'kembali'),
(2, 1, 1, '2026-05-26', 'kembali'),
(3, 1, 9, '2026-05-26', 'kembali'),
(4, 1, 1, '2026-05-26', 'kembali'),
(5, 1, 9, '2026-05-26', 'dipinjam'),
(6, 1, 2, '2026-05-27', 'menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userr`
--

CREATE TABLE `userr` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `userr`
--

INSERT INTO `userr` (`id_user`, `username`, `password`, `nama_lengkap`, `role`) VALUES
(1, 'user', '-', '(Peminjam)', 'user'),
(2, 'admin', '123', 'Administrator', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `userr`
--
ALTER TABLE `userr`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
