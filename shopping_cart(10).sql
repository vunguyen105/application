-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2015 at 07:45 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `UserName`, `Password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lft` int(10) unsigned NOT NULL DEFAULT '0',
  `rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `CateStt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `lft`, `rgt`, `parent_id`, `CateStt`) VALUES
(1, 'Home page menu', 0, 38, 0, 1),
(5, 'Group parent 7.1', 33, 34, 6, 1),
(6, 'Group parent 7', 32, 35, 1, 1),
(9, 'TV', 16, 17, 1, 1),
(10, 'Máy giặt', 28, 29, 1, 1),
(11, 'Group parent 5', 30, 31, 1, 1),
(12, 'Máy tính', 22, 23, 1, 1),
(13, 'Lồng ngang', 36, 37, 10, 1),
(32, 'TV menu', 0, 7, 0, 1),
(63, 'TV 2D', 1, 2, 32, 1),
(65, 'Vũ', 3, 4, 64, 1),
(69, 'TV 3D', 5, 6, 32, 1),
(70, 'Lồng đứng', 24, 25, 10, 1),
(71, 'Lồng nghiêng', 26, 27, 10, 1),
(72, 'Laptop', 18, 19, 12, 1),
(73, 'Máy tính bàn', 20, 21, 12, 1),
(74, 'TV 2D', 8, 9, 9, 1),
(75, 'TV 3D', 10, 11, 9, 1),
(76, 'TV màn hình cong', 14, 15, 9, 1),
(78, 'TV cong siêu mỏng', 12, 13, 76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CusID` int(11) NOT NULL AUTO_INCREMENT,
  `CusUser` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CusPass` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CusName` varchar(150) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `CusPhone` char(20) NOT NULL,
  `CusAdd` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CusEmail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CusStt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CusID`),
  UNIQUE KEY `CusUser` (`CusUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CusID`, `CusUser`, `CusPass`, `CusName`, `CusPhone`, `CusAdd`, `CusEmail`, `CusStt`) VALUES
