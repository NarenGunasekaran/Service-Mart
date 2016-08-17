-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 11:28 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
`id` int(10) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(10, '#006633'),
(11, '#00FF99'),
(5, '#333'),
(6, '#666'),
(7, '#999'),
(9, '#99FFFF'),
(15, '#CCC'),
(8, '#CCFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feed` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `name`, `email`, `feed`) VALUES
(1, 52, 'fsdf', 'asdf', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(10) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`) VALUES
(1, 'ulsoor'),
(2, 'shivajinagar'),
(3, 'madiwalla'),
(4, 'malleshwaram'),
(6, 'domlur'),
(7, 'rajajinagar'),
(8, 'rajkumar road'),
(9, 'mg road');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `service` varchar(300) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `color` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `user_id`, `name`, `email`, `mobile`, `location`, `address`, `category`, `service`, `logo`, `date`, `color`, `status`) VALUES
(5, 51, 'naren', 'naren@gmail.com', '8888888888', 'malleshwaram', 'Domlur, Ulsoor, Bangalore', 'Desktop', 'Laptop service', '16650Lighthouse.jpg', '2015-04-28', '#999', 'y'),
(6, 52, 'prabal', 'prabal@gmail.com', '8888888888', 'ulsoor', 'rajajinagar, bangalore', 'Mobile', 'cooker', '28027Hydrangeas.jpg', '2015-04-28', '#99FFFF', 'y'),
(8, 44, 'madhu', 'madhu@gmail.com', '8888888888', 'ulsoor', 'Shivajinagar', 'Mobile', 'Furniture Repair Works', '32117Desert.jpg', '2015-04-28', '#666', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE IF NOT EXISTS `service_type` (
`id` int(10) NOT NULL,
  `service_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `service_type`) VALUES
(1, 'Mobile'),
(3, 'Desktop'),
(4, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `quest` int(10) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `quest`, `answer`, `password`) VALUES
(51, 'naren', 'naren@gmail.com', 1, 'vijay', 'naren'),
(52, 'prabal', 'prabal@gmail.com', 2, 'gobi', 'prabal'),
(45, 'Sumesh', 'sumesh@gmail.com', 1, 'vijay', 'naren'),
(44, 'Madhu', 'madhu@gmail.com', 3, 'jism2', 'madhu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `color` (`color`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
