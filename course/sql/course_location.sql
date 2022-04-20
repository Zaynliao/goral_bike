-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-20 19:08:36
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
-- 資料表結構 `course_location`
--

DROP TABLE IF EXISTS `course_location`;
CREATE TABLE `course_location` (
  `course_location_id` int(3) NOT NULL,
  `course_location_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course_location`
--

INSERT INTO `course_location` (`course_location_id`, `course_location_name`) VALUES
(1, '台北'),
(2, '新北'),
(3, '基隆'),
(4, '桃園'),
(5, '宜蘭'),
(6, '新竹'),
(7, '苗栗'),
(8, '台中'),
(9, '南投'),
(10, '彰化'),
(11, '雲林'),
(12, '嘉義'),
(13, '台南'),
(14, '高雄'),
(15, '屏東'),
(16, '台東'),
(17, '花蓮');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `course_location`
--
ALTER TABLE `course_location`
  ADD PRIMARY KEY (`course_location_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course_location`
--
ALTER TABLE `course_location`
  MODIFY `course_location_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;
