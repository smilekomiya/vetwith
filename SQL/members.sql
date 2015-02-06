-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- ホスト: 127.0.0.1
-- 生成日時: 2015 年 2 月 06 日 11:30
-- サーバのバージョン: 5.5.32
-- PHP のバージョン: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `vetwith`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberid` int(8) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'on update CURRENT_TIMESTAMP',
  PRIMARY KEY (`memberid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`memberid`, `password`, `l_name`, `f_name`, `l_name_kana`, `f_name_kana`, `sex`, `university`, `grade`, `email`, `pre_userid`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a@a.com', '44954d4672a594d8', '0000-00-00 00:00:00', '2015-02-06 07:03:06'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'breeder.weaver@gmail.com', '22854d4679c1e582', '0000-00-00 00:00:00', '2015-02-06 07:05:00'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'breeder.weaver@gmail.com', '34854d469f66773c', '0000-00-00 00:00:00', '2015-02-06 07:15:02'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'breeder.weaver@gmail.com', '31354d46fffc490b', '0000-00-00 00:00:00', '2015-02-06 07:40:47'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'breeder.weaver@gmail.com', '23354d470a3b258b', '0000-00-00 00:00:00', '2015-02-06 07:43:31'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'breeder.weaver@gmail.com', '10654d470ecf3941', '0000-00-00 00:00:00', '2015-02-06 07:44:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
