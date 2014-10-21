-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2014 at 11:00 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `getmev5_devinvprds`
--

-- --------------------------------------------------------

--
-- Table structure for table `inv_categories`
--

CREATE TABLE IF NOT EXISTS `inv_categories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  `priority` int(11) NOT NULL,
  `ccreated` datetime NOT NULL,
  `cupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` smallint(1) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cid` (`cid`,`cname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inv_categories`
--

INSERT INTO `inv_categories` (`cid`, `cname`, `priority`, `ccreated`, `cupdated`, `status`) VALUES
(1, 'Mobiles', 1, '2014-10-01 00:00:00', '2014-10-01 21:25:17', 1),
(2, 'Cameras', 1, '2014-10-01 00:00:00', '2014-10-01 21:25:25', 1),
(3, 'Life Style', 3, '2014-10-03 00:00:00', '2014-10-02 19:01:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inv_products`
--

CREATE TABLE IF NOT EXISTS `inv_products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(250) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `pimage` varchar(250) NOT NULL,
  `pshortdesc` text NOT NULL,
  `pdescription` text NOT NULL,
  `priority` int(11) NOT NULL,
  `pcreated` datetime NOT NULL,
  `pupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pstatus` smallint(1) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid` (`pid`,`pname`,`subcatid`),
  KEY `categories_INDX` (`catid`,`subcatid`) COMMENT 'index for category and subcategory'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inv_products`
--

INSERT INTO `inv_products` (`pid`, `pname`, `catid`, `subcatid`, `pimage`, `pshortdesc`, `pdescription`, `priority`, `pcreated`, `pupdated`, `pstatus`) VALUES
(1, 'Test product 1', 1, 1, '', '<ul>\r\n<li>Test 1</li>\r\n<li>Test 2</li>\r\n<li>Test 3</li>\r\n</ul>', '<p>This is Some test description</p>', 1, '2014-10-01 00:00:00', '2014-09-30 21:01:30', 1),
(2, 'Test Product 2', 2, 1, '', '<ul>\r\n<li>Test 1</li>\r\n<li>Test 2</li>\r\n<li>Test 3</li>\r\n</ul>', 'This is some test desction', 2, '2014-10-01 00:00:00', '2014-09-30 21:39:04', 1),
(3, 'Nikon D5100', 2, 4, '', '<p>\r\n	Short desc for Nikon</p>\r\n', '<p>\r\n	Desc for Nikon</p>\r\n', 1, '0000-00-00 00:00:00', '2014-10-05 18:51:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inv_subcats`
--

CREATE TABLE IF NOT EXISTS `inv_subcats` (
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `scname` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `sccreated` datetime NOT NULL,
  `scupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scstatus` smallint(1) NOT NULL,
  PRIMARY KEY (`scid`),
  UNIQUE KEY `scid` (`scid`,`scname`,`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `inv_subcats`
--

INSERT INTO `inv_subcats` (`scid`, `scname`, `cid`, `priority`, `sccreated`, `scupdated`, `scstatus`) VALUES
(1, 'GSM', 1, 1, '2014-10-02 00:00:00', '2014-10-01 21:26:17', 1),
(2, 'Android', 1, 2, '2014-10-02 00:00:00', '2014-10-03 21:43:42', 1),
(3, 'Point And Shoot', 2, 1, '2014-10-02 00:00:00', '2014-10-01 21:27:12', 1),
(4, 'Digital SLR', 2, 2, '2014-10-02 00:00:00', '2014-10-01 21:27:12', 1),
(5, 'Telescopes', 2, 2, '2014-10-03 00:00:00', '2014-10-02 18:04:01', 1),
(6, 'Apparrels', 3, 1, '0000-00-00 00:00:00', '2014-10-02 20:47:02', 0),
(7, 'Test cat', 0, 0, '0000-00-00 00:00:00', '2014-10-02 20:48:40', 0),
(8, 'Test cata', 3, 0, '0000-00-00 00:00:00', '2014-10-02 20:53:11', 0),
(9, 'Test cam', 2, 0, '0000-00-00 00:00:00', '2014-10-02 20:57:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(250) NOT NULL,
  `uemail` varchar(250) NOT NULL,
  `upassword` varchar(100) NOT NULL,
  `accesslevel` mediumint(3) NOT NULL,
  `ucreated` datetime NOT NULL,
  `uupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ustatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uemail` (`uemail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `uemail`, `upassword`, `accesslevel`, `ucreated`, `uupdated`, `ustatus`) VALUES
(1, 'suresh', 'harshadil1@gmail.com', 'suresh_123', 1, '2014-09-27 00:00:00', '2014-09-26 18:30:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
