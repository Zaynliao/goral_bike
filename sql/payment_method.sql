-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-21 09:02:21
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 資料庫: `goral_biker`
--

-- --------------------------------------------------------

--
-- 資料表結構 `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE `payment_method` (
  `id` int(2) NOT NULL,
  `payment_method_name` varchar(100) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_method_name`, `valid`) VALUES
(1, '線上付款', 1),
(2, '銀行轉帳', 1),
(3, '超商取貨付款', 1),
(4, '貨到付款', 1),
(5, '綠界科技', 1),
(6, 'Debit', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
