-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 年 2 朁E06 日 09:16
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vetwith`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `h_members`
--

CREATE TABLE IF NOT EXISTS `h_members` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(45) NOT NULL,
  `h_email` varchar(45) NOT NULL,
  `h_password` varchar(45) NOT NULL,
  `h_tel` varchar(45) NOT NULL,
  `h_memberscol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`memberid` int(8) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL COMMENT '名字',
  `f_name` varchar(20) DEFAULT NULL COMMENT '名前',
  `l_name_kana` varchar(20) DEFAULT NULL COMMENT '名字のカナ',
  `f_name_kana` varchar(20) DEFAULT NULL COMMENT '名前のカナ',
  `sex` varchar(5) DEFAULT NULL COMMENT '性別',
  `university` tinyint(100) unsigned DEFAULT NULL,
  `grade` tinyint(20) unsigned DEFAULT NULL COMMENT '学年',
  `email` varchar(255) DEFAULT NULL,
  `pre_userid` varchar(255) DEFAULT NULL COMMENT '登録時利用',
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'on update CURRENT_TIMESTAMP'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`memberid`, `userid`, `password`, `l_name`, `f_name`, `l_name_kana`, `f_name_kana`, `sex`, `university`, `grade`, `email`, `pre_userid`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '94254d4676dd404c', '0000-00-00 00:00:00', '2015-02-06 07:04:13'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '73354d46831d9ca5', '0000-00-00 00:00:00', '2015-02-06 07:07:29'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '89554d46bdc687f2', '0000-00-00 00:00:00', '2015-02-06 07:23:08'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '40354d46bec09417', '0000-00-00 00:00:00', '2015-02-06 07:23:24'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '58354d46c04694ca', '0000-00-00 00:00:00', '2015-02-06 07:23:48'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '11854d46c3402b13', '0000-00-00 00:00:00', '2015-02-06 07:24:36'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '92954d46c3fa2c46', '0000-00-00 00:00:00', '2015-02-06 07:24:47'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '76054d46c5aeca28', '0000-00-00 00:00:00', '2015-02-06 07:25:14'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '15554d46dba94870', '0000-00-00 00:00:00', '2015-02-06 07:31:06'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '88754d46f501b7b2', '0000-00-00 00:00:00', '2015-02-06 07:37:52'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '54454d46fb80b993', '0000-00-00 00:00:00', '2015-02-06 07:39:36'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '16854d46fd6d6aa6', '0000-00-00 00:00:00', '2015-02-06 07:40:06'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '14754d46ffda910a', '0000-00-00 00:00:00', '2015-02-06 07:40:45'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '55254d47038a251f', '0000-00-00 00:00:00', '2015-02-06 07:41:44'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '77954d471109e031', '0000-00-00 00:00:00', '2015-02-06 07:45:20'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '47154d4723f43446', '0000-00-00 00:00:00', '2015-02-06 07:50:23'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rg_870@yahoo.co.jp', '15854d472a18a76c', '0000-00-00 00:00:00', '2015-02-06 07:52:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `h_members`
--
ALTER TABLE `h_members`
 ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`memberid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `memberid` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
