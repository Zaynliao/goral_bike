-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-25 18:50:03
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
-- 資料表結構 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_images` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_update` date NOT NULL,
  `product_category_id` int(5) NOT NULL,
  `valid` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_images`, `product_price`, `product_update`, `product_category_id`, `valid`) VALUES
(1, '挑戰者300', '挑戰者300.jpg', 18800, '2022-04-22', 1, 1),
(2, '公爵500 ', '公爵500.jpg', 11800, '2022-04-12', 1, 1),
(3, '探索者100\r\n', '探索者100.jpg\r\n', 11800, '2022-04-06', 1, 1),
(4, '公爵300', '公爵300.jpg', 12800, '2022-04-20', 1, 1),
(5, '勇士500-D', '勇士500-D.jpg', 9500, '2022-04-28', 1, 1),
(6, '勇士500-V', '勇士500-V.jpg', 8500, '2022-04-29', 1, 1),
(7, '勇士300-DS', '勇士300-DS.jpg', 8500, '2022-04-01', 1, 1),
(8, '勇士300-V', '勇士300-V.jpg', 7500, '2022-05-20', 1, 1),
(9, '維多300-V', '維多300-V.jpg', 7980, '2022-04-17', 1, 1),
(10, '維多利亞500', '維多利亞500.jpg', 7480, '2022-04-27', 1, 1),
(11, '維多利亞600D', '維多利亞600D.jpg', 11800, '2022-04-28', 1, 1),
(12, '維多利亞500MD', '維多利亞500MD.jpg', 9500, '2022-04-26', 1, 1),
(13, '達卡624MD', '達卡624MD.jpg', 7280, '2022-04-28', 1, 1),
(14, '達卡624', '達卡624.jpg', 6500, '2022-04-20', 1, 1),
(15, 'FS90', 'FS90.jpg', 3950, '2022-04-21', 1, 1),
(16, 'BIG_NINE7000', 'BIG_NINE7000.jpg', 118000, '2022-04-01', 2, 1),
(17, 'BIG_NINE_XT', 'BIG_NINE_XT.jpg', 79800, '2022-04-27', 2, 1),
(18, '探索者300', '探索者300.jpg', 14800, '2022-04-29', 1, 1),
(19, 'BIG_NINE_5000 ', 'BIG_NINE_5000.jpg', 69800, '2022-04-27', 2, 1),
(20, 'BIG_NINE_3000', 'BIG_NINE_3000.jpg', 52800, '2022-04-30', 2, 1),
(21, 'BIG_NINE_700', 'BIG_NINE_700.jpg', 55000, '2022-05-12', 2, 1),
(22, 'BIG_NINE_600', 'BIG_NINE_600.jpg', 41800, '2022-05-17', 2, 1),
(23, 'BIG_NINE_LIMITED', 'BIG_NINE_LIMITED.jpg', 32800, '2022-04-27', 2, 1),
(24, 'BIG_NINE_XT_EDITION', 'BIG_NINE_XT_EDITION.jpg', 49800, '2022-04-22', 2, 0),
(25, 'BIG_NINE_XT2', 'BIG_NINE_XT2.jpg', 45000, '2022-04-27', 2, 1),
(26, 'ONE_SIXTY_700', 'ONE_SIXTY_700.jpg', 36000, '2022-04-22', 2, 1),
(27, 'BIG_NINE_SLX_EDITION', 'BIG_NINE_SLX_EDITION.jpg', 36000, '2022-04-02', 2, 0),
(28, 'BIG_NINE_500', 'BIG_NINE_500.jpg', 29800, '2022-04-20', 2, 0),
(29, 'BIG_NINE_400', 'BIG_NINE_400.jpg', 27800, '2022-04-13', 2, 0),
(30, 'BIG_NINE_300', 'BIG_NINE_300.jpg', 23800, '2022-04-13', 2, 0),
(31, 'BIG_NINE_200', 'BIG_NINE_200.jpg', 22000, '2022-04-27', 2, 1),
(32, 'BIG_NINE_100_2x', 'BIG_NINE_100_2x.jpg', 19900, '2022-04-28', 2, 1),
(33, 'BIG_NINE_100_3x', 'BIG_NINE_100_3x.jpg', 19900, '2022-04-28', 2, 1),
(34, 'BIG_NINE_60_2x\r\n', 'BIG_NINE_60_2x.jpg', 19800, '2022-05-18', 2, 1),
(35, 'BIG_NINE_60_3x', 'BIG_NINE_60_3x.jpg', 19800, '2022-04-27', 2, 1),
(36, 'BIG_NINE_20_2x', 'BIG_NINE_20_2x.jpg', 16800, '2022-04-28', 2, 1),
(37, 'BIG_NINE_20_3x', 'BIG_NINE_20_3x.jpg', 16800, '2022-04-29', 2, 1),
(38, 'BIG_NINE_15\r\n', 'BIG_NINE_15.jpg', 14800, '2022-06-01', 2, 1),
(39, 'BIG_SEVEN_300', 'BIG_SEVEN_300.jpg', 23800, '2022-06-02', 2, 1),
(40, 'BIG_SEVEN_200', 'BIG_SEVEN_200.jpg', 22000, '2022-04-28', 2, 1),
(41, 'BIG_SEVEN_100_2x', 'BIG_SEVEN_100_2x.jpg', 19900, '2022-05-16', 2, 1),
(42, 'BIG_SEVEN_60_2x', 'BIG_SEVEN_60_2x.jpg', 19800, '2022-04-26', 2, 1),
(43, 'BIG_SEVEN_20', 'BIG_SEVEN_20.jpg', 16800, '2022-04-28', 2, 1),
(44, 'BIG_SEVEN_15', 'BIG_SEVEN_15.jpg', 14800, '2022-04-26', 2, 1),
(45, 'BIG_TRAIL_600', 'BIG_TRAIL_600.jpg', 45000, '2022-04-27', 2, 1),
(46, 'BIG_TRAIL_500', 'BIG_TRAIL_500.jpg', 35000, '2022-04-25', 2, 1),
(47, 'BIG_TRAIL_400', 'BIG_TRAIL_400.jpg', 29900, '2022-04-24', 2, 1),
(48, 'BIG_TRAIL_200', 'BIG_TRAIL_200.jpg', 23800, '2022-04-24', 2, 1),
(49, 'MATTS_7_80', 'MATTS_7_80.jpg', 21800, '2022-04-24', 2, 1),
(50, 'MATTS_7_70', 'MATTS_7_70.jpg', 20800, '2022-04-25', 2, 1),
(51, 'MATTS_7_60_2x', 'MATTS_7_60_2x.jpg', 18000, '2022-04-24', 2, 1),
(52, 'MATTS_7_30', 'MATTS_7_30.jpg', 16000, '2022-04-16', 2, 1),
(53, 'MATTS_7_20', 'MATTS_7_20.jpg', 15000, '2022-04-26', 2, 1),
(54, 'MATTS_J_CHAMPION', 'MATTS_J_CHAMPION.jpg', 22500, '2022-04-24', 2, 1),
(55, 'MATTS_J_24', 'MATTS_J_24.jpg', 14500, '2022-04-30', 2, 1),
(56, 'MATTS_6_10_V', 'MATTS_6_10_V.jpg', 14500, '2022-04-15', 2, 1),
(57, 'ONE_TWENTY_600', 'ONE_TWENTY_600.jpg', 69800, '2022-04-15', 3, 1),
(58, 'ONE_TWENTY_400', 'ONE_TWENTY_400.jpg', 51800, '2022-04-01', 3, 1),
(59, 'ONE_FORTY_600', 'ONE_FORTY_600.jpg', 66800, '2022-04-22', 3, 1),
(60, 'ONE_FORTY_400', 'ONE_FORTY_400.jpg', 55800, '2022-04-15', 3, 1),
(61, 'ONE_SIXTY_700     ', 'ONE_SIXTY_700.jpg', 52800, '2022-03-24', 2, 1),
(62, 'MY22 Reign Advanced Pro', 'MY22 Reign Advanced Pro.jpg', 168000, '2022-04-25', 3, 1),
(63, 'Reign 29 1', 'Reign 29 1.jpg', 10800, '2022-04-25', 3, 1),
(64, 'Reign 29', 'Reign 29.jpg', 98000, '2022-04-25', 3, 1),
(65, 'Trance X Advanced Pro 29 1', 'Trance X Advanced Pro 29 1.jpg', 168000, '2022-04-25', 3, 1),
(66, 'Trance X 29 1', 'Trance X 29 1.jpg', 98000, '2022-04-25', 3, 1),
(67, 'Trance X 29 2', 'Trance X 29 2.jpg', 72800, '2022-04-25', 3, 1),
(68, 'Trance Advanced Pro 29 1', 'Trance Advanced Pro 29 1.jpg', 148000, '2022-04-25', 3, 1),
(69, 'Anthem 29 2', 'Anthem 29 2.jpg', 59800, '2022-04-25', 2, 1),
(70, 'XTC Advanced 29 1', 'XTC Advanced 29 1.jpg', 125000, '2022-04-25', 3, 1),
(71, 'XTC ADVANCED 3 ', 'XTC ADVANCED 3.jpg ', 49900, '2022-04-25', 2, 1),
(72, 'XTC SLR 2', 'XTC SLR 2.jpg', 36800, '2022-04-25', 2, 0),
(73, 'XtC 800', 'XtC 800.jpg', 22800, '2022-04-25', 1, 1),
(141, 'x500', 'BIG_NINE_20_2x.jpg', 19880, '2022-04-25', 2, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
COMMIT;
