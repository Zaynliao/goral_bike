-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-20 19:08:00
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
-- 資料表結構 `course_category`
--

DROP TABLE IF EXISTS `course_category`;
CREATE TABLE `course_category` (
  `course_category_id` int(3) NOT NULL,
  `course_category_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course_category`
--

INSERT INTO `course_category` (`course_category_id`, `course_category_name`) VALUES
(1, '入門'),
(2, '進階');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`course_category_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course_category`
--
ALTER TABLE `course_category`
  MODIFY `course_category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
