-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 03:53 PM
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
-- Database: `coffeestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(8, 'Trà', 'trà.jpg', 'Yes', 'Yes'),
(17, 'Coca', 'download.jpg', 'Yes', 'Yes'),
(18, 'sữa', 'suachua_itvg-1024x768.jpg', 'Yes', 'Yes'),
(19, 'cà phê', 'ca-phe-1-1064.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coffee_nhanvien`
--

CREATE TABLE `tbl_coffee_nhanvien` (
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_coffee_nhanvien`
--

INSERT INTO `tbl_coffee_nhanvien` (`fullname`, `username`, `password`, `gender`, `email`, `address`) VALUES
('havanbao', 'admin', '123456', 'nam', 'bao@gmail.com', 'hà nội···'),
('bao', 'nhanvien', '123456', 'nam', 'bao2003@gmail.com', 'hà nội');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coffee_users`
--

CREATE TABLE `tbl_coffee_users` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_coffee_users`
--

INSERT INTO `tbl_coffee_users` (`uid`, `fullname`, `username`, `password`, `gender`, `email`, `address`) VALUES
(8, 'toàndddddd', 'toan', '12345678', 'female', 'toan@gmail.com', 'hà nộiddd'),
(11, 'aaadddd', 'manh', '123456', 'female', 'bdddddddddd@gmail.com', 'hà nộidddd'),
(12, 'Võ Nguyên Phương', '', '', 'male', 'phuong@gmail.com', 'aabcc'),
(13, 'hhhhh', '', '', 'male', 'baoddd1d@gmail.com', 'hn'),
(14, 'hhhhh', 'bao', '123456', 'male', 'b@gmail.com', 'dddd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(15) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(10) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id`, `menu`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(27, 'Bạc xỉu', 25000, 1, 40000, '2023-10-17 22:30:48', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(28, 'Bạc xỉu', 25000, 1, 40000, '2023-10-17 22:35:20', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(29, 'Bạc xỉu', 25000, 1, 40000, '2023-10-17 22:36:28', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(40, 'đen đá', 30000, 1, 40000, '2023-10-18 07:41:20', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(41, 'bạc xỉu', 25000, 1, 40000, '2023-11-06 00:21:23', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(42, 'Trà Xanh', 30000, 1, 40000, '2023-12-07 08:30:23', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(43, 'Trà Xanh', 30000, 1, 40000, '2023-12-07 22:40:11', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(44, 'capuchino', 40000, 1, 40000, '2023-12-09 11:39:11', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(45, 'Capuchino', 40000, 1, 40000, '2023-12-18 17:27:18', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(46, 'Capuchino', 40000, 1, 40000, '2023-12-18 17:30:09', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(47, 'Capuchino', 40000, 1, 40000, '2023-12-18 17:33:22', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(48, 'Capuchino', 40000, 1, 40000, '2023-12-18 17:33:34', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(49, 'Capuchino', 40000, 1, 40000, '2023-12-18 17:34:56', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(50, 'capuchino', 40000, 1, 40000, '2023-12-18 19:21:20', 'On Delivery', 'phuc', '0123456789', 'phuc@gmail.com', 'hà nội'),
(51, 'capuchino', 40000, 1, 40000, '2023-12-18 23:39:38', 'Delivered', 'toàn', '34455', 'toan@gmaildddd', 'hà nội'),
(52, 'capuchino', 40000, 1, 40000, '2023-12-18 23:39:55', 'Ordered', 'toàn', '44444', 'toan@gmail.com', 'hà nội'),
(53, 'capuchino', 40000, 4, 160000, '2023-12-22 20:04:44', 'Ordered', 'toàndddddd', '444444', 'toan@gmail.com', 'hà nộiddd'),
(54, 'capuchino', 40000, 7, 280000, '2023-12-25 11:32:22', 'Ordered', 'baorrr', '333333333', 'bao@gmail.com', 'aaadddd'),
(55, 'xin dung mua', 4, 0, 0, '2023-12-25 11:35:03', 'Cancelled', 'baorrrddddddddd', '44444', 'bao@gmail.com', 'aaadddd'),
(56, 'capuchino', 40000, 1, 40000, '2023-12-25 11:35:03', 'Ordered', 'baorrr', '44444', 'bao@gmail.com', 'aaadddd'),
(57, 'capuchino', 40000, 5, 200000, '2023-12-28 09:13:45', 'Cancelled', 'abcd123', '0129875436', 'bao@gmail.com', 'aaadddd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kho`
--

CREATE TABLE `tbl_kho` (
  `id` int(11) NOT NULL,
  `ten_nguyen_lieu` varchar(255) NOT NULL,
  `ngay_mua` date NOT NULL,
  `so_luong` decimal(10,2) NOT NULL,
  `don_vi` varchar(50) NOT NULL,
  `don_vi_cung_cap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_kho`
--

INSERT INTO `tbl_kho` (`id`, `ten_nguyen_lieu`, `ngay_mua`, `so_luong`, `don_vi`, `don_vi_cung_cap`) VALUES
(0, 'sữa', '2023-12-02', 1.00, 'kg', 'kg'),
(0, 'trứng', '2023-12-31', 12.00, 'quả', 'mộc châu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `name` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`name`, `email`, `message`) VALUES
('', '', ''),
('đông', 'dong@gmail.com', 'dịch vụ tốt'),
('lực', 'luc@gmail.com', 'đồ uống dở'),
('toàn', 'toan@gmail.com', 'dịch vụ cần đc cải thiện tốc độ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(11, 'capuchino', 'xịn xò', 40000, 'capuchino.jpg', 7, 'Yes', 'Yes'),
(21, 'milk', 'ngon ngon', 40, 'suachua_itvg-1024x768.jpg', 18, 'Yes', 'Yes'),
(22, 'coca zero', 'không calo', 100000, 'download (1).jpg', 17, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ttnv`
--

CREATE TABLE `tbl_ttnv` (
  `MaNV` varchar(255) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `GioiTinh` enum('Nam','Ná»¯') DEFAULT NULL,
  `NamSinh` date DEFAULT NULL,
  `SoDienThoai` int(12) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `CongViec` int(11) DEFAULT NULL,
  `TuNgay` datetime DEFAULT NULL,
  `DenNgay` datetime NOT NULL,
  `CaLam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_ttnv`
--

INSERT INTO `tbl_ttnv` (`MaNV`, `HoTen`, `GioiTinh`, `NamSinh`, `SoDienThoai`, `Email`, `CongViec`, `TuNgay`, `DenNgay`, `CaLam`) VALUES
('123456', 'liem', '', '2023-12-01', 123456789, 'liem@gmail.com', 0, '2022-11-11 00:00:00', '2023-12-29 00:00:00', 'Sáng'),
('1234567', 'bảo', 'Nam', '2023-12-01', 1234556783, 'bao@gmail.com', 0, '2022-01-02 00:00:00', '2023-10-10 00:00:00', 'Tối');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tuyendung`
--

CREATE TABLE `tbl_tuyendung` (
  `HoTen` varchar(200) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `SoDienThoai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tuyendung`
--

INSERT INTO `tbl_tuyendung` (`HoTen`, `NgaySinh`, `DiaChi`, `Email`, `SoDienThoai`) VALUES
('hà văn bảo', '2023-12-01', 'hà nội', 'havanbao2003@gmail.com', 705086632),
('phạm ngọc hơn', '2023-11-04', 'hải phòng', 'hon@gmail.com', 123456789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coffee_users`
--
ALTER TABLE `tbl_coffee_users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_coffee_users`
--
ALTER TABLE `tbl_coffee_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
