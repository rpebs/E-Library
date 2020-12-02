-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 10:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `p_role`
--

CREATE TABLE `p_role` (
  `id_p_role` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_role`
--

INSERT INTO `p_role` (`id_p_role`, `role_name`, `created_at`) VALUES
(1, 'admin', '2020-11-14 14:30:38'),
(2, 'staff', '2020-11-14 14:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `t_acount`
--

CREATE TABLE `t_acount` (
  `id_account` int(11) NOT NULL,
  `id_p_role` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_acount`
--

INSERT INTO `t_acount` (`id_account`, `id_p_role`, `username`, `password`, `nama`, `no_hp`, `updated_at`, `created_at`) VALUES
(1, 1, 'admin', 'admin', 'Ramadhany', '083833116772', '2020-11-14 14:33:31', '2020-11-14 14:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE `t_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_anggota` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_anggota`
--

INSERT INTO `t_anggota` (`id_anggota`, `nama`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `no_anggota`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Firman Ardiansyah', 'Laki - Laki', 'Bangilan, Pasuruan', '1999-12-11', 'AB001', 'Aktif', '2020-11-14 16:38:29', '2020-11-18 04:30:34'),
(7, 'Haris', 'Laki - laki', 'Rejoso', '1999-11-11', 'AB002', 'Aktif', '0000-00-00 00:00:00', '2020-11-18 04:30:36'),
(9, 'Muhammad Iqbal', 'Laki - Laki', 'Pohjentrek Pasuruan', '1998-11-27', 'AB003', 'aktif', '2020-11-17 22:31:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kode_rak` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_buku`
--

INSERT INTO `t_buku` (`id_buku`, `judul`, `id_penerbit`, `tahun_terbit`, `id_kategori`, `gambar`, `id_penulis`, `harga`, `kode_rak`, `created_at`, `updated_at`) VALUES
(1, 'Sejarah Perkembangan Komputer', 1, 2018, 1, 'perkembangan_komputer.png', 1, 100000, 'R12', '2020-11-14 15:55:23', '2020-11-14 15:55:23'),
(27, 'Jago Matematika', 2, 2006, 2, 'matematika.jpg', 2, 120000, 'AB17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Naruto Volume 64', 2, 2018, 3, 'naruto.png', 2, 18000, 'AB10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_t_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`id_t_kategori`, `kategori`) VALUES
(1, 'Komputer'),
(2, 'Pendidikan'),
(3, 'Komik');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_pinjam` varchar(30) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status_pinjam` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`id_peminjaman`, `kode_pinjam`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `denda`, `status_pinjam`, `created_at`, `updated_at`) VALUES
(1, 'PJM001', 2, 1, '2020-11-16', '2020-11-17', 1000, 'Kembali', '0000-00-00 00:00:00', '2020-11-18 04:21:58'),
(2, 'PJM002', 7, 27, '2020-11-16', '2020-11-23', 0, 'Pinjam', '0000-00-00 00:00:00', '2020-11-18 04:19:14'),
(141, 'PJM003', 9, 28, '2020-11-18', '2020-11-25', 0, 'Pinjam', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_penerbit`
--

CREATE TABLE `t_penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `penerbit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_penerbit`
--

INSERT INTO `t_penerbit` (`id_penerbit`, `penerbit`) VALUES
(1, 'Sinar Mas'),
(2, 'Hendro Wang');

-- --------------------------------------------------------

--
-- Table structure for table `t_penulis`
--

CREATE TABLE `t_penulis` (
  `id_penulis` int(11) NOT NULL,
  `penulis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_penulis`
--

INSERT INTO `t_penulis` (`id_penulis`, `penulis`) VALUES
(1, 'Andianto'),
(2, 'Marco Fohan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_role`
--
ALTER TABLE `p_role`
  ADD PRIMARY KEY (`id_p_role`);

--
-- Indexes for table `t_acount`
--
ALTER TABLE `t_acount`
  ADD PRIMARY KEY (`id_account`),
  ADD KEY `fk_p_role` (`id_p_role`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_t_kategori` (`id_kategori`),
  ADD KEY `fk_t_penulis` (`id_penulis`),
  ADD KEY `fk_t_penerbit` (`id_penerbit`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_t_kategori`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_t_anggota` (`id_anggota`),
  ADD KEY `fk_t_buku` (`id_buku`);

--
-- Indexes for table `t_penerbit`
--
ALTER TABLE `t_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `t_penulis`
--
ALTER TABLE `t_penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_role`
--
ALTER TABLE `p_role`
  MODIFY `id_p_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_acount`
--
ALTER TABLE `t_acount`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_t_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `t_penerbit`
--
ALTER TABLE `t_penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_penulis`
--
ALTER TABLE `t_penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_acount`
--
ALTER TABLE `t_acount`
  ADD CONSTRAINT `fk_p_role` FOREIGN KEY (`id_p_role`) REFERENCES `p_role` (`id_p_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD CONSTRAINT `fk_t_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori` (`id_t_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_t_penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `t_penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_t_penulis` FOREIGN KEY (`id_penulis`) REFERENCES `t_penulis` (`id_penulis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `fk_t_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `t_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_t_buku` FOREIGN KEY (`id_buku`) REFERENCES `t_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
