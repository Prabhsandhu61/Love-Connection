-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2019 at 01:01 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loveconnectiondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(40) DEFAULT NULL,
  `lastName` varchar(40) DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `photo` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `firstName`, `lastName`, `isActive`, `photo`, `mobile`, `email`, `dob`, `password`, `country`, `gender`) VALUES
(1, 'Ravpartap Singh', 'Singh ', 1, '22201911233551574522760.png', '9874563210', 'asd@gmail.com', '1992-12-22', '123456', 'Indiasss', NULL),
(2, 'Ravpartap Singh', 'Singh ', 1, '32201911234431574521515.png\r\n', '9874563210', 'assd@gmail.com', '1992-12-22', '132132', 'Indiasss', NULL),
(6, 'Ravpartap ', 'Singh ', 1, '32201911234431574521515.png\r\n', '9874563210', 'a11@gmail.com', '1992-12-22', '123456', 'Indiasss', 'male'),
(8, 'rav', 'singh', 1, '32201911234431574521515.png\r\n', '9874563210', 'aass@gg.com', '2019-11-06', '123456', 'USA', 'male'),
(9, 'GURPREET', 'SINGH', 1, '99201911238701574550544.png', '5148422426', 'ps60098@gmail.com', '2018-09-29', '123456', 'Canada', 'male'),
(10, 'sukh', 'kaur', 1, '10201911243061574553834.jpg', '2125867000', 'sukhkaur23@gmail.com', '2019-09-29', '123456', 'India', 'male'),
(11, 'jaydish', 'SINGH', 1, '67201911248631574554541.jpg', '5149344777', 'jay@gmail.com', '2013-09-28', '123456', 'Canada', 'male'),
(12, 'john', 'patel', 1, '10201911243231574556160.jpg', '5149344777', 'john123@gmail.com', '2012-07-27', '123456', 'Canada', 'male'),
(13, 'bansari', 'parekh', 1, '46201911245421574556460.jpg', '928837837', 'bansari@gmail.com', '2014-07-28', '1234567', 'india', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `winks`
--

DROP TABLE IF EXISTS `winks`;
CREATE TABLE IF NOT EXISTS `winks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromid` int(11) NOT NULL,
  `receivedat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSeen` int(11) NOT NULL DEFAULT '0',
  `touid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `winks`
--

INSERT INTO `winks` (`id`, `fromid`, `receivedat`, `isSeen`, `touid`) VALUES
(21, 9, '2019-11-23 18:22:05', 0, 8),
(22, 9, '2019-11-23 18:53:05', 0, 1),
(23, 9, '2019-11-23 18:54:22', 0, 1),
(24, 10, '2019-11-23 19:04:06', 1, 9),
(25, 9, '2019-11-23 19:04:26', 0, 10),
(26, 12, '2019-11-23 19:44:06', 1, 9),
(27, 9, '2019-11-23 19:45:05', 1, 12),
(28, 13, '2019-11-23 19:47:51', 1, 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
