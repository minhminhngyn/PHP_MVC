-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 08:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `24a4041411_nguyenthihaiminh`
--

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `Maloai` varchar(5) NOT NULL,
  `Tenloai` varchar(50) NOT NULL,
  `Mota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`Maloai`, `Tenloai`, `Mota`) VALUES
('A1', 'Bánh quy', ''),
('A10', 'Bánh mì', ''),
('A2', 'Bánh bò', ''),
('A3', 'Bánh da lợn', ''),
('A4', 'Bánh rán', ''),
('A5', 'Bánh sừng bò', ''),
('A6', 'Bánh bông lan', ''),
('A7', 'Bánh cuộn', ''),
('A8', 'Bánh pía', ''),
('A9', 'Bánh kem', '');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `Mahang` varchar(5) NOT NULL,
  `Tenhang` varchar(50) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Hinhanh` varchar(30) NOT NULL,
  `Mota` varchar(100) NOT NULL,
  `Giahang` decimal(10,1) NOT NULL,
  `Maloai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`Mahang`, `Tenhang`, `Soluong`, `Hinhanh`, `Mota`, `Giahang`, `Maloai`) VALUES
('AA1', 'Bánh quy matcha', 12, '', '', 12.0, 'A1'),
('AA10', 'Bánh rán đường', 6, '', '', 16.0, 'A3'),
('AA2', 'Bánh quy scl', 12, '', '', 12.0, 'A1'),
('AA3', 'Bánh quy dâu', 3, '', '', 13.0, 'A1'),
('AA4', 'Bánh quy đen', 4, '', '', 14.0, 'A2'),
('AA5', 'Bánh kem', 6, '', '', 16.0, 'A2'),
('AA6', 'Bánh kem scl', 7, '', '', 18.0, 'A2'),
('AA7', 'Bánh kem matcha', 7, '', '', 18.0, 'A2'),
('AA8', 'Bánh kem lạnh', 8, '', '', 18.0, 'A2'),
('AA9', 'Bánh rán mật', 8, '', '', 16.0, 'A3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`Maloai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Mahang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
