-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 10:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dc_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsip`
--

CREATE TABLE `tb_arsip` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_box` int(11) NOT NULL,
  `id_map` int(11) NOT NULL,
  `no_arsip` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `jenis` varchar(150) NOT NULL,
  `size` varchar(50) NOT NULL,
  `viewer` int(11) NOT NULL,
  `downloader` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_arsip`
--

INSERT INTO `tb_arsip` (`id`, `id_user`, `id_kategori`, `id_divisi`, `id_ruang`, `id_rak`, `id_box`, `id_map`, `no_arsip`, `nama`, `deskripsi`, `file`, `jenis`, `size`, `viewer`, `downloader`, `status`, `created`) VALUES
(19, 100, 11, 16, 8, 6, 6, 5, 'ARSIP/IT/00012394/2023', 'DATA PENGAJUAN PROJECT ', 'PROJECT OPERASIONAL TAHUN 2023', 'arsip_ARSIPIT000123942023.pdf', 'pdf', '24', 2, 0, 1, '2023-04-12 23:09:08'),
(20, 100, 12, 23, 8, 6, 5, 6, 'ARSIP/IT/00012394/203243', 'surat perjanjian dan surat kontrak', 'surat perjanjian dan surat kontrak tahun 2023', 'arsip_ARSIPIT00012394203243.docx', 'doc', '144.91', 0, 0, 1, '2023-04-12 23:11:04'),
(21, 100, 12, 14, 8, 7, 7, 6, 'ARSIP/FINANCE/197194194', 'laporan keuangan.', 'laporan keuangan.', 'arsip_ARSIPFINANCE197194194.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:12:28'),
(22, 100, 12, 14, 9, 8, 8, 8, 'ARSIP/FINANCE/14147259', 'TAGIHAN MARKETING 2023', 'TAGIHAN MARKETING 2023', 'arsip_ARSIPFINANCE14147259.pdf', 'pdf', '24', 2, 0, 1, '2023-04-12 23:14:33'),
(23, 100, 14, 23, 9, 7, 7, 6, 'ARSIP/HRD/424242/2023', 'hasil penilaian pegawai', 'hasil penilaian pegawai', 'arsip_ARSIPHRD4242422023.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:15:28'),
(24, 96, 12, 13, 8, 7, 7, 6, 'arsip/wihan/220844', 'Laporan Project aplikasi absi 2023', 'Laporan Project aplikasi absi 2023', 'arsip_arsipwihan220844.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:17:09'),
(25, 96, 11, 13, 8, 7, 6, 6, 'arsip/wihan/1441/2023', 'Laporan Kinerja Tim IT', 'Laporan Kinerja Tim IT', 'arsip_arsipwihan14412023.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:17:52'),
(26, 97, 12, 15, 9, 7, 9, 8, 'ARSIP/EPRI/14814701', 'Laporan Pajak 2023', 'Laporan Pajak 2023', 'arsip_ARSIPEPRI14814701.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:20:06'),
(27, 97, 12, 15, 9, 7, 7, 7, 'ARSIP/EPRI/4686414/2023', 'Kontrak Kerjasama Mitra 2023', 'Kontrak Kerjasama Mitra 2023', 'arsip_ARSIPEPRI46864142023.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:20:50'),
(28, 1, 12, 17, 9, 6, 6, 6, 'ARSIP/MKT/144/2023', 'laporan Strategri pemasaran 2023', 'laporan Strategri pemasaran 2023', 'arsip_ARSIPMKT1442023.pdf', 'pdf', '24', 1, 0, 1, '2023-04-12 23:24:37'),
(29, 1, 13, 18, 9, 7, 6, 7, 'ARSIP/PROD/42847824/23', 'Data Master produksi 2023', 'Data Master produksi 2023', 'arsip_ARSIPPROD4284782423.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:25:42'),
(30, 1, 14, 19, 8, 6, 5, 5, 'ARSIP/LEGAL/143141/431', 'Data Akta Perusahaan original', 'Data Akta Perusahaan original', 'arsip_ARSIPLEGAL143141431.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:26:44'),
(31, 1, 12, 20, 8, 7, 7, 6, 'ARSIP/PURCH/4542525', 'Data Supplier indonesia', 'Data Supplier indonesia', 'arsip_ARSIPPURCH4542525.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:28:01'),
(32, 1, 13, 21, 9, 7, 6, 6, 'ARSIP/BISNIS/24295295', 'Laporan Hasil Rapat dengan Mitra 2023', 'Laporan Hasil Rapat dengan Mitra 2023', 'arsip_ARSIPBISNIS24295295.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:29:32'),
(33, 1, 12, 22, 8, 7, 7, 6, 'ARSIP/GA/24252/2023', 'Laporan Anggaran Pengembangan Gudang', 'Laporan Anggaran Pengembangan Gudang', 'arsip_ARSIPGA242522023.pdf', 'pdf', '24', 0, 0, 1, '2023-04-12 23:30:30'),
(34, 1, 12, 24, 8, 7, 6, 6, 'ARSIP/SCRTY/8977/31', 'Data Keamanan 2023', 'Data Keamanan 2023', 'arsip_ARSIPSCRTY897731.pdf', 'pdf', '24', 1, 0, 1, '2023-04-12 23:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_box`
--

