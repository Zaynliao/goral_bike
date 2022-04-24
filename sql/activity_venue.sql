-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 04 月 24 日 10:12
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 資料庫: `goral_biker`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activity_venue`
--

DROP TABLE IF EXISTS `activity_venue`;
CREATE TABLE `activity_venue` (
  `id` int(3) UNSIGNED NOT NULL,
  `activity_venue_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `activity_venue`
--

INSERT INTO `activity_venue` (`id`, `activity_venue_name`) VALUES
(1, '北部'),
(2, '中部'),
(3, '南部'),
(4, '東部');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `activity_venue`
--
ALTER TABLE `activity_venue`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `activity_venue`
--
ALTER TABLE `activity_venue`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
