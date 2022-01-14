-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2022 pada 12.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `langganan_tv_kabel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berlangganan`
--

CREATE TABLE `berlangganan` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_berlangganan` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berlangganan`
--

INSERT INTO `berlangganan` (`id_transaksi`, `tgl_berlangganan`, `total_bayar`, `id_pelanggan`, `id_paket`) VALUES
(1, '2021-12-15', 180000, 1, 1),
(2, '2021-12-15', 60000, 2, 3),
(3, '2021-12-17', 110000, 3, 4),
(4, '2021-12-18', 70000, 4, 6),
(8, '2022-01-04', 180000, 7, 1),
(23, '2022-01-12', 270000, 1, 2),
(24, '2022-01-12', 270000, 1, 1),
(25, '2022-01-12', 90000, 1, 2),
(26, '2022-01-12', 180000, 8, 1),
(27, '2022-01-12', 60000, 9, 3),
(28, '2022-01-14', 60000, 12, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `jumlah_channel` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `kode_paket`, `nama_paket`, `jumlah_channel`, `harga`, `gambar`, `keterangan`) VALUES
(1, 'F01', 'Family', 20, 180000, 'produk1640306007.jpg', 'FOXlife, FOXCRIME, FOX ACTION MOVIES, FOX FAMILY MOVIES, FOX MOVIES, NATIONAL GEOGRAPHIC CHANNEL, NAT GEO WILD, MY FAMILY, KOMPAS TV, KTV, ANTV, INDOSIAR, metro TV, SCTV, TRANS TV, TRANS 7, TV ONE, TVRI, NET. , RTV'),
(2, 'K01', 'Kids', 9, 90000, 'produk1640306025.jpg', 'Disney Channel, Cartoon Network, Boomerang, Disney Junior, Nickelodeon, Nick Jr., Da Vinci, Baby First, Duck TV'),
(3, 'LnF', 'Lifestyle Food', 6, 60000, 'produk1640305676.jpg', 'Kuliner TV, Asian Food Channel, Lifestyle Food, Nat. Geo People, Fashion TV, Outdoor Channel'),
(4, 'PD', 'Piala Dunia', 24, 110000, 'produk1640306305.jpg', 'beIN SPORTS, FOX SPORTS, FOXlife, FOX ACTION MOVIES, FOX MOVIES, FOX FAMILY MOVIES, FOXCRIME, FOX, tvN, Mighty TV, NATIONAL GEOGRAPHIC CHANNEL, NAT GEO WILD, KOMPAS TV, KTV, ANTV, INDOSIAR, metro TV, SCTV, TRANS TV, TRANS 7, TV ONE, TVRI, NET. , RTV'),
(5, 'OL', 'Olahraga', 15, 135000, 'produk1640306449.jpg', 'beIN SPORTS, FOX SPORTS, Mighty TV,  KOMPAS TV, KTV, ANTV, INDOSIAR, metro TV, SCTV, TRANS TV, TRANS 7, TV ONE, TVRI, NET. , RTV'),
(6, 'R01', 'Religi', 6, 70000, 'produk1640306713.jpeg', 'Al Quran Al Kareem, tv MU, TV9, Saling Sapa TV, U Channel, Pijar TV'),
(7, 'C01', 'Complete', 28, 200000, 'produk1640306893.jpg', 'beIN SPORTS, FOX SPORTS, Mighty TV, FOXlife, FOX, tvN, FOXCRIME, FOX ACTION MOVIES, FOX FAMILY MOVIES, FOX MOVIES, NATIONAL GEOGRAPHIC CHANNEL, NAT GEO WILD, MY FAMILY, MY CINEMA, KOMPAS TV, KTV, ANTV, INDOSIAR, metro TV, SCTV, TRANS TV, TRANS 7, TV ONE, TVRI, NET. , RTV, HBO, RCTI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `jk`, `alamat`, `telepon`) VALUES
(1, 'Ucup', 'L', 'Jln. Garuda', '081234567877'),
(2, 'Yuni', 'P', 'Jln. Melati', '081367456321'),
(3, 'Dito', 'L', 'Jln. Mawar', '082289763450'),
(4, 'Fafa', 'P', 'Jln. Merpati', '087845233239'),
(7, 'Hanifah', 'P', 'jakarta', '085235363412'),
(8, 'via', 'P', 'jakarta', '0842385623'),
(9, 'via', 'P', 'jakarta', '0832472834'),
(10, 'lulu', 'P', 'jkt', '0813768768'),
(11, 'delly', 'P', 'jkt', '082182712121'),
(12, 'yana', 'P', 'solo', '082130654657');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Ucup', 'ucup123', '$2y$10$83mg/yMMe0T0ABeRlr92PevaCbvM/G7F9Z0JhWtQTqhQ/po.CFntO'),
(2, 'Yuni', 'yuni', '$2y$10$qhdwo1WiETAIiYDv.EMHRu6QImP1g1MzMHj9OU4ZRvk8ma/QZS0oG'),
(3, 'Dito', 'dito', '$2y$10$SV.EZi6rqn9/5E.vzAfipeJli7Bf2S0Aw4jBHv9WS/2u1ayl0B6R6'),
(4, 'Fafa', 'fafa', '$2y$10$jsuGjJwg26OIRxyVzBLQ/u41esVLdvJ/MyPGhmraQhDr5L1Vy9kDS'),
(7, 'Hanifah', 'hani', '$2y$10$un3IFFILU90ZpAxKCdok8OvNIId4oP5EaoN2hQ7MW9AQFLBpjtFDu'),
(8, 'via', 'via', '$2y$10$A/bEsClF6qCYk9wvhHKkKetqRdAAmXT2x64/AFR9nmLyA.f7Ko.JO'),
(9, 'ani', 'ani', '$2y$10$/evb6RG/WuEuEbKL1kxOeet1i6vIuNlNlDvD7mSydMVtbz85oakSy'),
(10, 'lulu', 'lulu', '$2y$10$4mEx2yC7tdfG5HBUt4BD5epJkKQPBbmivukT9BvwxHXP9J.QLEoIa'),
(11, 'delly', 'delly_via', '$2y$10$kZkcR.gf/umBGQSW8OEaCeY8VPC6PneRJsgbTl8cnQbOsTH5fCHau'),
(12, 'yana', 'yana123', '$2y$10$ECvA084/aJxfb88CYd4jkegTKzMCBkZHaJn9oBAmiypYySDYaQeT6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berlangganan`
--
ALTER TABLE `berlangganan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`,`id_paket`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berlangganan`
--
ALTER TABLE `berlangganan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berlangganan`
--
ALTER TABLE `berlangganan`
  ADD CONSTRAINT `berlangganan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `berlangganan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