CREATE TABLE `tb_box` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `box` varchar(150) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_box`
--

INSERT INTO `tb_box` (`id`, `kode`, `box`, `qrcode`, `status`) VALUES
(5, 'BOX-001', 'BOX PUTIH', 'Box_BOX-001.png', 1),
(6, 'BOX-002', 'BOX HITAM', 'Box_BOX-002.png', 1),
(7, 'BOX-003', 'BOX HIJAU', 'Box_BOX-003.png', 1),
(8, 'BOX-004', 'BOX MERAH', 'Box_BOX-004.png', 1),
(9, 'BOX-005', 'BOX KUNING', 'Box_BOX-005.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id` int(11) NOT NULL,
  `divisi` varchar(150) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 : NON-AKTIF\r\n1 : AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id`, `divisi`, `deskripsi`, `status`) VALUES
(13, 'IT', 'IT', 1),
(14, 'FINANCE', 'FINANCE', 1),
(15, 'ACCOUNTING', 'ACCOUNTING', 1),
(16, 'OPERASIONAL', 'OPERASIONAL', 1),
(17, 'MARKETING', 'MARKETING', 1),
(18, 'PRODUKSI', 'PRODUKSI', 1),
(19, 'LEGAL', 'LEGAL', 1),
(20, 'PURCHASING', 'PURCHASING', 1),
(21, 'BISNIS', 'BISNIS', 1),
(22, 'BAGIAN UMUM', 'BAGIAN UMUM', 1),
(23, 'HRD', 'HRD', 1),
(24, 'SECURITY', 'SECURITY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_download`
--

