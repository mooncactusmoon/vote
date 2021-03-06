-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-21 04:56:54
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.24

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
(3, '1.jpg', 1, '藍月輪'),
(5, '20211016_104004.jpg', 1, '啾啾'),
(6, '20211016_103958.jpg', 1, '啾啾糾');

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
(7, '晴天123', 4, 3),
(12, '雨天', 2, 3),
(13, '陰天', 5, 3),
(14, '未知QQ', 4, 3),
(15, 'ˋ W ˊ', 2, 5),
(16, 'OWO', 0, 5),
(17, 'QWQ', 1, 5),
(18, '~ W ~', 0, 5),
(24, '呱呱', 0, 6),
(25, '嘿嘿', 0, 6),
(26, '哈哈', 0, 6),
(27, '嘟嘟', 1, 6),
(28, 'A', 1, 7),
(29, 'B', 0, 7),
(30, 'C', 0, 7),
(31, '11', 0, 8),
(32, '22', 0, 8),
(33, '33', 1, 8),
(34, '000AA', 0, 9),
(35, '000BBB', 0, 9),
(36, '000C', 0, 9),
(37, '000D', 0, 9),
(38, '000E', 0, 9),
(39, 'QAQ', 0, 10),
(40, 'QMQ', 0, 10),
(41, 'QWQ', 0, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `polls`
--

CREATE TABLE `polls` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '使用者',
  `topic_id` int(11) NOT NULL COMMENT '投票主題',
  `ans` int(2) NOT NULL COMMENT '答案'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `polls`
--

INSERT INTO `polls` (`id`, `user_id`, `topic_id`, `ans`) VALUES
(4, 1, 5, 15),
(5, 1, 3, 7),
(6, 2, 3, 14),
(7, 1, 7, 28),
(8, 1, 8, 33);

-- --------------------------------------------------------

--
-- 資料表結構 `topics`
--

CREATE TABLE `topics` (
  `id` int(11) UNSIGNED NOT NULL,
  `topic` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '主題',
  `sh` tinyint(1) NOT NULL DEFAULT 1 COMMENT '顯現'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`id`, `topic`, `sh`) VALUES
(3, '天氣', 1),
(5, '最新測試問卷', 1),
(6, '測試問卷2', 1),
(7, '1203test', 1),
(8, 'test22', 1),
(9, '0000', 1),
(10, 'OAO', 1);

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
(1, 'moon', '1234', 'moon@gmail', 'MoonLin', 'man', '2021-11-02', '管理員'),
(2, 'test1234', 'test1234', 'test@gmail', '測試一號', 'man', '2021-12-04', ''),
(3, 'test2222', 'test2222', 'test22@gmail', '測試二號', 'woman', '2021-11-13', ''),
(4, 'test3333', 'test3333', 'test3@gmail', '測試三號', 'third_gender', '2021-08-04', ''),
(5, '1234567', '1234567', '1234567@g', '測試測試', 'woman', '2021-12-07', ''),
(6, '1234', '1234', '1234@g', '一二三四', 'woman', '2021-12-02', ''),
(7, '123456789', '123456789', '123@gmail', 'QQ', 'woman', '2021-12-02', ''),
(8, '20211215', '20211215', '2021@g', '一二一五', 'woman', '2021-12-15', '');

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
-- 資料表索引 `polls`
--
ALTER TABLE `polls`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
