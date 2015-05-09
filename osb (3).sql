-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2015 at 10:15 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(3, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 2, 'icon-book'),
(5, 'Area', '', '', 'site/viewarea', 1, 0, 1, 3, 'icon-book'),
(7, 'Request of admin', '', '', 'site/viewrequestadmin', 1, 0, 1, 4, 'icon-book'),
(9, 'Transaction of admin', '', '', 'site/viewtransactionadmin', 1, 0, 1, 6, 'icon-book'),
(10, 'Request of user', '', '', 'site/viewrequest', 1, 0, 1, 5, 'icon-book'),
(11, 'Transaction of user', '', '', 'site/viewtransaction', 1, 0, 1, 7, 'icon-book');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `osb_area`
--

CREATE TABLE IF NOT EXISTS `osb_area` (
`id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_area`
--

INSERT INTO `osb_area` (`id`, `order`, `status`, `name`) VALUES
(1, 1, 2, 'Mumbai'),
(2, 2, 2, 'navimumbai'),
(3, 3, 2, 'bandra'),
(4, 4, 1, 'ghatkopar'),
(5, 5, 1, 'thane');

-- --------------------------------------------------------

--
-- Table structure for table `osb_category`
--

CREATE TABLE IF NOT EXISTS `osb_category` (
`id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_category`
--

INSERT INTO `osb_category` (`id`, `order`, `status`, `name`) VALUES
(1, 1, 2, 'Mobile'),
(2, 2, 1, 'Personal computer'),
(3, 3, 2, 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `osb_request`
--

CREATE TABLE IF NOT EXISTS `osb_request` (
`id` int(11) NOT NULL,
  `userfrom` int(11) NOT NULL,
  `userto` int(11) NOT NULL,
  `requeststatus` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `approvalreason` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_request`
--

INSERT INTO `osb_request` (`id`, `userfrom`, `userto`, `requeststatus`, `amount`, `Reason`, `approvalreason`, `timestamp`) VALUES
(46, 2, 3, 3, '500', '', 'xyz', '2015-05-08 10:44:23'),
(47, 1, 2, 3, '1000', '', 'xyz', '2015-05-08 10:54:19'),
(48, 3, 5, 2, '25000', '', 'abc', '2015-05-08 10:38:23'),
(49, 2, 3, 2, 'undefined', '', '', '2015-05-09 05:07:02'),
(50, 2, 3, 1, 'undefined', '', '', '2015-05-07 12:38:03'),
(51, 4, 2, 2, '1000', '5000', '', '2015-05-09 05:47:55'),
(52, 2, 3, 1, '1000', '20000', '', '2015-05-09 05:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `osb_requeststatus`
--

CREATE TABLE IF NOT EXISTS `osb_requeststatus` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_requeststatus`
--

INSERT INTO `osb_requeststatus` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'accepted'),
(3, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `osb_shopphoto`
--

CREATE TABLE IF NOT EXISTS `osb_shopphoto` (
`id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_shopphoto`
--

INSERT INTO `osb_shopphoto` (`id`, `user`, `photo`) VALUES
(13, 2, 'download.jpg'),
(14, 2, 'images_(1).jpg'),
(15, 2, 'images_(2).jpg'),
(16, 3, 'images_(3).jpg'),
(17, 3, 'images_(4).jpg'),
(18, 3, 'images_(5).jpg'),
(19, 4, 'images.jpg'),
(20, 4, 'samsung-electronics-marketing-blitz-stirs-debate-over-innovation.jpg'),
(21, 1, 'Computer_system2.jpg'),
(22, 1, 'BJW_Elecronics_SF.jpg'),
(23, 1, 'samsung-electronics-marketing-blitz-stirs-debate-over-innovation2.jpg'),
(25, 4, 'images_(1)1.jpg'),
(26, 5, 'images_(2)1.jpg'),
(28, 5, 'japanese-english-electronic-dictionary-canon-wordtank-z410-black-touch-panel-01.jpg'),
(29, 5, 'ipod-car-audio-nav-tv.png'),
(30, 6, 'savingspromo_onlinespecial.jpg'),
(31, 6, 'webuy.png'),
(32, 6, 'images_(1)2.jpg'),
(33, 7, 'images2.jpg'),
(34, 7, 'webuy1.png'),
(35, 7, 'images_(1)3.jpg'),
(36, 8, 'japanese-english-electronic-dictionary-canon-wordtank-z410-black-touch-panel-011.jpg'),
(37, 8, 'images_(2)2.jpg'),
(42, 8, 'Aluminium-ultrabook-laptop-computer-Intel-Celeron-1037U-dual-core-webcam-WIFI-W-option-8GB-ram-128GB_350x350_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `osb_shopproductphoto`
--

CREATE TABLE IF NOT EXISTS `osb_shopproductphoto` (
`id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_shopproductphoto`
--

INSERT INTO `osb_shopproductphoto` (`id`, `user`, `photo`) VALUES
(11, 2, 'Buy-VOX-4-SIM-Touchscreen-TV-Mobile-Free-Bluetooth-for-Price-Rs.-2848_.jpg'),
(12, 1, 'images3.jpg'),
(13, 1, 'ee-cash-on-tap-2.jpg'),
(14, 1, 'MS-Nokia.jpg'),
(15, 2, 'images_(1)4.jpg'),
(17, 2, 'images_(1)5.jpg'),
(18, 3, 'MS-Nokia1.jpg'),
(19, 3, 'ee-cash-on-tap-22.jpg'),
(20, 3, 'Buy-VOX-4-SIM-Touchscreen-TV-Mobile-Free-Bluetooth-for-Price-Rs.-2848_1.jpg'),
(21, 4, 'aorus_x7_laptop_nvidia_g_sync_geforce-1024x571.jpg'),
(22, 4, 'download1.jpg'),
(23, 4, 'images4.jpg'),
(24, 5, 'picture-23.png'),
(25, 5, 'download2.jpg'),
(26, 5, 'images_(1)6.jpg'),
(27, 6, 'aorus_x7_laptop_nvidia_g_sync_geforce-1024x5711.jpg'),
(28, 6, 'images5.jpg'),
(29, 6, 'download3.jpg'),
(30, 7, '14754a7c5c2d1c692df435f1b6336e8a_icon_127x127.png'),
(31, 7, 'How-to-Speed-Up-a-Slow-Computer-for-Free.gif'),
(32, 7, 'Computer_system.jpg'),
(33, 8, 'Aluminium-ultrabook-laptop-computer-Intel-Celeron-1037U-dual-core-webcam-WIFI-W-option-8GB-ram-128GB.jpg_350x350_.jpg'),
(34, 8, 'How-to-Speed-Up-a-Slow-Computer-for-Free1.gif'),
(35, 8, 'Computer_system1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `osb_transaction`
--

CREATE TABLE IF NOT EXISTS `osb_transaction` (
`id` int(11) NOT NULL,
  `userto` int(11) NOT NULL,
  `userfrom` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payableamount` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_transaction`
--

INSERT INTO `osb_transaction` (`id`, `userto`, `userfrom`, `reason`, `amount`, `payableamount`, `timestamp`) VALUES
(48, 1, 2, 'undefined', '1000', '', '2015-05-07 12:41:34'),
(51, 3, 2, '', '500', '', '2015-05-08 10:42:22'),
(52, 3, 2, '', 'undefined', '', '2015-05-09 05:07:02'),
(53, 2, 4, '', '1000', '', '2015-05-09 05:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `osb_transactionstatus`
--

CREATE TABLE IF NOT EXISTS `osb_transactionstatus` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `osb_transactionstatus`
--

INSERT INTO `osb_transactionstatus` (`id`, `name`) VALUES
(1, 'internal purchase'),
(2, 'admin to store');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` int(11) NOT NULL,
  `json` text NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `membershipno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `shopcontact1` varchar(255) NOT NULL,
  `shopcontact2` varchar(255) NOT NULL,
  `shopemail` varchar(255) NOT NULL,
  `purchasebalance` varchar(255) NOT NULL,
  `salesbalance` double NOT NULL DEFAULT '0',
  `area` int(11) NOT NULL,
  `shoplogo` varchar(255) NOT NULL,
  `percentpayment` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `shopname`, `membershipno`, `address`, `description`, `website`, `shopcontact1`, `shopcontact2`, `shopemail`, `purchasebalance`, `salesbalance`, `area`, `shoplogo`, `percentpayment`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@admin.com', 1, '0000-00-00 00:00:00', 1, 'download_(1).jpg', '', '', 1, 'wohlig', 'wohlig technologies', '100', '', '', 'www.wohlig.com', '987456313', '02245679789', 'support@wohlig.com', '9800', 10000, 2, 'download_(1).jpg', '500'),
(2, 'pratik', '3644a684f98ea8fe223c713b77189a77', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, 'download1.png', 'pratik', '1', 1, '', 'lifestyle shop', '200', '', 'Personal computer', '987777777777', 'Rammaruti road, near sai prasad hotel, thane(w) 400658', 'shop having electronic gadgets', '022766666666', '25000', 99000, 0, 'download1.png', ''),
(3, 'Priyanka', '94f6d7e04a4d452035300f18b984988c', 'priya@rocketmail.com', 1, '2014-05-12 06:52:44', 1, 'download_(1).png', 'wohlig123', '', 1, '', 'techno shop', '300', '', 'Laptops', '022-27568943', 'somaiya vidyavihar, near andheri kurla road, 400658.', 'Shop having all electronics gadgets including mobiles,tv,radio,lcds etc.', '9874562133', '8900', 9800, 0, 'download_(1).png', ''),
(4, 'pooja', '18d8042386b79e2c279fd162df0205c8', 'puja@gmail.com', 1, '2015-04-18 09:41:38', 1, 'download4.jpg', '', '2', 1, 'abc', 'Pancharatna', '400', '', '', 'Mobile', '', '', 'Laptops', '29000', 35000, 0, 'download4.jpg', ''),
(5, 'jagruti', 'cee631121c2ec9232f3a2f028ad5c89b', 'jag@gmail.com', 1, '2015-04-18 11:35:01', 1, 'images.png', '', 'abc', 1, 'kjehjegrh', 'Vijay Sales', '500', 'Nakshatra Arcade, ram maruti road, MD lane, Ghatkopar(W) 400856', 'Vijay Sales bring to you the best online shopping deals and offers on Mobile Phones, Digital Cameras, Laptops, Televisions, Refrigerators, Air-Conditioners.', 'support@vijaysales.com', '9874563586', '022-7894568', 'support@vijaysales.com', '50000', 40000, 4, 'images.png', ''),
(6, 'sneha', 'd490d7b4576290fa60eb31b5fc917ad1', 'snehamalankar@gmail.com', 1, '2015-04-20 06:50:48', 1, 'images_(1).png', '', '6', 1, 'kdjfjrhej', 'snehashop', '600', '', '', 'www.sneha.com', '022-27766568', '720456893', 'snehacomp@gmail.com', '20000', 30000, 5, 'images_(1).png', ''),
(7, 'sohan', 'e5841df2166dd424a57127423d276bbe', 'shn619@gmail.com', 1, '2015-04-22 13:07:57', 1, 'images1.png', '', 'j', 1, 'ju', 'korum', '700', '', '', 'www.wohlig.com', '022-27568943', '8868126555', 'korum@gmail.com', '500000', 500000, 4, 'images1.png', ''),
(8, 'pratiksha', '7a53928fa4dd31e82c6ef826f341daec', 'pra@gmail.com', 1, '2015-04-29 09:44:11', 1, 'images_(1)7.jpg', '1', '1', 1, '1', 'pratiskha stores', '800', '', '', 'www.pratiksha.com', '022-27568943', '7889556524', 'support@pratisksha.com', '876468', 84768, 4, 'images_(1)7.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `usercategory`
--

CREATE TABLE IF NOT EXISTS `usercategory` (
`id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercategory`
--

INSERT INTO `usercategory` (`id`, `user`, `category`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 0),
(6, 4, 5),
(7, 5, 3),
(8, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
`id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_area`
--
ALTER TABLE `osb_area`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_category`
--
ALTER TABLE `osb_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_request`
--
ALTER TABLE `osb_request`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_requeststatus`
--
ALTER TABLE `osb_requeststatus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_shopphoto`
--
ALTER TABLE `osb_shopphoto`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_shopproductphoto`
--
ALTER TABLE `osb_shopproductphoto`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_transaction`
--
ALTER TABLE `osb_transaction`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `osb_transactionstatus`
--
ALTER TABLE `osb_transactionstatus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercategory`
--
ALTER TABLE `usercategory`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `osb_area`
--
ALTER TABLE `osb_area`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `osb_category`
--
ALTER TABLE `osb_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `osb_request`
--
ALTER TABLE `osb_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `osb_requeststatus`
--
ALTER TABLE `osb_requeststatus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `osb_shopphoto`
--
ALTER TABLE `osb_shopphoto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `osb_shopproductphoto`
--
ALTER TABLE `osb_shopproductphoto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `osb_transaction`
--
ALTER TABLE `osb_transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `osb_transactionstatus`
--
ALTER TABLE `osb_transactionstatus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usercategory`
--
ALTER TABLE `usercategory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
