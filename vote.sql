-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-09 16:11:10
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `vote`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ad`
--

CREATE TABLE `ad` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '檔名',
  `sh` tinyint(1) UNSIGNED NOT NULL COMMENT '上架',
  `intro` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT '備註'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `ad`
--

INSERT INTO `ad` (`id`, `name`, `sh`, `intro`) VALUES
(3, '1.jpg', 1, '藍月輪');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `opt` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'option',
  `count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `topic_id` int(11) UNSIGNED NOT NULL COMMENT '應對的主題'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `opt`, `count`, `topic_id`) VALUES
(7, '晴天123', 3, 3),
(12, '雨天', 1, 3),
(13, '陰天', 4, 3),
(14, '未知QQ', 3, 3),
(15, 'ˋ W ˊ', 0, 5),
(16, 'OWO', 0, 5),
(17, 'QWQ', 1, 5),
(18, '~ W ~', 0, 5),
(24, '呱呱', 0, 6),
(25, '嘿嘿', 0, 6),
(26, '哈哈', 0, 6),
(27, '嘟嘟', 0, 6),
(28, 'A', 0, 7),
(29, 'B', 0, 7),
(30, 'CC', 0, 7),
(31, '11', 0, 8),
(32, '22', 0, 8),
(33, '33', 0, 8),
(34, '000AA', 0, 9),
(35, '000B', 0, 9),
(36, '000C', 0, 9),
(37, '000D', 0, 9),
(38, '000E', 0, 9),
(39, '貓', 0, 10),
(40, '狗', 0, 10),
(41, '鳥', 0, 10),
(42, '快樂', 0, 12),
(43, '普通', 0, 12),
(44, '不快樂', 0, 12),
(45, '不知道', 0, 12),
(46, '', 0, 10),
(47, '', 0, 3),
(48, '456666', 0, 13),
(49, '789999', 0, 13);

-- --------------------------------------------------------

--
-- 資料表結構 `topics`
--

CREATE TABLE `topics` (
  `id` int(11) UNSIGNED NOT NULL,
  `topic` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '主題'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`id`, `topic`) VALUES
(3, '天氣'),
(5, '最新測試問卷'),
(6, '測試問卷2'),
(7, '1203test'),
(8, 'test22'),
(9, '0000'),
(10, '最喜歡的動物'),
(11, '喜歡的飲料'),
(12, '你快樂嗎'),
(13, 'OAO');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` varchar(24) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '帳號',
  `password` varchar(24) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '密碼',
  `email` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '信箱',
  `name` varchar(12) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '姓名',
  `gender` varchar(16) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '性別',
  `birthday` date NOT NULL COMMENT '生日',
  `note` varchar(11) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '備註'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `email`, `name`, `gender`, `birthday`, `note`) VALUES
(1, 'moon', '1234', 'moon@gmail', 'MoonLin', 'woman', '2021-11-02', '管理者'),
(2, 'test1234', 'test1234', 'test@gmail', '測試一號', 'man', '2021-12-04', ''),
(3, 'test2222', 'test2222', 'test22@gmail', '測試二號', 'woman', '2021-11-13', ''),
(4, 'test3333', 'test3333', 'test3@gmail', '測試三號', 'third_gender', '2021-08-04', ''),
(5, '20211206', '20211206', '1206@gmail', '1206測試員YOYO', 'man', '2020-12-06', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
