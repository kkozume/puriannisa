-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm_puri_utami`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `waktu` date NOT NULL,
  `id_karyawan` int(12) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `kehadiran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`waktu`, `id_karyawan`, `nama_karyawan`, `kehadiran`) VALUES
('2021-05-01', 3, 'Kadek', 'hadir'),
('2021-05-01', 5, 'Mawar', 'alfa'),
('2021-05-01', 7, 'sulay', 'hadir'),
('2021-05-01', 8, 'eza ', 'hadir'),
('2021-05-01', 9, 'Said', 'hadir'),
('2021-05-21', 3, 'Kadek', 'izin'),
('2021-05-21', 5, 'Mawar', 'izin'),
('2021-05-21', 7, 'sulay', 'izin'),
('2021-05-21', 8, 'eza ', 'izin'),
('2021-05-21', 9, 'Said', 'izin'),
('2021-05-22', 3, 'Kadek', 'izin'),
('2021-05-22', 5, 'Mawar', 'izin'),
('2021-05-22', 7, 'sulay', 'alfa'),
('2021-05-22', 8, 'eza ', 'izin'),
('2021-05-22', 9, 'Said', 'izin'),
('2021-05-24', 1, 'Novelia', 'hadir'),
('2021-05-24', 2, 'Dyah', 'alfa'),
('2021-05-24', 3, 'Anggi', 'izin'),
('2021-05-24', 4, 'Prabandari', 'hadir'),
('2021-05-29', 1, 'Novelia', 'hadir'),
('2021-05-29', 2, 'Dyah', 'alfa'),
('2021-05-29', 3, 'Anggi', 'izin'),
('2021-05-29', 4, 'Prabandari', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `kode_akun` int(5) NOT NULL,
  `nama_akun` varchar(50) DEFAULT NULL,
  `header_akun` int(11) DEFAULT NULL,
  `posisi_d_c` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `kode_akun`, `nama_akun`, `header_akun`, `posisi_d_c`) VALUES
(48, 111, 'Kas', 1, 'debet'),
(50, 115, 'Persediaan Barang Jadi', 1, 'debet'),
(52, 411, 'Penjualan Online', 4, 'kredit'),
(53, 511, 'Harga Pokok Penjualan Online', 5, 'debet'),
(54, 617, 'Beban Telepon', 6, 'debet'),
(55, 612, 'Beban Listrik', 6, 'debet'),
(76, 613, 'Beban Transportasi', 6, 'debet'),
(77, 614, 'Beban Administrasi', 6, 'debet'),
(85, 615, 'Beban Sewa', 6, 'debet'),
(86, 113, 'Persediaan Bahan Baku', 1, 'debet'),
(87, 121, 'BDP BBB', 1, 'debet'),
(88, 122, 'BDP BTKL', 1, 'debet'),
(89, 123, 'BDP BOP', 1, 'debet'),
(91, 412, 'Penjualan Offline', 4, 'kredit'),
(92, 616, 'Beban Gaji', 6, 'debet'),
(93, 515, 'BOP yang dibebankan', 5, 'debet'),
(94, 512, 'Harga Pokok Penjualan Onsite', 5, 'debet'),
(95, 114, 'Persediaan Bahan Penolong', 1, 'debet'),
(96, 611, 'Beban Ongkir Pembelian', 6, 'debet');

-- --------------------------------------------------------

--
-- Table structure for table `akun_login`
--

CREATE TABLE `akun_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `pwd` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `user_group` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_login`
--

