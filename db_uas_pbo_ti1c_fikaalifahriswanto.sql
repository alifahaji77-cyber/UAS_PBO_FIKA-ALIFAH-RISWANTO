-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 06:14 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_fikaalifahriswanto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(15) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(20) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('KNT-001', 'Andi Wijaya', 'IT Support', 22, '150000.00', 12, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
('KNT-002', 'Budi Cahyono', 'IT Support', 20, '150000.00', 6, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
('KNT-003', 'Cici Amalia', 'Finance', 21, '160000.00', 12, 'PT Bakti Solusindo', NULL, NULL, NULL, NULL),
('KNT-004', 'Dedi Kurniawan', 'Security', 24, '120000.00', 24, 'PT Gada Utama', NULL, NULL, NULL, NULL),
('KNT-005', 'Eka Ramadhan', 'Security', 22, '120000.00', 24, 'PT Gada Utama', NULL, NULL, NULL, NULL),
('KNT-006', 'Fani Lestari', 'Marketing', 19, '140000.00', 6, 'PT Bakti Solusindo', NULL, NULL, NULL, NULL),
('KNT-007', 'Gilang Perkasa', 'Logistics', 23, '130000.00', 12, 'PT Global Logistik', NULL, NULL, NULL, NULL),
('MGN-001', 'Oki Syahputra', 'Engineering', 20, '50000.00', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - Backend Developer'),
('MGN-002', 'Putri Ayu', 'Engineering', 18, '50000.00', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - UI/UX Designer'),
('MGN-003', 'Qori Sandria', 'Marketing', 22, '45000.00', NULL, NULL, NULL, NULL, '1200000.00', 'Sertifikat MSIB - Digital Marketer'),
('MGN-004', 'Rian Hidayat', 'Data Science', 21, '55000.00', NULL, NULL, NULL, NULL, '1800000.00', 'Sertifikat MSIB - Data Analyst'),
('MGN-005', 'Siti Aminah', 'Data Science', 20, '55000.00', NULL, NULL, NULL, NULL, '1800000.00', 'Sertifikat MSIB - AI Engineer'),
('MGN-006', 'Taufik Hidayat', 'Human Resources', 19, '40000.00', NULL, NULL, NULL, NULL, '1000000.00', 'Sertifikat MSIB - HR Operations'),
('TTP-001', 'Hendra Setiawan', 'Engineering', 22, '300000.00', NULL, NULL, '500000.00', 'ESOP-ENG-01', NULL, NULL),
('TTP-002', 'Indah Permata', 'Engineering', 21, '320000.00', NULL, NULL, '500000.00', 'ESOP-ENG-02', NULL, NULL),
('TTP-003', 'Joko Susilo', 'Human Resources', 22, '280000.00', NULL, NULL, '450000.00', 'ESOP-HR-01', NULL, NULL),
('TTP-004', 'Kania Dewi', 'Finance', 20, '290000.00', NULL, NULL, '450000.00', 'ESOP-FIN-01', NULL, NULL),
('TTP-005', 'Luthfi Hakim', 'Marketing', 22, '270000.00', NULL, NULL, '400000.00', 'ESOP-MKT-01', NULL, NULL),
('TTP-006', 'Murni Ati', 'Legal', 21, '350000.00', NULL, NULL, '600000.00', 'ESOP-LGL-01', NULL, NULL),
('TTP-007', 'Naufal Abdi', 'Product Management', 22, '340000.00', NULL, NULL, '550000.00', 'ESOP-PM-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_karyawan` varchar(15) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(20) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
