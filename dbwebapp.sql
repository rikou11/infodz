-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2022 at 07:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'infodz', 'infodz@i.i', '101010');

-- --------------------------------------------------------

--
-- Table structure for table `block_liste`
--

DROP TABLE IF EXISTS `block_liste`;
CREATE TABLE IF NOT EXISTS `block_liste` (
  `id` int(11) NOT NULL,
  `fullname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service_comercial` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_block` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blocker_par` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  KEY `id_client` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `block_liste`
--

INSERT INTO `block_liste` (`id`, `fullname`, `adresse`, `tel`, `email`, `service_comercial`, `date_block`, `blocker_par`) VALUES
(38, 'houssem bta', 'io', 220201020, 'hello@gmail.com', 'food', '2022-01-11 18:19:05', 'a@a.a'),
(29, 'jkj', 'alkm', 550201020, 'faresblackR31@gmail.com', 'rth', '2022-01-11 19:44:28', 'infodz@i.i'),
(32, 'ryryeyrey', 'trururu', 550706627, 'yrturtu@nsj.jw', 'fooosy-y(y-y(y-y(', '2022-01-11 19:46:16', 'infodz@i.i'),
(33, 'dfgfdg', 'tthrth', 550505050, 'yrturtu@nsj.jw', 'rth', '2022-01-11 19:46:56', 'infodz@i.i'),
(34, 'dfgfdg', 'alkm', 550201020, 'yrturtu@nsj.jw', 'fooos', '2022-01-11 19:47:00', 'infodz@i.i'),
(35, 'thrth', 'iiivdvd', 550201020, 'yrturtu@nsj.jw', 'fooos', '2022-01-11 19:54:22', 'infodz@i.i'),
(43, 'dfgfdg', 'alkm', 550201020, 'faresblackR31@gmail.com', 'fooos', '2022-01-11 20:03:06', 'infodz@i.i'),
(41, 'dfgfdg', 'tthrth', 550201020, 'hello@gmail.com', 'fooos', '2022-01-11 20:03:08', 'infodz@i.i'),
(44, 'fars', 'xasxasxasx', 2342343, 'f@f.f', 'xxasxasxs', '2022-01-11 21:04:42', 'aq@a.a');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `service_comercial` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `afficher_dans_la_table` tinyint(1) NOT NULL,
  `date_demande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_validation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validation` tinyint(1) NOT NULL,
  `valider_par` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `block` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `fullname`, `adresse`, `tel`, `email`, `service_comercial`, `afficher_dans_la_table`, `date_demande`, `date_validation`, `validation`, `valider_par`, `block`) VALUES
