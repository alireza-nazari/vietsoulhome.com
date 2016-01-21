-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2016 at 04:15 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vietsoulhome`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_ID` int(2) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  `cat_short_hint` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_ID`, `cat_title`, `cat_short_hint`, `cat_description`, `cat_img`) VALUES
(1, 'Hunger Starters', 'Fresh and Delicious', '', ''),
(2, 'Build-a-Pho', 'Most Famous Dish', 'Our acclaimed soup base is the quintessence of fresh meats, bones and \nPho''s spices which altogether are stewed for ten hours. Each bowl is \nserved with fresh bean sprouts, basil, limes and thin sliced jalapenos.', ''),
(3, 'Bowl / Platter', 'Satisfy your Hunger', '', ''),
(4, 'Sandwiches', 'Fast and Furious Taste', '', ''),
(5, 'Specials', 'Try and Be in Love', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
