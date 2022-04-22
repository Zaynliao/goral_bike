-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-21 17:17:38
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
-- 資料表結構 `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `course_id` int(3) NOT NULL,
  `course_category_id` int(3) NOT NULL,
  `course_title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_pictures` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_location_id` int(3) NOT NULL,
  `course_date` date NOT NULL,
  `course_enrollment` int(3) NOT NULL,
  `course_start_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_end_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_status_id` int(2) NOT NULL,
  `course_price` int(7) NOT NULL,
  `course_content` varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_inventory` int(3) NOT NULL,
  `course_valid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `classes`
--

INSERT INTO `classes` (`course_id`, `course_category_id`, `course_title`, `course_pictures`, `course_location_id`, `course_date`, `course_enrollment`, `course_start_time`, `course_end_time`, `course_status_id`, `course_price`, `course_content`, `course_inventory`, `course_valid`) VALUES
(1, 1, '越野小學堂', 'Taoyuan-20220115.jpg', 8, '2022-01-08', 6, '2021-12-25T10:00', '2022-01-04T10:00', 3, 600, '適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n名額限制\r\n　　6 人\r\n報名時間\r\n　　2022/01/01 00:00 ~ 2022/01/15 00:00\r\n活動時間\r\n　　2022/01/22 08:30\r\n收費標準\r\n　　600元/人\r\n課程地點\r\n　　東東單車公園\r\n　　Don Don Bike Park\r\n　　（經緯度搜尋：5QP4+J8 北屯區 台中市）\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　教學1小時\r\n　　自由練習及指導1小時\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 1),
(2, 2, '越野小學堂', 'Taichung-20220115.jpg', 8, '2022-01-15', 6, '2022-01-01T10:00', '2022-01-12T10:00', 3, 1400, '適合對象\r\n　　已有基礎技巧且想學習更多技巧的登山車騎乘者\r\n名額限制\r\n　　6 人\r\n報名時間\r\n　　2022/01/01 10:00 AM ~ 2022/01/12 10:00 AM\r\n活動時間\r\n　　2022/01/15 08:30\r\n收費標準\r\n　　1400元/人\r\n課程地點\r\n　　東東單車公園\r\n　　Don Don Bike Park\r\n　　（經緯度搜尋：5QP4+J8 北屯區 台中市）\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　教學 2 小時\r\n　　　1. 進階Bike Check\r\n　　　2. 複習基本姿勢\r\n　　　3. 平衡(重心轉移)\r\n　　　4. 路線選擇與觀察\r\n　　　5. 過彎(上)\r\n\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 1),
(3, 2, 'MTB 訓練營', '003-Taoyuan-20220415.jpg', 0, '2022-01-22', 12, '2022-01-05T10:00', '2022-01-19T10:00', 3, 1000, '在越野跑中，並不是所有的山徑都能跑，所以〝走路〞也是越野跑的一部份；同理，騎登山車也是一樣的，碰到沒有把握的路段，用〝牽車〞的方式通過阻礙再繼續騎，這是騎登山車常見的情況。但，你不會一直想用牽的！\r\n騎登山車最大的樂趣在於你能在山徑上「騎得多且牽的少」，而教學能讓你快速掌握技巧，用最少的時間，學會突破障礙的方式。\r\n在桃園光華坑挑出相似的地形場域，以初階、進階、高階三種不同技法，指導正在備賽的朋友們，學會用安全的方式跨越阻礙。\r\n\r\n適合對象\r\n　　已有基礎技巧且想學習更多技巧的登山車騎乘者\r\n名額限制\r\n　　12 人\r\n報名時間\r\n　　2022/01/05（三） 上午 10:00 ~ 2022/01/19（三） 10:00\r\n活動時間\r\n　　2022/01/22（六）08:30\r\n收費標準\r\n　　1000元/人\r\n課程地點\r\n　　桃園光華坑\r\n　　桃園市龜山區頂湖六街\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　1. 登山車裝備的檢視與評估\r\n　　2. 初、進、高階過彎技巧\r\n　　3. 初、進、高階過彎突破障礙方式\r\n　　4. 初、進、高階上下坡技巧\r\n　　5. 初、進、高階上下坡突破障礙方式\r\n　　6. 賽道經驗分享\r\n　　7. 成果驗收－限時越野繞圈挑戰賽\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3.每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 1),
(4, 1, 'test', 'Taichung-20220115.jpg', 0, '2022-04-15', 1, '2022-04-20T10:31', '2022-04-20T10:34', 0, 600, 'test', 1, 0),
(5, 2, '越野跨領域', 'Kenting001.jpg', 0, '2022-01-29', 20, '2022-01-12T10:00', '2022-01-26T10:00', 3, 2400, 'XTERRA 源起 1996 年，以登山車、越野跑取代鐵人三項在公路上的競賽型態，不但吸引許多公路鐵人跨領域嚐試，也讓單車以外的運動走進登山車愛好者的生活。此後，XTERRA 每年以巡迴賽的方式，邀約更多喜愛親近大自然的夥伴們加入 XTERRA 大家庭，共同探索地球上最值得造訪的綺麗風景。\r\n\r\n2018 年，XTERRA 被引進台灣，在恆春半島的墾丁國家公園找到銜接游泳、登山車、越野跑三項運動最接近的距離，同時也發掘出原來墾丁擁有的不僅僅只是海洋與觀光，在半島深處的山野之間，還隱藏著動人的美景與歷史故事。\r\n\r\n大自然的奧妙，就是能讓你在與山野為伍中，發現不同的領悟與驚喜！2022 XTERRA Taiwan 來台即將邁入五周年，XTERRA Taiwan 持續深耕 We Play & We Protect 的精神，邀請老朋友、新朋友齊聚墾丁，在享受探索、守護擁有中創造新的故事。\r\n\r\n\r\n適合對象\r\n　　已有基礎技巧且想學習更多技巧的登山車騎乘者\r\n名額限制\r\n　　12 人\r\n報名時間\r\n　　2022/01/12 上午 10:00 ~ 2022/01/26 上午 10:00\r\n活動時間\r\n　　2022/01/26 08:30\r\n收費標準\r\n　　2400元/人\r\n課程地點\r\n　　墾丁國家公園\r\n　　墾丁石牛溪農場\r\n　　屏東縣恆春鎮墾丁路石牛巷1-3號\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n                            \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 1),
(6, 1, 'tes', '006-north-20221219.jpg', 0, '2022-04-01', 6, '2022-04-29T10:37', '2022-04-29T10:37', 1, 600, 'test', 6, 0),
(7, 1, 'joe', 'R8lbbU04WECaIQvz26ZQKQF7WjCvoLP6Yirjvzbw-web.jpg', 0, '2022-05-07', 3, '2022-04-28T10:38', '2022-04-30T10:38', 1, 6, 'e', 3, 0),
(8, 1, '6', 'Taichung-20220115.jpg', 0, '2022-04-01', 6, '2022-04-29T10:40', '2022-04-30T10:40', 0, 600, 'tset', 6, 0),
(9, 1, 'joe', 'Taoyuan-20220115.jpg', 0, '2022-04-06', 6, '2022-04-15T10:40', '2022-04-29T10:40', 0, 600, 'test', 6, 1),
(10, 1, 'test', 'Taichung-20220115.jpg', 0, '2022-04-13', 600, '2022-04-05T10:41', '2022-04-05T10:41', 0, 600, 'test', 600, 0),
(11, 1, 'test', 'Taichung-20220115.jpg', 0, '2022-04-01', 6, '2022-04-07T10:42', '2022-04-11T10:42', 0, 600, 'test', 6, 1),
(12, 1, 'test', 'Taoyuan-20220115.jpg', 0, '2022-04-01', 6, '2022-04-21T10:44', '2022-04-30T10:44', 0, 600, 'tes', 6, 1),
(13, 1, 'test', 'Taichung-20220115.jpg', 0, '2022-04-08', 3, '2022-04-20T00:52', '2022-04-29T10:52', 0, 600, 'test', 3, 1),
(14, 1, 'joe', 'Taichung-20220108.jpg', 0, '2022-04-07', 1, '2022-04-30T10:55', '2022-05-07T10:55', 0, 60, 'r', 1, 1),
(15, 1, 'joe', 'Taichung-20220115.jpg', 0, '2022-04-13', 6, '2022-04-20T01:56', '2022-04-30T10:56', 0, 6, 'r', 6, 1),
(16, 1, 'tes', 'Taichung-20220115.jpg', 0, '2022-04-08', 6, '2022-04-21T10:57', '2022-05-06T10:57', 0, 6, 'tes', 6, 1),
(17, 1, 'tes', 'Taichung-20220108.jpg', 0, '2022-04-01', 6, '2022-04-14T11:00', '2022-04-30T11:00', 0, 6, '5', 6, 1),
(18, 1, 'tes', 'Taichung-20220108.jpg', 0, '2022-04-01', 6, '2022-04-30T11:03', '2022-05-07T11:03', 0, 4, '5', 6, 1),
(19, 1, 'test', 'Taichung-20220115.jpg', 0, '2022-04-06', 3, '2022-04-09T11:10', '2022-04-13T11:10', 0, 6, 'tes', 3, 1),
(20, 1, 'tes', 'Taoyuan-20220115.jpg', 0, '2022-04-13', 3, '2022-04-20T02:11', '2022-04-20T11:17', 0, 60, 'test', 3, 1),
(21, 1, 'test', 'Taichung-20220108.jpg', 0, '2022-04-30', 6, '2022-04-01T11:59', '2022-04-02T11:59', 0, 600, 'tst', 6, 1),
(22, 2, 'testnav', 'Taoyuan-20220115.jpg', 0, '2022-05-07', 6, '2022-04-20T15:48', '2022-04-30T13:53', 0, 6000, 'testnav', 6, 1),
(23, 1, 'reloadc', 'north001.jpg', 0, '2022-05-07', 6, '2022-04-05T13:50', '2022-04-30T13:50', 1, 6000, 'reloadc', 6, 1),
(24, 1, 'reloadc', 'hC8Sx1VkN9Z1VHRGIKvIpEMURiepTu2FUSwpjBCs-web.jpg', 0, '2022-05-07', 6, '2022-04-05T13:50', '2022-04-30T13:50', 1, 6000, 'reloadc', 6, 1),
(25, 1, 'reloadc', 'iX12VbHv4MHThoENOep7lm52FVExrdO8h1YHVt6Y-web.jpg', 0, '2022-05-07', 6, '2022-04-05T13:50', '2022-04-30T13:50', 1, 6000, 'reloadc', 6, 1),
(26, 1, 'test', '006-north-20221219.jpg', 0, '2022-04-30', 2, '2022-04-20T18:19', '2022-04-20T18:21', 0, 600, 'test', 2, 1),
(27, 1, 'test', '006-north-20221219.jpg', 0, '2022-04-30', 2, '2022-04-20T18:19', '2022-04-20T18:21', 0, 600, 'test', 2, 1),
(28, 2, 'test', 'Taichung-20220115.jpg', 0, '2022-04-07', 12, '2022-04-01T18:35', '2022-04-02T18:35', 0, 600, 'test', 12, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(5) NOT NULL,
  `coupon_name` varchar(50) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_content` varchar(100) NOT NULL,
  `coupon_expiry_date` date NOT NULL,
  `valid` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_code`, `coupon_content`, `coupon_expiry_date`, `valid`) VALUES
(1, 'Submarine', 'g BWsvkM=-2WK97', 'You get 1% off on a flight to Norway', '2022-04-22', 1),
(2, 'Flight', 'yeD9?EUpwgc%gVy', 'You get 1% off on a flight to Norway', '2022-04-30', 1),
(3, 'Flight', 'heb+7sLEEFzVt-=', 'You get 1% off on a flight to Norway', '2022-04-30', 1),
(4, 'ciuuiuiui', '123', 'testconnnnnnnnnnnntent', '2022-04-30', 1),
(5, 'john', 'as', 'gdfgdsgdsgsdg', '2022-04-29', 1);

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
  `product_category_id` int(5) NOT NULL,
  `valid` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_images`, `product_price`, `product_category_id`, `valid`) VALUES
(1, '挑戰者300', '挑戰者300.jpg', 18800, 1, 0),
(2, '公爵500 ', '公爵500.jpg', 118000, 1, 1),
(3, '探索者100\r\n', '探索者100.jpg\r\n', 11800, 1, 1),
(4, '公爵300', '公爵300.jpg', 12800, 1, 1),
(5, '勇士500-D', '勇士500-D.jpg', 9500, 1, 1),
(6, '勇士500-V', '勇士500-V.jpg', 8500, 1, 1),
(7, '勇士300-DS', '勇士300-DS.jpg', 8500, 1, 1),
(8, '勇士300-V', '勇士300-V.jpg', 7500, 1, 1),
(9, '維多300-V', '維多300-V.jpg', 7980, 1, 1),
(10, '維多利亞500', '維多利亞500.jpg', 7480, 1, 1),
(11, '維多利亞600D', '維多利亞600D.jpg', 11800, 1, 1),
(12, '維多利亞500MD', '維多利亞500MD.jpg', 9500, 1, 1),
(13, '達卡624MD', '達卡624MD.jpg', 7280, 1, 1),
(14, '達卡624', '達卡624.jpg', 6500, 1, 1),
(15, 'FS90', 'FS90.jpg', 3950, 1, 1),
(16, 'BIG_NINE7000', 'BIG_NINE7000.jpg', 118000, 2, 1),
(17, 'BIG_NINE_XT', 'BIG_NINE_XT.jpg', 79800, 2, 1),
(18, '探索者300', '探索者300.jpg', 14800, 1, 1),
(19, 'BIG_NINE_5000 ', 'BIG_NINE_5000.jpg', 698000, 2, 1),
(20, 'BIG_NINE_3000', 'BIG_NINE_3000.jpg', 52800, 2, 1),
(21, 'BIG_NINE_700', 'BIG_NINE_700.jpg', 55000, 2, 1),
(22, 'BIG_NINE_600', 'BIG_NINE_600.jpg', 41800, 2, 1),
(23, 'BIG_NINE_LIMITED', 'BIG_NINE_LIMITED.jpg', 32800, 2, 1),
(24, 'BIG_NINE_XT_EDITION', 'BIG_NINE_XT_EDITION.jpg', 49800, 2, 1),
(25, 'BIG_NINE_XT2', 'BIG_NINE_XT2.jpg', 45000, 2, 1),
(26, 'ONE_SIXTY_700', 'ONE_SIXTY_700.jpg', 36000, 2, 1),
(27, 'BIG_NINE_SLX_EDITION', 'BIG_NINE_SLX_EDITION.jpg', 36000, 2, 1),
(28, 'BIG_NINE_500', 'BIG_NINE_500.jpg', 29800, 2, 1),
(29, 'BIG_NINE_400', 'BIG_NINE_400.jpg', 27800, 2, 1),
(30, 'BIG_NINE_300', 'BIG_NINE_300.jpg', 23800, 2, 1),
(31, 'BIG_NINE_200', 'BIG_NINE_200.jpg', 22000, 2, 1),
(32, 'BIG_NINE_100_2x', 'BIG_NINE_100_2x.jpg', 19900, 2, 1),
(33, 'BIG_NINE_100_3x', 'BIG_NINE_100_3x.jpg', 19900, 2, 1),
(34, 'BIG_NINE_60_2x\r\n', 'BIG_NINE_60_2x.jpg', 19800, 2, 1),
(35, 'BIG_NINE_60_3x', 'BIG_NINE_60_3x.jpg', 19800, 2, 1),
(36, 'BIG_NINE_20_2x', 'BIG_NINE_20_2x.jpg', 16800, 2, 1),
(37, 'BIG_NINE_20_3x', 'BIG_NINE_20_3x.jpg', 16800, 2, 1),
(38, 'BIG_NINE_15\r\n', 'BIG_NINE_15.jpg', 14800, 2, 1),
(39, 'BIG_SEVEN_300', 'BIG_SEVEN_300.jpg', 23800, 2, 1),
(40, 'BIG_SEVEN_200', 'BIG_SEVEN_200.jpg', 22000, 2, 1),
(41, 'BIG_SEVEN_100_2x', 'BIG_SEVEN_100_2x.jpg', 19900, 2, 1),
(42, 'BIG_SEVEN_60_2x', 'BIG_SEVEN_60_2x.jpg', 19800, 2, 1),
(43, 'BIG_SEVEN_20', 'BIG_SEVEN_20.jpg', 16800, 2, 1),
(44, 'BIG_SEVEN_15', 'BIG_SEVEN_15.jpg', 14800, 2, 1),
(45, 'BIG_TRAIL_600', 'BIG_TRAIL_600.jpg', 45000, 2, 1),
(46, 'BIG_TRAIL_500', 'BIG_TRAIL_500.jpg', 35000, 2, 1),
(47, 'BIG_TRAIL_400', 'BIG_TRAIL_400.jpg', 29900, 2, 1),
(48, 'BIG_TRAIL_200', 'BIG_TRAIL_200.jpg', 23800, 2, 1),
(49, 'MATTS_7_80', 'MATTS_7_80.jpg', 21800, 2, 1),
(50, 'MATTS_7_70', 'MATTS_7_70.jpg', 20800, 2, 1),
(51, 'MATTS_7_60_2x', 'MATTS_7_60_2x.jpg', 18000, 2, 1),
(52, 'MATTS_7_30', 'MATTS_7_30.jpg', 16000, 2, 1),
(53, 'MATTS_7_20', 'MATTS_7_20.jpg', 15000, 2, 1),
(54, 'MATTS_J_CHAMPION', 'MATTS_J_CHAMPION.jpg', 22500, 2, 1),
(55, 'MATTS_J_24', 'MATTS_J_24.jpg', 14500, 2, 1),
(56, 'MATTS_6_10_V', 'MATTS_6_10_V.jpg', 14500, 2, 1),
(57, 'ONE_TWENTY_600', 'ONE_TWENTY_600.jpg', 69800, 3, 1),
(58, 'ONE_TWENTY_400', 'ONE_TWENTY_400.jpg', 51800, 3, 1),
(59, 'ONE_FORTY_600', 'ONE_FORTY_600.jpg', 66800, 3, 1),
(60, 'ONE_FORTY_400', 'ONE_FORTY_400.jpg', 55800, 3, 1),
(61, 'ONE_SIXTY_700     ', 'ONE_SIXTY_700.jpg', 122445, 2, 1),
(79, 'x500', 'BIG_NINE_500.jpg', 19880, 1, 1),
(125, 'xsss ', '雞排.webp', 666666, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `product_category_id` int(3) NOT NULL,
  `product_category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`) VALUES
(1, '登山車基礎車款'),
(2, '單避震登山車'),
(3, '全避震登山車');

-- --------------------------------------------------------

--
-- 資料表結構 `product_order`
--

DROP TABLE IF EXISTS `product_order`;
CREATE TABLE `product_order` (
  `id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product_order`
--

INSERT INTO `product_order` (`id`, `product_id`, `order_id`, `order_count`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 2, 1),
(5, 2, 3, 1),
(6, 3, 1, 1),
(7, 15, 3, 1),
(8, 8, 4, 1);

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
-- 資料表索引 `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`course_id`);

--
-- 資料表索引 `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`course_category_id`);

--
-- 資料表索引 `course_location`
--
ALTER TABLE `course_location`
  ADD PRIMARY KEY (`course_location_id`);

--
-- 資料表索引 `course_status`
--
ALTER TABLE `course_status`
  ADD PRIMARY KEY (`course_status_id`);

--
-- 資料表索引 `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`);

--
-- 資料表索引 `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- 資料表索引 `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `classes`
--
ALTER TABLE `classes`
  MODIFY `course_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course_category`
--
ALTER TABLE `course_category`
  MODIFY `course_category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course_location`
--
ALTER TABLE `course_location`
  MODIFY `course_location_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course_status`
--
ALTER TABLE `course_status`
  MODIFY `course_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;
