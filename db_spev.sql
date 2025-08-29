-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 01:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbasis_aturan`
--

CREATE TABLE `tbbasis_aturan` (
  `idaturan` int(11) NOT NULL,
  `kdkerusakan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbbasis_aturan`
--

INSERT INTO `tbbasis_aturan` (`idaturan`, `kdkerusakan`) VALUES
(1, 'K01'),
(2, 'K02'),
(3, 'K03'),
(4, 'K04');

-- --------------------------------------------------------

--
-- Table structure for table `tbcek_kerusakan`
--

CREATE TABLE `tbcek_kerusakan` (
  `idcek` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tipeken` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcek_kerusakan`
--

INSERT INTO `tbcek_kerusakan` (`idcek`, `tanggal`, `tipeken`) VALUES
(1, '2024-05-17', 'wuling air ev');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_basis_aturan`
--

CREATE TABLE `tbdetail_basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `kdgejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbdetail_basis_aturan`
--

INSERT INTO `tbdetail_basis_aturan` (`idaturan`, `kdgejala`) VALUES
(1, 'G01'),
(1, 'G03'),
(1, 'G02'),
(1, 'G05'),
(1, 'G07'),
(1, 'G06'),
(1, 'G04'),
(2, 'G16'),
(2, 'G08'),
(2, 'G09'),
(2, 'G06'),
(3, 'G13'),
(3, 'G12'),
(3, 'G10'),
(3, 'G11'),
(3, 'G14'),
(4, 'G16'),
(4, 'G15'),
(4, 'G06'),
(4, 'G17');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_cek_kerusakan`
--

CREATE TABLE `tbdetail_cek_kerusakan` (
  `idcek` int(11) NOT NULL,
  `kdgejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbdetail_cek_kerusakan`
--

INSERT INTO `tbdetail_cek_kerusakan` (`idcek`, `kdgejala`) VALUES
(1, 'G16'),
(1, 'G15'),
(1, 'G04');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_kerusakan`
--

CREATE TABLE `tbdetail_kerusakan` (
  `idcek` int(11) NOT NULL,
  `kdkerusakan` varchar(5) NOT NULL,
  `presentase` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbdetail_kerusakan`
--

INSERT INTO `tbdetail_kerusakan` (`idcek`, `kdkerusakan`, `presentase`) VALUES
(1, 'K01', 14),
(1, 'K02', 25),
(1, 'K04', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbgejala`
--

CREATE TABLE `tbgejala` (
  `kdgejala` varchar(5) NOT NULL,
  `nmgejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbgejala`
--

INSERT INTO `tbgejala` (`kdgejala`, `nmgejala`) VALUES
('G01', 'Baterai Health kendaraan dibawah 80%'),
('G02', 'Baterai Kendaraan Cepat Habis atau Boros'),
('G03', 'Baterai kendaraan berkurang sendiri tanpa digunakan'),
('G04', 'usia baterai sudah tua'),
('G05', 'Laju Kendaraan Terasa lambat'),
('G06', 'mengecas baterai terlalu lama'),
('G07', 'mengecas baterai dibawah batas minimum'),
('G08', 'Bunyi tidak wajar saat pengisian daya baterai'),
('G09', 'Gun charging connect, tetapi mode charging tidak muncul'),
('G10', 'Kendaraan tidak bisa distarter'),
('G11', 'Lampu ac mati saat kontak hidup'),
('G12', 'kendaraan sudah lama tidak digunakan'),
('G13', 'adanya modifikasi elektrikal kendaraan'),
('G14', 'usia aki kendaraan sudah lama'),
('G15', 'Charging gun tidak terkoneksi'),
('G16', 'Arus listrik tidak masuk'),
('G17', 'Charging Gun Goyang');

-- --------------------------------------------------------

--
-- Table structure for table `tbkerusakan`
--

CREATE TABLE `tbkerusakan` (
  `kdkerusakan` varchar(5) NOT NULL,
  `nmkerusakan` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbkerusakan`
--

INSERT INTO `tbkerusakan` (`kdkerusakan`, `nmkerusakan`, `keterangan`, `solusi`) VALUES
('K01', 'Kerusakan Baterai Kendaraan', 'baterai merupakan bagian terpenting dari kendaraan listrik agar tetap berjalan dan perawatan baterai sangatlah penting', 'Ganti baterai baru, hindari overcharging, undercharging, rutin melakukan perawatan dan service, gunakan baterai yang sesuai dengan tipe kendaraan'),
('K02', 'kerusakan bagian OBC ', 'OBC (on-board charger) berfungsi sebagai adaptor yang mengubah listrik AC menjadi listrik DC', 'Ganti obc kendaraan, gunakan daya listrik yang stabil dan susai kwh, rutin melakukan perawatan dan service'),
('K03', 'Kerusakan Aki Kendaraan', 'kendaraan listrik menggunakan aki 12 volt untuk menjalankan elektrikal kendaraan', 'Lakukan jumper dengan aki lain, jangan melakukan modifikasi elektrikal kendaraan sembarangan, hidupkan kendaraan setidaknya 1 kali sehari'),
('K04', 'kerusakan Gun Charging', 'Gun Charging merupakan colokan untuk mengisi daya baterai kendaraan listrik', 'Hindari soket charging terkena air, ganti charging gun, gunakan charging gun yang sesuai');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `username`, `pass`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin'),
(5, 'admin2', 'c93ccd78b2076528346216b3b2f701e6', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbasis_aturan`
--
ALTER TABLE `tbbasis_aturan`
  ADD PRIMARY KEY (`idaturan`);

--
-- Indexes for table `tbcek_kerusakan`
--
ALTER TABLE `tbcek_kerusakan`
  ADD PRIMARY KEY (`idcek`);

--
-- Indexes for table `tbgejala`
--
ALTER TABLE `tbgejala`
  ADD PRIMARY KEY (`kdgejala`);

--
-- Indexes for table `tbkerusakan`
--
ALTER TABLE `tbkerusakan`
  ADD PRIMARY KEY (`kdkerusakan`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbbasis_aturan`
--
ALTER TABLE `tbbasis_aturan`
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbcek_kerusakan`
--
ALTER TABLE `tbcek_kerusakan`
  MODIFY `idcek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
