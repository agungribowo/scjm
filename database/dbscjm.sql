-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Agu 2018 pada 12.41
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbscjm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsumen`
--

CREATE TABLE `tbl_konsumen` (
  `id_konsumen` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL DEFAULT 'avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`id_konsumen`, `username`, `password`, `email`, `nama_depan`, `nama_belakang`, `alamat`, `kota`, `provinsi`, `kodepos`, `telp`, `foto`) VALUES
('KSM-001', 'dara', '2114039dcd33b8b0dbf4a36cc203f1f442f8c631', 'dara@gmail.com', 'Dara', 'Djatun', 'Jl. Pegangsaan', 'Bekasi', 'Jawa Barat', '17133', '081290520132', 'kana1.jpg'),
('KSM-002', 'nidaw', '1e639ae973f98e34cd8400bf93196ed9f652984c', 'nidaw@gmail.com', 'Nicholas', 'Mahardika', 'Jl. Kenangan', 'Bekasi', 'Jawa Barat', '17146', '081290520132', 'IM.png'),
('KSM-003', 'wadin', '24f8aa7bfb68f4c5cce3dbb4c6dfe13a4c6dc8c5', 'wadin@gmail.com', 'Wadin', 'Mahardika', 'Jl. Cikunir', 'Bekasi', 'Jawa Barat', '17146', '081290520132', ''),
('KSM-004', 'nicholas', '3b9de09f2ff76afe9f0ad4fcae4ff68f52ec7fc4', 'nidaw@gmail.com', 'Nidaw', 'Coy', 'Jl. Bodo Amat', 'Jakarta', 'DKI Jakarta', '17133', '081290521032', ''),
('KSM-005', 'agung', 'af61985fab499287e2e0608e71c8a4006a3c4a2c', 'agung@gmail.com', 'Agung', 'Ribowo', 'Jl. Bekasi', 'Bekasi', 'Jawa Barat', '17133', '081290521032', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `id_pemesanan` varchar(10) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bank` varchar(30) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `bukti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_pemesanan`, `tanggal_pembayaran`, `bank`, `no_rek`, `harga`, `bukti`) VALUES
('FP-0001', 'IV-0001', '2018-08-19', 'BCA', '4567575687678', 20000000, 'watchhh.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` varchar(10) NOT NULL,
  `id_konsumen` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `status` enum('Konfirmasi Pembayaran','Menunggu Konfirmasi','Disetujui','Ditolak') NOT NULL,
  `id_pengguna` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `id_konsumen`, `id_produk`, `tanggal_pemesanan`, `status`, `id_pengguna`) VALUES
('IV-0001', 'KSM-001', 'P0015', '2018-08-19', 'Disetujui', 'PGN-001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('Administrator','Pimpinan') NOT NULL,
  `foto` varchar(20) NOT NULL DEFAULT 'avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `username`, `password`, `nama`, `level`, `foto`) VALUES
('PGN-001', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin Coy', 'Administrator', 'avatar.jpg'),
('PGN-002', 'pimpin', 'f34150d4573703380ab0b3d610c554c91479c993', 'Pimpinan', 'Pimpinan', 'avatar.jpg'),
('PGN-003', 'wadin', '24f8aa7bfb68f4c5cce3dbb4c6dfe13a4c6dc8c5', 'Wadin', 'Administrator', 'me1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `gambar_produk` varchar(20) NOT NULL DEFAULT 'default.jpg',
  `keterangan_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `gambar_produk`, `keterangan_produk`) VALUES
('P0001', 'belt', 'Belt_Conveyor1.jpg', 'aluminjbghxcfxdz'),
('P0002', 'Baggage Conveyor', 'Baggage_Conveyor.jpg', 'Baggage Conveyor'),
('P0003', 'Aluminium Profile', 'Lighthouse1.jpg', 'Aluminium Profile'),
('P0004', 'Belt Conveyor Flat', 'Belt_Conveyor_flat.j', 'Belt Conveyor Flat'),
('P0005', 'Belt Conveyor 2', 'Belt_Conveyor2.jpg', 'Belt Conveyor 2'),
('P0006', 'Bottle Up Holder', 'Bottle_Up_Holder.jpg', 'Bottle Up Holder'),
('P0007', 'Conveyor Belt', 'Conveyor_Belt.jpg', 'Conveyor Belt'),
('P0008', 'Conveyor Minning', 'Conveyor_Mining.jpg', 'Conveyor Minning'),
('P0009', 'Flat Belt Conveyor', 'Flat_Belt_Conveyor.j', 'Flat Belt Conveyor'),
('P0010', 'Gravity Roller Conve', 'Gravity_Roller_Conve', 'Gravity Roller Conveyor'),
('P0011', 'Loading Conveyor', 'Loading_Conveyor.jpg', 'Loading Conveyor'),
('P0012', 'Power Roller COnveny', 'Power_Roller_Conveyo', 'Power Roller COnvenyor'),
('P0013', 'Roller Comveyor', 'Roller_Conveyor.jpg', 'Roller Comveyor'),
('P0014', 'Roller', 'Roller.jpg', 'Roller'),
('P0015', 'Screw Convenyor', 'screw_conveyor_2.jpg', 'Screw Convenyor'),
('P0016', 'Single Bucket', 'Single_Bucket.jpg', 'Single Bucket'),
('P0017', 'tokek', 'as11.png', 'asdmalksmd'),
('P0018', 'kecebong', 'netsh.PNG', 'asmdalksdmlasdasdasd'),
('P0019', 'oaskd', 'Chrysanthemum.jpg', 'alksmdklasd'),
('P0020', '1o2jmsald', 'Tulips.jpg', 'asdlkajsldkm'),
('P0021', 'alsdpokpo', 'Hydrangeas.jpg', 'poas,dpoa,sd'),
('P0022', 'ssasdas', 'Jellyfish.jpg', 'asdakmsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  ADD PRIMARY KEY (`id_konsumen`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_admin` (`id_pengguna`) USING BTREE;

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`) USING BTREE;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbl_pemesanan` (`id_pemesanan`);

--
-- Ketidakleluasaan untuk tabel `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD CONSTRAINT `tbl_pemesanan_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `tbl_konsumen` (`id_konsumen`),
  ADD CONSTRAINT `tbl_pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`),
  ADD CONSTRAINT `tbl_pemesanan_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
