-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2021 at 03:08 AM
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
-- Database: `fooe_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(25, 'Basanta Barik', 'basanta', '5fffc649f786af4404538dda21a1708d'),
(22, 'Bonty Das', 'bonty', 'c43f178623ca1802d3348d126dcb9a8d'),
(23, 'Soumya Mohanta', 'soumya', 'd7812b94b1962436cd28c7b5004e059e'),
(24, 'Debasmita Pal', 'debasmita', 'f45728e1e4a1a11a2ae0e77bc8e18efd'),
(19, 'Karan Kumar Gorai', 'karan', 'db068ce9f744fbb35eedc9a883f91085'),
(20, 'Kiran Gorai', 'kiran', 'b1a5b64256e27fa5ae76d62b95209ab3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

DROP TABLE IF EXISTS `tbl_food`;
CREATE TABLE IF NOT EXISTS `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(9, 'Raj-Kachori', 'raj-kachori', '60', 'raj-kachori.webp', '32', 'yes', 'yes'),
(8, 'Chole-Bhature', 'chole-bhature', '30', 'chole-bhature.webp', 'Chhole_bhature', 'yes', 'yes'),
(6, 'jalebi', 'jalebi', '50', 'jalebi.webp', 'Raj-Kachori', 'yes', 'yes'),
(7, 'Pav-Bhaji', 'pav-Bjaji', '40', 'pav-bhaji.webp', 'Pav-Bhaji', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food` varchar(150) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(2, 'Pav-Bhaji', '40', 1, '40', '2021-05-25 03:41:42', 'On Delivery', 'Karan Gorai', '7077658777', 'karangorai7077@gmail.com', '														jamshedpur												'),
(9, 'Chole-Bhature', '30', 3, '90', '2021-05-25 04:25:35', 'Delivered', 'Karan Gorai', '7077658777', 'reshma@gmai.com', '																																			jamshedpur																														'),
(10, 'jalebi', '50', 10, '500', '2021-05-28 02:18:16', 'Ordered', 'karan gorai', '7796546546540', 'karan@gmail.com', '																																			jamshedpur																														');

-- --------------------------------------------------------

--
-- Table structure for table `tnl_category`
--

DROP TABLE IF EXISTS `tnl_category`;
CREATE TABLE IF NOT EXISTS `tnl_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `tnl_category`
--

INSERT INTO `tnl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(35, 'Pav-Bhaji', 'food_category543.webp', 'no', 'yes'),
(34, 'Chai', 'food_category891.webp', 'yes', 'yes'),
(31, 'Jalebi', 'food_category598.webp', 'yes', 'yes'),
(32, 'Raj-Kachori', 'food_category409.webp', 'no', 'no'),
(30, 'Sweet-Paan', 'food_category403.webp', 'no', 'yes'),
(33, 'Chhole-Puri', 'food_category456.webp', 'no', 'no'),
(39, 'Chhole_bhature', 'food_category275.webp', 'yes', 'yes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
