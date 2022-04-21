-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-20 19:09:08
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
-- 資料表結構 `course_status`
--

DROP TABLE IF EXISTS `course_status`;
CREATE TABLE `course_status` (
  `course_status_id` int(11) NOT NULL,
  `course_status_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course_status`
--

INSERT INTO `course_status` (`course_status_id`, `course_status_name`) VALUES
(1, '報名未開放'),
(2, '報名開放中'),
(3, '報名已截止');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `course_status`
--
ALTER TABLE `course_status`
  ADD PRIMARY KEY (`course_status_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course_status`
--
ALTER TABLE `course_status`
  MODIFY `course_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
