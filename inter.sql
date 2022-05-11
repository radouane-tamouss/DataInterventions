-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2022 at 03:41 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inter`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

DROP TABLE IF EXISTS `adminlogin_tb`;
CREATE TABLE IF NOT EXISTS `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`a_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'radouane', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

DROP TABLE IF EXISTS `assets_tb`;
CREATE TABLE IF NOT EXISTS `assets_tb` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(60) COLLATE utf8_bin NOT NULL,
  `pdop` date NOT NULL,
  `pava` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL,
  `profit` int(255) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`pid`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `psellingcost`, `profit`) VALUES
(5, 'mic razer', '2022-05-05', 50, 5, 200, 500, 300),
(6, 'mouse razer', '2022-05-05', 4, 5, 345, 500, 155),
(7, 'mouse razer', '2022-05-06', 10, 5, 250, 300, 100),
(9, 'mouse razer', '2022-05-06', 10, 5, 200, 500, 300),
(10, 'monitor msi', '2022-05-07', 10, 5, 200, 500, 300),
(11, 'keyboard logitech', '2022-05-11', 10, 5, 200, 300, 100);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

DROP TABLE IF EXISTS `assignwork_tb`;
CREATE TABLE IF NOT EXISTS `assignwork_tb` (
  `rno` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL,
  PRIMARY KEY (`rno`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(7, 50, 'reqeust test info', 'Hello there a have a problem on my laptop test test', 'test', '123', 'casa hay molay', 'el jadida', 'Jharkhand', 123456, 'raj@gmail.com', 234234234, 'Kabir', '2018-10-16'),
(8, 50, 'keyboard not working', 'test test request desc test', 'test', '123', 'hay salam', 'casablanca', 'Jharkhand', 123456, 'raj@gmail.com', 234234234, 'Jay', '2018-10-21'),
(9, 52, 'monitor not working ', 'my lcd is not working properly', 'radouane', 'HOuse No. 123', 'add test', 'el jadida', 'Jh', 12345, 'rahul@gmail.com', 234566, 'Kunal', '2018-10-21'),
(10, 52, 'Rode Mic Note Working', 'my rode mic is not working properly', 'test name', 'house no 234', 'address test', 'el jadida', 'West Bengal', 674534, 'user@gmail.com', 1234566782, 'Tech1', '2018-10-21'),
(12, 61, 'laptop fix', 'my laptop not working', 'anwar', '993', 'test address 2', 'kdjdkj', '39dkjdk', 93093, 'anwar@gmail.com', 93993993, 'Tech1', '2022-04-30'),
(16, 64, 'db test', 'dd', 'mohamed', 'el jadida', 'dd', 'el jadida', 'Select region', 24100, 'dfa@dfdbdg.ek', 928409838, 'Tech1', '2022-05-06'),
(17, 64, 'db test', 'dd', 'mustapha', 'el jadida', 'dd', 'el jadida', 'Select region', 24100, 'dfa@dfdbdg.ek', 928409838, 'Tech1', '2022-05-06'),
(18, 64, 'db test', 'dd', 'test name', 'el jadida', 'dd', 'el jadida', 'Select region', 24100, 'dfa@dfdbdg.ek', 928409838, 'Tech1', '2022-05-06'),
(42, 76, 'my laptop is not working ', 'my laptop is not working good , can you help me ?', 'radouane', 'azemmour', 'AZEMMOUR', 'eljadidarad1', 'Casablanca', 24100, 'atamousse.red@gmail.com', 212772561225, 'reda', '2022-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

DROP TABLE IF EXISTS `customer_tb`;
CREATE TABLE IF NOT EXISTS `customer_tb` (
  `custid` int(11) NOT NULL AUTO_INCREMENT,
  `custname` varchar(60) COLLATE utf8_bin NOT NULL,
  `custadd` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL,
  PRIMARY KEY (`custid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`custid`, `custname`, `custadd`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(2, 'anwar', 'add test', 'Mouse', 2, 600, 600, '2018-10-13'),