(1, 'nguyen', 'e10adc3949ba59abbe56e057f20f883e', 'nguyen', '2314324', 'ha noi vn', 'vunguyen105@gmail.com', 1),
(4, 'quan', 'e10adc3949ba59abbe56e057f20f883e', 'quan', '2314324', 'ha noi vn', 'vunguyen105@gmail.com', 1),
(7, 'thang21231', 'e10adc3949ba59abbe56e057f20f883e', 'thang23423', '43242', 'hn', 'vunguyen105@gmail.com', 1),
(8, 'vunguyen105', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Nguyên', '098342342', 'Phương Mai, Đống Đa, Hà Nội', 'nguyenvu91@gmail.com', 1),
(9, 'khue', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Khuê', '3424324', 'Long Biên Hà Nội', 'khue@gmail.com', 1),
(10, 'nguyenvu', 'e10adc3949ba59abbe56e057f20f883e', 'vu nguyen', '43534543', 'fsd fsdf', 'v@yahoo.com', 1),
(11, 'nguyenvu103', 'e10adc3949ba59abbe56e057f20f883e', 'vu nguyen', '43534543', 'fsd fsdf', 'v2@yahoo.com', 1),
(13, 'vunguyen105910', '96e79218965eb72c92a549dd5a330112', 'Vũ Nguyên', '243234', 'hfjdh', 'vunguyen105911@gmail.com', 1),
(14, 'vunguyen10501', 'e10adc3949ba59abbe56e057f20f883e', 'vu nguyen', '424324', 'hfjdh', 'vunguyen10501@gmail.com', 1),
(15, 'nguyenbk01', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Nguyên', '43243', 'vxvc', 'vunguyen01@gmail.com', 1),
(16, 'nguyenbk02', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Nguyên', '423423', 'fsf', 'vunguyen02@gmail.com', 1),
(17, 'nguyenbk03', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Nguyên', '423423', 'fsf', 'vunguyen03@gmail.com', 1),
(18, 'nguyenbk04', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Nguyên', '423423', 'fsf', 'vunguyen04@gmail.com', 1),
(19, 'nguyenbk05', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Nguyên', '423423', 'fsf', 'vunguyen05@gmail.com', 1),
(20, 'nguyenbk06', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Nguyên', '423423', 'fsf', 'vunguyen06@gmail.com', 1),
(21, 'nguyen1', 'e10adc3949ba59abbe56e057f20f883e', 'nguyen', '2314324', 'ha noi vn', 'vunguyen1051@gmail.com', 1),
(22, 'nguyen112', 'e10adc3949ba59abbe56e057f20f883e', 'nguyen', '2314324', 'ha noi vn', 'vunguyen105122313@gmail.com', 1),
(23, 'nguyen112342432432', 'e10adc3949ba59abbe56e057f20f883e', 'nguyen', '2314324', 'ha noi vn', 'vunguyen10512231321321323@gmail.com', 1),
(24, 'fsdfsdfsd', 'e10adc3949ba59abbe56e057f20f883e', 'nguyen', '2314324', 'ha noi vn', 'fddsfsdfsdf@gmail.com', 1),
(25, 'nguyen1090909', 'e10adc3949ba59abbe56e057f20f883e', 'vu', '10688', 'ha noi', 'vunguyen10510909090@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CusId` int(11) NOT NULL,
  `FeedTitle` varchar(50) NOT NULL,
  `FeedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FeedContent` text NOT NULL,
  `FeedStt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`FeedID`),
  KEY `fk_Feedback_Customer1_idx` (`CusId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `FileID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FileName` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'define.jpg',
  `ProID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`FileID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`FileID`, `FileName`, `ProID`) VALUES
(4, 'Images/trietly.jpg', 36),
(5, 'Images/trietlyhay.jpg', 36),
(6, 'Images/trietlyhayhay.jpg', 36),
(7, 'Images/tinh%20nguyen.jpg', 37),
(8, 'Images/trietly.jpg', 37),
(9, 'Images/trietlyhay.jpg', 37),
(29, 'Images/product7.jpg', 44),
(30, 'Images/product9.jpg', 44),
(31, 'Images/product11.jpg', 44),
(35, 'Images/product12.jpg', 43),
(36, 'Images/product12.jpg', 1),
(37, 'Images/product8.jpg', 31),
(38, 'Images/product10.jpg', 32),
(41, 'Images/product2.jpg', 33),
(43, 'Images/product1.jpg', 30),
(44, 'Images/product4.jpg', 35),
(45, 'Images/product9.jpg', 39),
(46, 'Images/product11.jpg', 42),
(48, 'Images/product1.jpg', 69),
(49, 'Images/product9.jpg', 74),
(50, 'Images/product1.jpg', 74),
(51, 'Images/girl1.jpg', 75),
(52, 'Images/girl1.jpg', 77);

-- --------------------------------------------------------

--
-- Table structure for table `improt`
--

CREATE TABLE IF NOT EXISTS `improt` (
  `ImportID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProID` int(11) unsigned NOT NULL,
  `SizeID` int(10) unsigned NOT NULL,
  `ImportDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ImportQuantity` int(10) unsigned NOT NULL,
  `ImportPrice` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ImportID`),
  KEY `fk_Improt_Product1_idx` (`ProID`),
  KEY `fk_Improt_Size1_idx` (`SizeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `improt`
--

INSERT INTO `improt` (`ImportID`, `ProID`, `SizeID`, `ImportDate`, `ImportQuantity`, `ImportPrice`) VALUES
(1, 68, 2, '2015-01-07 15:23:16', 2, 432),
(2, 68, 3, '2015-01-07 15:23:16', 4, 432),
(3, 68, 4, '2015-01-07 15:23:16', 5, 432),
(4, 69, 2, '2015-01-08 07:50:35', 2, 200),
(5, 70, 3, '2015-01-08 07:54:12', 5, 300),
(6, 71, 2, '2015-01-08 08:07:41', 2, 140),
(7, 71, 3, '2015-01-08 08:07:41', 2, 140),
(8, 71, 4, '2015-01-08 08:07:41', 5, 140),
(9, 72, 2, '2015-01-08 08:09:44', 2, 130),
(10, 73, 2, '2015-01-08 08:33:00', 1, 200),
(11, 73, 3, '2015-01-08 08:33:00', 1, 200),
(12, 73, 4, '2015-01-08 08:33:00', 2, 200),
(13, 74, 2, '2015-01-08 08:35:06', 1, 200),
(14, 74, 3, '2015-01-08 08:35:06', 1, 200),
(15, 74, 4, '2015-01-08 08:35:06', 2, 200),
(16, 75, 2, '2015-01-08 08:37:52', 3, 2),
(17, 77, 2, '2015-01-08 08:47:31', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `MenuID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MenuID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `MenuName`) VALUES
(1, 'Home page menu 22 3'),
(2, 'Home page menu'),
(3, 'nguyên'),
(4, 'test'),
(8, '3333'),
(9, 'Tivi'),
(10, 'mới');

-- --------------------------------------------------------

--
-- Table structure for table `menucate`
--

CREATE TABLE IF NOT EXISTS `menucate` (
  `MenuCateID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CateID` int(10) unsigned NOT NULL,
  `MenuID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`MenuCateID`),
  KEY `fk_MenuCate_Cate_idx` (`CateID`),
  KEY `fk_MenuCate_Menu_idx` (`MenuID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `menucate`
--

INSERT INTO `menucate` (`MenuCateID`, `CateID`, `MenuID`) VALUES
(1, 74, 1),
(2, 12, 1),
(3, 6, 1),
(4, 9, 1),
(12, 13, 1),
(13, 71, 1),
(19, 9, 2),
(20, 12, 2),
(22, 13, 2),
(23, 6, 2),
(25, 11, 2),
(28, 73, 8),
(33, 6, 8),
(34, 70, 1),
(35, 11, 1),
(38, 9, 3),
(40, 5, 4),
(43, 12, 4),
(44, 11, 4),
(45, 10, 3),
(46, 75, 4),
(47, 10, 4),
(48, 78, 4),
(49, 9, 4),
(50, 9, 9),
(51, 10, 9),
(52, 12, 9),
(53, 12, 8),
(54, 9, 8),
(55, 9, 10),
(56, 12, 10),
(57, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `new`
--

CREATE TABLE IF NOT EXISTS `new` (
  `NewID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NewTitle` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NewDate` date NOT NULL,
  `NewContent` text NOT NULL,
  `NewPicName` varchar(255) NOT NULL,
  `NewSource` varchar(255) NOT NULL,
  `NewDesc` text NOT NULL,
  `NewStt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`NewID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `new`
--

INSERT INTO `new` (`NewID`, `NewTitle`, `NewDate`, `NewContent`, `NewPicName`, `NewSource`, `NewDesc`, `NewStt`) VALUES
(2, 'GIRLS PINK T SHIRT ARRIVED IN STORE 1', '2014-11-04', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'public/images/blog/blog-one.jpg', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ', 1),
(3, 'GIRLS PINK T SHIRT ARRIVED IN STORE', '2014-11-04', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'public/images/blog/blog-two.jpg', '', 'Lorem ipsum dolor sit amet', 1),
(4, 'GIRLS PINK T SHIRT ARRIVED IN STORE', '0000-00-00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'public/images/blog/blog-three.jpg', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 1),
(6, 'GIRLS PINK T SHIRT ARRIVED IN STORE', '0000-00-00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'public/images/blog/blog-three.jpg', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', 1),
(8, 'fsdf', '2014-12-09', 'fdsfsd', 'Images/default.jpg', '', 'fsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `NotID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CusID` int(11) NOT NULL,
  `AdminID` int(10) unsigned NOT NULL,
  `NotTitle` varchar(50) NOT NULL,
  `NotContent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NotDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NotStt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NotID`),
  KEY `fk_Notice_Customer1_idx` (`CusID`),
  KEY `fk_Notice_Admin1_idx` (`AdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `OrdID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PayID` int(10) unsigned NOT NULL,
  `CusId` int(11) NOT NULL,
  `OrdStt` int(10) unsigned NOT NULL DEFAULT '1',
  `OrdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `OrdShipDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OrdCus` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `OrdAdd` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `OrdPhone` varchar(20) NOT NULL,
  `OrdTotal` int(11) NOT NULL,
  PRIMARY KEY (`OrdID`),
  KEY `fk_Order_PayMethod1_idx` (`PayID`),
  KEY `fk_Order_Customer1_idx` (`CusId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrdID`, `PayID`, `CusId`, `OrdStt`, `OrdDate`, `OrdShipDate`, `OrdCus`, `OrdAdd`, `OrdPhone`, `OrdTotal`) VALUES
(2, 1, 8, 1, '2015-01-09 13:54:18', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 100),
(3, 1, 8, 1, '2015-01-09 13:54:21', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 250),
(4, 1, 8, 1, '2015-01-07 05:31:06', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(5, 1, 8, 1, '2015-01-07 05:31:34', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(6, 1, 8, 1, '2015-01-07 05:32:09', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(7, 1, 8, 1, '2015-01-07 05:32:13', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(8, 1, 8, 1, '2015-01-07 05:39:22', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(9, 1, 8, 1, '2015-01-07 05:39:55', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(10, 1, 8, 1, '2015-01-07 05:40:12', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(11, 1, 8, 1, '2015-01-07 05:40:40', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(12, 1, 8, 1, '2015-01-07 05:41:04', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(13, 1, 8, 1, '2015-01-07 05:59:16', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(14, 1, 8, 1, '2015-01-07 06:01:58', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(15, 1, 8, 1, '2015-01-07 06:02:23', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(16, 1, 8, 1, '2015-01-07 06:19:39', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(17, 1, 8, 1, '2015-01-07 06:22:24', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(18, 1, 8, 1, '2015-01-07 06:27:29', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(19, 1, 8, 1, '2015-01-07 06:30:01', '0000-00-00 00:00:00', 'vũ nguyen', 'ha noi', '87878423', 0),
(20, 1, 8, 1, '2015-01-07 06:32:26', '0000-00-00 00:00:00', 'Nguyen Vu', 'ha noi', '58437584738', 0),
(21, 1, 8, 1, '2015-01-07 08:32:30', '0000-00-00 00:00:00', 'dsad', 'sadsad', '342432', 0),
(22, 1, 8, 1, '2015-01-07 08:33:18', '0000-00-00 00:00:00', 'dsad', 'sadsad', '342432', 0),
(23, 1, 8, 1, '2015-01-07 08:35:22', '0000-00-00 00:00:00', 'dsad', 'đá', 'dsad', 0),
(24, 1, 8, 1, '2015-01-07 08:40:43', '0000-00-00 00:00:00', 'đá', 'đá', '243234', 0),
(25, 1, 8, 1, '2015-01-07 08:41:06', '0000-00-00 00:00:00', 'đá', 'đá', '243234', 0),
(26, 1, 8, 1, '2015-01-07 08:41:32', '0000-00-00 00:00:00', 'đá', 'đá', '243234', 0),
(27, 1, 8, 1, '2015-01-07 08:52:12', '0000-00-00 00:00:00', 'đá', 'đá', '243234', 0),
(28, 1, 8, 1, '2015-01-07 08:52:53', '0000-00-00 00:00:00', 'đá', 'đá', '', 0),
(29, 1, 8, 1, '2015-01-07 08:57:15', '0000-00-00 00:00:00', 'đá', 'đá', '', 0),
(30, 1, 8, 1, '2015-01-07 08:57:39', '0000-00-00 00:00:00', '4234', '4324', '4234', 0),
(31, 1, 8, 1, '2015-01-07 08:58:23', '0000-00-00 00:00:00', '4234', '4324', '', 0),
(32, 1, 8, 1, '2015-01-07 09:24:50', '0000-00-00 00:00:00', 'Vũ Nguyên', 'Hà Nội', '043274832', 0),
(33, 1, 8, 1, '2015-01-09 10:22:22', '0000-00-00 00:00:00', 'Nam Daan', 'Hà Nội', '984958934', 0),
(34, 1, 8, 1, '2015-01-09 10:29:03', '0000-00-00 00:00:00', 'nam dân', 'hà nội', '34234', 0),
(35, 1, 8, 1, '2015-01-09 10:30:19', '0000-00-00 00:00:00', 'nam dân', 'hà nội', '34234', 0),
(36, 1, 8, 1, '2015-01-09 10:32:53', '0000-00-00 00:00:00', 'gfdg', 'fggd', '42432', 0),
(37, 1, 8, 1, '2015-01-09 10:33:57', '0000-00-00 00:00:00', 'gfdg', 'fggd', '42432', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `OrdID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProSizeID` int(10) unsigned NOT NULL,
  `OrdQuantity` int(11) NOT NULL DEFAULT '1',
  `OrdPrice` int(11) NOT NULL,
  PRIMARY KEY (`OrdID`,`ProSizeID`),
  KEY `fk_OrderDetail_ProSize1_idx` (`ProSizeID`),
  KEY `fk_OrderDetail_OrdID1_idx` (`OrdID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrdID`, `ProSizeID`, `OrdQuantity`, `OrdPrice`) VALUES
(18, 1, 1, 32),
(20, 1, 1, 4324),
(21, 1, 1, 4324),
(22, 1, 1, 4324),
(23, 1, 1, 4324),
(24, 1, 1, 4324),
(25, 1, 1, 4324),
(26, 1, 1, 4324),
(27, 1, 1, 4324),
(28, 1, 1, 4324),
(29, 1, 1, 4324),
(30, 1, 1, 4324),
(31, 1, 1, 4324),
(32, 1, 1, 4324),
(37, 1, 1, 100),
(37, 2, 1, 4324);

-- --------------------------------------------------------

--
-- Table structure for table `paymethod`
--

CREATE TABLE IF NOT EXISTS `paymethod` (
  `PayID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PayType` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Cost` int(11) NOT NULL,
  PRIMARY KEY (`PayID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `paymethod`
--

INSERT INTO `paymethod` (`PayID`, `PayType`, `Cost`) VALUES
(1, 'Chuyển tiền mặt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CateID` int(10) unsigned NOT NULL,
  `ProName` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ProPicName` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ProPrice` int(10) DEFAULT '0',
  `ProStt` int(10) DEFAULT '1',
  `ProQuantity` int(10) DEFAULT NULL,
  `ProDesc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ProStt2` int(11) DEFAULT '1',
  PRIMARY KEY (`ProID`),
  KEY `fk_Product_Categories1_idx` (`CateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProID`, `CateID`, `ProName`, `ProPicName`, `ProPrice`, `ProStt`, `ProQuantity`, `ProDesc`, `ProStt2`) VALUES
(1, 12, 'Quần bò', 'Images/product12.jpg', 100, 0, 5656, 'Quần b&ograve; nam ch&iacute;nh h&atilde;ng&nbsp;', 1),
(30, 12, 'sdasd', 'Images/product1.jpg', 4324, 1, 34234, 'fsdfds', 1),
(31, 12, '34234', 'Images/product8.jpg', 4234, 0, 4324, 'vcx', 1),
(32, 12, 'rewr', 'Images/product10.jpg', 3213, 1, 3213, 'fdfsf', 1),
(33, 12, '34', 'Images/product2.jpg', 434, 0, 434, '3424', 1),
(35, 12, '34', 'Images/product4.jpg', 434, 1, 434, '3424', 1),
(39, 12, 'ewr', 'Images/product9.jpg', 432, 1, 23123, '&nbsp; ', 1),
(42, 12, 'ewr', 'Images/product11.jpg', 432, 1, 4324, 'fsdffsdf', 1),
(43, 73, 'Áo thun', 'Images/product12.jpg', 300, 1, 2, '&Aacute;o thun mới ', 1),
(44, 73, 'Áo thun 2', 'Images/product7.jpg', 300, 1, 2, 'm&aacute;y t&iacute;nh b&agrave;n fjhdsjhdf ', 1),
(45, 13, 'ew', 'Images/default.jpg', 200, 1, 200, 'dấd\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(46, 13, 'ew', 'Images/default.jpg', 200, 1, 200, 'dấd\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(47, 13, 'ew', 'Images/default.jpg', 200, 1, 1, 'dấd\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(48, 13, '323', 'Images/default.jpg', 32, 1, 32, '32\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(49, 13, '323', 'Images/default.jpg', 32, 1, 32, '32\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(50, 13, '323', 'Images/default.jpg', 32, 0, 32, '32\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(51, 6, 'hdsahjd', 'Images/default.jpg', 34234, 1, 2, 'rrew\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(52, 6, 'Nguyên Vũ', 'Images/default.jpg', 34234, 1, 2, 'rrew\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(53, 9, 'fdsfds', 'Images/default.jpg', 3213, 1, 3231, 'dsadasd\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(54, 75, 'dsadas', 'Images/default.jpg', 4234, 1, 4234, '4234<br />\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(55, 75, 'dsadas', 'Images/default.jpg', 4234, 1, 4234, '4234<br />\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(56, 75, 'dsadas', 'Images/default.jpg', 4234, 1, 4234, '4234<br />\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(57, 75, 'dsadas', 'Images/default.jpg', 4234, 1, 4234, '4234<br />\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(58, 10, 'ruewyru', 'Images/default.jpg', 432423, 1, 4324, 'fdsf\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(59, 13, '32134324', '', 33, 1, 4286, '4324\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(60, 13, '32134324', '', 33, 1, 4286, '4324\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(61, 13, '32134324', '', 33, 1, 94, '4324\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(62, 13, '32134324', '', 33, 1, 94, '4324\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(63, 13, '32134324', '', 33, 1, 94, '4324\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(64, 13, '32134324', '', 33, 1, 94, '4324\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(65, 9, '4234', '', 43, 1, 38, 'rwer\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(66, 6, '4324', '', 43, 1, 10, 'sd\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(67, 13, 'rewr', '', 432, 1, 11, 're\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(68, 13, 'rewr', '', 432, 1, 11, 're\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(69, 65, 'Quần bò nữ', 'Images/product1.jpg', 300, 1, 2, 'Quần b&ograve; nữ<br />\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(70, 65, 'Quần zin', '', 340, 1, 5, 'quần\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(71, 65, 'Áo Thun', '', 200, 1, 9, '&aacute;o\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(72, 65, 'Áo dạ', '', 300, 1, 2, '&aacute;o\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(73, 65, 'Áo Dài', '', 300, 1, 4, '&Aacute;o\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(74, 65, 'Áo Dài', '', 300, 1, 4, '&Aacute;o\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(75, 11, '3432 fs', '', 23, 1, 3, '321\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(76, 11, '4234', 'Images/girl1.jpg', 3, 1, 0, '432\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1),
(77, 65, '3423', 'Images/girl1.jpg', 4, 1, 3, '43244\n<div id="__zsc_once">\n	&nbsp;</div>\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prosize`
--

CREATE TABLE IF NOT EXISTS `prosize` (
  `ProSizeID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SizeID` int(10) unsigned NOT NULL,
  `ProID` int(11) unsigned NOT NULL,
  `Quantity` int(10) unsigned NOT NULL,
  `Discount` int(11) NOT NULL,
  PRIMARY KEY (`ProSizeID`),
  KEY `fk_ProSize_Size_idx` (`SizeID`),
  KEY `fk_ProSize_Product1_idx` (`ProID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `prosize`
--

INSERT INTO `prosize` (`ProSizeID`, `SizeID`, `ProID`, `Quantity`, `Discount`) VALUES
(1, 2, 39, 23, 223),
(2, 2, 65, 2, 0),
(7, 3, 65, 32, 0),
(8, 4, 65, 3, 0),
(9, 5, 65, 1, 0),
(10, 2, 68, 2, 0),
(11, 3, 68, 4, 0),
(12, 4, 68, 5, 0),
(13, 2, 69, 2, 0),
(14, 3, 70, 5, 0),
(15, 2, 71, 2, 0),
(16, 3, 71, 2, 0),
(17, 4, 71, 5, 0),
(18, 2, 72, 2, 0),
(19, 2, 73, 1, 0),
(20, 3, 73, 1, 0),
(21, 4, 73, 2, 0),
(22, 2, 74, 1, 0),
(23, 3, 74, 1, 0),
(24, 4, 74, 2, 0),
(25, 2, 75, 3, 0),
(26, 2, 77, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `RateID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CusID` int(11) NOT NULL,
  `ProID` int(11) unsigned NOT NULL,
  `Mark` int(10) unsigned NOT NULL DEFAULT '1',
  `Comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CommentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`RateID`),
  KEY `fk_Rate_Customer1_idx` (`CusID`),
  KEY `fk_Rate_Product1_idx` (`ProID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `SizeID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SizeName` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SizeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`SizeID`, `SizeName`) VALUES
(2, '29'),
(3, 'XXL'),
(4, 'XX'),
(5, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `SlideID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SlideTitle` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SlideDate` date NOT NULL,
  `SlideContent` text NOT NULL,
  `SlidePicName` varchar(255) NOT NULL,
  `SlideStt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`SlideID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`SlideID`, `SlideTitle`, `SlideDate`, `SlideContent`, `SlidePicName`, `SlideStt`) VALUES
(1, 'new', '2015-01-06', 'nwq\n<div id="__zsc_once">\n	&nbsp;</div>\n', 'Images/girl3.jpg', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_Feedback_Customer1` FOREIGN KEY (`CusId`) REFERENCES `customer` (`CusID`) ON UPDATE CASCADE;

--
-- Constraints for table `improt`
--
ALTER TABLE `improt`
  ADD CONSTRAINT `fk_Improt_Product1` FOREIGN KEY (`ProID`) REFERENCES `product` (`ProID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Improt_Size1` FOREIGN KEY (`SizeID`) REFERENCES `size` (`SizeID`) ON UPDATE CASCADE;

--
-- Constraints for table `menucate`
--
ALTER TABLE `menucate`
  ADD CONSTRAINT `fk_MenuCate_Cate1` FOREIGN KEY (`CateID`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_MenuCate_Menu1` FOREIGN KEY (`MenuID`) REFERENCES `menu` (`MenuID`) ON UPDATE CASCADE;

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `fk_Notice_Admin1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Notice_Customer1` FOREIGN KEY (`CusID`) REFERENCES `customer` (`CusID`) ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_Order_Customer1` FOREIGN KEY (`CusId`) REFERENCES `customer` (`CusID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Order_PayMethod1` FOREIGN KEY (`PayID`) REFERENCES `paymethod` (`PayID`) ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_OrderDetail_OrdID1_idx` FOREIGN KEY (`OrdID`) REFERENCES `order` (`OrdID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrderDetail_ProSize1` FOREIGN KEY (`ProSizeID`) REFERENCES `prosize` (`ProSizeID`) ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Categories1` FOREIGN KEY (`CateID`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `prosize`
--
ALTER TABLE `prosize`
  ADD CONSTRAINT `fk_ProSize_Product1` FOREIGN KEY (`ProID`) REFERENCES `product` (`ProID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ProSize_Size` FOREIGN KEY (`SizeID`) REFERENCES `size` (`SizeID`) ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `fk_Rate_Customer1` FOREIGN KEY (`CusID`) REFERENCES `customer` (`CusID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Rate_Product1` FOREIGN KEY (`ProID`) REFERENCES `product` (`ProID`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
