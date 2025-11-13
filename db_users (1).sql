-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 09:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_produk`, `nama_produk`, `barcode`, `harga`, `stok`) VALUES
(1, 'PRD001', 'Indomie Goreng', '8992388110012', 3700, 260),
(2, 'PRD002', 'Aqua Botol 600ml', '8992753111123', 4000, 457),
(3, 'PRD003', 'Kopi Kapal Api 65gr', '8991002101234', 2500, 200),
(4, 'PRD004', 'Pepsodent 75gr', '8999999701122', 12000, 230),
(5, 'PRD005', 'Rinso Anti Noda 800gr', '8999999707773', 18000, 123),
(6, 'PRD006', 'Teh Pucuk', '8992388110017', 4000, 350),
(7, 'PRD007', 'Regazza Parfume', '8992388118865', 30000, 343);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `id_supplier`, `nama_supplier`, `telepon`, `alamat`) VALUES
(1, 'SUP001', 'PT Indofood Sukses Makmur Tbk', '021-57958822', 'Jakarta Barat'),
(2, 'SUP002', 'PT Unilever Indonesia Tbk', '021-80820000', 'Cikarang, Bekasi'),
(3, 'SUP003', 'PT Mayora Indah Tbk', '021-80637700', 'Tangerang'),
(4, 'SUP004', 'PT Tirta Investama (Danone Aqua)', '021-29963100', 'Jakarta Selatan'),
(5, 'SUP005', 'PT Ultra Jaya Milk Industry', '022-6072663', 'Bandung'),
(9, 'SUP006', 'PT masaya', '022-6072664', 'Sukabumi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(18, 'ninot', 'agisnarh@gmail.com', '$2y$10$TYBliuQ6U8uqNFJkqx9gKO25bdbuXNdipznfMSlH3Ga/EGTKBB8B6'),
(19, 'falentino', 'falentino@gmail.com', '$2y$10$bfa2cwJ0JGNtEEbX.iHb4eO028d/a4uNZt0IF2zIyqezebWf2xB52'),
(21, 'Agisna', 'agisnarahmathia@gmail.com', '$2y$10$TrFgXFeSZnycbGVcvEh3OeN3paPdQBMVCOEJLQvC5MiPEZuMjl6.2'),
(23, 'akih', 'faqih@gmail.com', '$2y$10$ilNkImJWYe9RD7OH7QzKfuOQSn7xK.V4T7eVp0PT1nIFsVm.qNVk6'),
(24, 'Citra', 'Citra@gmail.com', '$2y$10$GbL8xGHQFiXOQ5g0Lw5SAu9nVtQ/DM4AJhiWjJW9L7RC46Kc2omCW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
