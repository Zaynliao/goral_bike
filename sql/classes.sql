-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-26 12:17:58
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
(3, 2, 'MTB 訓練營', '003-Taoyuan-20220415.jpg', 4, '2022-01-22', 12, '2022-01-05T10:00', '2022-01-19T10:00', 3, 1000, '在越野跑中，並不是所有的山徑都能跑，所以〝走路〞也是越野跑的一部份；同理，騎登山車也是一樣的，碰到沒有把握的路段，用〝牽車〞的方式通過阻礙再繼續騎，這是騎登山車常見的情況。但，你不會一直想用牽的！\r\n騎登山車最大的樂趣在於你能在山徑上「騎得多且牽的少」，而教學能讓你快速掌握技巧，用最少的時間，學會突破障礙的方式。\r\n在桃園光華坑挑出相似的地形場域，以初階、進階、高階三種不同技法，指導正在備賽的朋友們，學會用安全的方式跨越阻礙。\r\n\r\n適合對象\r\n　　已有基礎技巧且想學習更多技巧的登山車騎乘者\r\n名額限制\r\n　　12 人\r\n報名時間\r\n　　2022/01/05（三） 上午 10:00 ~ 2022/01/19（三） 10:00\r\n活動時間\r\n　　2022/01/22（六）08:30\r\n收費標準\r\n　　1000元/人\r\n課程地點\r\n　　桃園光華坑\r\n　　桃園市龜山區頂湖六街\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　1. 登山車裝備的檢視與評估\r\n　　2. 初、進、高階過彎技巧\r\n　　3. 初、進、高階過彎突破障礙方式\r\n　　4. 初、進、高階上下坡技巧\r\n　　5. 初、進、高階上下坡突破障礙方式\r\n　　6. 賽道經驗分享\r\n　　7. 成果驗收－限時越野繞圈挑戰賽\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3.每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 2),
(5, 2, '越野跨領域', 'rZwq0pTgnilTZhCVjCwRvd1LuAEP2lEfU0GMZJnx-web.jpg', 15, '2022-01-30', 20, '2022-01-18T10:00', '2022-01-27T10:00', 3, 2400, 'XTERRA 源起 1996 年，以登山車、越野跑取代鐵人三項在公路上的競賽型態，不但吸引許多公路鐵人跨領域嚐試，也讓單車以外的運動走進登山車愛好者的生活。此後，XTERRA 每年以巡迴賽的方式，邀約更多喜愛親近大自然的夥伴們加入 XTERRA 大家庭，共同探索地球上最值得造訪的綺麗風景。\r\n\r\n2018 年，XTERRA 被引進台灣，在恆春半島的墾丁國家公園找到銜接游泳、登山車、越野跑三項運動最接近的距離，同時也發掘出原來墾丁擁有的不僅僅只是海洋與觀光，在半島深處的山野之間，還隱藏著動人的美景與歷史故事。\r\n\r\n大自然的奧妙，就是能讓你在與山野為伍中，發現不同的領悟與驚喜！2022 XTERRA Taiwan 來台即將邁入五周年，XTERRA Taiwan 持續深耕 We Play & We Protect 的精神，邀請老朋友、新朋友齊聚墾丁，在享受探索、守護擁有中創造新的故事。\r\n\r\n\r\n適合對象\r\n　　已有基礎技巧且想學習更多技巧的登山車騎乘者\r\n名額限制\r\n　　12 人\r\n報名時間\r\n　　2022/01/12 上午 10:00 ~ 2022/01/26 上午 10:00\r\n活動時間\r\n　　2022/01/26 08:30\r\n收費標準\r\n　　2400元/人\r\n課程地點\r\n　　墾丁國家公園\r\n　　墾丁石牛溪農場\r\n　　屏東縣恆春鎮墾丁路石牛巷1-3號\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n                            \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 2),
(35, 1, 'MTB MEETUP', 'north001.jpg', 4, '2022-04-30', 20, '2022-04-13T16:07', '2022-04-27T16:07', 2, 1200, '地形難易度的選擇權在於騎士的喜好，以台灣過去用來運送木材的 81條林道來說，都是平緩舒適的泥土混碎石子路面，只要你擁有一部登山車，不限車種，就可以駕馭台灣目前許多林道。\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 20, 1),
(40, 1, '米奇帶你騎入回憶的漩渦', 'UoJ2hclJrMOuUNQgkNTp1zpxLYYurstZtIBhGvB0-thumb.jpg', 4, '2022-05-07', 20, '2022-04-20T10:00', '2022-05-04T10:00', 2, 500, '由在 2020 年暫居桃園市體育會自由車委員會「誰是自行車全能王年度積分」女子組第一名的楊若芸（米奇），以 All Mountain 的騎乘方式，回顧那些往日的經典賽事路段，帶大家一起騎入回憶的漩渦裡！ 參與過的賽事歷歷在目～\r\n\r\n沒參加過的朋友們，歡迎一起來同樂，安全又好玩的路線！另外還設有 STRAVA 路段，人人都能想像自己是參賽選手，快揪朋友一同來挑戰！\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園龜山棒球場\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(41, 1, '綸綸帶給你歡樂無騎限', 'JgPQyggJZ9U9HdweyKSzyLhED4UEutPRyMqHHb9s-banner.jpg', 4, '2022-05-14', 20, '2022-04-19T10:00', '2022-05-10T10:00', 2, 500, '年假連續的放肆大吃大喝，是不是該動一動了呢？大年初五，跟著 2019 年全運會登山車選拔賽中的雙冠王－張祐綸，一起喚醒沈睡中的肌肉吧！活動中還貼心設計了歡樂開工的 Enduro 小遊戲，讓你不只開強度，也能直接處理累積滿滿的肥油肚。現在就卡位！大年初五開工日一起來同樂～\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(42, 1, 'MTB 親子課程', 'hC8Sx1VkN9Z1VHRGIKvIpEMURiepTu2FUSwpjBCs-web.jpg', 4, '2022-04-02', 20, '2022-03-16T10:00', '2022-03-30T22:00', 3, 600, '桃園市體育會自由車委員會將在2021這一年舉辦每月一次的主題性約騎車活動，以玩樂、推廣性質的方式，多一個機會去探索這繽紛的世界，也期望車友們能更享受騎程過程中所帶來的成就感。\r\n\r\n小孩子玩滑步車越來越多，但是發現大人有跟著在玩車的很少，為了延續親子之間的更良好互動，現場會準備一些裝備和車讓有興趣參與的家人來體驗MTB樂趣。\r\n\r\n注意事項：\r\n　　1. 配合防疫期間\r\n　　　本活動將會在報到時量體溫，\r\n　　　如發燒不適者或近期如有旅遊史，請主動告知。\r\n　　2. 路線難度劃分在綠、藍線等級\r\n　　　請斟酌自己的能力，不要勉強。\r\n　　3. 建議車種\r\n　　　XC、Trail\r\n　　4. 必須要戴安全帽、著護膝\r\n　　　建議全指手套、護肘、護目鏡。\r\n　　5. 自行攜帶水、食物，隨身攜帶健保卡\r\n　　6. 團騎三注意:\r\n　　　- 間隔距離拉開，不要跟太近！\r\n 　　　- 在騎乘當中隨時要停車時，請立即靠路邊！\r\n　　　- 騎你自己安全的速度！\r\n　　7. 本活動之錄影、拍照、攝影等資訊，\r\n　　　將會使用於本活動相關的媒體宣傳。\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(43, 2, 'MTB 大雜燴', 'mhbbaVT0tHjG4HaT7t9ivj0sv1zKk8xYVB5hiR13-banner.jpg', 4, '2022-05-28', 20, '2022-05-10T10:00', '2022-05-24T10:00', 1, 1000, '適合對象\r\n　　有經驗之騎手\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(44, 2, '越野三項墾丁訓練營', '004-Kenting-20221211.jpg', 1, '2021-12-04', 12, '2021-11-11T10:00', '2021-11-27T10:00', 3, 7600, '一場訓練營或許不會讓你成為專家，但一定能讓你發現把運動和訓練融入生活的方式。\r\n\r\n小灣海泳、趣味模擬競賽、舒緩瑜珈、長途野騎體驗，訓練營設計了充實又豐富課程，還有擅長專項的師資引導你入門，只要你來，肯定能讓你不小心玩出興趣～\r\n\r\n適合對象\r\n　　具備開放水域的游泳經驗，或具有 200m 游泳能力。\r\n　　具備登山車林道騎乘經驗。\r\n課程地點\r\n　　墾丁青年活動中心\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 12, 1),
(45, 2, '越野三項墾丁訓練營', 'Kenting002.jpg', 15, '2022-06-11', 12, '2022-05-24T10:00', '2022-06-07T10:00', 1, 7600, '適合對象\r\n　　有足夠經驗之騎手\r\n課程地點\r\n　　墾丁青年活動中心\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 12, 1),
(46, 1, '登山車訓練營', '006-north-20221219.jpg', 1, '2022-01-02', 10, '2021-12-15T10:00', '2021-12-29T10:00', 3, 2000, '登山車分為多種騎乘風格，XTERRA 賽道屬於爬坡比例大於下坡的 XC (cross country)，在這樣的騎乘風格中，要學習的是如何省力的應付長距離騎行與上下坡時重心的轉移；因此，對登山車開始產生興趣的朋友們不用擔心，訓練營不是要教你飛跳或蹺孤輪這些炫技，而是讓你懂得如何用對的姿勢，安全的在 off road 的地形上騎得流暢並享受騎行山林的樂趣。\r\n\r\n為了讓更多登山車新手能快速理解這些技巧，XTERRA Taiwan 特別商請亞運銀牌國手江勝山（阿丹）增開《阿丹訓練營》場次；從小就開始騎登山車的阿丹，總是能用淺顯易懂的教學方式，讓來上課的新手學員玩出成就感！快來！別再錯過銀牌國手親自指導的技巧精進班，讓我們一起「一騎就上手」。\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. 初步 MTB 技巧檢視與評估\r\n　　　2. 控車訓練\r\n　　　3. 重心運用\r\n　　　4. 煞車技巧\r\n　　　5. 山徑實戰演練\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 10, 1),
(47, 1, 'MTB MEETUP', 'Taoyuan-001.jpg', 4, '2022-05-01', 20, '2022-04-17T10:00', '2022-04-27T10:00', 2, 1000, '屬於 Cross-country (XC) 騎乘風格的 XTERRA 賽道，由於擁有獨立的賽制，所以除了必須具備基礎騎乘技巧之外，對體能要求也是相當高的。\r\n\r\n想挑戰越野鐵人卻不知該如何備賽嗎？\r\n\r\n當 XTERRA Meetup 約騎來到台北，我們邀請到 XTERRA 認證教練王皓正（好動夫妻 - Mike）來帶領大家熟悉桃園越野自行車培訓基地附近的山徑。如果你已是 2021 XTERRA Taiwan 準選手，想在短時間內快速累積越野騎行經驗，同時也想多認識喜愛登山車的夥伴，歡迎跟著 XTERRA Coach - Mike 一起來同樂。 \r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(48, 1, 'MTB MEETUP', '004Taoyuan-.jpg', 8, '2022-05-08', 15, '2022-04-24T10:00', '2022-05-04T10:00', 2, 2000, '我是新手！想學登山車，卻不知道去哪裡練騎？\r\n\r\n當 XTERRA Meetup 約騎來到台中，XTERRA 要帶大家探索只有內行的登山車玩家才知道的私房路線－老外林道；如果你已是 2021 XTERRA Taiwan 準選手，想在賽前快速累積越野騎行經驗，又不知道該上哪去練車，跟上 XTERRA 約騎，我們一起到老外馳風趣！\r\n\r\n適合對象\r\n　　需自備前後煞車正常、\r\n　　輪胎具明顯顆粒寬度在 2.0 以上之登山車。\r\n　　具備柏油山路騎乘能力，\r\n　　對登山車有高度興趣。\r\n課程地點\r\n　　7-ELEVEN 精站門市\r\n　　台中市南屯區向上路五段289號\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 15, 1),
(50, 2, '越野小學堂', 'north001.jpg', 8, '2022-01-16', 6, '2022-01-01T10:00', '2022-01-12T10:00', 3, 1400, '適合對象\r\n　　已有基礎技巧且想學習更多技巧的登山車騎乘者\r\n名額限制\r\n　　6 人\r\n報名時間\r\n　　2022/01/01 10:00 AM ~ 2022/01/12 10:00 AM\r\n活動時間\r\n　　2022/01/15 08:30\r\n收費標準\r\n　　1400元/人\r\n課程地點\r\n　　東東單車公園\r\n　　Don Don Bike Park\r\n　　（經緯度搜尋：5QP4+J8 北屯區 台中市）\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　教學 2 小時\r\n　　　1. 進階Bike Check\r\n　　　2. 複習基本姿勢\r\n　　　3. 平衡(重心轉移)\r\n　　　4. 路線選擇與觀察\r\n　　　5. 過彎(上)\r\n\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 1),
(52, 2, '越野跨領域', 'Kenting001.jpg', 15, '2022-01-29', 20, '2022-01-12T10:00', '2022-01-26T10:00', 3, 2400, 'XTERRA 源起 1996 年，以登山車、越野跑取代鐵人三項在公路上的競賽型態，不但吸引許多公路鐵人跨領域嚐試，也讓單車以外的運動走進登山車愛好者的生活。此後，XTERRA 每年以巡迴賽的方式，邀約更多喜愛親近大自然的夥伴們加入 XTERRA 大家庭，共同探索地球上最值得造訪的綺麗風景。\r\n\r\n2018 年，XTERRA 被引進台灣，在恆春半島的墾丁國家公園找到銜接游泳、登山車、越野跑三項運動最接近的距離，同時也發掘出原來墾丁擁有的不僅僅只是海洋與觀光，在半島深處的山野之間，還隱藏著動人的美景與歷史故事。\r\n\r\n大自然的奧妙，就是能讓你在與山野為伍中，發現不同的領悟與驚喜！2022 XTERRA Taiwan 來台即將邁入五周年，XTERRA Taiwan 持續深耕 We Play & We Protect 的精神，邀請老朋友、新朋友齊聚墾丁，在享受探索、守護擁有中創造新的故事。\r\n\r\n\r\n適合對象\r\n　　已有基礎技巧且想學習更多技巧的登山車騎乘者\r\n名額限制\r\n　　12 人\r\n報名時間\r\n　　2022/01/12 上午 10:00 ~ 2022/01/26 上午 10:00\r\n活動時間\r\n　　2022/01/26 08:30\r\n收費標準\r\n　　2400元/人\r\n課程地點\r\n　　墾丁國家公園\r\n　　墾丁石牛溪農場\r\n　　屏東縣恆春鎮墾丁路石牛巷1-3號\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n                            \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 2),
(53, 1, 'MTB MEETUP', 'north001.jpg', 4, '2022-01-16', 20, '2021-12-23T16:07', '2022-01-13T16:07', 3, 1200, '地形難易度的選擇權在於騎士的喜好，以台灣過去用來運送木材的 81條林道來說，都是平緩舒適的泥土混碎石子路面，只要你擁有一部登山車，不限車種，就可以駕馭台灣目前許多林道。\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 20, 2),
(54, 1, '米奇帶你騎入回憶的漩渦', '8ugXldbt8fmQjV08UbPUem2tPqJJwOIStXXvXKHw-web.jpg', 4, '2022-03-20', 20, '2022-03-03T10:00', '2022-03-17T10:00', 3, 500, '由在 2020 年暫居桃園市體育會自由車委員會「誰是自行車全能王年度積分」女子組第一名的楊若芸（米奇），以 All Mountain 的騎乘方式，回顧那些往日的經典賽事路段，帶大家一起騎入回憶的漩渦裡！ 參與過的賽事歷歷在目～\r\n\r\n沒參加過的朋友們，歡迎一起來同樂，安全又好玩的路線！另外還設有 STRAVA 路段，人人都能想像自己是參賽選手，快揪朋友一同來挑戰！\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園龜山棒球場\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 2),
(55, 1, '綸綸帶給你歡樂無騎限', 'JgPQyggJZ9U9HdweyKSzyLhED4UEutPRyMqHHb9s-banner.jpg', 4, '2022-02-26', 20, '2022-02-09T10:00', '2022-02-23T10:00', 3, 500, '年假連續的放肆大吃大喝，是不是該動一動了呢？大年初五，跟著 2019 年全運會登山車選拔賽中的雙冠王－張祐綸，一起喚醒沈睡中的肌肉吧！活動中還貼心設計了歡樂開工的 Enduro 小遊戲，讓你不只開強度，也能直接處理累積滿滿的肥油肚。現在就卡位！大年初五開工日一起來同樂～\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 2),
(56, 1, 'MTB 親子課程', 'aQj9jor81ZisiizAXUEul1nv55A2noaBFXzei4Ac-banner.jpg', 1, '2022-05-21', 20, '2022-05-03T10:00', '2022-05-17T22:00', 1, 600, '桃園市體育會自由車委員會將在2021這一年舉辦每月一次的主題性約騎車活動，以玩樂、推廣性質的方式，多一個機會去探索這繽紛的世界，也期望車友們能更享受騎程過程中所帶來的成就感。\r\n\r\n小孩子玩滑步車越來越多，但是發現大人有跟著在玩車的很少，為了延續親子之間的更良好互動，現場會準備一些裝備和車讓有興趣參與的家人來體驗MTB樂趣。\r\n\r\n注意事項：\r\n　　1. 配合防疫期間\r\n　　　本活動將會在報到時量體溫，\r\n　　　如發燒不適者或近期如有旅遊史，請主動告知。\r\n　　2. 路線難度劃分在綠、藍線等級\r\n　　　請斟酌自己的能力，不要勉強。\r\n　　3. 建議車種\r\n　　　XC、Trail\r\n　　4. 必須要戴安全帽、著護膝\r\n　　　建議全指手套、護肘、護目鏡。\r\n　　5. 自行攜帶水、食物，隨身攜帶健保卡\r\n　　6. 團騎三注意:\r\n　　　- 間隔距離拉開，不要跟太近！\r\n 　　　- 在騎乘當中隨時要停車時，請立即靠路邊！\r\n　　　- 騎你自己安全的速度！\r\n　　7. 本活動之錄影、拍照、攝影等資訊，\r\n　　　將會使用於本活動相關的媒體宣傳。\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(60, 1, '越野小學堂', 'Taoyuan-20220115.jpg', 8, '2022-01-16', 6, '2021-12-25T10:00', '2022-01-04T10:00', 3, 600, '適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n名額限制\r\n　　6 人\r\n報名時間\r\n　　2022/01/01 00:00 ~ 2022/01/15 00:00\r\n活動時間\r\n　　2022/01/22 08:30\r\n收費標準\r\n　　600元/人\r\n課程地點\r\n　　東東單車公園\r\n　　Don Don Bike Park\r\n　　（經緯度搜尋：5QP4+J8 北屯區 台中市）\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　教學1小時\r\n　　自由練習及指導1小時\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 0, 1),
(61, 1, 'MTB MEETUP', 'north001.jpg', 2, '2022-01-09', 20, '2021-12-29T16:07', '2022-01-06T16:07', 3, 1200, '地形難易度的選擇權在於騎士的喜好，以台灣過去用來運送木材的 81條林道來說，都是平緩舒適的泥土混碎石子路面，只要你擁有一部登山車，不限車種，就可以駕馭台灣目前許多林道。\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬\r\n', 20, 1),
(62, 1, '米奇帶你騎入回憶的漩渦', 'UoJ2hclJrMOuUNQgkNTp1zpxLYYurstZtIBhGvB0-thumb.jpg', 2, '2021-12-26', 20, '2021-12-09T10:00', '2021-12-23T10:00', 3, 500, '由在 2020 年暫居桃園市體育會自由車委員會「誰是自行車全能王年度積分」女子組第一名的楊若芸（米奇），以 All Mountain 的騎乘方式，回顧那些往日的經典賽事路段，帶大家一起騎入回憶的漩渦裡！ 參與過的賽事歷歷在目～\r\n\r\n沒參加過的朋友們，歡迎一起來同樂，安全又好玩的路線！另外還設有 STRAVA 路段，人人都能想像自己是參賽選手，快揪朋友一同來挑戰！\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園龜山棒球場\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(63, 1, '綸綸帶給你歡樂無騎限', 'JgPQyggJZ9U9HdweyKSzyLhED4UEutPRyMqHHb9s-banner.jpg', 2, '2022-07-31', 20, '2022-07-19T10:00', '2022-07-27T10:00', 1, 500, '年假連續的放肆大吃大喝，是不是該動一動了呢？大年初五，跟著 2019 年全運會登山車選拔賽中的雙冠王－張祐綸，一起喚醒沈睡中的肌肉吧！活動中還貼心設計了歡樂開工的 Enduro 小遊戲，讓你不只開強度，也能直接處理累積滿滿的肥油肚。現在就卡位！大年初五開工日一起來同樂～\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(64, 1, 'MTB 親子課程', 'hC8Sx1VkN9Z1VHRGIKvIpEMURiepTu2FUSwpjBCs-web.jpg', 3, '2022-04-03', 20, '2022-03-16T10:00', '2022-03-30T22:00', 3, 600, '桃園市體育會自由車委員會將在2021這一年舉辦每月一次的主題性約騎車活動，以玩樂、推廣性質的方式，多一個機會去探索這繽紛的世界，也期望車友們能更享受騎程過程中所帶來的成就感。\r\n\r\n小孩子玩滑步車越來越多，但是發現大人有跟著在玩車的很少，為了延續親子之間的更良好互動，現場會準備一些裝備和車讓有興趣參與的家人來體驗MTB樂趣。\r\n\r\n注意事項：\r\n　　1. 配合防疫期間\r\n　　　本活動將會在報到時量體溫，\r\n　　　如發燒不適者或近期如有旅遊史，請主動告知。\r\n　　2. 路線難度劃分在綠、藍線等級\r\n　　　請斟酌自己的能力，不要勉強。\r\n　　3. 建議車種\r\n　　　XC、Trail\r\n　　4. 必須要戴安全帽、著護膝\r\n　　　建議全指手套、護肘、護目鏡。\r\n　　5. 自行攜帶水、食物，隨身攜帶健保卡\r\n　　6. 團騎三注意:\r\n　　　- 間隔距離拉開，不要跟太近！\r\n 　　　- 在騎乘當中隨時要停車時，請立即靠路邊！\r\n　　　- 騎你自己安全的速度！\r\n　　7. 本活動之錄影、拍照、攝影等資訊，\r\n　　　將會使用於本活動相關的媒體宣傳。\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. Bike Check\r\n　　　2. 基本姿勢\r\n　　　3. 煞車運用\r\n　　　4. 關卡挑戰\r\n　　　5. 安全須知\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 20, 1),
(65, 1, '登山車訓練營', '006-north-20221219.jpg', 4, '2022-06-18', 10, '2022-05-31T10:00', '2022-06-14T10:00', 1, 2000, '登山車分為多種騎乘風格，XTERRA 賽道屬於爬坡比例大於下坡的 XC (cross country)，在這樣的騎乘風格中，要學習的是如何省力的應付長距離騎行與上下坡時重心的轉移；因此，對登山車開始產生興趣的朋友們不用擔心，訓練營不是要教你飛跳或蹺孤輪這些炫技，而是讓你懂得如何用對的姿勢，安全的在 off road 的地形上騎得流暢並享受騎行山林的樂趣。\r\n\r\n為了讓更多登山車新手能快速理解這些技巧，XTERRA Taiwan 特別商請亞運銀牌國手江勝山（阿丹）增開《阿丹訓練營》場次；從小就開始騎登山車的阿丹，總是能用淺顯易懂的教學方式，讓來上課的新手學員玩出成就感！快來！別再錯過銀牌國手親自指導的技巧精進班，讓我們一起「一騎就上手」。\r\n\r\n適合對象\r\n　　登山車新手\r\n　　想學習基礎技巧的入門登山車騎乘者\r\n課程地點\r\n　　桃園市越野自行車培訓基地\r\n　　桃園市龜山區下湖街109巷117弄\r\n車種限制\r\n　　XC以上，至少要有避震\r\n裝備規定\r\n　　符合規定的登山車\r\n　　戴上安全帽、長指手套及護膝\r\n課程內容\r\n　　　1. 初步 MTB 技巧檢視與評估\r\n　　　2. 控車訓練\r\n　　　3. 重心運用\r\n　　　4. 煞車技巧\r\n　　　5. 山徑實戰演練\r\n                                               \r\n學員須知\r\n　　1. 遵守指導員指示\r\n　　　如未遵守且在過程發生任何意外事故，須由學員自行負責。\r\n　　2. 如遇天候不佳\r\n　　　視情況調整課程路線或更改時間，請留意課程頁面留言公告。\r\n　　3. 每次課程將會為每位學員投保\r\n　　　(1)       旅平險200百萬\r\n　　　(2)       傷害醫療20萬', 10, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`course_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `classes`
--
ALTER TABLE `classes`
  MODIFY `course_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;
