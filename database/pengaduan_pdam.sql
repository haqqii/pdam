-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2021 pada 12.44
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_pdam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemutusan`
--

CREATE TABLE `pemutusan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_sambungan` bigint(20) NOT NULL,
  `rek_bulanan` varchar(50) NOT NULL,
  `angsuran` bigint(20) NOT NULL,
  `biaya_pembukaan` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemutusan`
--

INSERT INTO `pemutusan` (`id`, `id_pelanggan`, `alamat`, `no_sambungan`, `rek_bulanan`, `angsuran`, `biaya_pembukaan`, `keterangan`, `tanggal`, `petugas`, `status`) VALUES
(1, 'Indra', 'Surakarta', 12345, '500000', 100000, 200000, 'nunggak', '2021-07-23', 'Bagas', 'Selesai'),
(2, 'Kusuma', 'Jalan Merak', 1234567, '500000', 100000, 200000, 'nunggak 2 bulan', '2021-07-23', 'Bagas', 'Pending'),
(3, 'Badriah', 'Jalan Merpati Gang 1 depan masjid', 1, '75.000', 120, 0, 'Diputus karena rumah tidak dihuni', '2021-07-28', 'Bagas', 'Pending'),
(4, 'Samsul Huda', 'Jalan Kusuma Negara No 10', 100100, '60.000', 170, 0, 'Diputus sambungan karena permintaan pelanggan', '2021-07-28', 'amir', 'Proses'),
(5, 'Sastra', 'Perum Made Indah Karya Blok Melati B10', 110008, '100.000', 50, 0, 'Atas permintaan pelanggan', '2021-07-29', 'amir', 'Selesai'),
(6, 'aji', 'jl gajah mada no 98 surabaya', 0, '100.000', 50, 0, 'atas permintaan pelanggan', '2021-07-29', 'amir', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `kode`, `id_user`, `alamat`, `nohp`, `jenis`, `tanggal`, `deskripsi`, `foto`, `status`, `petugas`) VALUES
(36, 'PGDM-210724-040527', 'Juminah', 'Jalan Ayam', '09090909', 'Air Keruh', '2021-07-24', 'Air keruh', '', 'Selesai', 'Amir'),
(37, 'PGDM-210724-040652', 'Michael', 'Jalan Ganas', '08080808', 'Pemakaian', '2021-07-24', 'Pemakaian kurang', '', 'Pending', 'Amir'),
(38, 'PGDM-210724-041623', '26', '085864518811', '', 'Meter', '2021-07-24', 'kurang meter', '', 'Pending', NULL),
(39, 'PGDM-210724-041730', 'Riska', '085864518811', '', 'Kebocoran', '2021-07-24', 'bocor di bagian pipa', '', 'Pending', NULL),
(40, 'PGDM-210727-020154', 'Riska', '085864518811', '', 'Kebocoran', '2021-07-27', 'bcr', '', 'Proses', 'Sinyo'),
(41, 'PGDM-210727-022217', 'Azam', 'Jl. Sariasih Blok 8 No 100', '081776899078', 'Kebocoran', '2021-07-27', 'Keboran pipa saluran PDAM sejak 3 hari lalu', '', 'Selesai', 'Sinyo'),
(42, 'PGDM-210728-033345', 'Hasanah', 'Jl. Anggrek Blok Flaymboyan B-13', '0830009111', 'Meter', '2021-07-28', 'meteran tidak sesuai dengan pemakaian, sehingga harus membayar mahal padahal pemakaian seperlunanya. Harap di tangani dengan cepat', '', 'Pending', 'Amir'),
(43, 'PGDM-210728-034845', 'Hasanah', 'Perumahan Bukit Permai Blok. Halo No. 18', '09876666', 'Air Keruh', '2021-07-28', 'air keruh sudah 2 bulan', '', 'Proses', 'Sinyo'),
(44, 'PGDM-210728-051320', 'Air Azami', '0987656544445', '', 'Tidak Dapat Air', '2021-07-28', 'air yang mengalir sedikit tidak bisa kencang mengalirnya', '', 'Pending', NULL),
(45, 'PGDM-210728-051554', 'Air Azami', '0987656544445', '', 'Air Keruh', '2021-07-28', 'air keruh sudah 2 minggu dan berbau tanah yang tercamput lumpur', '', 'Proses', 'Sinyo'),
(46, 'PGDM-210728-051628', 'Air Azami', '0987656544445', '', 'Kebocoran', '2021-07-28', 'kebocoran pipa saluran air pdam ', '', 'Selesai', 'Sinyo'),
(47, 'PGDM-210729-043924', 'Air Azami', 'Jl Setra Duta Blok Perisa No B-17', '0987656544445', 'Meter', '2021-07-29', 'meteran tidak sesuai dengan pemakaian sehari hari', '', 'Selesai', 'Sinyo'),
(48, 'PGDM-210729-052402', 'Yono', 'Jl. Kartanegara No 1', '081818738900', 'Air Keruh', '2021-07-29', 'air keruh sudah 2 minggu dan bau ', '', 'Selesai', 'Sinyo'),
(49, 'PGDM-210729-073844', 'Tirta', 'JL. Merdeka No 20', '08562638867', 'Kebocoran', '2021-07-29', 'Kebocoran pipa saluran air pdam di depan gang maju mundur', '', 'Selesai', 'Sinyo'),
(50, 'PGDM-210729-082152', 'iin', 'Jalan kenanga', '09988777', 'Air Keruh', '2021-07-29', 'sudah 1 minggu air keruh dan bau', '', 'Selesai', 'Sinyo'),
(51, 'PGDM-210730-031502', 'Miya', 'Jl. Pajajaran No 7', '08111190', 'Air Keruh', '2021-07-30', 'air keruh sudah 1 minggu lebih dan berlumpur', '', 'Selesai', 'Sinyo'),
(52, 'PGDM-210730-031715', 'Miya', 'Jl. Pajajaran No 7', '08111190', 'Air Keruh', '2021-07-30', 'air keruh sudah 1 minggu dan ada lumpur di campuran air', '', 'Selesai', 'Sinyo'),
(53, 'PGDM-210730-035355', 'Hari', 'Jalan Mangga', '09999', 'Kebocoran', '2021-07-30', 'kebocoran pipa saluran air', '', 'Selesai', 'Sinyo'),
(54, 'PGDM-210730-035857', 'zamro', 'Jl Setrasari no 1', '09999', 'Meter', '2021-07-30', 'meteran tidak sesuai dengan pemakaian', '', 'Selesai', 'Sinyo'),
(55, 'PGDM-210801-045306', 'Miya', 'Jl. Pajajaran No 7', '08111190', 'Air Keruh', '2021-08-01', 'sudah 2 minggu air keruh', '', 'Proses', 'Sinyo'),
(56, 'PGDM-210801-051454', 'Miya', 'Jl. Pajajaran No 7', '08111190', 'Kebocoran', '2021-08-01', 'pipa air pdam bocor di depan rumah', '', 'Pending', 'Sinyo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sambung_kembali`
--

CREATE TABLE `sambung_kembali` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_sambungan` bigint(20) NOT NULL,
  `rek_bulanan` varchar(50) NOT NULL,
  `angsuran` bigint(20) NOT NULL,
  `biaya_pembukaan` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sambung_kembali`
--

INSERT INTO `sambung_kembali` (`id`, `id_pelanggan`, `alamat`, `no_sambungan`, `rek_bulanan`, `angsuran`, `biaya_pembukaan`, `tanggal`, `status`, `petugas`) VALUES
(1, 'Danty Nur', 'Jl Arjuna No 77 Gg Langgar ', 1, '100.000', 50, 0, '2021-07-27', 'Pending', ''),
(2, 'Cipto', 'Jl. Veteran No. 10 Lamongan', 2, '213.000', 50, 0, '2021-07-27', 'Pending', ''),
(3, 'Sapto', 'Jl. Kusuma Negara No. 10', 1, '200.000', 150, 0, '2021-07-28', 'Pending', ''),
(4, 'jojo', 'jalan mangga', 0, '100.000', 50, 100, '2021-07-29', 'Pending', 'Hasan'),
(5, 'Dio', 'Jl. Veteran No 4', 0, '100.000', 50, 100, '2021-07-30', '', 'Hasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindak_lanjut`
--

CREATE TABLE `tindak_lanjut` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_pemutusan` int(11) NOT NULL,
  `tgl_dikerjakan` date NOT NULL,
  `tgl_selesai` text NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tindak_lanjut`
--

INSERT INTO `tindak_lanjut` (`id`, `id_pelanggan`, `id_pengaduan`, `id_pemutusan`, `tgl_dikerjakan`, `tgl_selesai`, `keterangan`) VALUES
(13, 'Indra', 0, 1, '2021-07-23', '2021-07-24', ''),
(14, 'Juminah', 36, 0, '2021-07-24', '2021-07-24', ''),
(15, 'Azam', 41, 0, '2021-07-27', '2021-07-27', ''),
(16, 'Riska', 40, 0, '2021-07-27', '0000-0-0', ''),
(17, 'Hasanah', 43, 0, '2021-07-28', '0000-0-0', ''),
(18, 'Samsul Huda', 0, 4, '2021-07-28', '2021-07-29', ''),
(19, 'Air Azami', 47, 0, '2021-07-29', '2021-07-29', ' metaran kurang akurat'),
(20, 'Sastra', 0, 5, '2021-07-29', '2021-07-29', ''),
(21, 'Yono', 48, 0, '2021-07-29', '2021-07-29', ''),
(22, 'Air Azami', 46, 0, '2021-07-29', '2021-07-29', ''),
(23, 'Tirta', 49, 0, '2021-07-29', '2021-07-29', ''),
(24, 'iin', 50, 0, '2021-07-29', '2021-07-29', ''),
(25, 'aji', 0, 6, '2021-07-29', '2021-07-29', ''),
(26, 'Air Azami', 45, 0, '2021-07-29', '0000-0-0', ''),
(27, 'Miya', 51, 0, '2021-07-30', '2021-07-30', NULL),
(28, 'Miya', 52, 0, '2021-07-30', '2021-07-30', ' saluran air terdapat gumpalan lumpur sehingga air keruh'),
(29, 'Hari', 53, 0, '2021-07-30', '2021-07-30', ' pipa saluran air pdam penuh sehingga bocor'),
(30, 'zamro', 54, 0, '2021-07-30', '2021-07-30', ' meteran rusak'),
(31, 'jojo', 0, 4, '2021-07-30', '0000-0-0', NULL),
(32, 'Miya', 55, 0, '2021-08-01', '0000-0-0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_sambungan` int(11) NOT NULL DEFAULT '0',
  `nohp` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) DEFAULT '0',
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `no_sambungan`, `nohp`, `address`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(25, 'Sinyo', 'petugas_lapangan', 'sinyo73@gmail.com', 0, '085864518811', 'Jl. Brawijaya Gg III', '', '$2y$10$lDGcPInuw35FmQKiOhf5p.9..X8i9Hpr5.Xge6X.MKuKJZs0c1R4m', 2, 1, 1625487105),
(26, 'Riska', 'pelanggan', 'riska@gmail.com', 112233, '085864518811', 'Jl. Brawijaya Gg III', '', '$2y$10$vBS/NbtEfbUsUlmR8zrZnOjx1Pbfb6jrKxzO0D/5zNFFuVP6HbXKG', 3, 1, 1627435826),
(27, 'Yunita Kabag Langganan', 'kabag_langganan', 'yunita@gmail.com', 0, '085864518811', 'Jl. Brawijaya Gg III', '', '$2y$10$avySSLsJMUkywNuj469Qdero03T.2OaEcADbaHuUiHqYAWsQIlBYW', 4, 1, 1625487139),
(28, 'Syahrul Direktur', 'direktur', 'sahrul@gmail.com', 0, '085864518811', 'Jl. Brawijaya Gg III', '', '$2y$10$3YeqRvc6dUkYSj2/dXU0IOakvp4hneetJBZ9CQfJ/C4oZRd37rTo.', 5, 1, 1625671084),
(30, 'Mahmud', 'pelanggan_baru', 'mahmud@gmail.com', 0, '085864518811', 'Jl. Brawijaya Gg III', '', '$2y$10$jppvHkUrEqI.0HDEIBdVVOgt7elEL2jYryaTAwVaVqlBdD5PWbbBe', 3, 1, 1627435775),
(31, 'Petugas Langganan', 'admin', 'jeny@gmail.com', 0, '085864518811', 'Jl. Brawijaya Gg III', '', '$2y$10$M983yJEMJI1l7lEjPQTzZ.QmEj2YQA9H/NKiiFDsCjo4HjosLiO56', 1, 1, 1625991678),
(32, 'Pelanggan Lagi', 'pelanggan2', 'pelanggan@g.com', 123321123, '098989898989', 'jalan alamat', '', '$2y$10$cNrL.z71OX9KaOxOqkz4tu5AvudacFyDxT/H/uV50Vr5ahjYbSbZS', 3, 1, 1627435998),
(33, 'Jihad', 'jihad', 'jidah@gmail.com', 0, '09098989', 'Sukabumi', '', '$2y$10$HL/XQ/0MFhEGN4cI8HZD2.UcJYuDSWfcO9.h.1bNpBTVFOxrtntgu', 3, 1, 1627436006),
(34, 'Oktavia Yunita Rahmawati', 'oktaviayr', 'oktaviayunita@gmail.com', 1, '08080808', 'Jl. Panglima Sudirman', '', '$2y$10$hKAShYUK1Pwho4AtiNl/FeNUbnJhDkYovT0ooQtQm7Y5KlRIWL3Uu', 3, 1, 1627435866),
(36, 'amir', 'petugas2', 'amir@gmail.com', 0, '085577889933', 'Jalan Kenari', '', '$2y$10$JbN1vR3lARgR7HGt2i.afua9WTSLKePB4DZ0jI9YnGTvZZfZW4SZy', 2, 1, 1627033673),
(37, 'Yuhanda Adam', 'yuhanda', 'yuhanda11@gmail.com', 0, '081776899078', 'Jl. Sariasih Blok 8 No 100', '', '$2y$10$Bgdy29H.VL7vT2yN1tQgCu43lZaA1E0csSavQJm1pvtR1jGHrg5aq', 3, 1, 1627435899),
(38, 'Ahmad Adi', 'ahmad', 'ahmadadi@gmail.com', 1, '08111190', 'Jl Cendrawasih No 110', '', '$2y$10$zzgVZI5/N4s0YkD8R3utuONjbkECZI5RsWAp89s4Gj7fTRn/QrtRW', 3, 1, 1627435963),
(40, 'Tirta', 'tirta', 'tirtagaluh@gmail.com', 0, '08562638867', 'JL. Merdeka No 20', '', '$2y$10$ujGHymF72nQFuXqkOZQQuOgNnxgWbAS3yksjlAaLyjuOmvlQxPQlm', 3, 1, 1627537099),
(41, 'iin', 'iin', 'iin@gmail.com', 0, '09988777', 'Jalan kenanga', '', '$2y$10$XjJfDe0HKAkodhjt4o.rle4Zu50Nre.eoUmxAsadV2QQ4JTu1Kope', 3, 1, 1627539700),
(42, 'Miya', 'miya', 'miya@gmail.com', 0, '08111190', 'Jl. Pajajaran No 7', '', '$2y$10$PvJfvN6w4jYdfDOwdlvCqeR8xmS1JHZ.RzBb7L7.ZDYOF0UU5fg4q', 3, 1, 1627607695),
(43, 'Ani', 'ani', 'ani@gmailcom', 11, '097777', 'Jl. Sariasih Blok 3', '', '$2y$10$Wgt72v7Fo1XUaqCFo8cLgeU7HIggJF7IyaufnCFrP8GUeEr2hDQsi', 3, 1, 1627609969),
(44, 'zamro', 'zamro', 'zamroh11@gmail.com', 0, '09999', 'Jl Setrasari no 1', '', '$2y$10$OCpoqPzDPcluLjyIZpE./uIHfOvzzF8pyBxYhWlLcfxGKVAV0gWVy', 3, 1, 1627610323),
(46, 'pelanggan', 'pelanggan', 'pelanggan@yahoo.com', 0, '09999', 'Jl. Padjajaran No 7', '', '$2y$10$AyzazDKwm.OYEumiksXM5ezRFdDs6QkkCmm3q4b9nW8J2hvSVu//a', 3, 1, 1627829406);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 15),
(2, 1, 1),
(3, 1, 2),
(4, 3, 3),
(5, 3, 4),
(6, 2, 5),
(7, 2, 6),
(8, 5, 7),
(9, 5, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Menu Admin'),
(3, 'Pelanggan'),
(4, 'Menu Pelanggan'),
(5, 'Petugas Lapangan'),
(6, 'Menu Petugas Lapangan'),
(7, 'Direktur'),
(8, 'Menu Direktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Petugas Langganan (admin)'),
(2, 'Petugas Lapangan'),
(3, 'Pelanggan'),
(4, 'Kabag Langganan'),
(5, 'Direktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fa fa-tachometer-alt', 1),
(2, 2, 'Kelola User', 'admin/kelola_user', 'fa fa-users', 1),
(3, 2, 'Kelola Pelanggan', 'admin/kelola_pelanggan', 'fa fa-users', 1),
(4, 2, 'Kelola Pengaduan', 'admin/kelola_pengaduan', 'fa fa-book', 1),
(5, 2, 'Monitoring Pengaduan', 'admin/monitoring_pengaduan', 'fa fa-desktop', 1),
(6, 2, 'Kelola Tindak Lanjut', 'admin/kelola_tindak_lanjut', 'fa fa-network-wired', 1),
(7, 3, 'Dashboard', 'pelanggan', 'fa fa-tachometer-alt', 1),
(8, 4, 'Pengaduan', 'pelanggan/pengaduan', 'fa fa-book', 1),
(9, 4, 'Montoring Pengaduan', 'pelanggan/monitoring_pengaduan', 'fa fa-desktop', 1),
(10, 5, 'Dashboard', 'petugas_lapangan', 'fa fa-tachometer-alt', 1),
(11, 6, 'Monitoring Pengaduan', 'petugas_lapangan/monitoring_pengaduan', 'fa fa-desktop', 1),
(12, 6, 'Kelola Tindak Lanjut', 'petugas_lapangan/kelola_tindak_lanjut', 'fa fa-network-wired', 1),
(14, 7, 'Dashboard', 'direktur', 'fa fa-tachometer-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemutusan`
--
ALTER TABLE `pemutusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `sambung_kembali`
--
ALTER TABLE `sambung_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tindak_lanjut`
--
ALTER TABLE `tindak_lanjut`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemutusan`
--
ALTER TABLE `pemutusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `sambung_kembali`
--
ALTER TABLE `sambung_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tindak_lanjut`
--
ALTER TABLE `tindak_lanjut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