(29, 'jkj', 'alkm', 550201020, 'faresblackR31@gmail.com', 'rth', 0, '2022-01-05 00:53:52', '2022-01-10 22:47:39', 1, 'a@a.a', 1),
(32, 'ryryeyrey', 'trururu', 550706627, 'yrturtu@nsj.jw', 'fooosy-y(y-y(y-y(', 0, '2022-01-05 14:59:23', '2022-01-11 02:22:35', 1, 'infodz@i.i', 1),
(33, 'dfgfdg', 'tthrth', 550505050, 'yrturtu@nsj.jw', 'rth', 0, '2022-01-06 00:15:27', '2022-01-10 13:33:44', 1, 'aq@a.a', 1),
(34, 'dfgfdg', 'alkm', 550201020, 'yrturtu@nsj.jw', 'fooos', 0, '2022-01-06 00:22:29', '2022-01-11 00:17:34', 1, 'a@a.a', 1),
(35, 'thrth', 'iiivdvd', 550201020, 'yrturtu@nsj.jw', 'fooos', 0, '2022-01-06 00:24:28', '2022-01-11 01:11:41', 1, 'infodz@i.i', 1),
(38, 'houssem bta', 'io', 220201020, 'hello@gmail.com', 'food', 0, '2022-01-06 01:28:36', '2022-01-10 00:45:12', 0, 'a@a.a', 1),
(40, 'ahmed benmousa', 'iiivdvd', 220201020, 'hello@gmail.com', 'fooosy-y(y-y(y-y(', 0, '2022-01-06 01:33:06', '2022-01-11 19:04:15', 1, 'a@a.a', 0),
(41, 'dfgfdg', 'tthrth', 550201020, 'hello@gmail.com', 'fooos', 0, '2022-01-06 01:37:02', '2022-01-11 18:54:35', 1, 'infodz@i.i', 1),
(43, 'dfgfdg', 'alkm', 550201020, 'faresblackR31@gmail.com', 'fooos', 0, '2022-01-06 12:50:14', '2022-01-11 19:01:51', 1, 'a@a.a', 1),
(44, 'fars', 'xasxasxasx', 2342343, 'f@f.f', 'xxasxasxs', 0, '2022-01-09 11:46:30', '2022-01-10 00:45:15', 0, 'a@a.a', 1),
(45, 'faaaaaaaaaaa', 'qsssssssss', 11111111, 'f@f.fqq', 'qqqqqqqqqq', 1, '2022-01-09 11:52:27', '2022-01-10 00:45:16', 0, 'a@a.a', 0),
(46, 'faaaaaaaaaaa', 'qsssssssss', 1111113, 'f@f.fqqsws', 'qqqqqqqqqq', 1, '2022-01-09 11:55:33', '2022-01-10 00:51:24', 0, 'a@a.a', 0),
(47, 'faaaaaaaaaaa', 'qsssssssss', 2342343, 'f@f.fqqk', 'xxasxasxs', 1, '2022-01-09 12:01:39', '2022-01-10 00:51:24', 0, 'a@a.a', 0),
(48, 'faaaaaaaaaaasqw', 'qsssssssss', 3287743, 'f@f.fqqswsfsd', 'xxasxasxs', 1, '2022-01-09 12:07:04', '2022-01-10 00:51:25', 0, 'a@a.a', 0),
(49, 'dqwdwqd', 'adsdasd', 2222222, 'f@f.fqqdqwdwqd', 'qwewewe', 1, '2022-01-09 14:58:55', '2022-01-10 00:53:27', 0, 'a@a.a', 0),
(50, 'qscqdcdqc', 'qdd', 2342343, 'f@f.fqqswsfsd', 'cdqcqdcdqc', 1, '2022-01-11 21:04:22', '2022-01-11 21:04:22', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `message_client` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sujet_du_mesaage` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revendeur`
--

DROP TABLE IF EXISTS `revendeur`;
CREATE TABLE IF NOT EXISTS `revendeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tel` int(10) NOT NULL,
  `adresse` varchar(20) CHARACTER SET utf8 NOT NULL,
  `valider` tinyint(1) NOT NULL DEFAULT '1',
  `action` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `revendeur`
--

INSERT INTO `revendeur` (`id`, `email`, `password`, `fullname`, `tel`, `adresse`, `valider`, `action`) VALUES
(25, 'dsqds@dqs.dq', 'csdcscsdd', 'farsr', 96787867, 'sdfsdfsd', 1, 0),
(27, 'fares@dsa.dd', 'DADAJSDJJASJ', 'fares', 550505005, 'AJAJLLALLDAAD', 1, 1),
(28, 'a@a.a', '101010', 'farsr', 550505005, 'sdfsdfsd', 1, 1),
(29, 'dsqds@dqs.dq', 'klljljlk', 'farsr', 96787867, 'dqsd', 0, 1),
(30, 'faresben@ben.ben', 'faresrikou', 'fares', 550505050, 'ch laid', 1, 0),
(31, 'aq@a.a', '101010', 'farsr', 550505005, 'dqsd', 1, 1),
(33, 'faresbensaad@gmail.com', '101010', 'fares bensaad', 552326152, 'ch laid', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
