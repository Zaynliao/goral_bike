-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 10:33 AM
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
(13, 'Flight', 'heb 7sLEEFzVt-=', 'You get 1% off on a flight to Norway', '2022-04-23', 1, 1),
(14, 'ciuuiuiui', '123', 'testconnnnnnnnnnnntent', '2022-04-30', 0, 1),
(15, 'john', 'as', 'gdfgdsgdsgsdg', '2022-04-29', 0, 1),
(16, 'Flight to mongolia', '-HqHB_HQ@5sk9Z3', 'Get 1% off a flight to mongolia', '2022-04-30', 0, 1),
(17, 'Flight to mongolia', 'J9h=PTBzmUqGY4P', 'Get 1% off a flight to mongolia', '2022-04-30', 0, 1),
(18, 'Trip to gulag', 'QuitStallin', 'You win trip to gulag! Have fun! If you survive, you earn freedom', '2022-09-29', 100, 1),
(19, 'Gulag', 'Gulag', 'Go to gulag', '2443-01-14', 1, 1);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;
