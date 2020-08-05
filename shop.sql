-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 04:09 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_uname` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uname`, `admin_password`, `admin_type`) VALUES
(1, 'awaqar143', '4e075844d2e00e4c800c8c62716bed8c', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` timestamp NOT NULL,
  UNIQUE KEY `cat_id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_desc`, `status`, `create_date`) VALUES
(44, 'women fashion', 'women fashion', 1, '0000-00-00 00:00:00'),
(43, 'Men''s Fashion', 'Men''s Fashion', 0, '0000-00-00 00:00:00'),
(5, 'BOOKS & ENTERTAINMENT', 'book', 1, '0000-00-00 00:00:00'),
(41, 'ELECTORNICS', 'ELECTRONICS', 0, '0000-00-00 00:00:00'),
(38, 'Men''s fashion', 'fashion', 1, '0000-00-00 00:00:00'),
(42, 'Cloth', 'Cloth', 1, '0000-00-00 00:00:00'),
(46, 'mobiles', 'mobiles', 1, '0000-00-00 00:00:00'),
(47, 'Foods', 'Foods', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(8, 'waqar', 'awaqar143@gmail.com', '014222', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(9, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(10, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(11, 'AAAA', 'a.waqar456@yahoo.com', '03149170286', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(12, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(13, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(14, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(15, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(16, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(17, 'waqar', 'a.waqar456@yahoo.com', '03139000387', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(18, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(19, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(20, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(21, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(22, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(23, 'waqar', 'awaqar143@gmail.com', '03149170285', 'canal road garhi sikandar khan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `grand_total` float NOT NULL,
  `tracking_no` int(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `tracking_no`, `created`, `modified`, `status`) VALUES
(6, 8, 36000, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7, 9, 36000, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(8, 10, 18000, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(9, 11, 1000, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(10, 12, 499, 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(11, 13, 1010, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(12, 14, 1000, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(13, 15, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(14, 16, 1000, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(15, 17, 1010, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(16, 18, 1000, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(17, 19, 1010, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(18, 20, 5010, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(19, 21, 3020, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(20, 22, 3020, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(21, 23, 3020, 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `sub_total` float NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `sub_total`, `color`, `size`) VALUES
(1, 6, 93, 2, 36000, '', ''),
(2, 7, 93, 2, 36000, '', ''),
(3, 8, 93, 1, 18000, '', ''),
(4, 9, 102, 1, 1000, '', ''),
(5, 10, 103, 1, 499, '', ''),
(6, 11, 101, 1, 1010, '', ''),
(7, 12, 100, 1, 1000, '', ''),
(8, 13, 96, 1, 0, '', ''),
(9, 14, 100, 1, 1000, '', ''),
(10, 15, 101, 1, 1010, '', ''),
(11, 16, 100, 1, 1000, '', ''),
(12, 17, 101, 1, 1010, '', ''),
(13, 18, 102, 1, 1000, '', ''),
(14, 20, 101, 2, 2020, '', ''),
(15, 21, 101, 2, 2020, '', ''),
(16, 21, 100, 1, 1000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_status` varchar(255) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`, `status`) VALUES
(1, 'Pendding', ''),
(2, 'Cancelled', '0'),
(3, 'shifted', '1'),
(4, 'Delivered', '2');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cat_id` int(15) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(10) NOT NULL,
  `offer_price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `product_stock` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_dimention` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_time` timestamp NOT NULL,
  `product_desc` text NOT NULL,
  `product_type` varchar(255) NOT NULL DEFAULT '1',
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_title`, `slug`, `cat_id`, `product_image`, `product_price`, `offer_price`, `status`, `product_stock`, `short_description`, `product_color`, `product_dimention`, `product_size`, `product_time`, `product_desc`, `product_type`, `updated_date`, `updated_by`, `user`) VALUES
(92, 'Samsung Galaxy S6 Edeg Plus Blue color', 'samsung-galaxy-s6-edeg-plus-blue-color', 43, '15e0c758a01d7ec23ffa8ab8f9cdb4ba_4.jpg', 121212, '11111', '1', '12', 'ASAL;SJKA;SDF', 'asas', '', '12', '2020-01-11 19:00:00', '', '1', '2020-03-07 12:55:14', 'awaqar143', 'awaqar143'),
(93, 'Samsung Galaxy S7 Edge golden', 'samsung-galaxy-s7-edge-golden', 41, '2d7b0826c6c4cea46e519b11965efde2.jpg', 20000, '18000', '1', '10', 'samsung mobile', 'golden', '', '', '2020-01-12 19:00:00', '', '1', '2020-03-07 12:55:39', 'awaqar143', 'awaqar143'),
(94, 'huwei Y7 prime black color', 'huwei-y7-prime-black-color', 41, '15e0c758a01d7ec23ffa8ab8f9cdb4ba_41.jpg', 150000, '140000', '1', '1', 'lk', 'black', '', '12', '2020-01-11 19:00:00', '', '1', '2020-03-07 12:56:05', 'awaqar143', 'awaqar143'),
(96, 'Virtuals Psl shirts Quetta Gladiators new edition 2020', 'virtuals-psl-shirts-quetta-gladiators-new-edition-2020', 42, '869b7c85cd35a240900189b2a9de9bd4.jpg', 1100, '', '1', '100', 'Psl shirts Quetta Gladiators new edition 2020', 'Blue', '', 'small', '0000-00-00 00:00:00', '', '1', NULL, NULL, 'awaqar143'),
(97, 'Phone XR 6D Gorilla Tempered Glass Screen 1234567890', 'phone-xr-6d-gorilla-tempered-glass-screen-1234567890', 41, 'b534d76edb313bbbd649927b0c1f842a_1.jpg', 999, '', '1', '12', 'Phone XR (6.1 inch) 6D Gorilla Tempered Glass Screen', 'SILVER', '', 'small', '0000-00-00 00:00:00', '', '1', '2020-03-31 07:15:13', 'awaqar143', 'awaqar143'),
(98, 'Panasonic Telephone Original Kx-Tsc60Sx', 'panasonic-telephone-original-kx-tsc60sx', 41, 'c9487875fcc5ec87c1a489827d0ca19e_5.jpg', 3695, '', '1', '50', 'Panasonic Telephone Original Kx-Tsc60Sx', '', '', '', '0000-00-00 00:00:00', '', '1', '2020-03-31 07:17:25', 'awaqar143', 'awaqar143'),
(99, 'P47 Wireless Bluetooth Foldable Headset with Microphone', 'p47-wireless-bluetooth-foldable-headset-with-microphone', 41, '1e3bc8033f930879765881211d8abb51.jpg', 1050, '', '1', '40', 'P47 Wireless Bluetooth Foldable Headset with Microphone', '', '', '', '0000-00-00 00:00:00', '', '1', NULL, NULL, 'awaqar143'),
(100, 'Virtuals Green Cotton Shirt ', 'virtuals-green-cotton-shirt', 44, '37dc9ab712c6b4f2221939bfb6cb917c.jpg', 40000, '1000', '1', '12', '', 'Green', '', '', '0000-00-00 00:00:00', '', '1', '2020-03-31 07:08:55', 'awaqar143', 'awaqar143'),
(101, 'MONCLAR Green Leather Jacket', 'monclar-green-leather-jacket', 44, 'd2db908e15b9186120bcd4c4d3a924b9_1.jpg', 3500, '1010', '1', '50', 'Features: >Colour: Green >Fabric: Faux Leather >Comfortable fit What''s in the box? > 1x Green Leathe', 'Green', '', 'small', '0000-00-00 00:00:00', '', '1', '2020-03-07 13:38:16', 'awaqar143', 'awaqar143'),
(102, 'women dress', 'women-dress', 44, 'product-2.jpg', 20000, '1000', '1', '12', 'Features: >Trendy >Premium Quality >Makes you look decent and attractive >100% original fabric What''', 'SILVER', '', '12', '0000-00-00 00:00:00', '', '1', NULL, NULL, 'awaqar143'),
(103, 'men cloth', 'men-cloth', 43, 'product-21.jpg', 1500, '499', '1', '50', 'men cloth', 'green', '', 'large', '0000-00-00 00:00:00', '', '1', NULL, NULL, 'awaqar143');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_image`) VALUES
(65, 100, '37dc9ab712c6b4f2221939bfb6cb917c.jpg'),
(66, 101, 'd2db908e15b9186120bcd4c4d3a924b9_1.jpg'),
(67, 101, 'b03638e4227d1cce41c732298906ff54_1.jpg'),
(68, 101, 'd2db908e15b9186120bcd4c4d3a924b9_11.jpg'),
(62, 92, '0a5c264763991df2c6d618450b9e0390_1.jpg'),
(63, 93, '0a5c264763991df2c6d618450b9e0390_11.jpg'),
(61, 96, '4305dcb7c2aa827442cb64e680cfb2c9.jpg'),
(64, 94, '0a5c264763991df2c6d618450b9e0390_12.jpg'),
(69, 102, 'product-1.jpg'),
(70, 103, 'Amir2_copy.jpg'),
(71, 103, 'BeautyPlus_20161011151651_fast.jpg'),
(72, 103, 'Capture1111.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `username` varchar(255) NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`username`, `id`, `fname`, `lname`, `email`, `password`, `mobile`, `date`, `ip`) VALUES
('awaqar143', 11, 'abdul', 'waqar', 'awaqar143@gmail.com', '4e075844d2e00e4c800c8c62716bed8c', 3149170285, '2019-08-04 08:03:12', '::1'),
('waqarkhan', 34, 'waqar', 'khan', 'rafi.ullah@tcs.com.pk', 'ade740818d3bf4f31bb2de16dc413e37', 3139000387, '2020-03-26 05:57:43', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `reset_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `name`, `email`, `mobile`, `password`, `image`, `gender`, `create_date`, `user_type`, `status`, `reset_pass`) VALUES
(16, 'awaqar143', 'waqar khan', 'awaqar143@gmail.com', 3149170285, '4e075844d2e00e4c800c8c62716bed8c', 'BeautyPlus_20161011151651_fast.jpg', 'Female', '2020-02-09 19:00:00', '', '1', '87eb4ea8a10c35973b2dc8b3cebb86d9'),
(18, 'test', 'test', 'test@gmail.com', 0, '098f6bcd4621d373cade4e832627b4f6', 'adobe.jpg', 'Male', '2020-02-09 19:00:00', '', '1', ''),
(15, 'awaqar1433', 'waqar', 'a.waqar456@yahoo.com', 3149170285, '4e075844d2e00e4c800c8c62716bed8c', '', 'Male', '2020-02-09 19:00:00', '', '0', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