INSERT INTO `akun_login` (`id`, `username`, `pwd`, `last_login`, `user_group`) VALUES
(1, 'pemilik', '827ccb0eea8a706c4c34a16891f84e7b', '2021-11-17 17:33:41', 'Pemilik'),
(2, 'penjualan', '48f82d18f158272719657054d032ba63', '2022-02-03 14:50:39', 'Bagian Penjualan'),
(3, 'keuangan', 'd3bc9190f33ef5611ab0ba8e972a5e46', '2022-02-03 14:50:39', 'Bagian Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `bb`
--

CREATE TABLE `bb` (
  `id_bb` int(30) NOT NULL,
  `id_produksi` varchar(30) NOT NULL,
  `total_bb` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bop`
--

CREATE TABLE `bop` (
  `id_bop` int(30) NOT NULL,
  `id_produksi` varchar(30) NOT NULL,
  `total_bop` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `btkl`
--

CREATE TABLE `btkl` (
  `id_btkl` int(30) NOT NULL,
  `id_produksi` varchar(30) NOT NULL,
  `total_btkl` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chanel_penjualan`
--

CREATE TABLE `chanel_penjualan` (
  `id_chanel` int(11) NOT NULL,
  `nama_chanel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chanel_penjualan`
--

INSERT INTO `chanel_penjualan` (`id_chanel`, `nama_chanel`) VALUES
(1, 'https://www.tokopedia.com/puri-utami'),
(2, 'https://www.instagram.com/puriutami_mukena'),
(3, 'https://www.blibli.com/merchant/umkm-puri-utami/UM'),
(4, 'Facebook'),
(5, 'shopee'),
(6, 'https://www.facebook.com/Puri');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_detail_penj` int(15) NOT NULL,
  `id_transaksi` varchar(11) NOT NULL,
  `kode_produk` varchar(30) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kode_detail_penj`, `id_transaksi`, `kode_produk`, `id_pelanggan`, `jumlah`, `subtotal`) VALUES
(1, '76', 'MKN01', 1, 2, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan1`
--

CREATE TABLE `detail_penjualan1` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan1`
--

INSERT INTO `detail_penjualan1` (`id`, `id_penjualan`, `kode_produk`, `jumlah`, `harga`, `total`) VALUES
(1, 'PNJ-001', 'KP001', 1, 264000, 264000),
(2, 'PNJ-001', 'KP002', 1, 160000, 160000),
(3, 'PNJ-002', 'KP001', 1, 264000, 264000),
(4, 'PNJ-003', 'KP001', 1, 264000, 264000),
(5, 'PNJ-003', 'KP006', 1, 156000, 156000),
(6, 'PNJ-004', 'KP001', 1, 264000, 264000),
(7, 'PNJ-004', 'KP005', 1, 150000, 150000),
(8, 'PNJ-005', 'KP001', 1, 264000, 264000),
(9, 'PNJ-006', 'KP001', 1, 264000, 264000),
(10, 'PNJ-007', 'KP001', 1, 264000, 264000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan_onsite`
--

CREATE TABLE `detail_penjualan_onsite` (
  `kd_detail_penj` int(11) NOT NULL,
  `id_transaksi` varchar(30) DEFAULT NULL,
  `kode_produk` varchar(30) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan_onsite`
--

INSERT INTO `detail_penjualan_onsite` (`kd_detail_penj`, `id_transaksi`, `kode_produk`, `jumlah`, `harga`, `total`) VALUES
(1, 'BKM-20211229-00001', 'KP001', 2, '150000', '300000'),
(2, 'BKM-20211229-00002', 'KP002', 1, '160000', '160000'),
(3, 'BKM-20211229-00002', 'KP003', 1, '100000', '100000'),
(4, 'BKM-20220105-00003', 'KP001', 1, '150000', '150000'),
(5, 'BKM-20220105-00003', 'KP002', 1, '160000', '160000'),
(6, 'BKM-20220105-00003', 'KP003', 1, '100000', '100000'),
(7, 'BKM-20220218-00004', 'KP008', 1, '165000', '165000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_bb`
--

CREATE TABLE `detail_produksi_bb` (
  `id` int(11) NOT NULL,
  `id_produksi` varchar(50) DEFAULT NULL,
  `id_bb` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produksi_bb`
--

INSERT INTO `detail_produksi_bb` (`id`, `id_produksi`, `id_bb`, `nominal`, `qty`, `total`) VALUES
(1, 'PRD-001', 1, 25000, 1, 25000),
(2, 'PRD-002', 1, 25000, 2, 50000),
(3, 'PRD-003', 3, 22500, 1, 22500),
(4, 'PRD-004', 1, 25000, 1, 25000),
(5, 'PRD-005', 3, 22500, 1, 22500),
(6, 'PRD-006', 3, 22500, 1, 22500),
(7, 'PRD-007', 3, 22500, 1, 22500),
(8, 'PRD-008', 1, 25000, 2, 50000),
(9, 'PRD-009', 1, 25000, 3, 75000),
(12, 'PRD-011', 1, 25000, 3, 75000),
(17, 'PRD-012', 3, 22500, 4, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_bop`
--

CREATE TABLE `detail_produksi_bop` (
  `id` int(11) NOT NULL,
  `id_produksi` varchar(50) DEFAULT NULL,
  `id_detail_bb` int(11) DEFAULT NULL,
  `id_overhead` varchar(25) DEFAULT NULL,
  `id_bop` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produksi_bop`
--

INSERT INTO `detail_produksi_bop` (`id`, `id_produksi`, `id_detail_bb`, `id_overhead`, `id_bop`, `nominal`, `qty`, `total`) VALUES
(1, 'PRD-001', 1, NULL, 4, 40000, 1, 40000),
(2, 'PRD-001', 1, NULL, 8, 4500, 1, 4500),
(3, 'PRD-002', 1, NULL, 4, 40000, 10, 400000),
(4, 'PRD-002', 1, NULL, 4, 40000, 1, 40000),
(5, 'PRD-003', 3, NULL, 4, 40000, 1, 40000),
(6, 'PRD-003', 3, NULL, 4, 40000, 2, 80000),
(7, 'PRD-003', 3, NULL, 4, 40000, 5, 200000),
(8, 'PRD-003', 3, NULL, 4, 40000, 6, 240000),
(9, 'PRD-004', 1, NULL, 4, 40000, 1, 40000),
(10, 'PRD-005', 3, NULL, 4, 40000, 2, 80000),
(11, 'PRD-006', 3, NULL, 4, 40000, 1, 40000),
(12, 'PRD-007', 3, NULL, 4, 40000, 1, 40000),
(13, 'PRD-007', 3, NULL, 4, 40000, 3, 120000),
(14, 'PRD-008', 1, NULL, 4, 40000, 2, 80000),
(15, 'PRD-008', 1, NULL, 4, 40000, 3, 120000),
(16, 'PRD-009', 1, NULL, 4, 40000, 2, 80000),
(20, 'PRD-011', 1, NULL, 4, 40000, 5, 200000),
(21, 'PRD-011', 1, '1', NULL, 12000, 5, 60000),
(29, 'PRD-012', 3, '1', NULL, 12000, 5, 60000),
(30, 'PRD-012', 3, NULL, 4, 40000, 3, 120000),
(31, 'PRD-012', 3, '2', NULL, 24000, 5, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi_btk`
--

CREATE TABLE `detail_produksi_btk` (
  `id` int(11) NOT NULL,
  `id_produksi` varchar(50) DEFAULT NULL,
  `id_detail_bb` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `jumlah_hari` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produksi_btk`
--

INSERT INTO `detail_produksi_btk` (`id`, `id_produksi`, `id_detail_bb`, `id_karyawan`, `nominal`, `jumlah_hari`, `total`) VALUES
(1, 'PRD-001', 1, 1, 10000, 1, 10000),
(2, 'PRD-001', 1, 2, 10000, 2, 20000),
(3, 'PRD-002', 1, 1, 75000, 2, 150000),
(4, 'PRD-003', 3, 6, 20000, 2, 40000),
(5, 'PRD-003', 3, 4, 75000, 1, 75000),
(6, 'PRD-004', 1, 2, 5000, 1, 5000),
(7, 'PRD-005', 3, 1, 15000, 2, 30000),
(8, 'PRD-006', 3, 2, 150000, 1, 150000),
(9, 'PRD-007', 3, 2, 50000, 2, 100000),
(10, 'PRD-008', 1, 2, 15000, 7, 105000),
(11, 'PRD-009', 1, 2, 45000, 2, 90000),
(14, 'PRD-011', 1, 2, 35000, 2, 70000),
(19, 'PRD-012', 3, 3, 3, 23000, 69000);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `kode_akun` int(11) DEFAULT NULL,
  `tgl_jurnal` date DEFAULT NULL,
  `posisi_d_c` enum('debet','kredit') NOT NULL,
  `nominal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `id_transaksi`, `kode_akun`, `tgl_jurnal`, `posisi_d_c`, `nominal`) VALUES
(7, 'BKK-220508-001', 113, '2022-05-08', 'debet', 147500),
(8, 'BKK-220508-001', 611, '2022-05-08', 'debet', 20000),
(9, 'BKK-220508-001', 111, '2022-05-08', 'kredit', 167500),
(10, 'BKK-220509-002', 113, '2022-04-04', 'debet', 250500),
(11, 'BKK-220509-002', 611, '2022-04-04', 'debet', 10000),
(12, 'BKK-220509-002', 111, '2022-04-04', 'kredit', 260500),
(13, 'BKK-220613-003', 113, '2022-06-13', 'debet', 1170000),
(14, 'BKK-220613-003', 611, '2022-06-13', 'debet', 20000),
(15, 'BKK-220613-003', 111, '2022-06-13', 'kredit', 1190000),
(16, 'BKK-220614-004', 113, '2022-06-14', 'debet', 142500),
(17, 'BKK-220614-004', 613, '2022-06-14', 'debet', 5000),
(18, 'BKK-220614-004', 111, '2022-06-14', 'kredit', 147500),
(19, 'BKK-220615-005', 113, '2022-06-15', 'debet', 1395000),
(20, 'BKK-220615-005', 613, '2022-06-15', 'debet', 12000),
(21, 'BKK-220615-005', 111, '2022-06-15', 'kredit', 1407000),
(22, 'BKK-220615-006', 113, '2022-06-15', 'debet', 1407000),
(23, 'BKK-220615-006', 613, '2022-06-15', 'debet', 12000),
(24, 'BKK-220615-006', 111, '2022-06-15', 'kredit', 1419000),
(25, 'BKK-220618-007', 113, '2022-06-18', 'debet', 1755000),
(26, 'BKK-220618-007', 613, '2022-06-18', 'debet', 12000),
(27, 'BKK-220618-007', 111, '2022-06-18', 'kredit', 1767000),
(28, 'BKK-220619-008', 113, '2022-06-18', 'debet', 1150000),
(29, 'BKK-220619-008', 613, '2022-06-18', 'debet', 12000),
(30, 'BKK-220619-008', 111, '2022-06-18', 'kredit', 1162000),
(31, 'BKK-220619-009', 113, '2022-06-13', 'debet', 47500),
(32, 'BKK-220619-009', 613, '2022-06-13', 'debet', 12000),
(33, 'BKK-220619-009', 111, '2022-06-13', 'kredit', 59500),
(34, 'BKK-220619-010', 113, '2022-04-04', 'debet', 129500),
(35, 'BKK-220619-010', 613, '2022-04-04', 'debet', 12000),
(36, 'BKK-220619-010', 111, '2022-04-04', 'kredit', 141500),
(37, 'BKK-220619-011', 113, '2022-06-19', 'debet', 1250000),
(38, 'BKK-220619-011', 611, '2022-06-19', 'debet', 12000),
(39, 'BKK-220619-011', 111, '2022-06-19', 'kredit', 1262000),
(40, 'BKK-220623-012', 113, '2022-06-23', 'debet', 1938000),
(41, 'BKK-220623-012', 611, '2022-06-23', 'debet', 12000),
(42, 'BKK-220623-012', 111, '2022-06-23', 'kredit', 1950000),
(43, 'PNJ-001', 412, '2022-06-29', 'debet', 100000),
(44, 'PNJ-001', 111, '2022-06-29', 'kredit', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `nama_karyawan` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `no_telp` varchar(17) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `tgl_lahir`, `jenis_kelamin`, `no_telp`, `alamat`, `jabatan`, `gambar`) VALUES
(1, 'Novelia', '2000-11-11', 'Jenis Kelamin', '082134090356', 'Jl Mrebet', 'HRD', '60a4fd196952e.jpg'),
(2, 'Dyah', '2001-10-20', 'Jenis Kelamin', '082134090351', 'Jl Serayu', 'Supervisor', '60a4fd2841448.jpg'),
(3, 'Anggi', '2021-03-22', 'Jenis Kelamin', '082134090355', 'Jl bojong', 'Direktur', '60a4fd35c3e0c.jpg'),
(4, 'Prabandari', '2021-03-23', 'perempuan', '082134090357', 'Jl Bandung', 'CEO', '606455dd35110.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`, `gambar`) VALUES
('KK001', 'Mukena Batik', ''),
('KK002', 'Mukena Lukis', ''),
('KK003', 'Mukena Bordir', ''),
('KK004', 'Mukena Katun', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `kode_kategori` varchar(7) CHARACTER SET utf8mb4 NOT NULL,
  `nama_kategori` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`kode_kategori`, `nama_kategori`, `gambar`) VALUES
('KK001', 'Mukena Batik', '61baa687120a7.jpg'),
('KK002', 'Mukena Lukis', '61baa3e71aaa0.jpg'),
('KK004', 'Mukena Bordir', '61ba0684b0554.jpg'),
('KK005', 'Mukena Katun', '61ba06918bace.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(8) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `no_telp`, `ktp`) VALUES
(1, 'Takrimia', 'perempuan', 'Jl. Mangga Dua, Bandung', '087-867-546-754', '62ad8b302e931.jpg'),
(2, 'Muhammad', 'laki-laki', 'Jl. Mawar No.12, Buol', '087-867-546-754', '62b02dcac34dd.jpg'),
(3, 'Putri', 'perempuan', 'Jalan Babakan Ciamis III', '085-543-212-111', '62b02dd972cdb.jpg'),
(4, 'Mawar', 'perempuan', 'Jl. Moh. Toha No 65', '088-765-432-118', '62b02e04a9900.jpg'),
(5, 'Lain-lain', 'laki-laki', 'Jl. Laks. R. E. Martadinata, Nagri Tengah, Purwakarta', '082273635281', '62b02dbd69448.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_transaksi` int(12) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `waktu` date NOT NULL,
  `kehadiran` varchar(12) NOT NULL,
  `gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_transaksi`, `nama_karyawan`, `waktu`, `kehadiran`, `gaji`) VALUES
(29, 'Kadek', '2021-04-20', '30', '32000000'),
(30, 'Mawar', '2021-04-02', '24', '6000012'),
(31, 'Mawar', '2021-04-02', '24', '6000012'),
(32, 'lala', '2021-04-27', '21', '2100000'),
(33, 'lala', '2021-04-27', '21', '2100000'),
(34, 'sulay', '2021-04-27', '24', '20000004'),
(35, 'sulay', '2021-04-07', '12', '1200000'),
(36, 'sulay', '2021-04-07', '12', '1200000'),
(37, 'lala', '2021-04-14', '11', '1100000'),
(38, 'lala', '2021-04-14', '11', '1100000'),
(39, 'eza ', '2021-04-23', '29', '2900000'),
(40, 'eza ', '2021-04-23', '29', '2900000'),
(41, 'eza ', '2021-04-23', '29', '2900000'),
(43, 'Kadek', '2021-05-07', '24', '2456000'),
(44, 'Kadek', '2021-05-07', '24', '2456000'),
(45, 'Kadek', '2021-05-01', '30', '32100000'),
(46, 'sulay', '2021-05-15', '30', '32000000'),
(47, 'sulay', '2021-04-30', '30', '32000000'),
(48, 'sulay', '2021-04-30', '30', '32000000'),
(49, 'eza ', '2021-04-29', '24', '25500004'),
(64, 'Novelia', '2021-05-24', 'Kasir', '2700000'),
(80, 'Novelia', '2021-05-29', 'Kasir', '2700000');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_beban`
--

CREATE TABLE `pembayaran_beban` (
  `id_transaksi` varchar(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `nama` varchar(50) NOT NULL,
  `biaya` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_beban`
--

INSERT INTO `pembayaran_beban` (`id_transaksi`, `waktu`, `nama`, `biaya`) VALUES
('63', '2022-03-07 04:30:52', 'Beban Transportasi', 30000),
('63', '2022-03-07 04:30:52', 'Kas', 30000),
('63', '2022-03-07 04:30:52', 'Beban Transportasi', 30000),
('63', '2022-03-07 04:30:52', 'Kas', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `pembebanan`
--

CREATE TABLE `pembebanan` (
  `id_transaksi` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembebanan`
--

INSERT INTO `pembebanan` (`id_transaksi`, `biaya`, `nama`, `waktu`) VALUES
(60, 100000, 'Beban Pembuatan Kartu Nama', '2021-05-23 00:00:00'),
(61, 50000, 'Beban Poster', '2021-05-23 00:00:00'),
(62, 50000, 'Beban Tembakan Harga', '2021-05-23 00:00:00'),
(63, 30000, 'Beban Bensin Bulan Mei', '2021-05-24 00:00:00'),
(65, 50000, 'Beban Bensin Bulan Mei', '2021-05-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_transaksi` int(10) NOT NULL,
  `kode_pembelian` varchar(15) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `jumlah_pembelian` int(11) DEFAULT NULL,
  `total_pembelian` int(11) DEFAULT NULL,
  `kode_produk` varchar(15) DEFAULT NULL,
  `nama_pembelian` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_transaksi`, `kode_pembelian`, `tgl_pembelian`, `id_supplier`, `jumlah_pembelian`, `total_pembelian`, `kode_produk`, `nama_pembelian`) VALUES
(54, '1', '2021-05-03', 1, 5, 200000, NULL, 'Pembelian kain '),
(55, '11', '2021-05-23', 1, 5, 200000, NULL, 'Pembelian kain '),
(68, '1', '2021-05-28', 1, 5, 200000, NULL, 'Pembelian kain '),
(74, '11', '2021-05-29', 10, 5, 300000, NULL, 'Pembelian kain '),
(75, '1', '2021-05-29', 2, 6, 200000, NULL, 'Pembelian kain ');

-- --------------------------------------------------------

--
-- Table structure for table `pemodalan`
--

CREATE TABLE `pemodalan` (
  `id_transaksi` int(11) NOT NULL,
  `besar` varchar(11) DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `kode_produk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemodalan`
--

INSERT INTO `pemodalan` (`id_transaksi`, `besar`, `nama`, `waktu`, `kode_produk`) VALUES
(70, '2000000', 'Modal Awal Bu Lely', '2021-05-29 00:00:00', 'MKN12'),
(71, '1000000', 'Prive', '2021-05-29 00:00:00', 'MKN12');

-- --------------------------------------------------------

--
-- Table structure for table `pencatatan_harian`
--

CREATE TABLE `pencatatan_harian` (
  `kode_barang` char(5) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `posisi_db_kd` varchar(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pencatatan_harian`
--

INSERT INTO `pencatatan_harian` (`kode_barang`, `tanggal`, `keterangan`, `jumlah`, `posisi_db_kd`, `saldo`) VALUES
('KB01', '2021-03-18', 'Mukena', 15, 'Debet', 250000),
('KB02', '2021-03-18', 'Tunik', 10, 'Debet', 200000),
('KB03', '2021-03-20', 'Gamis', 12, 'Debet', 230000),
('KB04', '2021-03-22', 'Batik', 4, 'Debet', 270000),
('KB05', '2021-04-04', 'Mukena', 4, 'Debet', 270000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `aksi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_penjualan`, `tanggal`, `nama_pelanggan`, `total`, `aksi`, `status`) VALUES
(1, 'PNJ-001', '2022-06-21', '1', 424000, '', 'selesai'),
(2, 'PNJ-002', '2022-06-22', '2', 264000, '', 'selesai'),
(3, 'PNJ-003', '2022-06-23', '3', 420000, '', 'selesai'),
(4, 'PNJ-004', '2022-06-23', '4', 414000, '', 'selesai'),
(5, 'PNJ-005', '2022-06-28', '3', 264000, '', 'selesai'),
(6, 'PNJ-006', '2022-06-28', '1', 264000, '', 'selesai'),
(7, 'PNJ-007', '2022-07-01', '4', 264000, '', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_onsite`
--

CREATE TABLE `penjualan_onsite` (
  `id_transaksi` varchar(50) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `id_pelanggan` varchar(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_onsite`
--

INSERT INTO `penjualan_onsite` (`id_transaksi`, `waktu`, `id_pelanggan`, `total`) VALUES
('BKM-20211229-00001', '2021-12-29 09:49:31', 'PL001', '300000'),
('BKM-20211229-00002', '2021-12-29 09:53:28', 'PL001', '260000'),
('BKM-20220105-00003', '2022-01-05 09:36:52', 'PL001', '410000'),
('BKM-20220218-00004', '2022-01-05 09:53:28', 'PL001', '165000');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `kode_kategori` varchar(5) CHARACTER SET utf8mb4 NOT NULL,
  `nama_produk` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `kode_kategori`, `nama_produk`, `stok`, `harga`, `gambar`) VALUES
('KP001', 'KK002', 'Mukena Lukis Merak', 5, 264000, '62b3f1911622b.jpg'),
('KP002', 'KK001', 'Mukena Batik Merak', 5, 160000, '62b40699c106f.jpg'),
('KP003', 'KK001', 'Mukena Pastel', 5, 100000, '62b4070255d2a.jpg'),
('KP004', 'KK005', 'Mukena Katun Rosella', 5, 160000, '62b4070ce5ee8.jpg'),
('KP005', 'KK004', 'Mukena Bordir Motif Melati', 5, 150000, '62b4073910468.jpg'),
('KP006', 'KK004', 'Mukena Bordir Cornelly', 2, 156000, '62b40743d5b3c.jpg'),
('KP007', 'KK001', 'Mukena Batik Keris', 2, 160000, '62b406c1bccfe.jpg'),
('KP008', 'KK002', 'Mukena Bali', 3, 165000, '62b4078635af8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(200) NOT NULL,
  `id_produksi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `produk` varchar(50) NOT NULL,
  `q_bp` int(50) NOT NULL,
  `total` varchar(30) NOT NULL,
  `total_harga` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `id_produksi`, `tanggal`, `produk`, `q_bp`, `total`, `total_harga`, `status`) VALUES
(1, 'PRD-001', '2022-01-05', '', 0, '99500', NULL, NULL),
(2, 'PRD-002', '2022-01-10', '', 0, '640000', NULL, NULL),
(3, 'PRD-003', '2022-01-10', 'Mukena Lukis', 0, '697500', NULL, NULL),
(4, 'PRD-004', '2022-01-10', 'Mukena Silk', 20, '1400000', NULL, NULL),
(5, 'PRD-005', '2022-01-10', 'Mukena Lukis2', 16, '2120000', NULL, NULL),
(6, 'PRD-006', '2022-01-11', 'Mukena Lukis Handmade', 10, '2125000', NULL, NULL),
(7, 'PRD-007', '2022-03-20', '', 0, '282500', NULL, NULL),
(8, 'PRD-008', '2022-03-20', 'Mukena Lukis Handmade', 45, '15975000', NULL, NULL),
(9, 'PRD-009', '2022-05-31', 'Mukena ABC', 5, '1285000', '6425000', NULL),
(10, 'PRD-010', '2022-05-31', 'Produk mukena abc', 5, '1135000', '5675000', NULL),
(11, 'PRD-011', '2022-06-01', 'Produk xyz', 5, '2025000', '10125000', NULL),
(12, 'PRD-011', '2022-06-01', 'Produk xyz', 5, '2025000', '10125000', NULL),
(17, 'PRD-012', '2022-06-11', 'Mukena cangtip', 5, '1995000', '9975000', 'Diproduksi');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(5) NOT NULL,
  `nama_suplier` varchar(20) DEFAULT NULL,
  `alamat_supplier` varchar(20) DEFAULT NULL,
  `no_telp_supplier` varchar(20) DEFAULT NULL,
  `nama_cv` varchar(10) DEFAULT NULL,
  `ktp` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_suplier`, `alamat_supplier`, `no_telp_supplier`, `nama_cv`, `ktp`, `tanggal`) VALUES
(1, 'madeeeeeeeeeeew', 'Jl merak', '000021200383', 'PT ABC', '605ae9d1a646c.jpg', '2021-03-24'),
(2, 'madeeeeeeeeeee', 'jl banjarsari', '0895086320074', 'PT alibaba', '605ae9e9ed265.jpg', '2021-03-24'),
(3, 'madeeeeeeeeeeew', 'Jl Campuan', '000021200383', 'PT alibaba', '605aea1b75b33.jpg', '2021-03-24'),
(4, 'Arumi', 'Jl Cangian', '089508632007', 'PT Cahaya ', '605aea2ce67a7.jpg', '2021-03-24'),
(5, 'Jihan', 'Jl Moh Toha', '000021200383', 'CV Angina', '605aea3dee183.jpg', '2021-03-24'),
(6, 'Ani', 'Jl Negara', '09842872482', 'PT Prakasa', '605aea5411dda.jpg', '2021-03-24'),
(8, 'Mawar', 'Jl Campuan', '0893867727', 'PT alibaba', '605aea67320e7.jpg', '2021-03-24'),
(9, 'madeeeeeeeeeeew', 'Jl merak', '0893867727', 'PT Cahaya ', '605aea7a2e173.jpg', '2021-03-24'),
(10, 'Arumi', 'Jl Cangi', '089508632007', 'PT alibaba', '605aea905ea01.jpg', '2021-03-24'),
(11, 'Mawar Gia', 'Jl Negara Gani', '0895086320074', 'PT Cahaya ', '605aeaa4795cc.jpg', '2021-03-24'),
(12, 'Arumi', 'jl banjarsari', '000021200383', 'PT alibaba', '605aeac5cbedc.jpg', '2021-03-24'),
(13, 'made widiadnyani', 'Jl Negar', '0895086320074', 'PT Prajina', '605aeadc67806.jpg', '2021-03-02'),
(15, 'Anastasia Prani', 'Jl Bhineka', '0895086322122', 'CV Angling', '605aeaf2436b3.jpg', '2021-03-11'),
(16, 'Novelia', 'Bandung', '082134090351', 'Dyah', '605aeb349eaf6.jpg', '2021-03-24'),
(17, 'Novelia', 'Bandung', '082134090351', 'Dyah', '605ae5821d7e1.jpg', '2021-03-24'),
(18, 'Dyah', 'Jakarta', '082134090355', 'PT ABC', '605ae5bf9efe9.jpg', '2021-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `telepon`
--

CREATE TABLE `telepon` (
  `id_karyawan` int(11) NOT NULL,
  `no_telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telepon`
--

INSERT INTO `telepon` (`id_karyawan`, `no_telepon`) VALUES
(1, '082134090351'),
(2, '082134090355'),
(3, '082134090357');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_coa`
--

CREATE TABLE `transaksi_coa` (
  `transaksi` varchar(100) NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `posisi` varchar(1) NOT NULL,
  `kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_coa`
--

INSERT INTO `transaksi_coa` (`transaksi`, `kode_akun`, `posisi`, `kelompok`) VALUES
('pemodalan', 111, 'd', 1),
('pemodalan', 311, 'c', 1),
('pemodalan', 312, 'd', 2),
('pemodalan', 111, 'c', 2),
('pembebanan', 51, 'd', 1),
('pembebanan', 111, 'c', 1),
('penjualan', 111, 'd', 1),
('penjualan', 411, 'c', 1),
('penjualan', 511, 'd', 3),
('penjualan', 115, 'c', 3),
('pembelian', 115, 'd', 1),
('pembelian', 111, 'c', 1),
('pembayaran', 616, 'd', 6),
('pembayaran', 111, 'c', 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`id_transaksi` int(11)
,`waktu` datetime
,`sumber` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `pembebanan`.`id_transaksi` AS `id_transaksi`, `pembebanan`.`waktu` AS `waktu`, 'pembebanan' AS `sumber` FROM `pembebanan``pembebanan`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`waktu`,`id_karyawan`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_login`
--
ALTER TABLE `akun_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bb`
--
ALTER TABLE `bb`
  ADD PRIMARY KEY (`id_bb`);

--
-- Indexes for table `bop`
--
ALTER TABLE `bop`
  ADD PRIMARY KEY (`id_bop`);

--
-- Indexes for table `btkl`
--
ALTER TABLE `btkl`
  ADD PRIMARY KEY (`id_btkl`);

--
-- Indexes for table `chanel_penjualan`
--
ALTER TABLE `chanel_penjualan`
  ADD PRIMARY KEY (`id_chanel`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`kode_detail_penj`),
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_transaksi_2` (`id_transaksi`);

--
-- Indexes for table `detail_penjualan1`
--
ALTER TABLE `detail_penjualan1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan_onsite`
--
ALTER TABLE `detail_penjualan_onsite`
  ADD PRIMARY KEY (`kd_detail_penj`),
  ADD KEY `detail_penjualan_ons_id` (`id_transaksi`),
  ADD KEY `detail_penjualan_ons_kode` (`kode_produk`);

--
-- Indexes for table `detail_produksi_bb`
--
ALTER TABLE `detail_produksi_bb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_produksi_bop`
--
ALTER TABLE `detail_produksi_bop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_produksi_btk`
--
ALTER TABLE `detail_produksi_btk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `pembayaran_beban`
--
ALTER TABLE `pembayaran_beban`
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `pembebanan`
--
ALTER TABLE `pembebanan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `pemodalan`
--
ALTER TABLE `pemodalan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `pencatatan_harian`
--
ALTER TABLE `pencatatan_harian`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_onsite`
--
ALTER TABLE `penjualan_onsite`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `telepon`
--
ALTER TABLE `telepon`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `akun_login`
--
ALTER TABLE `akun_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bb`
--
ALTER TABLE `bb`
  MODIFY `id_bb` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bop`
--
ALTER TABLE `bop`
  MODIFY `id_bop` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `btkl`
--
ALTER TABLE `btkl`
  MODIFY `id_btkl` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chanel_penjualan`
--
ALTER TABLE `chanel_penjualan`
  MODIFY `id_chanel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_penjualan1`
--
ALTER TABLE `detail_penjualan1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_produksi_bb`
--
ALTER TABLE `detail_produksi_bb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_produksi_bop`
--
ALTER TABLE `detail_produksi_bop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `detail_produksi_btk`
--
ALTER TABLE `detail_produksi_btk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penjualan_onsite`
--
ALTER TABLE `detail_penjualan_onsite`
  ADD CONSTRAINT `detail_penjualan_ons_id` FOREIGN KEY (`id_transaksi`) REFERENCES `penjualan_onsite` (`id_transaksi`),
  ADD CONSTRAINT `detail_penjualan_ons_kode` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori_produk` (`kode_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
