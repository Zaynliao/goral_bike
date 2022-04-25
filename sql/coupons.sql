-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 09:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `goral_biker`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(5) NOT NULL,
  `coupon_name` varchar(50) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_content` varchar(100) NOT NULL,
  `coupon_expiry_date` date NOT NULL,
  `coupon_discount` int(3) NOT NULL DEFAULT 0,
  `valid` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_code`, `coupon_content`, `coupon_expiry_date`, `coupon_discount`, `valid`) VALUES
(1, 'First bike mania 23% off', '47f3b6CCm4MAD4xz3DR8', 'Get 23% off of your first bike', '2022-05-25', 77, 1),
(2, 'First bike mania 35% off', 'x5ZxrDgBqP6KWPhx382p', 'Get 35% off of your first bike', '2022-05-25', 65, 1),
(3, 'First bike mania 12% off', 'LdJPsUhbDkDFuyHpCR8g', 'Get 12% off of your first bike', '2022-05-25', 88, 1),
(4, 'First bike mania 15% off', 'rXzEYWUH4QwNBkRZ55Mb', 'Get 15% off of your first bike', '2022-05-25', 85, 1),
(5, 'First bike mania 30% off', 'FYFSPeFQ7tt2pB8dZCKj', 'Get 30% off of your first bike', '2022-05-25', 70, 1),
(6, 'Into the desert 25% off', '2mXZbrCnHzywVyMXdDQa', 'Get 25% off on your first trip into the desert', '2022-06-25', 75, 1),
(7, 'Into the desert 60% off', 'vF7wSVkFabw38tCG5gRn', 'Get 60% off on your first trip into the desert', '2022-06-25', 40, 1),
(8, 'Into the desert 56% off', '9CAxFBBgcBuKr2ZgSdAt', 'Get 56% off on your first trip into the desert', '2022-06-25', 44, 1),
(9, 'Into the desert 45% off', 'cGaLPmag75XpqtbQNL2Z', 'Get 45% off on your first trip into the desert', '2022-06-25', 55, 1),
(10, 'Into the desert 68% off', 'vEJVTrr9z8GG8xxwbhTV', 'Get 68% off on your first trip into the desert', '2022-06-25', 32, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
