-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-24 15:14:31
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
-- 資料表結構 `accessory_category`
--

DROP TABLE IF EXISTS `accessory_category`;
CREATE TABLE `accessory_category` (
  `id` int(3) UNSIGNED NOT NULL,
  `accessory_category_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `accessory_category`
--

INSERT INTO `accessory_category` (`id`, `accessory_category_name`) VALUES
(1, '車架'),
(2, '避震器'),
(3, '前叉'),
(4, '曲柄'),
(5, '踏板'),
(6, '變速器'),
(7, '飛輪'),
(8, '鍊條'),
(9, '輪組'),
(10, '輪胎'),
(11, '座桿'),
(12, '坐墊'),
(13, '煞車');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `accessory_category`
--
ALTER TABLE `accessory_category`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `accessory_category`
--
ALTER TABLE `accessory_category`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;