(3, 'moad', 'Bokaro', 'Mouse', 5, 600, 3000, '2018-10-13'),
(4, 'red1', 'add test', 'Mouse', 2, 600, 1200, '2018-10-13'),
(5, 'rad2', 'somethingadd', 'Mouse', 1, 600, 600, '2018-10-13'),
(6, 'someone', 'someoneadd', 'Keyboard', 1, 500, 500, '2018-10-13'),
(7, 'ddd', 'jay ho', 'Keyboard', 1, 500, 500, '2018-10-09'),
(8, 'daee', 'Bokaroda', 'Keyboard', 2, 500, 1000, '2018-10-21'),
(9, 'rad3', 'Bokarodad', 'Keyboard', 1, 500, 500, '2018-10-20'),
(10, 'kkk', 'asdsa', 'Keyboard', 1, 500, 500, '2018-10-20'),
(11, 'defe', 'Ranchidd', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(19, 'sdsads', 'dasdsad', 'Keyboard', 1, 500, 500, '2018-10-20'),
(20, 'asdas', 'asdsad', 'Keyboard', 1, 500, 500, '2018-10-20'),
(21, 'dsadas', 'asdasd', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(22, 'sdfsdf', 'dfsdf', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(23, 'dfsdf', 'sadsad', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(24, 'gfdgfdg', 'fgfdgfdg', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(25, 'rrr', 'fgdf', 'Mouse', 1, 600, 600, '2018-10-20'),
(26, 'Jay', 'ranchi', 'Samsung LCD', 1, 12000, 12000, '2018-10-20'),
(27, 'dfsdfsd', 'sdfdsf', 'Mouse', 1, 600, 600, '2018-10-20'),
(28, 'kamal', 'deefe', 'Rode Mic', 1, 18000, 18000, '2018-10-20'),
(29, 'rad1.me', 'kjkljkd', 'Keyboard', 34, 500, 399, '2022-04-27'),
(30, 'rad1.me', 'kjkljkd', 'Mouse', 3, 600, 768768, '2022-05-15'),
(31, 'radouane-tamouss.github.io.', '353dfd', 'Rode Mic', 35, 18000, 630000, '2022-05-11'),
(32, 'anwar', 'kjdkldj', 'Rode Mic', 39, 18000, 22344, '2022-05-06'),
(33, 'radouane', 'dkjdkjddkj', 'mouse razer', 3, 500, 22344, '2022-05-07'),
(34, 'rad1.me', 'dkjdkjddkj', 'mic razer', 34, 500, 22344, '2022-05-07'),
(35, 'radouane', '353dfd', 'mouse razer', 3, 500, 22344, '2022-05-07'),
(36, 'rad1.me', 'kjkljkd', 'mouse razer', 35, 500, 22344, '2022-05-07'),
(37, 'radouane', 'dkjdkjddkj', 'mic razer', 3, 500, 22344, '2022-05-07'),
(38, 'radouane', 'kjkljkd', 'mic razer', 3, 500, 22344, '2022-05-07'),
(39, 'ahmed', 'KENZI IMM8/ETAGE 4/APPT A', 'mic razer', 2, 500, 1000, '2022-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

DROP TABLE IF EXISTS `requesterlogin_tb`;
CREATE TABLE IF NOT EXISTS `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`r_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(12, 'redone', 'admin@gmail.com', '123456'),
(13, 'anwar', 'anwar@gmail.com', '123456'),
(15, 'user', 'user@user.com', 'user'),
(16, 'redone', 'admin@gmail.com', '123456'),
(17, 'demo@demo.com', 'atamouss@gmail.com', 'demo'),
(18, 'mustapha', 'mustapha@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

DROP TABLE IF EXISTS `submitrequest_tb`;
CREATE TABLE IF NOT EXISTS `submitrequest_tb` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `request_date` date NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(77, 'db test', 'my lapp not working ', 'user', 'kdkdkjl', 'klkjdkjldk', 'Azemmourselect', 'Casablanca-Settatselect', 878768, 'user@user.com', 39998382, '2022-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

DROP TABLE IF EXISTS `technician_tb`;
CREATE TABLE IF NOT EXISTS `technician_tb` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `empName` varchar(60) COLLATE utf8_bin NOT NULL,
  `empCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `empMobile` bigint(11) NOT NULL,
  `empEmail` varchar(60) COLLATE utf8_bin NOT NULL,
  `date_tech` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`empid`, `empName`, `empCity`, `empMobile`, `empEmail`, `date_tech`) VALUES
(12, 'ali', 'casa', 1234, 'tech@gmail.com', '2022-05-01 20:51:26'),
(15, 'radouane tamouss', 'el jadida', 772561225, 'atamousse.red@gmail.com', '2022-05-04 20:51:26'),
(16, 'anwar', 'el jadida', 772561225, 'atamousse.red@gmail.com', '2022-05-10 19:51:26'),
(17, 'mohamed', 'casablanca', 7727283, 'atamousse.red@gmal.com', '2022-05-10 19:51:26'),
(18, 'reda', 'casa', 342352333, 'atamousse.red@gmail.com', '2022-05-10 19:51:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
