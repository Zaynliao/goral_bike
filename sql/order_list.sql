-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-21 09:01:04
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
-- 資料表結構 `order_list`
--

DROP TABLE IF EXISTS `order_list`;
CREATE TABLE `order_list` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_address` varchar(50) NOT NULL,
  `total_amount` int(15) NOT NULL,
  `order_status` int(3) NOT NULL,
  `order_create_time` datetime NOT NULL,
  `remark` varchar(100) NOT NULL,
  `payment_method_id` int(10) NOT NULL,
  `coupon_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `order_list`
--

INSERT INTO `order_list` (`order_id`, `user_id`, `order_address`, `total_amount`, `order_status`, `order_create_time`, `remark`, `payment_method_id`, `coupon_id`) VALUES
(1, 1, '322台北市中壢區新生路二段421號   ', 2222222, 1, '2022-04-20 13:49:00', '不要蔥薑蒜不加辣', 1, 1),
(2, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(3, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1),
(4, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(5, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1),
(6, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(7, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1),
(8, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(9, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1),
(10, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(11, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1),
(12, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(13, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1),
(14, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(15, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1),
(16, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(17, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1),
(18, 2, '320桃園市中壢區新生路二段421號', 555550000, 1, '2022-04-20 12:15:55', '', 2, 1),
(19, 1, '320桃園市中壢區新生路二段421號', 1000000, 1, '2022-04-20 12:15:55', 'asdasd', 1, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;