CREATE TABLE `tb_download` (
  `id` int(11) NOT NULL,
  `id_arsip` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`, `status`) VALUES
(10, 'ARSIP TIDAK PENTING', 1),
(11, 'ARSIP BIASA', 1),
(12, 'ARSIP PENTING', 1),
(13, 'ARSIP SANGAT PENTING', 1),
(14, 'ARSIP RAHASIA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_map`
--

CREATE TABLE `tb_map` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `map` varchar(150) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_map`
--

INSERT INTO `tb_map` (`id`, `kode`, `map`, `qrcode`, `status`) VALUES
(5, 'MAP-001', 'MAP KUNING', 'Map_MAP-001.png', 1),
(6, 'MAP-002', 'MAP HIJAU', 'Map_MAP-002.png', 1),
(7, 'MAP-003', 'MAP MERAH', 'Map_MAP-003.png', 1),
(8, 'MAP-004', 'MAP BIRU', 'Map_MAP-004.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id` int(11) NOT NULL,
  `id_arsip` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id`, `id_arsip`, `id_user`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(9, 19, 96, '2023-04-18 00:00:00', '2023-04-28 00:00:00', 0),
(10, 22, 97, '2023-04-11 00:00:00', '2023-04-28 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `rak` varchar(150) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id`, `kode`, `rak`, `qrcode`, `status`) VALUES
(6, 'RAK-001', 'RAK GOLD', 'Rak_RAK-001.png', 1),
(7, 'RAK-002', 'RAK SILVER', 'Rak_RAK-002.png', 1),
(8, 'RAK-003', 'RAK PERUNGGU', 'Rak_RAK-003.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role_user`
--

CREATE TABLE `tb_role_user` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role_user`
--

INSERT INTO `tb_role_user` (`id`, `role`, `keterangan`) VALUES
(1, 'ADMINISTRATOR', 'LEVEL DIREKSI'),
(2, 'KARYAWAN', ''),
(3, 'PETUGAS', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `qrcode` varchar(250) NOT NULL,
  `ruang` varchar(150) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `kode`, `qrcode`, `ruang`, `status`) VALUES
(8, 'RG-001', 'Ruang_RG-001.png', 'RUANG IT', 1),
(9, 'RG-002', 'Ruang_RG-002.png', 'RUANG FINANCE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `title` varchar(250) NOT NULL,
  `perusahaan` varchar(250) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `keyword` varchar(250) NOT NULL,
  `sk` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`title`, `perusahaan`, `icon`, `logo`, `deskripsi`, `keyword`, `sk`, `alamat`, `updated_at`) VALUES
('E-ARSIP', 'PT. INDONESIA MAJU', 'icon_.png', 'logo_.png', 'Aplikasi Digital Arsip', 'Aplikasi Digital Arsip', 'bebas bersyarat', 'JakartaPusat', '2023-03-26 23:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_urut`
--

CREATE TABLE `tb_urut` (
  `id` int(11) NOT NULL,
  `urut` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1 : administrator\r\n2 : karyawan\r\n3 : petugas',
  `id_divisi` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Aktif, 2=Tidak Aktif',
  `nama_user` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_online` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `role`, `id_divisi`, `nip`, `username`, `password`, `status`, `nama_user`, `telp`, `foto`, `last_login`, `last_online`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 0, 'administrator', '$2y$10$XVV7lTrtqUspR.A8oUVbHeLy8mkSqNJJcge/zH2FKtos361Ie9Y2.', 1, 'agus susanto', '0888988888', 'foto_1.jpeg', '2023-07-08 03:55:20', NULL, '2022-11-17 06:48:39', NULL, NULL),
(96, 2, 13, 2147483647, 'wihan', '$2y$10$lOfeQ7GMZ86KX4ex4UEnJ.Z4UorcfBD8G6KW0e/z1KSVOABAcGJnK', 1, 'WIHAN JUNAIDI', '0888988888', 'foto_96.jpeg', '2023-04-12 18:16:13', NULL, '2023-04-12 22:38:39', NULL, NULL),
(97, 2, 15, 2147483647, 'epri', '$2y$10$Pqzp5dKmrRt0eXShoOlrHOCvD4cn5qtdjrwj2A.j6j0lC8o2V2Uce', 1, 'EPRI SULANDARI', '0888988888', 'foto_97.jpg', '2023-04-12 18:19:20', NULL, '2023-04-12 22:39:06', NULL, NULL),
(98, 2, 14, 2147483647, 'mathilda', '$2y$10$mIZuHqAEHYsZWoNhWBG7JupRboUFpf..PhT2R/FzES1jbwNsxqBJi', 1, 'MATHILDA', '0888988888', '', '2023-04-12 18:23:00', NULL, '2023-04-12 22:39:37', NULL, NULL),
(99, 2, 23, 2147483647, 'yohana', '$2y$10$fgdLWrVsEDHHeZ4AH3kBOeI.7n7gRUvz8tuXYEOcyykLnYF5SbUeq', 1, 'YOHANA', '0888988888', '', NULL, NULL, '2023-04-12 22:40:07', NULL, NULL),
(100, 3, 13, 2147483647, 'petugas', '$2y$10$qMYJ8ZvmmA7xmDziyofFGuz4oVXZafIZebdq9/OFt7tlPKz9pkJcy', 1, 'PETUGAS', '083892010575', '', '2023-04-12 18:02:45', NULL, '2023-04-12 22:40:35', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_box`
--
ALTER TABLE `tb_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_download`
--
ALTER TABLE `tb_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_map`
--
ALTER TABLE `tb_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role_user`
--
ALTER TABLE `tb_role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_urut`
--
ALTER TABLE `tb_urut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_box`
--
ALTER TABLE `tb_box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_download`
--
ALTER TABLE `tb_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_map`
--
ALTER TABLE `tb_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_urut`
--
ALTER TABLE `tb_urut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
