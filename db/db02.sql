-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db02`
--

-- --------------------------------------------------------

--
-- 資料表結構 `log`
--

CREATE TABLE `log` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `news` int(5) NOT NULL COMMENT '文章id',
  `user` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '會員帳號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '標題',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '內容',
  `type` int(5) NOT NULL COMMENT '分類',
  `good` int(5) NOT NULL COMMENT '按讚數',
  `sh` int(1) NOT NULL COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `que`
--

CREATE TABLE `que` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文字內容',
  `parent` int(5) NOT NULL COMMENT '題目id',
  `count` int(5) NOT NULL COMMENT '統計'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `total`
--

CREATE TABLE `total` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `date` date NOT NULL COMMENT '日期',
  `total` int(10) NOT NULL COMMENT '訪客人數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '流水號',
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電子郵件'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `total`
--
ALTER TABLE `total`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `que`
--
ALTER TABLE `que`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `total`
--
ALTER TABLE `total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
