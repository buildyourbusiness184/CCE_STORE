-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2024 pada 16.45
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'radit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(2) NOT NULL,
  `nama_kota` varchar(60) NOT NULL,
  `tarif` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jabodetabek', 10000),
(2, 'Luar Jabodetabek (Jawa)', 18000),
(3, 'Luar Jawa (Sumatra, Kalimantan, Bali, Sulawesi)', 33000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(2) NOT NULL,
  `email_pelanggan` varchar(25) NOT NULL,
  `password_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `telepon_pelanggan` varchar(12) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `foto_pelanggan` varchar(50) NOT NULL,
  `code` varchar(225) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `foto_pelanggan`, `code`, `status`) VALUES
(1, 'test@gmail.com', 'test', 'Agung Jaya', '8911090128', 'Jln. Mentang Tn. Abang, Jakarta Pusat', '20190822080036people1.jpg', '0', 0),
(2, 'jokoprasetyo@gmail.com', 'jokoprasetyo', 'Joko Prasetyo', '08580901282', '', '20190822094656people9.jpg', '0', 0),
(3, 'annisa@yahoo.com', 'annisa', 'Annisa Hasanah', '8560901290', 'Jln. Situbundo', '20190818110636people8.jpg', '0', 0),
(4, 'sanjaya@gmail.com', 'sanjaya', 'Sanjaya', '08120909088', 'Jln.Timun No.28, Jakarta Timur', '20190818121907people4.jpg', '0', 0),
(5, 'test123@gmail.com', 'koko0909', 'radit', '089523664013', 'pdg', '202307301505141673319695683.jpg', '0', 0),
(6, 'radit@gmail.com', 'radit123', 'radit', '089523664013', 'Perumahan pondok lakah permai', '20230816103457736080.jpg', '0', 0),
(7, 'radityadwi@gmail.com', '111', 'raditya', '089523664013', 'Perumahan pondok lakah', '20230816103617736079.jpg', '0', 0),
(8, 'astuti@gmail.com', 'astuti', 'astuti', '089523664013', 'jalan dimana aja', '20230821103118736079.jpg', '0', 0),
(9, 'aris@gmail.com', '123', 'aris', '089611127564', 'Perumahan A', '20230829090126---------- ----------_s Instagram po', '0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(2) NOT NULL,
  `id_pembelian` int(2) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `jumlah` int(7) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 2, 'Agung', '', 0, '2019-08-22', '20190822080605'),
(2, 3, 'Annisa', 'BNI', 68, '2019-10-18', '20191018062055full-image3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(2) NOT NULL,
  `id_pelanggan` int(2) NOT NULL,
  `id_ongkir` int(2) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(7) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `tarif` int(7) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(20) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 4, 1, '2019-08-22', 75000, 'Jabodetabek', 10000, 'Jln. Sukamaju No.27, RT.06/01 Jakarta Timur', 'pending', ''),
(2, 1, 0, '2019-08-22', 120000, '', 0, 'Jln.Merdeka Barat No.8, RT.08/01, Jakarta Pusat', '', ''),
(3, 3, 2, '2019-08-22', 68000, 'Luar Jabodetabek (Jawa)', 18000, 'Jln. Situbundo Kec. Wangesan No. 90, RT.08/02 Pos. 18976, Jawa Timur', '', ''),
(4, 3, 2, '2019-08-25', 83000, 'Luar Jabodetabek (Jawa)', 18000, 'Jln. Jakarta', 'pending', ''),
(5, 1, 1, '2020-09-11', 60000, 'Jabodetabek', 10000, 'Jl. Bambu Kuning No.17', 'pending', ''),
(6, 1, 0, '2023-07-13', 15000, '', 0, 'ahuahsuah', 'pending', ''),
(7, 1, 0, '2023-07-13', 15000, '', 0, 'asian', 'pending', ''),
(8, 1, 0, '2023-07-13', 15000, '', 0, 'kansna', 'pending', ''),
(9, 1, 0, '2023-07-13', 15000, '', 0, 'wfwefw', 'pending', ''),
(10, 4, 1, '2023-08-13', 25000, 'Jabodetabek', 10000, 'liwjeiofwefniolj', 'pending', ''),
(11, 8, 1, '2023-08-21', 25000, 'Jabodetabek', 10000, 'dimana aja', 'pending', ''),
(12, 8, 0, '2023-08-21', 30000, '', 0, 'jlan dimana', 'pending', ''),
(13, 8, 1, '2023-08-21', 40000, 'Jabodetabek', 10000, 'jlana', 'pending', ''),
(14, 8, 1, '2023-08-21', 25000, 'Jabodetabek', 10000, 'welkfhnieowjfioaw', 'pending', ''),
(15, 7, 0, '2023-08-22', 15000, '', 0, '5yw4tw354t34t34w', 'pending', ''),
(16, 7, 1, '2023-08-22', 25000, 'Jabodetabek', 10000, 'ereart34efert34', 'pending', ''),
(17, 7, 1, '2023-08-24', 25000, 'Jabodetabek', 10000, 'awefwewefwaef', 'pending', ''),
(18, 7, 1, '2023-08-24', 25000, 'Jabodetabek', 10000, 'wefwer3wrwef34wr', 'pending', ''),
(19, 7, 1, '2023-08-29', 40000, 'Jabodetabek', 10000, 'perumahan A', 'pending', ''),
(20, 7, 1, '2023-08-29', 40000, 'Jabodetabek', 10000, 'jjj', 'pending', ''),
(21, 7, 1, '2023-08-29', 40000, 'Jabodetabek', 10000, 'perumahan A', 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(2) NOT NULL,
  `id_pembelian` int(2) NOT NULL,
  `id_produk` int(2) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `harga` int(7) NOT NULL,
  `berat` int(3) NOT NULL,
  `subberat` int(3) NOT NULL,
  `subharga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 2, 1, 'Celana Jeans Oshkosh', 65000, 125, 125, 65000),
(2, 2, 3, 1, 'Tshirt Champion men [Abu-abu]', 120000, 200, 200, 120000),
(3, 3, 1, 1, 'Jaket Oldnavy', 50000, 125, 125, 50000),
(4, 4, 2, 1, 'Celana Jeans Oshkosh', 65000, 125, 125, 65000),
(5, 5, 1, 1, 'Jaket Oldnavy', 50000, 125, 125, 50000),
(6, 6, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(7, 7, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(8, 8, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(9, 9, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(10, 10, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(11, 11, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(12, 12, 5, 2, 'Sabun Cair', 15000, 1000, 2000, 30000),
(13, 13, 5, 2, 'Sabun Cair', 15000, 1000, 2000, 30000),
(14, 14, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(15, 15, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(16, 16, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(17, 17, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(18, 18, 5, 1, 'Sabun Cair', 15000, 1000, 1000, 15000),
(19, 19, 14, 1, 'sabun lantai', 30000, 1000, 1000, 30000),
(20, 20, 14, 1, 'sabun lantai', 30000, 1000, 1000, 30000),
(21, 21, 14, 1, 'sabun lantai', 30000, 1000, 1000, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(2) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(7) NOT NULL,
  `berat_produk` int(3) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(3) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `warna`) VALUES
(14, 'sabun lantai', 30000, 1000, '3 (2).jpg', '    Sabun untuk pembersih lantai', 197, 'hijau');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
