-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2012 at 04:22 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `group2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ad_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ad_pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_name`, `ad_pass`) VALUES
('admin', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE IF NOT EXISTS `custom` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_diachi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_sodt` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `c_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `c_date` datetime NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`c_id`, `c_hoten`, `c_diachi`, `c_sodt`, `c_email`, `c_date`) VALUES
(21, '', '', '', '', '2012-11-19 17:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE IF NOT EXISTS `loai` (
  `p_loai` int(11) NOT NULL AUTO_INCREMENT,
  `l_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`p_loai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`p_loai`, `l_name`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'ToShiBa'),
(4, 'Vaio'),
(5, 'Acer');

-- --------------------------------------------------------

--
-- Table structure for table `mua`
--

CREATE TABLE IF NOT EXISTS `mua` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`m_id`),
  KEY `p_id` (`p_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=144 ;

--
-- Dumping data for table `mua`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `p_loai` int(11) NOT NULL,
  `p_cauhinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_ram` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_hdd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_vga` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_gia` int(11) NOT NULL,
  `p_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `p_loai` (`p_loai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_loai`, `p_cauhinh`, `p_ram`, `p_hdd`, `p_vga`, `p_gia`, `p_img`) VALUES
(1, ' MACBOOK AIR - MD223ZP/A', 1, 'Intel Core i5-3317U', '4GB DDR3', '64GB SSD (Flash storage)', 'Intel GMA HD 4000', 24000000, 'p1.jpg'),
(2, 'NOTEBOOK APPLE MC506ZP/A', 1, '1.4GHz Intel Core 2 Duo L2', '2GB of 1066MHz DDR3 SDRAM ', '128GB of flash storage', 'NVIDIA GeForce 320M', 30900000, 'p2.jpg'),
(3, 'APPLE MBAIR 11.6" (MC969ZP/A)', 1, 'Intel Core i5  1.6GHz', '4GB (two 2GB SO-DIMMs)', '128GB Flash Storage', 'Intel HD Graphics 3000 processor', 32000000, 'p3.jpg'),
(4, 'APPLE MBP 13.3" (MD314ZP/A)', 1, 'Intel Core i7 (3M Cache, 2.80GHz)', '4GB', '750GB', 'Intel HD Graphics 3000', 36500000, 'p4.jpg'),
(5, 'APPLE MACBOOK PRO - MD101ZP/A', 1, '2.5GHz Quad-core Intel Core i5 ', '4GB (two 2GB SO-DIMMs) ', '500 GB Serial ATA 5400 rpm', 'Intel HD Graphics 4000', 29000000, 'p5.jpg'),
(6, 'Dell Audi A4 (Inspiron 14R 5420)', 2, 'Intel Core i5-3210M 2.5GHz', '4GB RAM', '500GB HDD', 'VGA NVIDIA GeForce GT 630M', 13100000, 'p6.jpg'),
(7, 'Dell Inspiron 14 N4030 ', 2, 'Intel Core i3-350M 2.26GHz', '2GB RAM', '320GB HDD', 'VGA Intel HD Graphics', 7499000, 'p7.jpg'),
(8, 'Dell Vostro 1450', 2, 'Intel Core i5-2410M 2.3GHz', '4GB RAM', '500GB HDD', 'VGA ATI Radeon HD 6470', 12800000, 'p8.jpg'),
(9, 'Toshiba Satellite C640-1027U ', 3, 'Intel Core i3-380M 2.53GHz', '2GB RAM', '320GB HDD', 'VGA Intel HD Graphics', 8790000, 'p9.jpg'),
(10, 'Toshiba Satellite L745-1022U ', 3, 'Intel Core i5-2410M 2.3GHz', ' 2GB RAM', '500GB HDD', 'VGA Intel GMA HD 300', 13350000, 'p10.jpg'),
(11, 'Toshiba Satellite L840-1012 ', 3, 'Intel Core i3-2350M 2.3GHz', '2GB RAM', ' 500GB HDD', 'VGA Intel HD Graphics 3000', 9850000, 'p11.jpg'),
(12, 'Sony Vaio VPC-EA21FX/WI ', 4, 'Intel Core i3-350 2.26GHz', '4GB RAM', '320GB HDD', 'VGA Intel HD Graphics', 10500000, 'p12.jpg'),
(13, 'Sony Vaio VPC-Z112GD/S', 4, 'Intel Core i5-520M 2.40GHz', '4GB RAM', '128GB SSD', 'VGA NVIDIA GeForce', 21000000, 'p13.jpg'),
(14, 'Acer Aspire Timeline 4830-2452G75Mnbb ', 5, 'Intel Core i5-2450M 2.5GHz', '2GB RAM', '750GB HDD', 'VGA Intel HD Graphics 3000', 10200000, 'p14.jpg'),
(15, 'Acer Aspire V3-471G-53212G50Madd', 5, 'Intel Core i5-3210M 2.5GHz', '2GB RAM', '500GB HDD', 'VGA NVIDIA GeForce GT 630M', 11000000, 'p15.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mua`
--
ALTER TABLE `mua`
  ADD CONSTRAINT `mua_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `custom` (`c_id`),
  ADD CONSTRAINT `mua_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `mua_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `custom` (`c_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`p_loai`) REFERENCES `loai` (`p_loai`);
