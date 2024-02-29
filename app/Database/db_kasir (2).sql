-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 07:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(4) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kd_barang`, `nm_barang`, `harga`, `stok`, `create_date`, `update_date`, `delete_date`) VALUES
(1, 'BRGaaaa', 'Batre Energizer AAA', '23000', '16', '2024-02-28 10:07:07', '2024-02-27 21:22:41', NULL),
(2, 'BRGG8JI', 'Aqua 500ml', '4500', '10', '2024-02-28 21:15:35', NULL, NULL),
(3, 'BRGnaXK', 'Beng-Beng', '5000', '20', '2024-02-28 14:42:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(4) NOT NULL,
  `barang` int(4) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `user` int(4) NOT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `barang`, `jumlah`, `user`, `create_date`) VALUES
(6, 3, '2', 2, '2024-02-29 09:42:34'),
(7, 3, '2', 2, '2024-02-29 10:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(4) NOT NULL,
  `nm_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nm_level`) VALUES
(1, 'Admin'),
(2, 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `notrans`
--

CREATE TABLE `notrans` (
  `id_ntr` int(4) NOT NULL,
  `ntr` varchar(50) NOT NULL,
  `n_pelanggan` int(4) NOT NULL,
  `status` enum('Pending','Paid') NOT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `nominal` varchar(50) NOT NULL,
  `bayar` varchar(50) DEFAULT NULL,
  `kembali` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notrans`
--

INSERT INTO `notrans` (`id_ntr`, `ntr`, `n_pelanggan`, `status`, `payment`, `nominal`, `bayar`, `kembali`, `create_date`, `update_date`, `delete_date`) VALUES
(2, 'TRNdowL', 2, 'Paid', 'QRIS', '9000', '9000', '0', '2024-02-28 14:23:02', '2024-02-28 14:38:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `outbound`
--

CREATE TABLE `outbound` (
  `id_out` int(4) NOT NULL,
  `ntr_out` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outbound`
--

INSERT INTO `outbound` (`id_out`, `ntr_out`, `keterangan`, `jumlah`, `create_date`, `update_date`, `delete_date`) VALUES
(1, 'aa', 'aa', '30000', '2024-02-28 22:19:30', NULL, NULL),
(2, 'OUTL93D', 'stok beng beng', '500000', '2024-02-28 22:27:31', NULL, NULL),
(3, 'OUT55ew', 'stok beng beng', '500000', '2024-02-28 22:27:39', NULL, NULL),
(4, 'OUTGVZ4', 'gaji', '20000', '2024-02-29 08:32:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(4) NOT NULL,
  `nm_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nhp` varchar(100) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `alamat`, `nhp`, `create_date`, `update_date`, `delete_date`) VALUES
(2, 'ahuat yao', 'pinang', '213213213', '2024-02-28 14:09:10', '2024-02-28 14:12:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(4) NOT NULL,
  `tgl` date NOT NULL,
  `barang` varchar(50) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `tgl`, `barang`, `quantity`, `create_date`, `delete_date`) VALUES
(1, '2024-02-28', 'BRGG8JI', '5', '2024-02-28 10:42:19', NULL),
(2, '2024-02-28', 'BRGG8JI', '5', '2024-02-28 10:48:25', '2024-02-28 10:53:50'),
(4, '2024-02-29', 'BRGaaaa', '1', '2024-02-29 08:53:08', NULL);

--
-- Triggers `stok`
--
DELIMITER $$
CREATE TRIGGER `add_stok` AFTER INSERT ON `stok` FOR EACH ROW BEGIN
    UPDATE barang
    SET stok = stok + NEW.quantity
    WHERE kd_barang = NEW.barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_return` AFTER UPDATE ON `stok` FOR EACH ROW BEGIN    
IF NEW.delete_date IS NOT NULL AND OLD.delete_date IS NULL THEN
        -- Handle update case: Set delete_date to not null
       	UPDATE barang
    	SET stok = stok - NEW.quantity
   	 	WHERE kd_barang = NEW.barang;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_tran` int(4) NOT NULL,
  `notrans` varchar(100) NOT NULL,
  `barang` int(4) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_tran`, `notrans`, `barang`, `jumlah`, `harga`, `create_date`, `delete_date`) VALUES
(1, 'TRNdowL', 2, '2', '9000', '2024-02-28 14:23:02', NULL);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `minus_stok` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
    UPDATE barang
    SET stok = stok - NEW.jumlah
    WHERE id_barang = NEW.barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `return_stok` AFTER UPDATE ON `transaksi` FOR EACH ROW BEGIN    
IF NEW.delete_date IS NOT NULL AND OLD.delete_date IS NULL THEN
        -- Handle update case: Set delete_date to not null
       	UPDATE barang
    	SET stok = stok + NEW.jumlah
   	 	WHERE id_barang = NEW.barang;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `n_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `level` int(4) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `n_lengkap`, `username`, `email`, `pw`, `level`, `create_date`, `update_date`, `delete_date`) VALUES
(2, 'Punya Admin Admin', 'admin', 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '2024-02-28 08:54:54', '2024-02-29 08:05:38', NULL),
(3, 'yanda', 'yaya', 'yan@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, '2024-02-28 08:55:40', NULL, NULL),
(6, 'aaaa', 'aa', 'a@gmail.com', '28c8edde3d61a0411511d3b1866f0636', 2, '2024-02-28 21:29:09', '2024-02-28 21:33:14', '2024-02-29 08:36:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE,
  ADD UNIQUE KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `nm_level` (`nm_level`);

--
-- Indexes for table `notrans`
--
ALTER TABLE `notrans`
  ADD PRIMARY KEY (`id_ntr`),
  ADD UNIQUE KEY `ntr` (`ntr`);

--
-- Indexes for table `outbound`
--
ALTER TABLE `outbound`
  ADD PRIMARY KEY (`id_out`),
  ADD UNIQUE KEY `ntr_out` (`ntr_out`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `nhp` (`nhp`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_tran`),
  ADD UNIQUE KEY `notrans` (`notrans`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `n_lengkap` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notrans`
--
ALTER TABLE `notrans`
  MODIFY `id_ntr` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `outbound`
--
ALTER TABLE `outbound`
  MODIFY `id_out` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_tran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
