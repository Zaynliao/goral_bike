-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-21 09:04:25
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
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `enable` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `name`, `account`, `password`, `gender`, `birthday`, `address`, `email`, `phone_number`, `create_time`, `enable`) VALUES
(1, 'Eason', '12345', '$2y$10$mgy3i0/HNDwKEGx48/REFeDrxouzH/.FhVzKCY9ZAJ6G3sF2ydc6u', 'male', '2022-04-18', '臺南市永康區永忠路28號', 'yeji@test.com', '0945654789', '2022-04-19 19:29:06', 1),
(2, 'sara', '54321', '$2y$10$/KxuCIh/Wku1hKyDnLKC6OgzzdICW6wQIA75SyAkFB3aBw8K5WpQu', 'male', '2022-04-11', '臺南市鹽水區竹圍33號', 'sara@test.com', '0956123456', '2022-04-19 19:35:42', 1),
(3, 'wade', 'aa1234', '$2y$10$2OWH8T1CA24WZAZOMR/BMuFdFQfSVvMdrO3vFRfMb2L8D18FPQ6xC', 'male', '2022-04-19', '桃園市觀音區富國街33號', 'tom@test.com', '0956123478', '2022-04-20 15:05:58', 1),
(4, 'mike', '99878', '$2y$10$vs0jkE.W/uukDUPpkCAGu.y4nuT72wo3I4yGBvHZzW4wEBvmZJBW2', 'male', '2022-04-13', '臺中市南屯區大墩西二街23號', 'mike@test.com', '0956123478', '2022-04-20 15:06:45', 1),
(5, 'May', '99688', '$2y$10$ITh.ShopxpRCCISwP88FdOnfRqTFSwNbviQUgTD144PJH9MMa2HyO', 'male', '2022-04-08', '桃園市大園區大觀路1號', 'may@test.com', '0900000011', '2022-04-20 15:12:01', 1),
(6, 'john', '77834', '$2y$10$YR5joYC67xmzJ81GFjUuXeSoDMe6YubbRf0lbFjJm2VCyvt14LoEW', 'female', '2022-04-10', '宜蘭縣宜蘭市南橋二路30號', 'john@test.com', '0945654789', '2022-04-20 15:12:50', 1),
(7, 'boni', '96786', '$2y$10$OlyTodB0CyFComAUxZ4u3.cKkuiFe6aeI3wiEkeL8qk8Au0IdxLXu', 'male', '2022-04-19', '桃園市新屋區赤牛欄35號', 'boni@test.com', '0956123456', '2022-04-20 15:54:03', 1),
(8, 'david', '45678', '$2y$10$oq61VWND6rmXm8b5DHT4i.oIDqRbKgJDsC17kYr6npeIfe2lZ4/.G', 'male', '2022-04-14', '臺中市和平區武陵路14號', 'david@test.com', '0987456654', '2022-04-20 15:55:09', 1),
(9, 'kevin', '97878', '$2y$10$ft.zd3Ik7CDaomBbkRqnSeIk/U3/P5x83B.I/ACMzboGVzgQr5P.G', 'male', '2022-04-12', '新北市深坑區紅葉街9號', 'kevin@test.com', '0900002487', '2022-04-20 15:57:48', 1),
(10, 'jocelyn', '97684', '$2y$10$C29KojCc1IzEcvuG79IOx.E8E4f1NkXpwBYACKWsG7d42EafTMgD.', 'male', '2022-04-09', '桃園市龍潭區龍園十路9號', 'jocelyn@test.com', '0900000011', '2022-04-20 15:58:32', 1),
(11, 'andy', '55431', '$2y$10$3r1EytbSayN6jPmRkx/jzulyEi74.CK.s.EyPyh3/DfGdPoJeNRle', 'male', '2022-04-14', '臺南市北門區溪底寮31號', 'andy@test.com', '0955789654', '2022-04-20 16:06:03', 1),
(12, 'jason', '54322', '$2y$10$zhXHXzeWHaDIa5OfcpKQPOwasziHSYYrBradyCNxisdE5XdOgtuV2', 'female', '2022-04-12', '新竹市東區文昌街32號', 'jason@test.com', '0967546123', '2022-04-20 16:08:04', 1),
(13, 'mark', '54323', '$2y$10$rn4/olp3kSzsp4HNaQzRT.V.n093YJTcjRfUj6MaYqmGGbxEBpoTi', 'female', '2022-04-02', '宜蘭縣宜蘭市縣政五街24號', 'mark@test.com', '0933546887', '2022-04-20 16:08:50', 1),
(14, 'dennis', '54324', '$2y$10$0K8sxU5V59n0R64MVZn8j.zcy7FEjaRHWd713oUMm4HzJjaMgXUPa', 'female', '2022-04-13', '臺南市安平區州平一街24號', 'dennis@test.com', '0946878979', '2022-04-20 16:09:33', 1),
(15, 'bush', 'bush123', '$2y$10$d/d1WbUMZ3WJu9kIQ2ydeegSHG3JEHt04.3l79AVl/Ygs7rNKAPmG', 'male', '2022-04-14', '新竹市北區東濱街20號', 'bush@test.com', '0900002487', '2022-04-20 16:10:34', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;
